import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-media',
  templateUrl: './media.component.html',
  styleUrls: ['./media.component.css']
})
export class MediaComponent implements OnInit {
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getMedia();
  }
  getMedia(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_medias')
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
           if(parseInt(val.media_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(MediaForm, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getMedia();
       }
    });
}
  confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(MediaDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getMedia();
       }
    });
}
}

@Component({
  selector: 'media-form',
  templateUrl: 'media-form.html',
})
export class MediaForm {
    mediaForm: FormGroup;
    loading = false;
    media_id = 0;
    constructor(
    public dialogRef: MatDialogRef<MediaForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.mediaForm = new FormGroup({
            'name': new FormControl('', Validators.required)
        });
        if(this.data != null) { 
            this.mediaForm.patchValue({ 
                name: this.data.name
        })
        this.media_id = this.data.media_id;
    }
}

  onSubmit() {
      if (this.mediaForm.invalid) {
            return;
      }
      var formData = new FormData();
      var url = '';
      if(this.media_id != 0) {
        formData.append('name', this.mediaForm.value.name);
        url = 'update_record/media/media_id = '+this.media_id;
      } else {
        formData.append('name', this.mediaForm.value.name);
        url = 'insert_media';
      }
      this.loading = true;
      this.httpClient.post('../toowheel/api/v1/'+url, formData).subscribe(
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
  selector: 'media-delete-confirmation',
  templateUrl: 'media-delete-confirmation.html',
})
export class MediaDelete {
    loading = false;
    media_id = 0;
    constructor(
    public dialogRef: MatDialogRef<MediaForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.media_id = this.data;
    }
}

  confirmDelete() {
      if (this.media_id == null || this.media_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('../toowheel/api/v1/delete_record/media/media_id='+this.media_id).subscribe(
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