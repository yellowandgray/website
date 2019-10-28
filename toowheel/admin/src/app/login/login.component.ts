import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
    loginForm: FormGroup;
    loading = false;
  constructor(
  private _snackBar: MatSnackBar,
  private router: Router, private httpClient: HttpClient,
  public dialog: MatDialog
  ) { }

  ngOnInit() {
      this.loginForm = new FormGroup({
      'username': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required)
    });
  }
    onSubmit(): void {
        if (this.loginForm.invalid) {
            return;
        }
        this.loading = true;
var formData = new FormData();
formData.append('email', this.loginForm.value.username);
formData.append('password', this.loginForm.value.password);
    this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/loginadmin', formData)
    .subscribe(
            (res)=>{
                this.loading = false;
                 if(res["result"]["error"] === false) {
                     Object.keys(res["result"]["data"]).forEach(key=> {
                         sessionStorage.setItem("toowheel_"+key, res["result"]["data"][key]);
         });
         var role = sessionStorage.getItem("toowheel_role");
         if(role == 'Admin'){
                      this.router.navigateByUrl('/dashboard');
         }else{
this.router.navigateByUrl('/config');             
         }
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

forgotPassword(): void {
    const dialogRef = this.dialog.open(ForgotPasswordForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
        
    });
}
}

@Component({
  selector: 'login-forgotpassword',
  templateUrl: 'login-forgotpassword.html',
})
export class ForgotPasswordForm {
    forgotpasswordForm: FormGroup;
    loading = false;
    constructor(
    public dialogRef: MatDialogRef<ForgotPasswordForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.forgotpasswordForm = new FormGroup({
            'email': new FormControl('', [Validators.required, Validators.email])
        });
    }
    onSubmit() {
      if (this.forgotpasswordForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      formData.append('email', this.forgotpasswordForm.value.email);
      this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/forgotpassword_user', formData).subscribe(
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
