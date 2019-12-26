import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import {MatExpansionModule} from '@angular/material/expansion';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {

    student = [];

    constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

    ngOnInit() {
        this.getuser();
    }
    getuser(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_student')
        .subscribe(
                (res)=>{
                    this.student = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }

    openDialog(id, res): void {
        var data = null;
          if(id != 0) {
          this[res].forEach(val=> {
               if(parseInt(val.student_register_id) === parseInt(id)) {
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
          if(result !== false && result !== 'false') {
                this.getuser();
            }
        });
    }
    openBlock(id, res): void {
        const dialogRef = this.dialog.open(BlockForm, {
          minWidth: "40%",
          maxWidth: "40%"
        });

        dialogRef.afterClosed().subscribe(result => {
          
        });
    }
    openResult(id, res): void {
        const dialogRef = this.dialog.open(ResultForm, {
          minWidth: "40%",
          maxWidth: "40%"
        });

        dialogRef.afterClosed().subscribe(result => {
          
        });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(UserDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
          this.getuser();
       }
    });
    }
}


@Component({
  selector: 'user-form',
  templateUrl: 'user-form.html',
})
export class UserForm {
    userForm: FormGroup;
    loading = false;
    student_register_id = 0;
    constructor(
    public dialogRef: MatDialogRef<UserForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.userForm = new FormGroup ({
            'user_name': new FormControl('', Validators.required),
            'student_name': new FormControl('', Validators.required),
            'parent_name': new FormControl('', Validators.required),
            'mobile': new FormControl('', Validators.required),
            'city': new FormControl('', Validators.required),
            'pin': new FormControl('', Validators.required),
            'school_name': new FormControl('', Validators.required),
            'select_standard': new FormControl('', Validators.required),
            'password': new FormControl('', Validators.required),
            'confirm_password': new FormControl('', Validators.required),
            'email': new FormControl('', Validators.required)
        });
        if(this.data != null) {
           this.userForm.patchValue({
           user_name: this.data.user_name,
           student_name: this.data.student_name,
           parent_name: this.data.parent_name,
           mobile: this.data.mobile,
           city: this.data.city,
           pin: this.data.pin,
           school_name: this.data.school_name,
           standard: this.data.select_standard,
           password: this.data.password,
           confirm_password: this.data.confirm_password,
           email: this.data.email,
        });
            this.student_register_id = this.data.student_register_id;
        }
    }
    
    onSubmit() {
      if (this.userForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
        if(this.student_register_id != 0) {
        formData.append('user_name', this.userForm.value.user_name);
        formData.append('student_name', this.userForm.value.student_name);
        formData.append('parent_name', this.userForm.value.parent_name);
        formData.append('mobile', this.userForm.value.mobile);
        formData.append('city', this.userForm.value.city);
        formData.append('pin', this.userForm.value.pin);
        formData.append('school_name', this.userForm.value.school_name);
        formData.append('select_standard', this.userForm.value.standard);
        formData.append('password', this.userForm.value.password);
        formData.append('confirm_password', this.userForm.value.confirm_password);
        formData.append('email', this.userForm.value.email);
        url = 'update_record/student_register/student_register_id = '+this.student_register_id;
      } else {
        formData.append('user_name', this.userForm.value.user_name);
        formData.append('student_name', this.userForm.value.student_name);
        formData.append('parent_name', this.userForm.value.parent_name);
        formData.append('mobile', this.userForm.value.mobile);
        formData.append('city', this.userForm.value.city);
        formData.append('pin', this.userForm.value.pin);
        formData.append('school_name', this.userForm.value.school_name);
        formData.append('select_standard', this.userForm.value.standard);
        formData.append('password', this.userForm.value.password);
        formData.append('confirm_password', this.userForm.value.confirm_password);
        formData.append('email', this.userForm.value.email);
        url = 'insert_student';
      }
      this.httpClient.post('http://localhost/project/mekana/api/v1/'+url, formData).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.dialogRef.close(true);
                }else{
            this._snackBar.open(res["result"]["message"], '', {
              duration: 2000,
            });
            }
            },
            (error)=>{
                this.loading = false;
                this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
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
    if(this.data != null) { 
        this.student_register_id = this.data;
    }
}

  confirmDelete() {
      if (this.student_register_id == null || this.student_register_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/mekana/api/v1/delete_record/student_register/student_register_id='+this.student_register_id).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.dialogRef.close(true);
                }else{
            this._snackBar.open(res["result"]["message"], '', {
          duration: 2000,
        });
                }
            },
            (error)=>{
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
    private httpClient: HttpClient) {}
}


@Component({
  selector: 'user-result-form',
  templateUrl: 'user-result-form.html',
})
export class ResultForm {
    resultForm: FormGroup;
    loading = false;
    constructor(
    public dialogRef: MatDialogRef<ResultForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
}