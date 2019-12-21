import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';

@Component({
  selector: 'app-question',
  templateUrl: './question.component.html',
  styleUrls: ['./question.component.css']
})
export class QuestionComponent implements OnInit {

    suject = [];
    topic = [];

    constructor(private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
        this.getsubject();
        this.gettopic();
    }
    getsubject(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_subject')
        .subscribe(
                (res)=>{
                    this.suject = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }
    gettopic(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_topic')
        .subscribe(
                (res)=>{
                    this.topic = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }

}
