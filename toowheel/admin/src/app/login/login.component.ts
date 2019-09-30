import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';

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
  private router: Router
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
        if(this.loginForm.value.username === 'toowheel' && this.loginForm.value.password === 'T00wh33!admin') {
     this.router.navigateByUrl('/dashboard');
        } else {
            this._snackBar.open('Invalid login details', '', {
      duration: 2000,
    });
        }
    }

}
