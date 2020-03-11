import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getUser();
  }
  image_url: string = 'http://www.lemonandshadow.com/threelevel/api/v1/';
  getUser(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/threelevel/api/v1/get_user')
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
        if (parseInt(val.user_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(UserForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getUser();
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(UserDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getUser();
      }
    });
  }

    imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(UserImageView, {
      minWidth: "40%",
      maxWidth: "40%",
      data: {
        data: data,
        action: action
      }
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
      }
    });
  }

}


@Component({
  selector: 'user-form',
  templateUrl: 'user-form.html',
})
export class UserForm {
  image_url: string = 'http://www.lemonandshadow.com/threelevel/api/v1/';
  userform: FormGroup;
  loading = false;
  user_id = 0;
  user_image: string = 'Select User Image';
  imageurl: string = '';
  constructor(
    public dialogRef: MatDialogRef<UserForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.userform = new FormGroup({
      'name': new FormControl('', Validators.required),
      'phone_no': new FormControl('', Validators.required),
      'address': new FormControl('', Validators.required),
      'pincode': new FormControl('', Validators.required),
    })
    if (this.data != null) {
      this.userform.patchValue({
        name: this.data.name,
        phone_no: this.data.phone_no,
        address: this.data.address,
        pincode: this.data.pincode,
      });
      this.user_id = this.data.user_id;
      this.imageurl = this.data.imageurl;
    }
  }


  onSubmit() {
    if (this.userform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.user_id != 0) {
      formData.append('name', this.userform.value.name);
      formData.append('phone_no', this.userform.value.phone_no);
      formData.append('address', this.userform.value.address);
      formData.append('pincode', this.userform.value.pincode);
      formData.append('imageurl', this.imageurl);
      url = 'update_record/user/user_id = ' + this.user_id;
    } else {
      formData.append('name', this.userform.value.name);
      formData.append('phone_no', this.userform.value.phone_no);
      formData.append('address', this.userform.value.address);
      formData.append('pincode', this.userform.value.pincode);
      formData.append('user_image', this.imageurl);
      url = 'insert_user';
    }
    this.httpClient.post('http://www.lemonandshadow.com/threelevel/api/v1/' + url, formData).subscribe(
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

  removeMedia(url) {
    this[url] = '';
    if (url === 'imageurl') {
      this.user_image = 'Select User Image';
    }
  }

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('http://www.lemonandshadow.com/threelevel/api/v1/upload_file', formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this[path] = res["result"]["data"];
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
      });
  }
}

@Component({
  selector: 'user-delete-confirmation',
  templateUrl: 'user-delete-confirmation.html',
})
export class UserDelete {
  loading = false;
  user_id = 0;
  constructor(
    public dialogRef: MatDialogRef<UserDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.user_id = this.data;
    }
  }

  confirmDelete() {
    if (this.user_id == null || this.user_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/threelevel/api/v1/delete_record/user/user_id=' + this.user_id).subscribe(
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
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class UserImageView {
  image_url: string = 'http://www.lemonandshadow.com/threelevel/api/v1/';
  action: string = '';
  loading = false;
  user_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<UserImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.user_id = this.datapopup.data;
      }
    }
  }
}