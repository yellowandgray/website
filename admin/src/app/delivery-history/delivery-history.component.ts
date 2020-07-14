import { Component, OnInit, Inject } from '@angular/core';
import { MatSnackBar } from "@angular/material/snack-bar";
import { HttpClient } from "@angular/common/http";import {
  MatDialog,
  MatDialogRef,
  MAT_DIALOG_DATA
} from "@angular/material/dialog";

@Component({
  selector: 'app-delivery-history',
  templateUrl: './delivery-history.component.html',
  styleUrls: ['./delivery-history.component.css']
})
export class DeliveryHistoryComponent implements OnInit {
  result = [];
  constructor(
    public dialog: MatDialog,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) { }

  ngOnInit() {
    this.getOrder();
  }
    getOrder(): void {
    this.httpClient
      .get<any>(
        "http://localhost/project/ygonlinebuy/api/v1/get_orders_for_all"
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
}


@Component({
  selector: "order-view",
  templateUrl: "order-view.html"
})
export class OrderViewHistory {
  image_url: string = "http://localhost/project/ygonlinebuy/api/v1/";
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
        "http://localhost/project/ygonlinebuy/api/v1/get_orders_for_all"
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
