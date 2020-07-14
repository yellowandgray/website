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
  selector: 'app-pincode',
  templateUrl: './pincode.component.html',
  styleUrls: ['./pincode.component.css']
})
export class PincodeComponent implements OnInit {
  result = []
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getPincode();
  }
  getPincode(): void {
    this.httpClient
      .get<any>("http://localhost/project/ygonlinebuy/api/v1/get_delivery_pincode")
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
        if (parseInt(val.delivery_pincode_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(PincodeForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getPincode();
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(PincodeDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getPincode();
      }
    });
  }
}


@Component({
  selector: "pincode-form",
  templateUrl: "pincode-form.html"
})
export class PincodeForm {
  pincodeform: FormGroup;
  loading = false;
  delivery_pincode_id = 0;
  constructor(
    public dialogRef: MatDialogRef<PincodeForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.pincodeform = new FormGroup({
      pincode: new FormControl("", Validators.required),
      status: new FormControl("", Validators.required),
    });
    if (this.data != null) {
      this.pincodeform.patchValue({
        pincode: this.data.pincode,
        status: this.data.status,
      });
      this.delivery_pincode_id = this.data.delivery_pincode_id;
    }
  }

  onSubmit() {
    if (this.pincodeform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.delivery_pincode_id != 0) {
      formData.append("pincode", this.pincodeform.value.pincode);
      formData.append("status", this.pincodeform.value.status);
      url = "update_record/delivery_pincode/delivery_pincode_id = " + this.delivery_pincode_id;
    } else {
      formData.append("pincode", this.pincodeform.value.pincode);
      formData.append("status", this.pincodeform.value.status);
      url = "insert_pincode";
    }
    this.httpClient
      .post("http://localhost/project/ygonlinebuy/api/v1/" + url, formData)
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
  selector: "pincode-delete-confirmation",
  templateUrl: "pincode-delete-confirmation.html"
})
export class PincodeDelete {
  loading = false;
  delivery_pincode_id = 0;
  constructor(
    public dialogRef: MatDialogRef<PincodeDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.delivery_pincode_id = this.data;
    }
  }

  confirmDelete() {
    if (this.delivery_pincode_id == null || this.delivery_pincode_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "http://localhost/project/ygonlinebuy/api/v1/delete_record/delivery_pincode/delivery_pincode_id=" + this.delivery_pincode_id
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
