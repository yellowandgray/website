import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import { Observable } from 'rxjs';
import * as moment from 'moment';

@Component({
  selector: 'app-member',
  templateUrl: './member.component.html',
  styleUrls: ['./member.component.css']
})
export class MemberComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getMember();
  }
  getMember(): void {
    this.httpClient.get<any>('http://localhost/microview/fresche/api/v1/get_member')
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
        if (parseInt(val.member_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(MemberForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getMember();
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(MemberDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getMember();
      }
    });
  }
}


@Component({
  selector: 'member-form',
  templateUrl: 'member-form.html',
})
export class MemberForm {
  memberForm: FormGroup;
  loading = false;
  member_id = 0;
  states: any[];
  constructor(
    public dialogRef: MatDialogRef<MemberForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.memberForm = new FormGroup({
      'fname': new FormControl('', Validators.required),
      'lname': new FormControl('', Validators.required),
      'email': new FormControl('', Validators.required),
      'mobile': new FormControl('', Validators.required),
      'address': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required),
      'confirm_password': new FormControl('', Validators.required),
      'city': new FormControl('', Validators.required),
      'state': new FormControl('', Validators.required),
      'pincode': new FormControl('', Validators.required),
    });

    if (this.data != null) {
      this.memberForm.patchValue({
        fname: this.data.fname,
        lname: this.data.lname,
        email: this.data.email,
        password: this.data.password,
        confirm_password: this.data.confirm_password,
        mobile: this.data.mobile,
        address: this.data.address,
        state: this.data.state_id,
        city: this.data.city,
        pincode: this.data.pincode,
      });
      this.member_id = this.data.member_id;
    }

    this.httpClient.get('https://localhost/project/freschehttp://localhost/microview/fresche/api/v1/get_state').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.states = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });

  }
  onSubmit() {
    if (this.memberForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.member_id != 0) {
      formData.append('fname', this.memberForm.value.fname);
      formData.append('lname', this.memberForm.value.lname);
      formData.append('email', this.memberForm.value.email);
      formData.append('password', this.memberForm.value.password);
      formData.append('confirm_password', this.memberForm.value.confirm_password);
      formData.append('mobile', this.memberForm.value.mobile);
      formData.append('membership_id', this.memberForm.value.member_list_id);
      formData.append('address', this.memberForm.value.address);
      formData.append('state_id', this.memberForm.value.state);
      formData.append('city', this.memberForm.value.city);
      formData.append('pincode', this.memberForm.value.pincode);
      url = 'update_record/member/member_id = ' + this.member_id;
    } else {
      formData.append('fname', this.memberForm.value.fname);
      formData.append('lname', this.memberForm.value.lname);
      formData.append('email', this.memberForm.value.email);
      formData.append('password', this.memberForm.value.password);
      formData.append('confirm_password', this.memberForm.value.confirm_password);
      formData.append('mobile', this.memberForm.value.mobile);
      formData.append('address', this.memberForm.value.address);
      formData.append('state_id', this.memberForm.value.state);
      formData.append('city', this.memberForm.value.city);
      formData.append('pincode', this.memberForm.value.pincode);
      url = 'insert_member';
    }
    this.httpClient.post('http://localhost/microview/fresche/api/v1/' + url, formData).subscribe(
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
  selector: 'member-delete-confirmation',
  templateUrl: 'member-delete-confirmation.html',
})
export class MemberDelete {
  loading = false;
  member_id = 0;
  constructor(
    public dialogRef: MatDialogRef<MemberDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.member_id = this.data;
    }
  }

  confirmDelete() {
    if (this.member_id == null || this.member_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://localhost/microview/fresche/api/v1/delete_record/member/member_id=' + this.member_id).subscribe(
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