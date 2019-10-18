import { Component, OnInit } from '@angular/core';
import { GoogleChartInterface } from 'ng2-google-charts/google-charts-interfaces';

@Component({
selector: 'app-dashboard',
templateUrl: './dashboard.component.html',
styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent  {




/* piechart & columnChart */   




public pieChart: GoogleChartInterface = {
    chartType: 'PieChart',
    dataTable: [
      ['Parameters', 'Hours per Day'],
     ['Website Earnings',    7],
      ['Website Traffic',    7],
      ['Top 10 Clubs',    7]
    ],
   options: {'title': 'Toowheel',
 pieHole: 0.2,},
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
 
  
    
/* fusioncharts */


dataSource: Object;
  constructor() {
    this.dataSource = {
      chart: {
        caption: "[2018- 2019]",
        subCaption: "",
        xAxisName: "Club",
        yAxisName: "Members",
        numberSuffix: "",
        theme: "fusion"
      },
     
      data: [
        {
          label: "Venezuela",
          value: "290"
        },
        {
          label: "Saudi",
          value: "260"
        },
        {
          label: "Canada",
          value: "180"
        },
        {
          label: "Iran",
          value: "140"
        },
        {
          label: "Russia",
          value: "115"
        },
        {
          label: "UAE",
          value: "100"
        },
        {
          label: "US",
          value: "30"
        },
        {
          label: "China",
          value: "30"
        }
      ]
    }; 
  }

  /*
  dataS: Object;
  constructor() {
    this.dataS = {
      chart: {
        caption: "Nordstrom's Customer Satisfaction Score for 2017",
        lowerLimit: "0",
        upperLimit: "100",
        showValue: "1",
        numberSuffix: "%",
        theme: "fusion",
        showToolTip: "0"
      },
     
      colorRange: {
        color: [
          {
            minValue: "0",
            maxValue: "50",
            code: "#F2726F"
          },
          {
            minValue: "50",
            maxValue: "75",
            code: "#FFC533"
          },
          {
            minValue: "75",
            maxValue: "100",
            code: "#62B58F"
          }
        ]
      },
      dials: {
        dial: [
          {
            value: "81"
          }
        ]
      }
    }; 
  } 
*/
}
