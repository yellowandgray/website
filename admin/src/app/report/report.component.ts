import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import * as moment from 'moment';

@Component({
  selector: 'app-report',
  templateUrl: './report.component.html',
  styleUrls: ['./report.component.css']
})
export class ReportComponent implements OnInit {
  schedule = [];
  train = [];
  constructor(private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getSchedule();
    this.getTrain();
  }
  getSchedule(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_schedule')
      .subscribe(
        (res) => {
          this.schedule = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  getTrain(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_train')
      .subscribe(
        (res) => {
          this.train = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  getCommand(): void {
      
  }
}
