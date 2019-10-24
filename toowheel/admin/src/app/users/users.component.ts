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
  sortdata: string = '';
  searchTerm: string = '';
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

  openUsersForm(): void  {
    const dialogRef = this.dialog.open(UsersForm, {
        minWidth: "80%",
        maxWidth: "80%"
    });

    dialogRef.afterClosed().subscribe(result => {
     if(result !== false && result !== 'false') {
      this.getUsers();
       }
    });
}

    openView(): void  {
        const dialogRef = this.dialog.open(UsersViewFrom, {
            minWidth: "40%",
            maxWidth: "40%"
    });

       dialogRef.afterClosed().subscribe(result => {
        console.log(`Dialog result: ${result}`);
      });
    }
    sortRecords(): void {
    switch(this.sortdata) {
        case 'title_a_z':
            (this.result).sort((a,b) => a.title.localeCompare(b.title));
        break;
        case 'title_z_a':
        (this.result).sort((a,b) => b.title.localeCompare(a.title));
        break;
        case 'created_a_z':
            (this.result).sort((a,b) => a.news_date.localeCompare(b.news_date));
        break;
        case 'created_z_a':
            (this.result).sort((a,b) => b.news_date.localeCompare(a.news_date));
        break;
        default:
        break;
        }
    }

}

@Component({
  selector: 'users-form',
  templateUrl: 'users-form.html',
})
export class UsersForm {
    usersForm: FormGroup;
    loading = false;
    users_id = 0;
    file_name: string = 'Choose Profile Picture';
    media_path: string;
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
            if(this.media_path && this.media_path != '') {
            formData.append('file_name', this.media_path);
            }
            formData.append('email', this.usersForm.value.email);
            formData.append('role', this.usersForm.value.role);
            formData.append('password', this.usersForm.value.password);
            formData.append('contact', this.usersForm.value.contact);
        url = 'update_record/users/users_id = '+this.users_id;
      } else {
            formData.append('name', this.usersForm.value.name);
            formData.append('file_name', this.media_path);
            formData.append('email', this.usersForm.value.email);
            formData.append('role', this.usersForm.value.role);
            formData.append('password', this.usersForm.value.password);
            formData.append('contact', this.usersForm.value.contact);
        url = 'insert_users';
      }
      this.loading = true;
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


  @Component({
  selector: 'user-view-form',
  templateUrl: 'user-view-form.html',
})
 
export class UsersViewFrom {
    constructor(
    public dialogRef: MatDialogRef<UsersViewFrom>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
    
    onNoClick(): void {
        this.dialogRef.close();
    }
}  