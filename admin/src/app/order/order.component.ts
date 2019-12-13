import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';

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
    getOrder(): void {
     this.httpClient.get<any>('http://localhost/project/fresche/api/v1/get_order')
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
     
    openDialog(id, res): void {
        var data = null;
        if(id != 0) { 
        this[res].forEach(val=> {
             if(parseInt(val.orders_id) === parseInt(id)) {
                  data = val;
                  return false;
             }
           });
        }
        const dialogRef = this.dialog.open(OrderViewForm, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });
        dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {}
        });
    }
    openDeliveryStatus(): void {
        const dialogRef = this.dialog.open(DeliveryStatusForm, {
            minWidth: "40%",
            maxWidth: "40%"
        });
        dialogRef.afterClosed().subscribe(result => {
            console.log('The dialog was closed');
        });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
        const dialogRef = this.dialog.open(OrderDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });
        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
               this.getOrder();
            }
        });
    }

}

@Component({
    selector: 'order-view-form',
    templateUrl: 'order-view-form.html',
})

export class OrderViewForm {
    loading = false;
    constructor(
    public dialogRef: MatDialogRef<OrderViewForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.orderViewForm = new FormGroup({
            'member_name': new FormControl('', Validators.required),
            'email': new FormControl('', Validators.required),
            'grand_total': new FormControl('', Validators.required),
            'address': new FormControl('', Validators.required),
            'state_id': new FormControl('', Validators.required),
            'city': new FormControl('', Validators.required),
            'pincode': new FormControl('', Validators.required),
            'delivery_status': new FormControl('', Validators.required),
            'shipped_at': new FormControl('', Validators.required),
            'delivery_at': new FormControl()
        });
        if(this.data != null) {
           this.orderViewForm.patchValue({
           member_name: this.data.type,
           email: this.data.category_id,
           mobile: this.data.club_id,
           grand_total: this.data.title,
           address: this.data.news_date,
           state_id: this.data.state_id,
           city: this.data.city,
           pincode: this.data.pincode,
           delivery_status: this.data.delivery_status,
           shipped_at: this.data.shipped_at,
           delivery_at: this.data.delivery_at
        });
            this.orders_id = this.data.orders_id;
        }
    }

  onNoClick(): void {
    this.dialogRef.close();
  }

}

@Component({
    selector: 'delivery-status-form',
    templateUrl: 'delivery-status-form.html',
})

export class DeliveryStatusForm {
    delivery_status = 0;
    constructor(
    public dialogRef: MatDialogRef<DeliveryStatusForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
        
    }


@Component({
  selector: 'order-delete-confirmation',
  templateUrl: 'order-delete-confirmation.html',
})
export class OrderDelete {
    loading = false;
    orders_id = 0;
    constructor(
    public dialogRef: MatDialogRef<OrderDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.orders_id = this.data;
    }
}

  confirmDelete() {
      if (this.orders_id == null || this.orders_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/fresche/api/v1/delete_record/orders/orders_id='+this.orders_id).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.dialogRef.close(true);
                }else{
            this._snackBar.open(res["result"]["message"], '', {
          duration: 2000,
        });
                }
            },
            (error)=>{
                this.loading = false;
                this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
            }
        );
  }
}