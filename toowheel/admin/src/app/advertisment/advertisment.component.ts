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
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getAdvertisment();
  }
  image_url: string = 'http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/';
    getAdvertisment(): void {
  this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_advertisment')
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
    const dialogRef = this.dialog.open(AdvertismentForm, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            
        }
    });
    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getAdvertisment();
       }
    });
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
    file_name: string = 'Select Picture';
    constructor(
    public dialogRef: MatDialogRef<AdvertismentForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
    ngOnInit() {
      this.advertismentForm = new FormGroup({
      'title': new FormControl('', Validators.required),
      'type': new FormControl('', Validators.required),
      'url': new FormControl('', Validators.required)
        });
    }
    fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        this.file_name = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/upload_file', formData).subscribe(
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
          formData.append('title', this.advertismentForm.value.title);
          formData.append('type', this.advertismentForm.value.type);
          formData.append('image', this.image);
          formData.append('url', this.advertismentForm.value.url);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/insert_advertisement', formData).subscribe(
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