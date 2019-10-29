import { Component, OnInit, Inject } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import * as moment from 'moment';

@Component({
  selector: 'app-news',
  templateUrl: './news.component.html',
  styleUrls: ['./news.component.css']
})
export class NewsComponent implements OnInit {
  searchTermTW: string = '';
  searchTermFW: string = '';
  sortdata_tw: string = '';
  sortdata_fw: string = '';
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
    ngOnInit() {
         this.getNews();
     }
     image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
       getNews(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_news')
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

         
         
  openDialog(id, res): void  {
    var data = null;
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.news_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(NewsForm, {
        minWidth: "80%",
        maxWidth: "80%",
         data: data
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

    openView(id, res): void  {
        var data = null;
        if(id != 0) { 
        this[res].forEach(val=> {
             if(parseInt(val.news_id) === parseInt(id)) {
                  data = val;
                  return false;
             }
           });
        }
        const dialogRef = this.dialog.open(NewsViewForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });

        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
            this.getNews();
          }
        });           
    }

confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(PictureViewNews, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            data: data,
            action: action
        }
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      //this.getMember();
      //this.getFourWheelMember();
       }
    });
}

    confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
                data = id;
      }
    const dialogRef = this.dialog.open(NewsDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
            this.getNews();
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
                (this[arr]).sort((a,b) => a.news_date.localeCompare(b.news_date));
            break;
            case 'created_z_a':
                (this[arr]).sort((a,b) => b.news_date.localeCompare(a.news_date));
            break;
            default:
            break;
        }
    }

}

@Component({
  selector: 'news-form',
  templateUrl: 'news-form.html',
})
export class NewsForm {
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    newsForm: FormGroup;
    loading = false;
    categories:any[];
    news_id = 0;
    clubs:any[];
    medias:any[];
    cover_image: string = 'Cover Image';
    thumb_image: string = 'Thumb Image';
    banner_image_1: string = 'Image 1';
    banner_image_2: string = 'Image 2';
    cover_image_path: string='';
    thumb_image_path: string='';
    banner_image_1_path: string='';
    banner_image_2_path: string='';
    constructor(
    public dialogRef: MatDialogRef<NewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.newsForm = new FormGroup({
      'type': new FormControl('', Validators.required),
      'category_id': new FormControl('', Validators.required),
      'club_id': new FormControl(),
      'title': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'media': new FormControl('', Validators.required),
      'moto_text': new FormControl('', Validators.required),
      'author_name': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'description_1': new FormControl('', Validators.required),
      'youtube_id': new FormControl(),
      'sponsor': new FormControl()
      });
        if(this.data != null) {
           this.newsForm.patchValue({
           type: this.data.type,
           category_id: this.data.category_id,
           club_id: this.data.club_id,
           title: this.data.title,
           date: this.data.news_date,
           media: this.data.media_id,
           moto_text: this.data.moto_text,
           author_name: this.data.author_name,
           description: this.data.description_1,
           description_1: this.data.description_2,
           youtube_id: this.data.youtube_id,
           sponsor: this.data.sponsor
        });
        this.news_id = this.data.news_id;
        this.cover_image_path = this.data.cover_image;
        this.thumb_image_path=this.data.thumb_image;
        this.banner_image_1_path=this.data.banner_1;
        this.banner_image_2_path=this.data.banner_2;
        this.getCategory();
        this.getClub();
    }else {
        this.newsForm.patchValue({
                date: new Date()
            });
    }
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_medias').subscribe(
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
    editorConfig: AngularEditorConfig = {
    editable: true,
      spellcheck: true,
      height: '600px',
      minHeight: '600px',
      maxHeight: '600px',
      width: 'auto',
      minWidth: '0',
      translate: 'yes',
      enableToolbar: true,
      showToolbar: true,
      placeholder: 'Enter text here...',
      defaultParagraphSeparator: '',
      defaultFontName: '',
      defaultFontSize: '',
      fonts: [
        {class: 'arial', name: 'Arial'},
        {class: 'times-new-roman', name: 'Times New Roman'},
        {class: 'calibri', name: 'Calibri'},
        {class: 'comic-sans-ms', name: 'Comic Sans MS'}
      ],
      customClasses: [
      {
        name: 'quote',
        class: 'quote',
      },
      {
        name: 'redText',
        class: 'redText'
      },
      {
        name: 'titleText',
        class: 'titleText',
        tag: 'h1',
      },
    ],
    uploadUrl: 'v1/image',
    sanitize: true,
    toolbarPosition: 'top',
};
    getCategory(): void {
       this.loading = true;
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_'+this.newsForm.value.type+'_category').subscribe(
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
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_club_by_category/'+this.newsForm.value.category_id).subscribe(
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
      if (this.newsForm.invalid) {
            return;
      }
      this.loading = true;
      var url = '';
      var formData = new FormData();
      if(this.news_id != 0) {
        formData.append('type', this.newsForm.value.type);
          formData.append('category_id', this.newsForm.value.category_id);
          formData.append('club_id', this.newsForm.value.club_id);
          if(this.cover_image_path && this.cover_image_path != '') {
          formData.append('cover_image', this.cover_image_path);
          }
          formData.append('title', this.newsForm.value.title);
          formData.append('media_id', this.newsForm.value.media);
          formData.append('author_name', this.newsForm.value.author_name);
          formData.append('news_date', moment(this.newsForm.value.date).format('YYYY-MM-DD'));
          if(this.thumb_image_path && this.thumb_image_path != '') {
          formData.append('thumb_image', this.thumb_image_path);
          }
          if(this.banner_image_1_path && this.banner_image_1_path != '') {
              formData.append('banner_1', this.banner_image_1_path);
          }
          if(this.banner_image_2_path && this.banner_image_2_path != '') {
               formData.append('banner_2', this.banner_image_2_path); 
          }
          formData.append('moto_text', this.newsForm.value.moto_text);
          formData.append('description_1', this.newsForm.value.description);
          formData.append('description_2', this.newsForm.value.description_1);
          formData.append('youtube_id', this.newsForm.value.youtube_id);
          formData.append('sponsor', this.newsForm.value.sponsor);
        url = 'update_record/news/news_id = '+this.news_id;
      } else {
        formData.append('type', this.newsForm.value.type);
          formData.append('category_id', this.newsForm.value.category_id);
          formData.append('club_id', this.newsForm.value.club_id);
          formData.append('cover_image', this.cover_image_path);
          formData.append('title', this.newsForm.value.title);
          formData.append('media_id', this.newsForm.value.media);
          formData.append('author_name', this.newsForm.value.author_name);
          formData.append('date', moment(this.newsForm.value.date).format('YYYY-MM-DD'));
          formData.append('thumb_image', this.thumb_image_path);
          formData.append('banner_image_1', this.banner_image_1_path);
          formData.append('banner_image_2', this.banner_image_2_path);
          formData.append('moto_text', this.newsForm.value.moto_text);
          formData.append('description', this.newsForm.value.description);
          formData.append('description_1', this.newsForm.value.description_1);
          formData.append('youtube_id', this.newsForm.value.youtube_id);
          formData.append('sponsor', this.newsForm.value.sponsor);
        url = 'insert_news';
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
      if(url === 'cover_image_path') {
          this.cover_image= 'Cover Image';
      }
       if(url === 'thumb_image_path') {
          this.thumb_image= 'Thumb Image';
      }
       if(url === 'banner_image_1_path') {
          this.banner_image_1= 'Image 1';
      }
       if(url === 'banner_image_2_path') {
          this.banner_image_2= 'Image 2';
      }
      
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
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    constructor(
    public dialogRef: MatDialogRef<NewsGalleryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.news_id = this.data.news_id;
    }
    ngOnInit() {
      this.getImages();
    }
    getImages(){
        this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_news_gallery_by_news/'+this.news_id).subscribe(
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

  submitPhotos(fileInput: any) {
      if (!fileInput.target.files[0]) {
            return;
      }
      for(var i = 0; i < (fileInput.target.files).length; i++) {
          this.loading = true;
      var formData = new FormData();
          formData.append('news_id', this.news_id);
          formData.append('file', <File>fileInput.target.files[i]);
      this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/insert_news_gallery', formData).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    if(i == (((fileInput.target.files).length) - 1)){
                    this.getImages();
                    }
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
  
  deleteGallery(id) {
      if (id == null || id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/news_gallery/news_gallery_id='+id).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.getImages();
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
  selector: 'news-delete-confirmation',
  templateUrl: 'news-delete-confirmation.html',
})
export class NewsDelete {
    loading = false;
    news_id = 0;
    constructor(
    public dialogRef: MatDialogRef<NewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.news_id = this.data;
    }
}

  confirmDelete() {
      if (this.news_id == null || this.news_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/news/news_id='+this.news_id).subscribe(
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
 
export class PictureViewNews {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
    data: any;
    constructor(
    public dialogRef: MatDialogRef<PictureViewNews>,
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
     

             
  @Component({
  selector: 'news-view-form',
  templateUrl: 'news-view-form.html',
})
 
export class NewsViewForm {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    newsForm: FormGroup;
    loading = false;
    media_path: string;
    news_id:any;
    result:any[];
    constructor(
    public dialogRef: MatDialogRef<NewsViewForm>,
    private sanitizer: DomSanitizer,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.newsForm = new FormGroup({
            'type': new FormControl('', Validators.required),
            'category_id': new FormControl('', Validators.required),
            'club_id': new FormControl(),
            'title': new FormControl('', Validators.required),
            'date': new FormControl('', Validators.required),
            'media': new FormControl('', Validators.required),
            'moto_text': new FormControl('', Validators.required),
            'author_name': new FormControl('', Validators.required),
            'description': new FormControl('', Validators.required),
            'description_1': new FormControl('', Validators.required),
            'youtube_id': new FormControl(),
            'sponsor': new FormControl()
        });
        if(this.data != null) {
            this.newsForm.patchValue({
           type: this.data.type,
           category_id: this.data.category_id,
           club_id: this.data.club_id,
           title: this.data.title,
           date: this.data.news_date,
           media: this.data.media_id,
           moto_text: this.data.moto_text,
           author_name: this.data.author_name,
           description: this.data.description_1,
           description_1: this.data.description_2,
           youtube_id: this.data.youtube_id,
           sponsor: this.data.sponsor
        });
            this.news_id = this.data.news_id;
            this.getImages();
        }
    }
    getImages(){
        this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_news_gallery_by_news/'+this.news_id).subscribe(
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
getYoutubeLink(yid) {
return this.sanitizer.bypassSecurityTrustResourceUrl('https://www.youtube.com/embed/'+yid);
}

}  
