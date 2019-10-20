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
    result_fw = [];
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getCategory();
      this.getFourWheelCategory();
  }
    
  getCategory(): void {
  this.httpClient.get<any>('http://www.toowheel.com/toowheel/api/v1/get_two_wheel_category')
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
  getFourWheelCategory(): void {
  this.httpClient.get<any>('http://www.toowheel.com/toowheel/api/v1/get_four_wheel_category')
  .subscribe(
          (res)=>{
              this.result_fw = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
  openDialog(id, res, ctype): void  {
    var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.category_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(CategoryForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: {
            ctype: ctype,
            data: data
        }
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getCategory();
      this.getFourWheelCategory();
       }
    });
}
  confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(CategoryDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getCategory();
      this.getFourWheelCategory();
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
    category_id = 0;
    category_type: string;
    constructor(
    public dialogRef: MatDialogRef<CategoryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.categoryForm = new FormGroup({
            'name': new FormControl('', Validators.required)
        });
        if(this.data.data != null) { 
            this.categoryForm.patchValue({ 
                name: this.data.data.name
        })
        this.category_id = this.data.data.category_id;
    }
        this.category_type= this.data.ctype;
}

  onSubmit() {
      if (this.categoryForm.invalid) {
            return;
      }
      var formData = new FormData();
      var url = '';
      if(this.category_id != 0) {
        formData.append('name', this.categoryForm.value.name);
        formData.append('type', this.category_type);  
        url = 'update_record/category/category_id = '+this.category_id;
      } else {
        formData.append('name', this.categoryForm.value.name);
        formData.append('type', this.category_type);          
        url = 'insert_category';
      }
      this.loading = true;
      this.httpClient.post('http://www.toowheel.com/toowheel/api/v1/'+url, formData).subscribe(
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

@Component({
  selector: 'category-delete-confirmation',
  templateUrl: 'category-delete-confirmation.html',
})
export class CategoryDelete {
    loading = false;
    category_id = 0;
    constructor(
    public dialogRef: MatDialogRef<CategoryDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.category_id = this.data;
    }
}

  confirmDelete() {
      if (this.category_id == null || this.category_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://www.toowheel.com/toowheel/api/v1/delete_record/category/category_id='+this.category_id).subscribe(
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