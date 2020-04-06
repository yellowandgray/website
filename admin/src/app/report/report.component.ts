import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import {MatDatepickerModule} from '@angular/material/datepicker';
import * as moment from 'moment';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-report',
  templateUrl: './report.component.html',
  styleUrls: ['./report.component.css']
})
export class ReportComponent implements OnInit {
  schedule = [];
  train = [];
  report=[];
  
  electromech_train_id="0";
  electromech_schedule_id="0";
  date_check="0";
  
  constructor(private httpClient: HttpClient, private _snackBar: MatSnackBar,private datePipe : DatePipe) { }

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


changeFunc(event: any) {
    const data = event;
    const formattedDate =data.getFullYear()+ '-' + (data.getMonth() + 1) + '-' +data.getDate() ;
    console.log("hai-->"+formattedDate);
    this.date_check= this.datePipe.transform(data, 'yyyy-MM-dd');
    console.log("hai1111-->" +this.date_check);

}

changeTrain(value) {
    console.log(value);
    this.electromech_train_id=value
}

onSubmit(sid): void {

this.electromech_schedule_id=sid
console.log("hello-->"+sid+"Trainid-->"+this.electromech_train_id+"date-->"+this.date_check);

if (this.electromech_schedule_id==0 || this.electromech_train_id==0 || this.date_check==0 ) {

     this.loading = false;
        this._snackBar.open("Please Select Train And Date", '', {
          duration: 2000,
        });
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    
      formData.append('electromech_train_id', this.electromech_train_id);
      formData.append('electromech_schedule_id', this.electromech_schedule_id);
      formData.append('date_check', this.date_check);
      url = 'reports_for_inspect_bydate';
    
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/' + url, formData).subscribe(
      (res) => {
        this.loading = false;
        this.report=res["result"]["data"]; 
        console.log(this.report);   
        
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
