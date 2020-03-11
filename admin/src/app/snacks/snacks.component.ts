import { Component, OnInit, Inject } from "@angular/core";
import {
  MatDialog,
  MatDialogRef,
  MAT_DIALOG_DATA
} from "@angular/material/dialog";
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { MatSnackBar } from "@angular/material/snack-bar";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: "app-snacks",
  templateUrl: "./snacks.component.html",
  styleUrls: ["./snacks.component.css"]
})
export class SnacksComponent implements OnInit {
  result = [];
  constructor(
    public dialog: MatDialog,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {}

  ngOnInit() {
    this.getSnacks();
  }
  image_url: string = "http://www.lemonandshadow.com/threelevel/api/v1/";
  getSnacks(): void {
    this.httpClient
      .get<any>("http://www.lemonandshadow.com/threelevel/api/v1/get_food_list")
      .subscribe(
        res => {
          this.result = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
  openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.fooditem_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(SnacksForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getSnacks();
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(SnacksDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getSnacks();
      }
    });
  }
  imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(SnacksImageView, {
      minWidth: "40%",
      maxWidth: "40%",
      data: {
        data: data,
        action: action
      }
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
      }
    });
  }
}

@Component({
  selector: "snacks-form",
  templateUrl: "snacks-form.html"
})
export class SnacksForm {
  image_url: string = "http://www.lemonandshadow.com/threelevel/api/v1/";
  snacksform: FormGroup;
  loading = false;
  fooditem_id = 0;
  unit: any[];
  product_image: string = "Select Product Image";
  imageurl: string = "";
  constructor(
    public dialogRef: MatDialogRef<SnacksForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.snacksform = new FormGroup({
      name: new FormControl("", Validators.required),
      unit_no: new FormControl("", Validators.required),
      unit_id: new FormControl("", Validators.required),
      status: new FormControl("", Validators.required),
      amount: new FormControl("", Validators.required)
    });
    if (this.data != null) {
      this.snacksform.patchValue({
        name: this.data.name,
        amount: this.data.amount,
        unit_no: this.data.unit_no,
        unit_id: this.data.unit_id,
        status: this.data.status
      });
      this.fooditem_id = this.data.fooditem_id;
      this.imageurl = this.data.imageurl;
    }
    this.httpClient
      .get("http://www.lemonandshadow.com/threelevel/api/v1/get_unit")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.unit = res["result"]["data"];
          } else {
            this._snackBar.open(res["result"]["message"], "", {
              duration: 2000
            });
          }
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }

  onSubmit() {
    if (this.snacksform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.fooditem_id != 0) {
      formData.append("name", this.snacksform.value.name);
      formData.append("unit_no", this.snacksform.value.unit_no);
      formData.append("unit_id", this.snacksform.value.unit_id);
      formData.append("amount", this.snacksform.value.amount);
      formData.append("status", this.snacksform.value.status);
      formData.append("imageurl", this.imageurl);
      url = "update_record/fooditem/fooditem_id = " + this.fooditem_id;
    } else {
      formData.append("name", this.snacksform.value.name);
      formData.append("unit_no", this.snacksform.value.unit_no);
      formData.append("unit_id", this.snacksform.value.unit_id);
      formData.append("product_image", this.imageurl);
      formData.append("amount", this.snacksform.value.amount);
      formData.append("status", this.snacksform.value.status);
      url = "insert_snacks";
    }
    this.httpClient
      .post("http://www.lemonandshadow.com/threelevel/api/v1/" + url, formData)
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this.dialogRef.close(true);
          } else {
            this._snackBar.open(res["result"]["message"], "", {
              duration: 2000
            });
          }
        },
        error => {
          this.loading = false;
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }

  removeMedia(url) {
    this[url] = "";
    if (url === "imageurl") {
      this.product_image = "Select Product Image";
    }
  }

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append("file", fileData);
    this.httpClient
      .post(
        "http://www.lemonandshadow.com/threelevel/api/v1/upload_file",
        formData
      )
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this[path] = res["result"]["data"];
          } else {
            this._snackBar.open(res["result"]["message"], "", {
              duration: 2000
            });
          }
        },
        error => {
          this.loading = false;
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
}

@Component({
  selector: "snacks-delete-confirmation",
  templateUrl: "snacks-delete-confirmation.html"
})
export class SnacksDelete {
  loading = false;
  fooditem_id = 0;
  constructor(
    public dialogRef: MatDialogRef<SnacksDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.fooditem_id = this.data;
    }
  }

  confirmDelete() {
    if (this.fooditem_id == null || this.fooditem_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "http://www.lemonandshadow.com/threelevel/api/v1/delete_record/fooditems/fooditem_id=" +
          this.fooditem_id
      )
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this.dialogRef.close(true);
          } else {
            this._snackBar.open(res["result"]["message"], "", {
              duration: 2000
            });
          }
        },
        error => {
          this.loading = false;
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
}

@Component({
  selector: "picture-view",
  templateUrl: "picture-view.html"
})
export class SnacksImageView {
  image_url: string = "http://www.lemonandshadow.com/threelevel/api/v1/";
  action: string = "";
  loading = false;
  fooditem_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<SnacksImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == "delete") {
        this.fooditem_id = this.datapopup.data;
      }
    }
  }
}
