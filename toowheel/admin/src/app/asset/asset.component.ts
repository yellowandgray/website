import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-asset',
  templateUrl: './asset.component.html',
  styleUrls: ['./asset.component.css']
})
export class AssetComponent implements OnInit {
    result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
        this.getAsset();
  }
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';

    getAsset(): void {
    this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_asset')
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

    openDialog(id): void  {
        var data = null;
        if(id != 0) { 
      this.result.forEach(val=> {
           if(parseInt(val.asset_id) === parseInt(id)) {
                data = val;                
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(AssetForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getAsset();
       }
    });
  }
    confirmDelete(id): void  {
        var data = null;
        if(id != 0) { 
          data = id;
      }
    const dialogRef = this.dialog.open(AssetDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
            this.getAsset();
        }
      });
    }
}


@Component({
  selector: 'asset-form',
  templateUrl: 'asset-form.html',
})
 
export class AssetForm {
    assetForm: FormGroup;
    asset_id = 0;
    loading = false;
    image: string = 'Choose Image';
    image_path: string;
    constructor(
    public dialogRef: MatDialogRef<AssetForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.assetForm = new FormGroup({
            'title': new FormControl('', Validators.required)
        });
        if(this.data != null) { 
            this.assetForm.patchValue({ 
                title: this.data.title
        })
        this.asset_id = this.data.asset_id;
        }
    }

    fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this[field] = res["result"]["data"];
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
    
    
    onSubmit() {
      if (this.assetForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = ''; 
      if(this.asset_id != 0) {
            formData.append('title', this.assetForm.value.title);
            if(this.image_path && this.image_path != '') {
            formData.append('image', this.image_path);
            }
            url = 'update_record/asset/asset_id = '+this.asset_id;
        }
        else {
            formData.append('title', this.assetForm.value.title);
            formData.append('image', this.image_path);
            url = 'insert_asset';
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
  selector: 'asset-delete-confirmation',
  templateUrl: 'asset-delete-confirmation.html',
})
export class AssetDelete {
    loading = false;
    asset_id = 0;
    constructor(
    public dialogRef: MatDialogRef<AssetDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.asset_id = this.data;
        }
    }


    confirmDelete() {
      if (this.asset_id == null || this.asset_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/asset/asset_id='+this.asset_id).subscribe(
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