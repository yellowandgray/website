import { Component, OnInit, Inject } from "@angular/core";
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from "@angular/material/dialog";
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { MatSnackBar } from "@angular/material/snack-bar";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-product-price',
  templateUrl: './product-price.component.html',
  styleUrls: ['./product-price.component.css']
})
export class ProductPriceComponent implements OnInit {
    result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
    
  ngOnInit() {
    this.getProductPrice();
  }
  image_url: string = "../api/v1/";
  getProductPrice(): void {
    this.httpClient
      .get<any>("../api/v1/get_product_price")
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
    openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.product_price_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(ProductPriceForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getProductPrice();
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(ProductPriceDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getProductPrice();
      }
    });
  }
}


@Component({
  selector: "product-price-form",
  templateUrl: "product-price-form.html"
})
export class ProductPriceForm {
  image_url: string = "../api/v1/";
  productpriceform: FormGroup;
  loading = false;
  product_price_id = 0;
  unit: any[];
  product: any[];
  product_image: string = "Select Product Image";
  imageurl: string = "";
  constructor(
    public dialogRef: MatDialogRef<ProductPriceForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.productpriceform = new FormGroup({
      product_id: new FormControl("", Validators.required),
      size: new FormControl("", Validators.required),
      unit_id: new FormControl("", Validators.required),
      price: new FormControl("", Validators.required),
      offer_price: new FormControl("", Validators.required),
    });
    if (this.data != null) {
      this.productpriceform.patchValue({
        product_id: this.data.product_id,
        size: this.data.size,
        unit_id: this.data.unit_id,
        price: this.data.price,
        offer_price: this.data.offer_price,
      });
      this.product_price_id = this.data.product_price_id;
      this.imageurl = this.data.imageurl;
    }
    this.httpClient
      .get("../api/v1/get_unit")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.unit = res["result"]["data"];
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
      .get("../api/v1/get_product")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.product = res["result"]["data"];
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
    if (this.productpriceform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.product_price_id != 0) {
      formData.append("product_id", this.productpriceform.value.product_id);
      formData.append("size", this.productpriceform.value.size);
      formData.append("unit_id", this.productpriceform.value.unit_id);
      formData.append("price", this.productpriceform.value.price);
      formData.append("offer_price", this.productpriceform.value.offer_price);
      formData.append("imageurl", this.imageurl);
      url = "update_record/product_price/product_price_id = " + this.product_price_id;
    } else {
      formData.append("product_id", this.productpriceform.value.product_id);
      formData.append("size", this.productpriceform.value.size);
      formData.append("unit_id", this.productpriceform.value.unit_id);
      formData.append("price", this.productpriceform.value.price);
      formData.append("offer_price", this.productpriceform.value.offer_price);
      formData.append("product_image", this.imageurl);
      url = "insert_product_price";
    }
    this.httpClient
      .post("../api/v1/" + url, formData)
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

  removeMedia(url) {
    this[url] = "";
    if (url === "imageurl") {
      this.product_image = "Select Product Image";
    }
  }

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append("file", fileData);
    this.httpClient
      .post("../api/v1/upload_file", formData)
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this[path] = res["result"]["data"];
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
  selector: "product-price-delete-confirmation",
  templateUrl: "product-price-delete-confirmation.html"
})
export class ProductPriceDelete {
  loading = false;
  product_price_id = 0;
  constructor(
    public dialogRef: MatDialogRef<ProductPriceDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.product_price_id = this.data;
    }
  }

  confirmDelete() {
    if (this.product_price_id == null || this.product_price_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "../api/v1/delete_record/product_price/product_price_id=" +
          this.product_price_id
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
