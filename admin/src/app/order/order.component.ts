import { Component, OnInit, Inject } from "@angular/core";
import {
  MatDialog,
  MatDialogRef,
  MAT_DIALOG_DATA
} from "@angular/material/dialog";
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { MatSnackBar } from "@angular/material/snack-bar";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: "app-order",
  templateUrl: "./order.component.html",
  styleUrls: ["./order.component.css"]
})
export class OrderComponent implements OnInit {
  result = [];
  constructor(
    public dialog: MatDialog,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {}

  ngOnInit() {
    this.getOrder();
  }
  image_url: string = "http://lemonandshadow.com/threelevel/api/v1/";
  getOrder(): void {
    this.httpClient
      .get<any>(
        "http://lemonandshadow.com/threelevel/api/v1/get_orders_for_all"
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

  openDeliverBoyPopup(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.order_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(OrderDeliveryBoyPopup, {
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
    const dialogRef = this.dialog.open(OrderView, {
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
  selector: "delivery-boy-popup",
  templateUrl: "delivery-boy-popup.html"
})
export class OrderDeliveryBoyPopup {
  image_url: string = "http://lemonandshadow.com/threelevel/api/v1/";
  deliveryboyform: FormGroup;
  delivery_boy = [];
  order_id = 0;
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<OrderDeliveryBoyPopup>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.deliveryboyform = new FormGroup({
      delivery_boy_id: new FormControl("", Validators.required)
    });
    if (this.data != null) {
      this.deliveryboyform.patchValue({
        delivery_boy_id: this.data.delivery_boy_id
      });
      this.order_id = this.data.order_id;
    }
    this.httpClient
      .get("http://lemonandshadow.com/threelevel/api/v1/get_delivery_boy")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.delivery_boy = res["result"]["data"];
          } else {
            this._snackBar.open(res["result"]["message"], "", {
              duration: 2000
            });
          }
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }

  onSubmit() {
    if (this.deliveryboyform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.order_id != 0) {
      formData.append("delivery_boy_id", this.deliveryboyform.value.delivery_boy_id);
      url = "update_record/order/order_id = " + this.order_id;
    } else {
      formData.append("delivery_boy_id", this.deliveryboyform.value.delivery_boy_id);
      url = "insert_delivery_boy_status";
    }
    this.httpClient
      .post("http://lemonandshadow.com/threelevel/api/v1/" + url, formData)
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this.dialogRef.close(true);
          } else {
            this._snackBar.open(res["result"]["message"], "", {
              duration: 2000
            });
          }
        },
        error => {
          this.loading = false;
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
}

@Component({
  selector: "order-view",
  templateUrl: "order-view.html"
})
export class OrderView {
  image_url: string = "http://lemonandshadow.com/threelevel/api/v1/";
  loading = false;
  result = [];
  order_id = 0;
  constructor(
    public dialogRef: MatDialogRef<OrderView>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {}
}
