import { Component, OnInit } from '@angular/core';
import { ChartReadyEvent, ChartErrorEvent, ChartSelectEvent,
   ChartMouseOverEvent, ChartMouseOutEvent } from 'ng2-google-charts';
import { GoogleChartInterface } from 'ng2-google-charts/google-charts-interfaces';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
selector: 'app-dashboard',
templateUrl: './dashboard.component.html',
styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent  {
 

result = [];
result1 = [];
    result_four_wheel:any[];
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
  
    
ngOnInit() {
    //this.getEvent();
    //this.getNews();
  }
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
       getEvent(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_member')
     .subscribe(
             (res)=>{
                 this.result = res["result"]["data"];
           },
           (error)=>{
               this._snackBar.open(error["statusText"], '', {
         duration: 2000,
       });
           }
           );
     }
       getNews(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_news')
     .subscribe(
             (res)=>{
                 this.result1 = res["result"]["data"];
           },
           (error)=>{
               this._snackBar.open(error["statusText"], '', {
         duration: 2000,
       });
           }
           );
     }
       
public pieChart: GoogleChartInterface = {
    chartType: 'PieChart',
    dataTable: [
      ['Parameters', 'Hours per Day'],
     ['Male - Single',    200],
      ['Female - Single',    150],
      ['Male - Married',    280],
      ['Female - Married',    150],
    ],
   options: {'title': 'Members',
 pieHole: 0.3,},
  };
  

public columnChart: GoogleChartInterface = { 
      chartType: 'ColumnChart',
      dataTable: [
        ['Country', 'Performance', 'Profits'],
      ['Website Earnings',   200, 600],
      ['Website Traffic',    600, 900],
      ['Website Earnings',   500, 800],
      ['Website Traffic',    400, 600],
      ['Website Earnings',   200, 500],
      ['Website Traffic',    600, 800],
      ],
      options: {title: 'Toowheel',
                       }
  };

  myfunction() {
    let ccComponent = this.columnChart.component;
    let ccWrapper = ccComponent.wrapper;

   
    ccComponent.draw();
  }
 
public columnChartWTooltips: GoogleChartInterface =  {
    chartType: 'ColumnChart',
    dataTable: [
      ['Event', 'Club', {
        type: 'string',
        label: 'Tooltip Chart',
        role: 'tooltip',
        p: {html: true}
      }],
      ['2 Wheel',1000, ''],
      ['4 Wheel', 1500, ''],
      
    ],
    options: {
      title: 'Total Clubs',
      legend: 'none',
      tooltip: {isHtml: true} // This MUST be set to true for your chart to show.
    }
  };
}
