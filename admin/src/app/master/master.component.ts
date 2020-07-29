import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from "@angular/material/dialog";
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { MatSnackBar } from "@angular/material/snack-bar";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-master',
  templateUrl: './master.component.html',
  styleUrls: ['./master.component.css']
})
export class MasterComponent implements OnInit {
  shop = [];
  product_type = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getShop();
    this.getProductType();
  }
    getShop(): void {
    this.httpClient
      .get<any>(
        "http://ygonlinebuy.com/api/v1/get_shop"
      )
      .subscribe(
        res => {
          this.shop = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
     getProductType(): void {
    this.httpClient
      .get<any>(
        "http://ygonlinebuy.com/api/v1/get_product_type"
      )
      .subscribe(
        res => {
          this.product_type = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
    openShopDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.shop_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(ShopForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getShop();
      }
    });
  }
    shopDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(ShopDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getShop();
      }
    });
  }
    openProductTypeDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.product_type_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(ProductTypeForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getProductType();
      }
    });
  }
    producttypeDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(ProductTypeDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getProductType();
      }
    });
  }
}



@Component({
  selector: "shop-form",
  templateUrl: "shop-form.html"
})
export class ShopForm {
    image_url: string = "http://ygonlinebuy.com/api/v1/";
    shopform: FormGroup;
    loading = false;
    shop_id = 0;
    category: any[];
    region: any[];
  constructor(
    public dialogRef: MatDialogRef<ShopForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.shopform = new FormGroup({
      name: new FormControl("", Validators.required),
      category_id: new FormControl("", Validators.required),
      region_id: new FormControl("", Validators.required),
      address: new FormControl("", Validators.required),
      pincode: new FormControl("", Validators.required),
      email: new FormControl(""),
      phone: new FormControl("", Validators.required),
      contact_person_name: new FormControl(""),
    });
    if (this.data != null) {
      this.shopform.patchValue({
        name: this.data.name,
        category_id: this.data.category_id,
        region_id: this.data.region_id,
        address: this.data.address,
        pincode: this.data.pincode,
        email: this.data.email,
        phone: this.data.phone,
        contact_person_name: this.data.contact_person_name,
      });
      this.shop_id = this.data.shop_id;
    }
    this.httpClient
      .get("http://ygonlinebuy.com/api/v1/get_category")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.category = res["result"]["data"];
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
    this.httpClient
      .get("http://ygonlinebuy.com/api/v1/get_region")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.region = res["result"]["data"];
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
    if (this.shopform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.shop_id != 0) {
      formData.append("name", this.shopform.value.name);
      formData.append("category_id", this.shopform.value.category_id);
      formData.append("region_id", this.shopform.value.region_id);
      formData.append("address", this.shopform.value.address);
      formData.append("pincode", this.shopform.value.pincode);
      formData.append("email", this.shopform.value.email);
      formData.append("phone", this.shopform.value.phone);
      formData.append("contact_person_name", this.shopform.value.contact_person_name);
      url =
        "update_record/shop/shop_id = " + this.shop_id;
    } else {
      formData.append("name", this.shopform.value.name);
      formData.append("category_id", this.shopform.value.category_id);
      formData.append("region_id", this.shopform.value.region_id);
      formData.append("address", this.shopform.value.address);
      formData.append("pincode", this.shopform.value.pincode);
      formData.append("email", this.shopform.value.email);
      formData.append("phone", this.shopform.value.phone);
      formData.append("contact_person_name", this.shopform.value.contact_person_name);
      url = "insert_shop";
    }
    this.httpClient
      .post("http://ygonlinebuy.com/api/v1/" + url, formData)
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
  selector: "shop-delete-confirmation",
  templateUrl: "shop-delete-confirmation.html"
})
export class ShopDelete {
  loading = false;
  shop_id = 0;
  constructor(
    public dialogRef: MatDialogRef<ShopDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.shop_id = this.data;
    }
  }
  confirmDelete() {
    if (this.shop_id == null || this.shop_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "http://ygonlinebuy.com/api/v1/delete_record/shop/shop_id=" +
          this.shop_id
      )
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
  selector: "product-type-form",
  templateUrl: "product-type-form.html"
})
export class ProductTypeForm {
  producttypeform: FormGroup;
  loading = false;
  product_type_id = 0;
  constructor(
    public dialogRef: MatDialogRef<ProductTypeForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.producttypeform = new FormGroup({
      type: new FormControl("", Validators.required),
    });
    if (this.data != null) {
      this.producttypeform.patchValue({
        type: this.data.type,
      });
      this.product_type_id = this.data.product_type_id;
    }
  }

  onSubmit() {
    if (this.producttypeform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.product_type_id != 0) {
      formData.append("type", this.producttypeform.value.type);
      url =
        "update_record/product_type/product_type_id = " + this.product_type_id;
    } else {
      formData.append("type", this.producttypeform.value.type);
      url = "insert_product_type";
    }
    this.httpClient
      .post("http://ygonlinebuy.com/api/v1/" + url, formData)
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
  selector: "product-type-delete-confirmation",
  templateUrl: "product-type-delete-confirmation.html"
})
export class ProductTypeDelete {
  loading = false;
  product_type_id = 0;
  constructor(
    public dialogRef: MatDialogRef<ProductTypeDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.product_type_id = this.data;
    }
  }
  confirmDelete() {
    if (this.product_type_id == null || this.product_type_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "http://ygonlinebuy.com/api/v1/delete_record/product_type/product_type_id=" +
          this.product_type_id
      )
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
