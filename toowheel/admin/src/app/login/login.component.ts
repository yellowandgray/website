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
    result = [];
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
    onSubmit() {
        if (this.loginForm.invalid) {
            return;
        }
       this.getUsers();      
       /* if(this.loginForm.value.username === 'toowheel' && this.loginForm.value.password === 'T00wh33!admin') {
       this.router.navigateByUrl('/dashboard');
        } else {
            this._snackBar.open('Invalid login details', '', {
      duration: 2000,
    });
        }*/
    }
     image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    getUsers(): void {
    this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/loginadmin')
    .subscribe(
            (res)=>{
                this.result = res["result"]["data"];
                console.log(this.result)
                   /* if(this.loginForm.value.username === this.result.email && this.loginForm.value.password === this.result.password) {
                         
                         this.router.navigateByUrl('/dashboard');
                         
                    } else {
                        this._snackBar.open('Invalid login details', '', {
                  duration: 2000,
                });
                    }*/
          },
          (error)=>{
              this._snackBar.open(error["statusText"], '', {
        duration: 2000,
      });
          }
        );
    }

}
