import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {
  product = []
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getProduct();
  }
  getProduct(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_product')
      .subscribe(
        (res) => {
          this.product = res["result"]["data"];
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
        if (parseInt(val.electromech_product_id) === parseInt(id)) {
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
  openTagDialog(): void {
    const dialogRef = this.dialog.open(TagForm, {
      minWidth: "40%",
      maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      
    });
  }
  
  openView(id, res): void {
    var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.electromech_product_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(ProductViewForm, {
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
      if (result !== false && result !== 'false') {
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


}


@Component({
  selector: 'product-form',
  templateUrl: 'product-form.html',
})
export class ProductForm {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  productForm: FormGroup;
  loading = false;
  electromech_product_id = 0;
  floor: any[];
  category: any[];
  product_image: string = 'Select Equipment Image';
  image_path: string = '';
  constructor(
    public dialogRef: MatDialogRef<ProductForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.productForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      'manufacturing': new FormControl(''),
      'category_id': new FormControl('', Validators.required),
      'floor_id': new FormControl('', Validators.required),
    });
    if (this.data != null) {
      this.productForm.patchValue({
        name: this.data.name,
        floor_id: this.data.electromech_floor_id,
        manufacturing: this.data.manufacturing,
        category_id: this.data.electromech_category_id,
      });
      this.electromech_product_id = this.data.electromech_product_id;
      this.image_path = this.data.image_path;
    }
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_floor').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.floor = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_category').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.category = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });
  }

  onSubmit() {
    if (this.productForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.electromech_product_id != 0) {
      formData.append('name', this.productForm.value.name);
      formData.append('electromech_floor_id', this.productForm.value.floor_id);
      formData.append('manufacturing', this.productForm.value.manufacturing);
      formData.append('electromech_category_id', this.productForm.value.category_id);
      formData.append('image_path', this.image_path);
      url = 'update_record/electromech_product/electromech_product_id = ' + this.electromech_product_id;
    } else {
      formData.append('name', this.productForm.value.name);
      formData.append('floor_id', this.productForm.value.floor_id);
      formData.append('manufacturing', this.productForm.value.manufacturing);
      formData.append('category_id', this.productForm.value.category_id);
      formData.append('product_image', this.image_path);
      url = 'insert_product';
    }
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/' + url, formData).subscribe(
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

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/upload_file', formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this[path] = res["result"]["data"];
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
      });
  }

  removeMedia(url) {
    this[url] = '';
    if (url === 'image_path') {
      this.product_image = 'Select Equipment Image';
    }
  }

}

@Component({
  selector: 'tag-form',
  templateUrl: 'tag-form.html',
})
export class TagForm {
  tagForm: FormGroup;
  loading = false;
  product: any[];
  train: any[];
  electromech_product_code_id = 0;
  constructor(
    public dialogRef: MatDialogRef<TagForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.tagForm = new FormGroup({
      'code': new FormControl('', Validators.required),
      'electromech_product_id': new FormControl('', Validators.required),
      'electromech_train_id': new FormControl('', Validators.required),
    });
    if (this.data != null) {
      this.tagForm.patchValue({
        code: this.data.code,
        electromech_product_id: this.data.electromech_product_id,
        electromech_train_id: this.data.electromech_train_id,
      });
      this.electromech_product_code_id = this.data.electromech_product_code_id;
    }
      this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_product').subscribe(
       (res) => {
         if (res["result"]["error"] === false) {
           this.product = res["result"]["data"];
         } else {
           this._snackBar.open(res["result"]["message"], '', {
             duration: 2000,
           });
         }
       },
       (error) => {
         this._snackBar.open(error["statusText"], '', {
           duration: 2000,
         });
       });
      this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_train').subscribe(
       (res) => {
         if (res["result"]["error"] === false) {
           this.train = res["result"]["data"];
         } else {
           this._snackBar.open(res["result"]["message"], '', {
             duration: 2000,
           });
         }
       },
       (error) => {
         this._snackBar.open(error["statusText"], '', {
           duration: 2000,
         });
       });
  }

  onSubmit() {
    if (this.tagForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.electromech_product_code_id != 0) {
      formData.append('code', this.tagForm.value.code);
      formData.append('electromech_product_id', this.tagForm.value.electromech_product_id);
      formData.append('electromech_train_id', this.tagForm.value.electromech_train_id);
      url = 'update_record/electromech_product_code/electromech_product_code_id = ' + this.electromech_product_code_id;
    } else {
      formData.append('code', this.tagForm.value.code);
      formData.append('electromech_product_id', this.tagForm.value.electromech_product_id);
      formData.append('electromech_train_id', this.tagForm.value.electromech_train_id);
      url = 'insert_product_code';
    }
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/' + url, formData).subscribe(
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
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class ProductImageView {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  action: string = '';
  loading = false;
  id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<ProductImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.id = this.datapopup.data;
      }
    }
  }
}


@Component({
  selector: 'product-delete-confirmation',
  templateUrl: 'product-delete-confirmation.html',
})
export class ProductDelete {
  loading = false;
  electromech_product_id = 0;
  constructor(
    public dialogRef: MatDialogRef<ProductDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.electromech_product_id = this.data;
    }
  }

  confirmDelete() {
    if (this.electromech_product_id == null || this.electromech_product_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/delete_record/electromech_product/electromech_product_id=' + this.electromech_product_id).subscribe(
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
  selector: 'product-view',
  templateUrl: 'product-view.html',
})

export class ProductViewForm {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  loading = false;
  data: any;
  tag = [];
  constructor(
    public dialogRef: MatDialogRef<ProductViewForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) { 
        this.data = this.datapopup;
    }

    ngOnInit() {
      this.getTagCode();
    }
    getTagCode(): void {
      this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_product_code/'+this.data.electromech_product_id)
        .subscribe(
          (res) => {
            this.tag = res["result"]["data"];
          },
          (error) => {
            this._snackBar.open(error["statusText"], '', {
              duration: 2000,
            });
          }
        );
    }
}
