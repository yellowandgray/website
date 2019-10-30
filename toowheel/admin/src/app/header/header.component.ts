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
  constructor(private router:Router,public dialog: MatDialog) { }
  ngOnInit() {
  }

        logout() {
           this.router.navigateByUrl('/');
         }

    openPasswordDialog(id, res): void  {
        const dialogRef = this.dialog.open(UserPasswordChange, {
            minWidth: "30%",
            maxWidth: "30%"
        });
        dialogRef.afterClosed().subscribe(result => {
        });
    }
}

@Component({
  selector: 'member-password',
  templateUrl: 'member-password.html',
})
export class UserPasswordChange {
    userForm: FormGroup;
    loading = false;
    constructor(
    public dialogRef: MatDialogRef<UserPasswordChange>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.userForm = new FormGroup({
        'old_password': new FormControl('', Validators.required),
        'new_password': new FormControl('', [Validators.required, Validators.email]),
        're_new_password': new FormControl('', Validators.required)
    });
    }
    onSubmit() {
        if (this.userForm.invalid) {
            return;
        } 
        if (this.userForm.value.new_password != this.userForm.value.re_new_password) {
            this._snackBar.open('Retype new password mismatch', '', {
              duration: 2000,
            });
            return;
        } 
        this.loading = true;
        var formData = new FormData();
            formData.append('old_password', this.userForm.value.name);
            formData.append('new_password', this.media_path);
            formData.append('user', sessionStorage.getItem("toowheel_users_id"));
      this.loading = true;
      this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/change_password_user', formData).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.dialogRef.close(true);
                }
            this._snackBar.open(res["result"]["message"], '', {
              duration: 2000,
            });
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

