import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-advertisment',
  templateUrl: './advertisment.component.html',
  styleUrls: ['./advertisment.component.css']
})
export class AdvertismentComponent implements OnInit {
searchTerm: string = '';
    sortdata: string = '';
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getAdvertisment();
  }
  image_url: string = 'https://www.toowheel.com/toowheel/api/v1/';
    getAdvertisment(): void {
  this.httpClient.get<any>('https://www.toowheel.com/toowheel/api/v1/get_advertisment')
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
   openDialog(id,res): void  {
    var data = null;
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.advertisement_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
   const dialogRef = this.dialog.open(AdvertismentForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
             this.getAdvertisment();
        }
    });
}
   

    confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
                data = id;
      }
    const dialogRef = this.dialog.open(AdvertismentDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getAdvertisment();
       }
    });
    }
    sortRecords(): void {
        switch(this.sortdata) {
            case 'title_a_z':
                (this.result).sort((a,b) => a.title.localeCompare(b.title));
            break;
            case 'title_z_a':
            (this.result).sort((a,b) => b.title.localeCompare(a.title));
            break;
            case 'created_a_z':
                (this.result).sort((a,b) => a.created_at.localeCompare(b.created_at));
            break;
            case 'created_z_a':
                (this.result).sort((a,b) => b.created_at.localeCompare(a.created_at));
            break;
            default:
            break;
        }
    }
}

@Component({
  selector: 'advertisment-form',
  templateUrl: 'advertisment-form.html',
})
export class AdvertismentForm {
    advertismentForm: FormGroup;
    loading = false;
    image: string;
    advertisment_id = 0;
    file_name: string = 'Select Picture';
    constructor(
    public dialogRef: MatDialogRef<AdvertismentForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.advertismentForm = new FormGroup({
      'title': new FormControl('', Validators.required),
      'type': new FormControl('', Validators.required),
      'url': new FormControl('', Validators.required)
        });
        if(this.data != null) {
                this.advertismentForm.patchValue({
           title: this.data.title,
           type: this.data.type,
           url: this.data.url
        });
        this.advertisment_id = this.data.advertisement_id;
        }
    }
    fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        this.file_name = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.image = res["result"]["data"];
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
          if (this.advertismentForm.invalid || this.image === '') {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          var url = '';
          if(this.advertisment_id != 0) {
             formData.append('title', this.advertismentForm.value.title);
          formData.append('type', this.advertismentForm.value.type);
          if(this.image && this.image!= '') {
          formData.append('image', this.image);
          }
          formData.append('url', this.advertismentForm.value.url); 
              url = 'update_record/advertisement/advertisement_id = '+this.advertisment_id;
          } else {
            formData.append('title', this.advertismentForm.value.title);
          formData.append('type', this.advertismentForm.value.type);
          formData.append('image', this.image);
          formData.append('url', this.advertismentForm.value.url);
          url = 'insert_advertisement';
          }
          this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/'+url, formData).subscribe(
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
  selector: 'advertisment-delete-confirmation',
  templateUrl: 'advertisment-delete-confirmation.html',
})
export class AdvertismentDelete {
    loading = false;
    advertisement_id = 0;
    constructor(
    public dialogRef: MatDialogRef<AdvertismentForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.advertisement_id = this.data;
    }
}

  confirmDelete() {
      if (this.advertisement_id == null || this.advertisement_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/toowheel/api/v1/delete_record/advertisement/advertisement_id='+this.advertisement_id).subscribe(
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
