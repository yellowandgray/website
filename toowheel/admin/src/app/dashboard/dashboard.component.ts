import { Component, OnInit } from '@angular/core';
import { GoogleChartInterface } from 'ng2-google-charts/google-charts-interfaces';

@Component({
selector: 'app-dashboard',
templateUrl: './dashboard.component.html',
styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent  {

public pieChart: GoogleChartInterface = {
    chartType: 'PieChart',
    dataTable: [
      ['Parameters', 'Hours per Day'],
      ['Club',     11],
      ['Member',      2],
      ['News',  2],
      ['Event', 2],
      ['Advertisment',    7]
    ],
   options: {'title': 'Parameters',
 pieHole: 0.4,},
  };
}
