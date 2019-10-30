import { Component, OnInit,Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
     searchTerm: string = '';
  searchTermFW: string = '';
  sortdata: string = '';
  sortdata_fw: string = '';
  result = [];
  constructor(private router:Router,public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getUsers();
  }
  
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    getUsers(): void {
    this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_users')
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

        logout() {
           this.router.navigateByUrl('/');
         }

    openPasswordDialog(id, res): void  {
          var data = null;
          if(id != 0) { 
          this[res].forEach(val=> {
               if(parseInt(val.member_id) === parseInt(id)) {
                    data = val;
                    return false;
               }
             });
          }
        const dialogRef = this.dialog.open(UserPasswordChange, {
            minWidth: "30%",
            maxWidth: "30%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
               
           }
        });
    }

}

@Component({
  selector: 'member-password',
  templateUrl: 'member-password.html',
})
export class UserPasswordChange {
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    usersForm: FormGroup;
    loading = false;
    users_id = 0;
    file_name: string = 'Choose Profile Picture';
    media_path: string='';
    password:string='';
    constructor(
    public dialogRef: MatDialogRef<UserPasswordChange>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.usersForm = new FormGroup({
        'name': new FormControl('', Validators.required),
        'email': new FormControl('', [Validators.required, Validators.email]),
        'gender': new FormControl('', Validators.required),
        'contact': new FormControl(''),
        'role': new FormControl('', Validators.required)
    });
        if(this.data != null) { 
            this.usersForm.patchValue({ 
                name: this.data.name,
                email: this.data.email,
                gender: this.data.gender,
                contact: this.data.contact,
                role: this.data.role,
                password:this.data.password,
        })
        this.users_id = this.data.users_id;
        this.media_path=this.data.media_path;
    }
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
            formData.append('media_path', this.media_path);
            formData.append('email', this.usersForm.value.email);
            formData.append('role', this.usersForm.value.role);
            formData.append('gender', this.usersForm.value.gender);
            formData.append('contact', this.usersForm.value.contact);
        url = 'update_record/users/users_id = '+this.users_id;
      } else {
            formData.append('name', this.usersForm.value.name);
            formData.append('file_name', this.media_path);
            formData.append('email', this.usersForm.value.email);
            formData.append('role', this.usersForm.value.role);
            formData.append('gender', this.usersForm.value.gender);
            formData.append('contact', this.usersForm.value.contact);
        url = 'insert_users';
      }
      this.loading = true;
      this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/'+url, formData).subscribe(
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

