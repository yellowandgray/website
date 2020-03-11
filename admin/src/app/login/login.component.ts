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
  constructor(private _snackBar: MatSnackBar, private router: Router, private httpClient: HttpClient) { }

  ngOnInit() {
    this.loginForm = new FormGroup({
      'user_name': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required)
    });
  }
  onSubmit(): void {
    if (this.loginForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    formData.append('user_name', this.loginForm.value.user_name);
    formData.append('password', this.loginForm.value.password);
    this.httpClient.post('http://lemonandshadow.com/threelevel/api/v1/loginadmin', formData)
      .subscribe(
        (res) => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this.router.navigateByUrl('/snacks');
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