import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import * as moment from 'moment';

@Component({
  selector: 'app-coupon',
  templateUrl: './coupon.component.html',
  styleUrls: ['./coupon.component.css']
})
export class CouponComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getCoupon();
  }
  getCoupon(): void {
    this.httpClient.get<any>('../api/v1/get_coupon')
      .subscribe(
        (res) => {
          this.result = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }

  openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.coupon_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(CouponForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getCoupon();
      }
    });
  }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
        const dialogRef = this.dialog.open(CouponDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
                this.getCoupon();
           }
        });
    }
}


@Component({
  selector: 'coupon-form',
  templateUrl: 'coupon-form.html',
})
export class CouponForm {
  couponForm: FormGroup;
  loading = false;
  coupon_id = 0;
  constructor(
    public dialogRef: MatDialogRef<CouponForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.couponForm = new FormGroup({
      'coupon_name': new FormControl('', Validators.required),
      'reduce_amt': new FormControl('', Validators.required),
      // 'start_date': new FormControl('', Validators.required),
      // 'end_date': new FormControl('', Validators.required),
      'status': new FormControl('', Validators.required),
    });
    if (this.data != null) {
      this.couponForm.patchValue({
        coupon_name: this.data.coupon_name,
        reduce_amt: this.data.reduce_amt,
        // start_date: this.data.start_date,
        // end_date: this.data.end_date,
        status: this.data.status,
      });
      this.coupon_id = this.data.coupon_id;
    }
  }

  onSubmit() {
    if (this.couponForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.coupon_id != 0) {
      formData.append('coupon_name', this.couponForm.value.coupon_name);
      formData.append('reduce_amt', this.couponForm.value.reduce_amt);
      // formData.append('start_date', moment(this.couponForm.value.start_date).format('YYYY-MM-DD'));
      // formData.append('end_date', moment(this.couponForm.value.end_date).format('YYYY-MM-DD'));
      formData.append('status', this.couponForm.value.status);
      url = 'update_record/coupon/coupon_id = ' + this.coupon_id;
    } else {
      formData.append('coupon_name', this.couponForm.value.coupon_name);
      formData.append('reduce_amt', this.couponForm.value.reduce_amt);
      // formData.append('start_date', moment(this.couponForm.value.start_date).format('YYYY-MM-DD'));
      // formData.append('end_date', moment(this.couponForm.value.end_date).format('YYYY-MM-DD'));
      formData.append('status', this.couponForm.value.status);
      url = 'insert_coupon';
    }
    this.httpClient.post('../api/v1/' + url, formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }
}


@Component({
  selector: 'coupon-delete-confirmation',
  templateUrl: 'coupon-delete-confirmation.html',
})
export class CouponDelete {
  loading = false;
  coupon_id = 0;
  constructor(
    public dialogRef: MatDialogRef<CouponDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.coupon_id = this.data;
    }
  }

  confirmDelete() {
    if (this.coupon_id == null || this.coupon_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('../api/v1/delete_record/coupon/coupon_id=' + this.coupon_id).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }
}
