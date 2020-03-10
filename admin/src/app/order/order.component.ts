import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-order',
  templateUrl: './order.component.html',
  styleUrls: ['./order.component.css']
})
export class OrderComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getOrder();
  }
  image_url: string = 'http://www.lemonandshadow.com/threelevel/api/v1/';
  getOrder(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/threelevel/api/v1/get_orders_for_all')
      .subscribe(
        (res) => {
          this.result = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  
  OrderView(id, res): void {
    var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.student_register_id) === parseInt(id)) {
                data = val;
                return false;
           }
        });
    }
    const dialogRef = this.dialog.open(OrderView, {
      minWidth: "40%",
      maxWidth: "40%",
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        
      }
    });
  }
}

@Component({
  selector: 'order-view',
  templateUrl: 'order-view.html',
})

export class OrderView {
  image_url: string = 'http://www.lemonandshadow.com/threelevel/api/v1/';
  loading = false;
  result = [];
  order_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<OrderView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) { 
        this.data = this.datapopup;
    }
}
