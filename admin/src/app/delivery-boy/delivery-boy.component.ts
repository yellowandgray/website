import { Component, OnInit, Inject } from "@angular/core";
import {
  MatDialog,
  MatDialogRef,
  MAT_DIALOG_DATA
} from "@angular/material/dialog";
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { MatSnackBar } from "@angular/material/snack-bar";
import { HttpClient } from "@angular/common/http";
//import { NgxSpinnerService } from 'ngx-spinner';
@Component({
  selector: "app-delivery-boy",
  templateUrl: "./delivery-boy.component.html",
  styleUrls: ["./delivery-boy.component.css"]
})
export class DeliveryBoyComponent implements OnInit {
  result = [];
  loading = false;
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, 
    private httpClient: HttpClient,
   // private spinner: NgxSpinnerService
    ) {}
  
  ngOnInit() {
    this.getDeliveryBoy();
  }

  showSpinner(name: string) {
    //this.spinner.show(name);
  }

  hideSpinner(name: string) {
   // this.spinner.hide(name);
  }
  
  image_url: string = "http://ygonlinebuy.com/api/v1/";
  getDeliveryBoy(): void {

    this.loading = true;
    this.showSpinner('sp3')

    this.httpClient
      .get<any>(
        "http://ygonlinebuy.com/api/v1/get_delivery_boy"
      )
      .subscribe(
        res => {

          this.loading = false;
          this.hideSpinner('sp3')

          this.result = res["result"]["data"];
        },
        error => {

          this.loading = false;
          this.hideSpinner('sp3')
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
        if (parseInt(val.delivery_boy_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(DeliveryBoyForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getDeliveryBoy();
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(DeliveryBoyDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getDeliveryBoy();
      }
    });
  }
  
  imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(PictureViewUser, {
      minWidth: "40%",
      maxWidth: "40%",
      data: {
        data: data,
        action: action
      }
    });

    dialogRef.afterClosed().subscribe(result => {
    });
  }
}

@Component({
  selector: "delivery-boy-form",
  templateUrl: "delivery-boy-form.html"
})
export class DeliveryBoyForm {
  image_url: string = "http://ygonlinebuy.com/api/v1/";
  deliveryform: FormGroup;
  loading = false;
  delivery_boy_id = 0;
  profile_image: string = "Select Profile Image";
  imageurl: string = "";
  constructor(
    public dialogRef: MatDialogRef<DeliveryBoyForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.deliveryform = new FormGroup({
      first_name: new FormControl("", Validators.required),
      last_name: new FormControl("", Validators.required),
      phone: new FormControl("", Validators.required),
      user_name: new FormControl("", Validators.required),
      password: new FormControl("", Validators.required)
    });
    if (this.data != null) {
      this.deliveryform.patchValue({
        first_name: this.data.first_name,
        last_name: this.data.last_name,
        phone: this.data.phone,
        user_name: this.data.user_name,
        password: this.data.password
      });
      this.delivery_boy_id = this.data.delivery_boy_id;
      this.imageurl = this.data.imageurl;
    }
  }

  onSubmit() {
    if (this.deliveryform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.delivery_boy_id != 0) {
      formData.append("first_name", this.deliveryform.value.first_name);
      formData.append("last_name", this.deliveryform.value.last_name);
      formData.append("phone", this.deliveryform.value.phone);
      formData.append("user_name", this.deliveryform.value.user_name);
      formData.append("password", this.deliveryform.value.password);
      formData.append("imageurl", this.imageurl);
      url =
        "update_record/delivery_boy/delivery_boy_id = " + this.delivery_boy_id;
    } else {
      formData.append("first_name", this.deliveryform.value.first_name);
      formData.append("last_name", this.deliveryform.value.last_name);
      formData.append("phone", this.deliveryform.value.phone);
      formData.append("user_name", this.deliveryform.value.user_name);
      formData.append("password", this.deliveryform.value.password);
      formData.append("profile_image", this.imageurl);
      url = "insert_delivery_boy";
    }
    this.httpClient
      .post("http://ygonlinebuy.com/api/v1/" + url, formData)
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
      this.profile_image = "Select Profile Image";
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
        "http://ygonlinebuy.com/api/v1/upload_file",
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
  selector: "delivery-boy-delete-confirmation",
  templateUrl: "delivery-boy-delete-confirmation.html"
})
export class DeliveryBoyDelete {
  loading = false;
  delivery_boy_id = 0;
  constructor(
    public dialogRef: MatDialogRef<DeliveryBoyDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.delivery_boy_id = this.data;
    }
  }
  confirmDelete() {
    if (this.delivery_boy_id == null || this.delivery_boy_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "http://ygonlinebuy.com/api/v1/delete_record/delivery_boy/delivery_boy_id=" +
          this.delivery_boy_id
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
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class PictureViewUser {
  image_url: string = 'http://ygonlinebuy.com/api/v1/';
  action: string = '';
  loading = false;
  delivery_boy_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<PictureViewUser>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.delivery_boy_id = this.datapopup.data;
      }
    }
  }
}