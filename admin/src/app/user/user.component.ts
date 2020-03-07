import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators, RequiredValidator } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  searchTerm: string = '';
  student = [];
  student_count = 0;
  sortdata: string = "login_at";
  image_url: string = 'http://localhost/project/feringo/api/v1/';

  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getuser();
  }
  getuser(): void {
    this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_student/'+this.sortdata)
      .subscribe(
        (res) => {
          this.student = res["result"]["data"];
          this.student_count = res["result"]["total"];
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
        if (parseInt(val.student_register_id) === parseInt(id)) {
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
        this.getuser();
      }
    });
  }

  confirmDialog(id, action): void {
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

  openBlock(): void {
    const dialogRef = this.dialog.open(BlockForm, {
      minWidth: "40%",
      maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {

      }
    });
  }
  openResult(sid, name): void {
      this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_student_result/'+sid)
      .subscribe(
        (res) => {
            if(res["result"]["error"] == false) {
          const dialogRef = this.dialog.open(ResultForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: {
        data: res["result"]["data"],
        student_name: name
      }
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        console.log('Result closed');
      }
    });
            }else {
             this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });   
            }
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
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
        this.getuser();
      }
    });
  }

  openView(id, res): void {
    var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.student_register_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(UserViewForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
            }
        });
    }
    sortRecords(arr, sort): void {
        switch(sort) {
            case 'created_a_z':
                (this[arr]).sort((a,b) => a.created_at.localeCompare(b.updated_at));
            break;
            case 'created_z_a':
                (this[arr]).sort((a,b) => b.created_at.localeCompare(a.created_at));
            break;
            default:
            break;
        }
    }
}

@Component({
  selector: 'user-form',
  templateUrl: 'user-form.html',
})
export class UserForm {
  image_url: string = 'http://localhost/project/feringo/api/v1/';
  userForm: FormGroup;
  loading = false;
  student_register_id = 0;
  profile_picture: string = 'Profile Image';
  profile_image: string = '';
  constructor(
    public dialogRef: MatDialogRef<UserForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.userForm = new FormGroup({
      'user_name': new FormControl('', Validators.required),
      'student_name': new FormControl('', Validators.required),
      'gender': new FormControl('', Validators.required),
      'parent_name': new FormControl('', Validators.required),
      'mobile': new FormControl('', Validators.required),
      'city': new FormControl('', Validators.required),
      'pin': new FormControl('', Validators.required),
      'school_name': new FormControl('', Validators.required),
      'standard': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required),
      'confirm_password': new FormControl('', Validators.required),
      'email': new FormControl('')
    });
    if (this.data != null) {
      this.userForm.patchValue({
        user_name: this.data.user_name,
        student_name: this.data.student_name,
        gender: this.data.gender,
        parent_name: this.data.parent_name,
        mobile: this.data.mobile,
        city: this.data.city,
        pin: this.data.pin,
        school_name: this.data.school_name,
        standard: this.data.standard,
        password: this.data.password,
        confirm_password: this.data.confirm_password,
        email: this.data.email,
      });
      this.student_register_id = this.data.student_register_id;
      this.profile_image = this.data.profile_image;
    }
  }

  onSubmit() {
    if (this.userForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.student_register_id != 0) {
      formData.append('user_name', this.userForm.value.user_name);
      formData.append('student_name', this.userForm.value.student_name);
      formData.append('parent_name', this.userForm.value.parent_name);
      formData.append('gender', this.userForm.value.gender);
      formData.append('profile_image', this.profile_image);
      formData.append('mobile', this.userForm.value.mobile);
      formData.append('city', this.userForm.value.city);
      formData.append('pin', this.userForm.value.pin);
      formData.append('school_name', this.userForm.value.school_name);
      formData.append('standard', this.userForm.value.standard);
      formData.append('password', this.userForm.value.password);
      formData.append('confirm_password', this.userForm.value.confirm_password);
      formData.append('email', this.userForm.value.email);
      url = 'update_record/student_register/student_register_id = ' + this.student_register_id;
    } else {
      formData.append('user_name', this.userForm.value.user_name);
      formData.append('student_name', this.userForm.value.student_name);
      formData.append('gender', this.userForm.value.gender);
      formData.append('profile_picture', this.profile_image);
      formData.append('parent_name', this.userForm.value.parent_name);
      formData.append('mobile', this.userForm.value.mobile);
      formData.append('city', this.userForm.value.city);
      formData.append('pin', this.userForm.value.pin);
      formData.append('school_name', this.userForm.value.school_name);
      formData.append('standard', this.userForm.value.standard);
      formData.append('password', this.userForm.value.password);
      formData.append('confirm_password', this.userForm.value.confirm_password);
      formData.append('email', this.userForm.value.email);
      url = 'insert_student';
    }
    this.httpClient.post('http://localhost/project/feringo/api/v1/' + url, formData).subscribe(
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

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('http://localhost/project/feringo/api/v1/upload_file', formData).subscribe(
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

  removeMedia(url) {
    this[url] = '';
    if (url === 'profile_image') {
      this.profile_picture = 'Profile Image';
    }
  }
}


@Component({
  selector: 'user-delete-confirmation',
  templateUrl: 'user-delete-confirmation.html',
})
export class UserDelete {
  loading = false;
  student_register_id = 0;
  constructor(
    public dialogRef: MatDialogRef<UserDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.student_register_id = this.data;
    }
  }

  confirmDelete() {
    if (this.student_register_id == null || this.student_register_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://localhost/project/feringo/api/v1/delete_record/student_register/student_register_id=' + this.student_register_id).subscribe(
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
  selector: 'user-block-reason',
  templateUrl: 'user-block-reason.html',
})
export class BlockForm {
  blockForm: FormGroup;
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<BlockForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) { }
}


@Component({
  selector: 'user-result-form',
  templateUrl: 'user-result-form.html',
})
export class ResultForm {
  resultForm: FormGroup;
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<ResultForm>, public dialog: MatDialog,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) { 
        console.log(data);
    }
    openFullResult(): void {
      this.dialogRef.close();
    const dialogRef = this.dialog.open(UserFullResultForm, {
      minWidth: "40%",
      maxWidth: "40%"
    });
    dialogRef.afterClosed().subscribe(result => {
      
    });
  }
}

@Component({
  selector: 'user-full-result-view',
  templateUrl: 'user-full-result-view.html',
})

export class UserFullResultForm {
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<UserFullResultForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
}

@Component({
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class PictureViewUser {
  image_url: string = 'http://localhost/project/feringo/api/v1/';
  action: string = '';
  loading = false;
  student_register_id = 0;
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
        this.student_register_id = this.datapopup.data;
      }
    }
  }
}

@Component({
  selector: 'user-view',
  templateUrl: 'user-view.html',
})

export class UserViewForm {
  image_url: string = 'http://localhost/project/feringo/api/v1/';
  loading = false;
  student = [];
  student_register_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<UserViewForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) { 
        this.data = this.datapopup;
    }
}
