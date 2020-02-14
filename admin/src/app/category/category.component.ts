import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.css']
})
export class CategoryComponent implements OnInit {
  category = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getCategory();
  }

  getCategory(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_category')
      .subscribe(
        (res) => {
          this.category = res["result"]["data"];
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
        if (parseInt(val.electromech_category_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(CategoryForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getCategory();
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(CategoryDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getCategory();
      }
    });
  }

}


@Component({
  selector: 'category-form',
  templateUrl: 'category-form.html',
})
export class CategoryForm {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  categoryForm: FormGroup;
  loading = false;
  electromech_category_id = 0;
  product: [];
  constructor(
    public dialogRef: MatDialogRef<CategoryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.categoryForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      'electromech_product_id': new FormControl('', Validators.required),
    });
    if (this.data != null) {
      this.categoryForm.patchValue({
        name: this.data.name,
        electromech_product_id: this.data.electromech_product_id,
      });
      this.electromech_category_id = this.data.electromech_category_id;
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
  }

  onSubmit() {
    if (this.categoryForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.electromech_category_id != 0) {
      formData.append('name', this.categoryForm.value.name);
      formData.append('electromech_product_id', this.categoryForm.value.electromech_product_id);
      url = 'update_record/electromech_category/electromech_category_id = ' + this.electromech_category_id;
    } else {
      formData.append('name', this.categoryForm.value.name);
      formData.append('electromech_product_id', this.categoryForm.value.electromech_product_id);
      url = 'insert_category';
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
  selector: 'category-delete-confirmation',
  templateUrl: 'category-delete-confirmation.html',
})
export class CategoryDelete {
  loading = false;
  electromech_category_id = 0;
  constructor(
    public dialogRef: MatDialogRef<CategoryDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.electromech_category_id = this.data;
    }
  }

  confirmDelete() {
    if (this.electromech_category_id == null || this.electromech_category_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/delete_record/electromech_category/electromech_category_id=' + this.electromech_category_id).subscribe(
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
