import { Component, OnInit, Inject } from '@angular/core';
import { MatSnackBar } from "@angular/material/snack-bar";
import { HttpClient } from "@angular/common/http";import {
  MatDialog,
  MatDialogRef,
  MAT_DIALOG_DATA
} from "@angular/material/dialog";
import { DatePipe } from '@angular/common';
//import { NgxSpinnerService } from 'ngx-spinner';
@Component({
  selector: 'app-delivery-history',
  templateUrl: './delivery-history.component.html',
  styleUrls: ['./delivery-history.component.css']
})
export class DeliveryHistoryComponent implements OnInit {
  result = [];
  loading = false;
  constructor(
    public dialog: MatDialog,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
    ,//private spinner: NgxSpinnerService
  ) { }

  ngOnInit() {
    this.getOrder();
  }

  showSpinner(name: string) {
    //this.spinner.show(name);
  }

  hideSpinner(name: string) {
   // this.spinner.hide(name);
  }

    getOrder(): void {
      this.loading = true;
      this.showSpinner('sp3')


    this.httpClient
      .get<any>(
        "http://ygonlinebuy.com/api/v1/get_orders_for_all"
      )
      .subscribe(
        res => {
          this.loading = false;
          this.hideSpinner('sp3')
          this.result = res["result"]["data"];
        },
        error => {

          this.loading = false;
          this.hideSpinner('sp3')
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
    
  OrderView(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.order_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(OrderViewHistory, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        //this.getOrder();
      }
    });
  }
  OrderDateChange(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.order_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(OrderDate, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getOrder();
      }
    });
  }


}


@Component({
  selector: "order-view",
  templateUrl: "order-view.html"
})
export class OrderViewHistory {
  image_url: string = "http://ygonlinebuy.com/api/v1/";
  loading = false;
  result = [];
  order_id = 0;
  constructor(
    public dialogRef: MatDialogRef<OrderViewHistory>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {}
  ngOnInit() {}
  getOrder(): void {
    this.httpClient
      .get<any>(
        "http://ygonlinebuy.com/api/v1/get_orders_for_all"
      )
      .subscribe(
        res => {
          this.result = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
}



@Component({
  selector: "orderdatechange-view",
  templateUrl: "orderdatechange-view.html"
})
export class OrderDate {
  image_url: string = "http://ygonlinebuy.com/api/v1/";
  loading = false;
  result = [];
  order_id = 0;
  date_check;
  constructor(
    public dialogRef: MatDialogRef<OrderDate>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient,
    private datePipe : DatePipe
  ) {

    if(this.data != null) { 
                        
      this.order_id=this.data.order_id;  
      console.log("orderid-->"+this.order_id);     
   }

  }
  ngOnInit() {
    
    this.date_check = new Date();
    this.date_check= this.datePipe.transform(this.date_check, 'yyyy-MM-dd HH:mm:ss');
    console.log("check-->"+this.date_check);
  }

  onSubmit()
  {

    this.loading = true;

    this.httpClient.get<any>('http://ygonlinebuy.com/api/v1/update_wrongdate/'+this.date_check+'/'+this.date_check+'/'+this.order_id)
      .subscribe(
        (res) => {
          this.loading = false;
          this.result = res["result"]["data"];
          this.dialogRef.close(true);
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
