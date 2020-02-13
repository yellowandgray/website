import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-staff',
  templateUrl: './staff.component.html',
  styleUrls: ['./staff.component.css']
})
export class StaffComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getStaff();
  }
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  getStaff(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_staff')
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
        if (parseInt(val.electromech_staff_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(StaffForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getStaff();
      }
    });
  }

  
  imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(StaffImageView, {
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

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(StaffDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getStaff();
      }
    });
  }

}


@Component({
  selector: 'staff-form',
  templateUrl: 'staff-form.html',
})
export class StaffForm {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  staffForm: FormGroup;
  loading = false;
  electromech_staff_id = 0;
  staff_image: string = 'Select Staff Profile';
  imageurl: string = '';
  constructor(
    public dialogRef: MatDialogRef<StaffForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.staffForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      'mobile': new FormControl(''),
      'username': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required),
      'role': new FormControl('', Validators.required)
    });
    if (this.data != null) {
      this.staffForm.patchValue({
        name: this.data.name,
        mobile: this.data.mobile,
        username: this.data.username,
        password: this.data.password,
        role: this.data.role,
      });
      this.electromech_staff_id = this.data.electromech_staff_id;
      this.imageurl = this.data.imageurl;
    }
  }

  onSubmit() {
    if (this.staffForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.electromech_staff_id != 0) {
      formData.append('name', this.staffForm.value.name);
      formData.append('mobile', this.staffForm.value.mobile);
      formData.append('username', this.staffForm.value.username);
      formData.append('password', this.staffForm.value.password);
      formData.append('role', this.staffForm.value.role);
      formData.append('imageurl', this.imageurl);
      url = 'update_record/electromech_staff/electromech_staff_id = ' + this.electromech_staff_id;
     
    } else {
      formData.append('name', this.staffForm.value.name);
      formData.append('mobile', this.staffForm.value.mobile);
      formData.append('username', this.staffForm.value.username);
      formData.append('password', this.staffForm.value.password);
      formData.append('role', this.staffForm.value.role);
      formData.append('staff_image', this.imageurl);
      url = 'insert_staff';
 
    }
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/' + url, formData).subscribe(
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
      this.staff_image = 'Select Staff Profile';
    }
  }

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/upload_file', formData).subscribe(
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
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class StaffImageView {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  action: string = '';
  loading = false;
  id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<StaffImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.id = this.datapopup.data;
      }
    }
  }
}


@Component({
  selector: 'staff-delete-confirmation',
  templateUrl: 'staff-delete-confirmation.html',
})
export class StaffDelete {
  loading = false;
  electromech_staff_id = 0;
  constructor(
    public dialogRef: MatDialogRef<StaffDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.electromech_staff_id = this.data;
    }
  }

  confirmDelete() {
    if (this.electromech_staff_id == null || this.electromech_staff_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/delete_record/electromech_staff/electromech_staff_id=' + this.electromech_staff_id).subscribe(
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
