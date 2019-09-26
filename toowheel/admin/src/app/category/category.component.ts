import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.css']
})
export class CategoryComponent implements OnInit {
    result = [];
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getcategory();
  }
    getcategory(): void {
      this.httpClient.get<any>('http://localhost/twowheel-frontend/toowheel/api/v1/get_category')
      .subscribe(
            (res)=>{
                this.result = res.data;
          },
          (error)=>{
              this._snackBar.open(error.statusText, '', {
        duration: 2000,
      });
      }
      );
    }

  openDialog(): void  {
    var data = null;
    
    const dialogRef = this.dialog.open(CategoryForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getcategory();
        }
    });
}

}

@Component({
  selector: 'category-form',
  templateUrl: 'category-form.html',
})
export class CategoryForm {
    categoryForm: FormGroup;
    loading = false;
    name: string;
    category_id: string;
    constructor(
    public dialogRef: MatDialogRef<CategoryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.name = this.data.name;
        this.category_id = this.data.category_id;
    }

 ngOnInit() {
      this.categoryForm = new FormGroup({
      'name': new FormControl('', Validators.required)
        });
    }

  onSubmit() {
      if (this.categoryForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
          formData.append('name', this.name);
      this.httpClient.post('http://localhost/twowheel-frontend/toowheel/api/v1/insert_category', {name: this.categoryForm.value.name, category_id: this.categoryForm.value.name, created_by: 'Admin', updated_by: 'Admin'}).subscribe(
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