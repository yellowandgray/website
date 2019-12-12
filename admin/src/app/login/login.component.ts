import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';;
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
  constructor(private _snackBar: MatSnackBar, private router: Router) {}

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
        if(this.loginForm.value.username === 'guardian' && this.loginForm.value.password === 'Gu@Fres') {
     this.router.navigateByUrl('/banner');
        } else {
            this._snackBar.open('Invalid login details', '', {
      duration: 2000,
    });
        }
    }
}
