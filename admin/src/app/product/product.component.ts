import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
  ngOnInit() {
    this.getProduct();
  }
  image_url: string = "http://localhost/mushak/onlinebuy/api/v1/";
  getProduct(): void {
    this.httpClient.get<any>('http://localhost/mushak/onlinebuy/api/v1/get_product')
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
  openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.product_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(ProductForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getProduct();
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(ProductDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getProduct();
      }
    });
  }
  imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(ProductImageView, {
      minWidth: "40%",
      maxWidth: "40%",
      data: {
        data: data,
        action: action
      }
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
      }
    });
  }
}


@Component({
  selector: 'product-form',
  templateUrl: 'product-form.html',
})
export class ProductForm {
  image_url: string = "http://localhost/mushak/onlinebuy/api/v1/";
  productform: FormGroup;
  loading = false;
  product_id = 0;
  category: any[];
  product_type: any[];
  product_sub_type: any[];
  shop: any[];
  unit: any[];
  brand: any[];
  product_image: string = "Select Product Image";
  imageurl: string = "";
  constructor(
    public dialogRef: MatDialogRef<ProductForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.productform = new FormGroup({
      'name': new FormControl('', Validators.required),
      'category_id': new FormControl('', Validators.required),
      'product_type_id': new FormControl('', Validators.required),
      'product_sub_type_id': new FormControl(0),
      'shop_id': new FormControl(0),
      'brand_id': new FormControl(0),
      'size': new FormControl("", Validators.required),
      'unit_id': new FormControl("", Validators.required),
      'price': new FormControl("", Validators.required),
      'offer_price': new FormControl(""),
    })
    if (this.data != null) {
      this.productform.patchValue({
        name: this.data.name,
        category_id: this.data.category_id,
        product_type_id: this.data.product_type_id,
        product_sub_type_id: this.data.product_sub_type_id,
        shop_id: this.data.shop_id,
        brand_id: this.data.brand_id,
        size: this.data.size,
        unit_id: this.data.unit_id,
        price: this.data.price,
        offer_price: this.data.offer_price,
      });
      this.product_id = this.data.product_id;
      this.imageurl = this.data.imageurl;
    }
    this.httpClient
      .get("http://localhost/mushak/onlinebuy/api/v1/get_category")
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
      .get("http://localhost/mushak/onlinebuy/api/v1/get_product_type")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.product_type = res["result"]["data"];
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
      .get("http://localhost/mushak/onlinebuy/api/v1/get_product_sub_type")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.product_sub_type = res["result"]["data"];
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
      .get("http://localhost/mushak/onlinebuy/api/v1/get_shop")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.shop = res["result"]["data"];
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
      .get("http://localhost/mushak/onlinebuy/api/v1/get_unit")
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
      .get("http://localhost/mushak/onlinebuy/api/v1/get_brand")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.brand = res["result"]["data"];
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
    if (this.productform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.product_id != 0) {
      formData.append('name', this.productform.value.name);
      formData.append('category_id', this.productform.value.category_id);
      formData.append('product_type_id', this.productform.value.product_type_id);
      formData.append('product_sub_type_id', this.productform.value.product_sub_type_id);
      formData.append('shop_id', this.productform.value.shop_id);
      formData.append('brand_id', this.productform.value.brand_id);
      formData.append("size", this.productform.value.size);
      formData.append("unit_id", this.productform.value.unit_id);
      formData.append("price", this.productform.value.price);
      formData.append("offer_price", this.productform.value.offer_price);
      formData.append("imageurl", this.imageurl);
      url = 'update_record/product/product_id = ' + this.product_id;
    } else {
      formData.append('name', this.productform.value.name);
      formData.append('category_id', this.productform.value.category_id);
      formData.append('product_type_id', this.productform.value.product_type_id);
      formData.append('product_sub_type_id', this.productform.value.product_sub_type_id);
      formData.append('shop_id', this.productform.value.shop_id);
      formData.append('brand_id', this.productform.value.brand_id);
      formData.append("size", this.productform.value.size);
      formData.append("unit_id", this.productform.value.unit_id);
      formData.append("price", this.productform.value.price);
      formData.append("offer_price", this.productform.value.offer_price);
      formData.append("product_image", this.imageurl);
      url = 'insert_product';
    }
    this.httpClient.post('http://localhost/mushak/onlinebuy/api/v1/' + url, formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
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
      .post("http://localhost/mushak/onlinebuy/api/v1/upload_file", formData)
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
  selector: 'product-delete-confirmation',
  templateUrl: 'product-delete-confirmation.html',
})
export class ProductDelete {
  loading = false;
  product_id = 0;
  constructor(
    public dialogRef: MatDialogRef<ProductDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.product_id = this.data;
    }
  }

  confirmDelete() {
    if (this.product_id == null || this.product_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://localhost/mushak/onlinebuy/api/v1/delete_record/product/product_id=' + this.product_id).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
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
}


@Component({
  selector: "picture-view",
  templateUrl: "picture-view.html"
})
export class ProductImageView {
  image_url: string = "http://localhost/mushak/onlinebuy/api/v1/";
  action: string = "";
  loading = false;
  product_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<ProductImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == "delete") {
        this.product_id = this.datapopup.data;
      }
    }
  }
}
