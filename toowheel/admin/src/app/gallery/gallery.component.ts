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
  searchTermTW: string = '';
  searchTermTWV: string = '';
  searchTermFW: string = '';
  searchTermFWV: string = '';
  sortdata_tw: string = '';
  sortdata_twv: string = '';
  sortdata_fw: string = '';
  sortdata_fwv: string = '';
  result = [];  
  result_four_wheel = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getGallery();
      this.getGalleryFourWheel();
  }
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    getGallery(): void {
  this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_gallery')
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
  this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_gallery_four_wheel')
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
  
  openDialog(id, res): void  {
    var data = null;
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.gallery_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(GalleryForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
          this.getGallery();
      this.getGalleryFourWheel();
        }
    });
}

     confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(PictureViewGallery, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            data: data,
            action: action
        }
    });

   dialogRef.afterClosed().subscribe(result => {
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
 sortRecords(arr, sort): void {
        switch(sort) {
            case 'title_a_z':
                (this[arr]).sort((a,b) => a.title.localeCompare(b.title));
            break;
            case 'title_z_a':
            (this[arr]).sort((a,b) => b.title.localeCompare(a.title));
            break;
            case 'created_a_z':
                (this[arr]).sort((a,b) => a.created_at.localeCompare(b.created_at));
            break;
            case 'created_z_a':
                (this[arr]).sort((a,b) => b.created_at.localeCompare(a.created_at));
            break;
            default:
            break;
        }
    }
    makeAsSpecial(typ, vlu, fld, gid, gtype) {
    var formData = new FormData();
          formData.append(fld, vlu);
          formData.append('media_type', typ);
          formData.append('gallery_id', gid);
          formData.append('type', gtype);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/special_gallery', formData).subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.getGallery();
                    this.getGalleryFourWheel();
                }else{
    this._snackBar.open(res["result"]["message"], '', {
          duration: 2000,
        });
                }
            },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
                duration: 2000,
              });
        });
}
}

@Component({
  selector: 'gallery-form',
  templateUrl: 'gallery-form.html',
})
export class GalleryForm {
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    galleryForm: FormGroup;
    loading = false;
    gallery_id = 0;
    media_path: string='';
    media_type: string='';
    thumb_path: string='';
    file_name: string = 'Select Picture';
    file_name_thumb: string = 'Select Thumb';
    constructor(
    public dialogRef: MatDialogRef<GalleryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
         this.galleryForm = new FormGroup({
      'title': new FormControl('', Validators.required),
      'media_type': new FormControl('', Validators.required),
      'type': new FormControl('', Validators.required),
      'description': new FormControl('')
        });
        if(this.data != null) {
                this.galleryForm.patchValue({
           title: this.data.title,
           media_type: this.data.media_type,
           type: this.data.type,
           description: this.data.description
        });
        this.gallery_id = this.data.gallery_id;
        this.media_path=this.data.media_path;
        this.media_type=this.data.media_type
        }
    }
   
    fileProgress(fileInput: any, name: string, path: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/upload_file', formData).subscribe(
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
    changeUploadText() : void {
      if(this.galleryForm.value.media_type == 'video') {
          this.file_name = 'Select Video';
      } else {
          this.file_name = 'Select Picture';
      }
  }
  onSubmit() {
          if (this.galleryForm.invalid || this.media_path == '') {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          var url = '';
          if(this.gallery_id != 0) {
              formData.append('title', this.galleryForm.value.title);
          formData.append('media_type', this.galleryForm.value.media_type);
          formData.append('type', this.galleryForm.value.type);
          formData.append('description', this.galleryForm.value.description);
          if(this.media_path && this.media_path != '') {
          formData.append('media_path', this.media_path);
          }
          if(this.thumb_path && this.thumb_path!= '') {
              formData.append('thumb_path', this.thumb_path);
          }
          url = 'update_record/gallery/gallery_id = '+this.gallery_id;
          } else {
                formData.append('title', this.galleryForm.value.title);
          formData.append('media_type', this.galleryForm.value.media_type);
          formData.append('type', this.galleryForm.value.type);
          formData.append('media_path', this.media_path);
          formData.append('description', this.galleryForm.value.description);
          formData.append('thumb_path', this.thumb_path);
          url = 'insert_gallery';
          }
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
  removeMedia(url) {
      this[url] = '';
      if(url === 'media_path') {
          this.file_name= 'Select Picture';
      }     
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
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/gallery/gallery_id='+this.gallery_id).subscribe(
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
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})
 
export class PictureViewGallery {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
    data: any;
    constructor(
    public dialogRef: MatDialogRef<PictureViewGallery>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.datapopup != null) { 
            this.action = this.datapopup.action;
            this.data = this.datapopup.data;
            if(this.datapopup.action == 'delete') {
                this.member_id = this.datapopup.data;
            }
    }
}
        }  