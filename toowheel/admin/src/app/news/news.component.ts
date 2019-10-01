import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

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

  openDialog(id): void  {
    const dialogRef = this.dialog.open(NewsForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getNews();
       }
    });
}

  openGalleryDialog(id): void  {
    const dialogRef = this.dialog.open(NewsGalleryForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: {
            news_id: id
        }
    });

    dialogRef.afterClosed().subscribe(result => {
        console.log('Closed');
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
    categories:any[];
    clubs:any[];
    medias:any[];
    cover_image: string = 'Choose Cover Image';
    thumb_image: string = 'Choose Thumb Image';
    banner_image_1: string = 'Choose Cover Image';
    banner_image_2: string = 'Choose Cover Image';
    cover_image_path: string;
    thumb_image_path: string;
    banner_image_1_path: string;
    banner_image_2_path: string;
    constructor(
    public dialogRef: MatDialogRef<NewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
    ngOnInit() {
      this.newsForm = new FormGroup({
      'type': new FormControl('', Validators.required),
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
      this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_medias').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.medias = res["result"]["data"];
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
    getCategory(): void {
       this.loading = true;
          this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_'+this.newsForm.value.type+'_category').subscribe(
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
    getClub(): void {
       this.loading = true;
          this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_club_by_category/'+this.newsForm.value.category_id).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.clubs = res["result"]["data"];
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
      if (this.newsForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
          formData.append('type', this.newsForm.value.type);
          formData.append('category_id', this.newsForm.value.category_id);
          formData.append('club_id', this.newsForm.value.club_id);
          formData.append('cover_image', this.cover_image_path);
          formData.append('title', this.newsForm.value.title);
          formData.append('media_id', this.newsForm.value.media);
          formData.append('author_name', this.newsForm.value.author_name);
          formData.append('date', this.newsForm.value.date);
          formData.append('thumb_image', this.thumb_image_path);
          formData.append('banner_image_1', this.banner_image_1_path);
          formData.append('banner_image_2', this.banner_image_2_path);
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

@Component({
  selector: 'news-gallery-form',
  templateUrl: 'news-gallery-form.html',
})
export class NewsGalleryForm {
    loading = false;
    news_id:any;
    result:any[];
    constructor(
    public dialogRef: MatDialogRef<NewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.news_id = this.data.news_id;
    }
    ngOnInit() {
      this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_news_gallery_by_news/'+this.news_id).subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.result = res["result"]["data"];
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

  submitPhotos(fileInput: any) {
      if (!<File>fileInput.target.files[0]) {
            return;
      }
      var fileData = <File>fileInput.target.files[0];
      this.loading = true;
      var formData = new FormData();
          formData.append('type', this.newsForm.value.type);
          formData.append('category_id', this.newsForm.value.category_id);
          formData.append('club_id', this.newsForm.value.club_id);
          formData.append('cover_image', this.cover_image_path);
          formData.append('title', this.newsForm.value.title);
          formData.append('media_id', this.newsForm.value.media);
          formData.append('author_name', this.newsForm.value.author_name);
          formData.append('date', this.newsForm.value.date);
          formData.append('thumb_image', this.thumb_image_path);
          formData.append('banner_image_1', this.banner_image_1_path);
          formData.append('banner_image_2', this.banner_image_2_path);
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