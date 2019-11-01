import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-ecommerce',
  templateUrl: './ecommerce.component.html',
  styleUrls: ['./ecommerce.component.css']
})
export class EcommerceComponent implements OnInit {
  result:any[];
  result_unit:any[];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getEcommerceCategory();
    this.getEcommerceUnit();
  }

    getEcommerceCategory(): void {
    this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_ecommerce_category')
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

    getEcommerceUnit(): void {
    this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_ecommerce_unit')
    .subscribe(
          (res)=>{
              this.result_unit = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
    }

    openCategory(id, res): void  {
        var data = null;
        if(id != 0) { 
        this[res].forEach(val=> {
             if(parseInt(val.category_id) === parseInt(id)) {
                  data = val;
                  return false;
             }
           });
        }
        const dialogRef = this.dialog.open(EcommerceCategory, {
            minWidth: "80%",
            maxWidth: "80%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
            this.getEcommerceCategory();
            }
        });
    }

    openUnits(id, res): void  {
        var data = null;
        if(id != 0) { 
        this[res].forEach(val=> {
             if(parseInt(val.unit_id) === parseInt(id)) {
                  data = val;
                  return false;
             }
           });
        }
        const dialogRef = this.dialog.open(EcommerceUnits, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
            this.getEcommerceUnit();
            }
        });
    }

    openProducts(): void  {
        const dialogRef = this.dialog.open(EcommerceProducts, {
            minWidth: "80%",
            maxWidth: "80%"
        });

        dialogRef.afterClosed().subscribe(result => {
          console.log(`Dialog result: ${result}`);
        });
    }


    confirmDelete(id): void  {
        var data = null;
        if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(EcommerceCategoryDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
       this.getEcommerceCategory();
        }
     });
    }

 confirmDeleteUnit(id): void  {
        var data = null;
        if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(EcommerceUnitDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
       this.getEcommerceUnit();
        }
     });
    } 

}

@Component({
  selector: 'ecommerce-category-form',
  templateUrl: 'ecommerce-category-form.html',
})
export class EcommerceCategory {
    ecommercecategoryForm: FormGroup;
    loading = false;
    category_id = 0;
    constructor(
    public dialogRef: MatDialogRef<EcommerceCategory>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
      this.ecommercecategoryForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      });
      if(this.data != null) { 
            this.ecommercecategoryForm.patchValue({ 
                name: this.data.name
            })
            this.category_id = this.data.category_id;
        }else {
            this.ecommercecategoryForm.patchValue({
                date: new Date()
            });
        }
    }

    onSubmit() {
      if (this.ecommercecategoryForm.invalid) {
            return;
      }
      var formData = new FormData();
      var url = '';
      if(this.category_id != 0) {
        formData.append('name', this.ecommercecategoryForm.value.name);
        url = 'update_record/ecommerce_category/category_id = '+this.category_id;
      } else {
        formData.append('name', this.ecommercecategoryForm.value.name);        
        url = 'insert_ecommerce_category';
      }
      this.loading = true;
      this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/'+url, formData).subscribe(
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
  selector: 'ecommerce-units-form',
  templateUrl: 'ecommerce-units-form.html',
})
export class EcommerceUnits {
    ecommerceunitsForm: FormGroup;
    loading = false;
    unit_id = 0;
    constructor(
    public dialogRef: MatDialogRef<EcommerceUnits>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.ecommerceunitsForm = new FormGroup({
        'type': new FormControl('', Validators.required),
        'name': new FormControl('', Validators.required),
        'value': new FormControl('', Validators.required),
      });
      if(this.data != null) { 
            this.ecommerceunitsForm.patchValue({ 
                type: this.data.type,
                name: this.data.name,
                value: this.data.value
            })
            this.unit_id = this.data.unit_id;
        }else {
            this.ecommerceunitsForm.patchValue({
                date: new Date()
            });
        }
    }

    onSubmit() {
      if (this.ecommerceunitsForm.invalid) {
            return;
      }
      var formData = new FormData();
      var url = '';
      if(this.unit_id != 0) {
        formData.append('type', this.ecommerceunitsForm.value.type);
        formData.append('name', this.ecommerceunitsForm.value.name);
        formData.append('value', this.ecommerceunitsForm.value.value);
        url = 'update_record/ecommerce_unit/unit_id = '+this.unit_id;
      } else {
        formData.append('type', this.ecommerceunitsForm.value.type);  
        formData.append('name', this.ecommerceunitsForm.value.name); 
        formData.append('value', this.ecommerceunitsForm.value.value);       
        url = 'insert_ecommerce_unit';
      }
      this.loading = true;
      this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/'+url, formData).subscribe(
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
  selector: 'ecommerce-products-form',
  templateUrl: 'ecommerce-products-form.html',
})
export class EcommerceProducts {
    ecommerceproductsForm: FormGroup;
    loading = false;
    categories:any[];
    product_id = 0;
    constructor(
    public dialogRef: MatDialogRef<EcommerceProducts>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.ecommerceproductsForm = new FormGroup({
        'name': new FormControl('', Validators.required),
        'description': new FormControl('', Validators.required),
        'category_id': new FormControl('', Validators.required),
      });
    }
    getCategory(): void {
       this.loading = true;
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_ecommerce_category').subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.categories = res["result"]["data"];
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
        });
    }
}


@Component({
  selector: 'ecommerce-category-delete-form',
  templateUrl: 'ecommerce-category-delete-form.html',
})
export class EcommerceCategoryDelete {
    category_id = 0;  
    loading = false;
    constructor(
    public dialogRef: MatDialogRef<EcommerceCategoryDelete>,
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
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/ecommerce_category/category_id='+this.category_id).subscribe(
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
  selector: 'ecommerce-unit-delete-form',
  templateUrl: 'ecommerce-unit-delete-form.html',
})
export class EcommerceUnitDelete {   
    unit_id=0
    loading = false;
    constructor(
    public dialogRef: MatDialogRef<EcommerceUnitDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) {             
            this.unit_id = this.data;
    }
  }    
 confirmDeleteUnit() {
      if (this.unit_id == null || this.unit_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/ecommerce_unit/unit_id='+this.unit_id).subscribe(
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