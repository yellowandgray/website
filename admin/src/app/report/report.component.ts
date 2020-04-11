import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
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
  reportwithchecklist:any=[]
 
  loading = false;
  date_1: Date = new Date();
  electromech_train_id="0";
  electromech_schedule_id="0";
  date_check="0";
  date_var="";
  weekNum;
   count=0;

filterName:string;

image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/uploads/';

  
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar,private datePipe : DatePipe) { }

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

getsid(): void {

  this.count=0;
  this.filterName = '';
  this.report=[];
  this.date_var=""
while(this.reportwithchecklist.length > 0) {
    this.reportwithchecklist.pop();
}
  

  //this.train = [];
  //this.getTrain();
  this.electromech_train_id="0";

  this.electromech_schedule_id="0";
  this.date_check="0";
}
  getCommand(): void {
       
  }
  /*openDialog(id, res): void {
    const dialogRef = this.dialog.open(ReportForm, {
      minWidth: "40%",
      maxWidth: "40%",
      //data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        //this.getCategory();
      }
    });
  }*/

changeFunc(event: any) {
    const data = event;
    const formattedDate =data.getFullYear()+ '-' + (data.getMonth() + 1) + '-' +data.getDate() ;
    console.log("hai-->"+formattedDate);
    this.date_check= this.datePipe.transform(data, 'yyyy-MM-dd');
    console.log("hai1111-->" +this.date_check);
    this.weekNum=this.getWeekInMonth(data.getFullYear(),(data.getMonth() + 1),data.getDate());


}

  getWeeksInMonth1(year, month_number) {
    var firstOfMonth = new Date(year, month_number - 1, 1);
    var day = firstOfMonth.getDay() || 6;
    day = day === 1 ? 0 : day;
    if (day) { day-- }
    var diff = 7 - day;
    var lastOfMonth = new Date(year, month_number, 0);
    var lastDate = lastOfMonth.getDate();
    if (lastOfMonth.getDay() === 1) {
        diff--;
    }
    var result = Math.ceil((lastDate - diff) / 7);
    return result + 1;
}

 getWeekInMonth(year, month, day){

    let weekNum = 1; // we start at week 1

    let weekDay = new Date(year, month - 1, 1).getDay(); // we get the weekDay of day 1
    weekDay = weekDay === 0 ? 6 : weekDay-1; // we recalculate the weekDay (Mon:0, Tue:1, Wed:2, Thu:3, Fri:4, Sat:5, Sun:6)

    let monday = 1+(7-weekDay); // we get the first monday of the month

    while(monday <= day) { //we calculate in wich week is our day
        weekNum++;
        monday += 7;
    }

    return weekNum; //we return it
}

changeTrain(value) {
    console.log(value);
    this.electromech_train_id=value
}

onSubmit(sid): void {

while(this.reportwithchecklist.length > 0) {
    this.reportwithchecklist.pop();
}

this.electromech_schedule_id=sid
console.log("hello-->"+sid+"Trainid-->"+this.electromech_train_id+"date-->"+this.date_check);



if (this.electromech_schedule_id=="0" || this.electromech_train_id=="0" || this.date_check=="0" ) {
     
    if (this.electromech_train_id=="0") {
        this._snackBar.open("Please Select Train", '', {
          duration: 2000,
        });
        }

     else if (this.electromech_schedule_id=="1") {
        this._snackBar.open("Please Select Date", '', {
          duration: 2000,
        });
        }
    else if (this.electromech_schedule_id=="2") {
        this._snackBar.open("Please Select Week", '', {
          duration: 2000,
        });
        }
    else if (this.electromech_schedule_id=="3") {
        this._snackBar.open("Please Select Month", '', {
          duration: 2000,
        });
        }
      
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

        for(let a=0 ; a<this.report.length; a++){

             if (this.report[a].checklist.length > 0 && this.electromech_schedule_id=="1") {
                if(this.report[a].checklist[0].electromech_product_enquiry_log_detail_id>0)
                 {
                this.reportwithchecklist.push(this.report[a]);
                 }
            }

           if (this.electromech_schedule_id=="2" || this.electromech_schedule_id=="3") {

                if (this.report[a].checklistonly!=null) {
                       if (this.report[a].checklistonly.length > 0) {
                                         if(this.report[a].checklistonly[0].electromech_product_enquiry_log_detail_id>0)
                                         {
                                          this.reportwithchecklist.push(this.report[a]);
                                          }

                         }
                 }
                else if (this.report[a].subpart!=null) {
                        if (this.report[a].subpart.length > 0) {
                                if(this.report[a].subpart[0].checklist[0].electromech_product_enquiry_log_detail_id>0)
                                  {
                                this.reportwithchecklist.push(this.report[a]);
                                  }
                         }
                 }
            }

           
         }
        
         if (this.electromech_schedule_id=="1") {

           this.date_var="Date : "+this.datePipe.transform(this.date_check, 'dd-MM-yyyy');
         }
        if (this.electromech_schedule_id=="2") {
           this.date_var="Week :"+this.weekNum+" Week In "+this.datePipe.transform(this.date_check, 'MMMM , y');
         }
        if (this.electromech_schedule_id=="3") {
           this.date_var="Month : "+this.datePipe.transform(this.date_check, 'MMMM , y');
         }

        if (this.reportwithchecklist.length<=0) {
     this.loading = false;
        this._snackBar.open("Reports Not Found", '', {
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

 confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(PictureView, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            data: data,
            action: action
        }
    });

   dialogRef.afterClosed().subscribe(result => {
    });
}



}

@Component({
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})
 
export class PictureView {
    image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/uploads/';
    action: string = '';
    loading = false;
    member_id = 0;
    data: any;
    constructor(
    public dialogRef: MatDialogRef<PictureView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.datapopup != null) { 
            this.action = this.datapopup.action;
            this.data = this.datapopup.data;
            if(this.datapopup.action == 'delete') {
                this.member_id = this.datapopup.data;
            }
    }
}
        }  






/*@Component({
  selector: 'report-form',
  templateUrl: 'report-form.html',
})
export class ReportForm {
  loading = false;
  electromech_category_id = 0;
  constructor(
    public dialogRef: MatDialogRef<ReportForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
}*/
