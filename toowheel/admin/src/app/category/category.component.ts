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
      this.getCategory();
  }
    
  getCategory(): void {
  this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_category')
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
  openDialog(): void  {
    var data = null;
    
    const dialogRef = this.dialog.open(CategoryForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

   dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
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
    category_id: string;
    constructor(
    public dialogRef: MatDialogRef<CategoryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.categoryForm = new FormGroup({
            'name': new FormControl('', Validators.required)
        });
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
          formData.append('name', this.categoryForm.value.name);
      this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/insert_category', formData).subscribe(
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