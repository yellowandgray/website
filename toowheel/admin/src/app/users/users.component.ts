import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.css']
})
export class UsersComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getUsers();
  }
  
    image_url: string = 'https://www.toowheel.com/toowheel/api/v1/';
       getUsers(): void {
     this.httpClient.get<any>('https://www.toowheel.com/toowheel/api/v1/get_users')
     .subscribe(
             (res)=>{
                 this.result = res["result"]["data"];
           },
           (error)=>{
               this._snackBar.open(error["statusText"], '', {
         duration: 2000,
       });
           }
           );
     }

  openUsersForm(id, res): void  {
    var data = null;
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.users_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(UsersForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getUsers();
       }
    });
}

}

@Component({
  selector: 'users-form',
  templateUrl: 'users-form.html',
})
export class UsersForm {
    usersForm: FormGroup;
    loading = false;
    medias:any[];
    users_id = 0;
    file_name: string = 'Choose Profile Picture';
    constructor(
    public dialogRef: MatDialogRef<UsersForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.usersForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      'email': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required),
      'contact': new FormControl('', Validators.required),
      'role': new FormControl('', Validators.required)
      });
      if(this.data != null) {
           this.usersForm.patchValue({
           name: this.data.name,
           email: this.data.email,
           password: this.data.password,
           contact: this.data.contact,
           role: this.data.role
        });
        this.users_id = this.data.users_id;
    }else {
        this.usersForm.patchValue({
                date: new Date()
            });
    }
    this.httpClient.get('https://www.toowheel.com/toowheel/api/v1/get_users').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.medias = res["result"]["data"];
                }else{
    this._snackBar.open(res["result"]["message"], '', {
          duration: 2000,
        });
                }
            },
            (error)=>{
                this._snackBar.open(error["statusText"], '', {
          duration: 2000,
            });
        });
}

    fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this[field] = res["result"]["data"];
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
            });
    }


    onSubmit() {
        if (this.usersForm.invalid) {
            return;
        } 
        this.loading = true;
        var formData = new FormData();
        var url = '';
    if(this.users_id != 0) {
            formData.append('name', this.usersForm.value.name);
            formData.append('email', this.usersForm.value.email);
            formData.append('role', this.usersForm.value.role);
            formData.append('password', this.usersForm.value.password);
            formData.append('contact', this.usersForm.value.contact);
        url = 'update_record/users/users_id = '+this.users_id;
      } else {
            formData.append('name', this.usersForm.value.name);
            formData.append('email', this.usersForm.value.email);
            formData.append('role', this.usersForm.value.role);
            formData.append('password', this.usersForm.value.password);
            formData.append('contact', this.usersForm.value.contact);
        url = 'insert_users';
      }
      this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/'+url, formData).subscribe(
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