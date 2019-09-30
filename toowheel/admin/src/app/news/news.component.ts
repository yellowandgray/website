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
  selector: 'app-news',
  templateUrl: './news.component.html',
  styleUrls: ['./news.component.css']
})
export class NewsComponent implements OnInit {
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

    ngOnInit() {
         this.getNews();
     }
     image_url: string = 'http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/';
       getNews(): void {
     this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_news')
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
    const dialogRef = this.dialog.open(NewsForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
}

}

@Component({
  selector: 'news-form',
  templateUrl: 'news-form.html',
})
export class NewsForm {
    newsForm: FormGroup;
    loading = false;
    cover_image: string = 'Choose Cover Image';
    banner_image_1: string = 'Choose Cover Image';
    banner_image_2: string = 'Choose Cover Image';
    constructor(
    public dialogRef: MatDialogRef<NewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}

    ngOnInit() {
      this.newsForm = new FormGroup({
      'club_type': new FormControl('', Validators.required),
      'category_id': new FormControl('', Validators.required),
      'club_id': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'media': new FormControl('', Validators.required),
      'moto_text': new FormControl('', Validators.required),
      'author_name': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'description_1': new FormControl('', Validators.required)
      });
    }
    fileProgress(fileInput: any, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[field] = fileData.name;
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
      if (this.newsForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
          formData.append('club_type', this.newsForm.value.club_type);
          formData.append('category_id', this.newsForm.value.media_type);
          formData.append('cover_image', this.cover_image);
          formData.append('club_id', this.newsForm.value.club_type);
          formData.append('title', this.newsForm.value.title);
          formData.append('media', this.newsForm.value.media);
          formData.append('author_name', this.newsForm.value.author_name);
          formData.append('date', this.newsForm.value.date);
          formData.append('moto_text', this.newsForm.value.moto_text);
          formData.append('description', this.newsForm.value.description);
          formData.append('description_1', this.newsForm.value.description_1);
      this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/insert_news', formData).subscribe(
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