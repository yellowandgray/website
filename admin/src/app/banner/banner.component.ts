import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-banner',
  templateUrl: './banner.component.html',
  styleUrls: ['./banner.component.css']
})
export class BannerComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getBanner();
  }
    image_url: string = 'http://localhost/microview/fresche/api/v1/';
    getBanner(): void {
     this.httpClient.get<any>('http://localhost/microview/fresche/api/v1/get_banner')
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
    openDialog(id, res): void {  
        var data = null;
        if(id != 0) {
        this[res].forEach(val=> {
             if(parseInt(val.banner_id) === parseInt(id)) {
                  data = val;
                  return false;
             }
           });
        }
        const dialogRef = this.dialog.open(BannerForm, {
          minWidth: "40%",
          maxWidth: "40%",
          data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
                this.getBanner();
            }
        });
    }

    pictureView(id, action): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
        const dialogRef = this.dialog.open(BannerImageView, {
            minWidth: "40%",
            maxWidth: "40%",
            data: {
                data: data,
                action: action
            }
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
           }
        });
    }
    confirmDelete(id): void  {
        var data = null;
        if(id != 0) { 
          data = id;
        }
        const dialogRef = this.dialog.open(BannerDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
                this.getBanner();
           }
        });
    }

}

@Component({
  selector: 'banner-form',
  templateUrl: 'banner-form.html',
})
export class BannerForm {
    image_url: string = 'http://localhost/microview/fresche/api/v1/';
    bannerForm: FormGroup;
    loading = false;
    banner_id = 0;
    banner_image: string = 'Select Banner Image';
    image_path: string= '';
    constructor(
    public dialogRef: MatDialogRef<BannerForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.bannerForm = new FormGroup ({
            'title': new FormControl('', Validators.required),
        });
        if(this.data != null) {
           this.bannerForm.patchValue({
           title: this.data.title,
        });
            this.banner_id = this.data.banner_id;
            this.image_path = this.data.image_path;
        }
    }
    
    onSubmit() {
      if (this.bannerForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.banner_id != 0) {
        formData.append('title', this.bannerForm.value.title);
        formData.append('image_path', this.image_path);
        url = 'update_record/banner/banner_id = '+this.banner_id;
      } else {
        formData.append('title', this.bannerForm.value.title);
        formData.append('banner_image', this.image_path);
        url = 'insert_banner';
      }
      this.httpClient.post('http://localhost/microview/fresche/api/v1/'+url, formData).subscribe(
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

    fileProgress(fileInput: any, name: string, path: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://localhost/microview/fresche/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this[path] = res["result"]["data"];
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
    
    removeMedia(url) {
        this[url] = '';
        if(url === 'image_path') {
            this.banner_image= 'Select Banner Image';
        }     
    }


}


@Component({
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})
 
export class BannerImageView {
    image_url: string = 'http://localhost/microview/fresche/api/v1/';
    action: string = '';
    loading = false;
    banner_id = 0;
    data: any;
    constructor(
        public dialogRef: MatDialogRef<BannerImageView>,
        @Inject(MAT_DIALOG_DATA) public datapopup: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
            if(this.datapopup != null) { 
                this.action = this.datapopup.action;
                this.data = this.datapopup.data;
                if(this.datapopup.action == 'delete') {
                    this.banner_id = this.datapopup.data;
                }
            }
        }
    }

@Component({
  selector: 'banner-delete-confirmation',
  templateUrl: 'banner-delete-confirmation.html',
})
export class BannerDelete {
    loading = false;
    banner_id = 0;
    constructor(
    public dialogRef: MatDialogRef<BannerDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.banner_id = this.data;
    }
}

  confirmDelete() {
      if (this.banner_id == null || this.banner_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/microview/fresche/api/v1/delete_record/banner/banner_id='+this.banner_id).subscribe(
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