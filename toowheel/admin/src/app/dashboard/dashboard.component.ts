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
      ['Registered Member',     11],
      ['Registered Club',      2],
      ['Pending Members for Approval',  2],
      ['Number of Membership that will Expire', 2],
      ['Number of Pending T Shirt Delivery',    7],
      ['Website Earnings',    7],
      ['Website Traffic',    7],
      ['Top 10 Clubs',    7]
    ],
   options: {'title': 'Toowheel',
 pieHole: 0.4,},
  };
  
  public columnChart: GoogleChartInterface = { 
      chartType: 'ColumnChart',
      dataTable: [
        ['Country', 'Performance', 'Profits'],
        ['Registered Member',     200, 900],
      ['Registered Club', 100, 500 ],
      ['Pending Members for Approval',  150, 400],
      ['Number of Membership that will Expire', 600, 300],
      ['Number of Pending T Shirt Delivery',  500, 800],
      ['Website Earnings',   200, 600],
      ['Website Traffic',    600, 900],
      ['Top 10 Clubs',    1000, 700]
      ],
      options: {title: 'Toowheel',
                       }
  };

  myfunction() {
    let ccComponent = this.columnChart.component;
    let ccWrapper = ccComponent.wrapper;

   
    ccComponent.draw();
  }

}
