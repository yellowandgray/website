import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-press-release',
  templateUrl: './press-release.component.html',
  styleUrls: ['./press-release.component.css']
})
export class PressReleaseComponent implements OnInit {
    result = [];  
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getPressRelease();
  }
    getPressRelease(): void {
     this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_press_release')
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
        const dialogRef = this.dialog.open(PressReleaseForm, {
            minWidth: "40%",
            maxWidth: "40%"
        });

        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
            this.getPressRelease();
             }
          });
    }
    
    confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
                data = id;
      }
    const dialogRef = this.dialog.open(PressreleaseDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getPressRelease();
       }
    });
    }
}

@Component({
  selector: 'press-release-form',
  templateUrl: 'press-release-form.html',
})
export class PressReleaseForm {
    pressreleaseForm: FormGroup;
    loading = false;
    press_release_id: string;
    image_path_1: string = 'Choose Image';
    image_path: string;
    constructor(
    public dialogRef: MatDialogRef<PressReleaseForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}

ngOnInit() {
    this.pressreleaseForm = new FormGroup({
      'type': new FormControl('', Validators.required),
      'category_id': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'author_name': new FormControl('', Validators.required),
      'media': new FormControl('', Validators.required),
      'youtube_link': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required)
        });
    }
    
    fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/upload_file', formData).subscribe(
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
      if (this.pressreleaseForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
          formData.append('type', this.pressreleaseForm.value.type);
          formData.append('category_id', this.pressreleaseForm.value.category_id);
          formData.append('title', this.pressreleaseForm.value.title);
          formData.append('media_id', this.pressreleaseForm.value.media);
          formData.append('author_name', this.pressreleaseForm.value.author_name);
          formData.append('date', this.pressreleaseForm.value.date);
          formData.append('description', this.pressreleaseForm.value.description);
          formData.append('youtube_link', this.pressreleaseForm.value.youtube_link);
          formData.append('image_path', this.pressreleaseForm.value.image_path);
      this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/insert_press_release', formData).subscribe(
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
  selector: 'press-release-delete-confirmation',
  templateUrl: 'press-release-delete-confirmation.html',
})
export class PressreleaseDelete {
    loading = false;
    press_release_id = 0;
    constructor(
    public dialogRef: MatDialogRef<PressreleaseDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.press_release_id = this.data;
    }
}

  confirmDelete() {
      if (this.press_release_id == null || this.press_release_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/delete_record/press_release/press_release_id='+this.press_release_id).subscribe(
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