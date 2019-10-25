import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
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
  private router: Router, private httpClient: HttpClient
  ) { }

  ngOnInit() {
      this.loginForm = new FormGroup({
      'username': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required)
    });
  }
    onSubmit(): void {
var formData = new FormData();
formData.append('email', this.loginForm.value.username);
formData.append('password', this.loginForm.value.password);
    this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/loginadmin', formData)
    .subscribe(
            (res)=>{
                 if(res["result"]["error"] === false) {
                     (res["result"]["data"]).forEach((val, key)=> {
                         sessionStorage.setItem("toowheel_"+key, val);
         });
                      this.router.navigateByUrl('/dashboard');
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
          }
        );
    }

}
