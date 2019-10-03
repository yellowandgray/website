import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-gallery',
  templateUrl: './gallery.component.html',
  styleUrls: ['./gallery.component.css']
})
export class GalleryComponent implements OnInit {
  result = [];  
  result_four_wheel = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getGallery();
      this.getGalleryFourWheel();
  }
  image_url: string = 'http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/';
    getGallery(): void {
  this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_gallery')
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
  
  getGalleryFourWheel(): void {
  this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_gallery_four_wheel')
  .subscribe(
          (res)=>{
              this.result_four_wheel = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
  
  openDialog(id): void  {
    const dialogRef = this.dialog.open(GalleryForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getGallery();
      this.getGalleryFourWheel();
       }
    });
}

    confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
                data = id;
      }
    const dialogRef = this.dialog.open(GalleryDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
       this.getGallery();
      this.getGalleryFourWheel();
       }
    });
}

}

@Component({
  selector: 'gallery-form',
  templateUrl: 'gallery-form.html',
})
export class GalleryForm {
    galleryForm: FormGroup;
    loading = false;
    media_path: string;
    thumb_path: string;
    file_name: string = 'Select Picture';
    file_name_thumb: string = 'Select Thumb';
    constructor(
    public dialogRef: MatDialogRef<GalleryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
    ngOnInit() {
      this.galleryForm = new FormGroup({
      'title': new FormControl('', Validators.required),
      'media_type': new FormControl('', Validators.required),
      'type': new FormControl('', Validators.required)
        });
    }
    fileProgress(fileInput: any, name: string, path: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/upload_file', formData).subscribe(
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
  onSubmit() {
          if (this.galleryForm.invalid || this.media_path == '') {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          formData.append('title', this.galleryForm.value.title);
          formData.append('media_type', this.galleryForm.value.media_type);
          formData.append('type', this.galleryForm.value.type);
          formData.append('media_path', this.media_path);
          console.log(this.thumb_path);
          if(this.thumb_path && this.thumb_path!= '') {
              formData.append('thumb_path', this.thumb_path);
          }
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/insert_gallery', formData).subscribe(
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
  selector: 'gallery-delete-confirmation',
  templateUrl: 'gallery-delete-confirmation.html',
})
export class GalleryDelete {
    loading = false;
    gallery_id = 0;
    constructor(
    public dialogRef: MatDialogRef<GalleryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.gallery_id = this.data;
    }
}

  confirmDelete() {
      if (this.gallery_id == null || this.gallery_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/delete_record/gallery/gallery_id='+this.gallery_id).subscribe(
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