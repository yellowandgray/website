import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';
import { AngularEditorConfig } from "@kolkov/angular-editor";

@Component({
  selector: 'app-member-home',
  templateUrl: './member-home.component.html',
  styleUrls: ['./member-home.component.css']
})
export class MemberHomeComponent implements OnInit {
    
  image_url: string = 'http://localhost/project/exam-horse-sample/api/v1/';
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }
  banner = [];
  news = [];
  ngOnInit() {
    this.getBanner();
    this.getNews();
  }
  getBanner(): void {
    this.httpClient.get<any>('http://localhost/project/exam-horse-sample/api/v1/get_banner')
      .subscribe(
        (res) => {
          this.banner = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  openDialogBanner(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.member_home_id) === parseInt(id)) {
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
      if (result !== false && result !== 'false') {
        this.getBanner();
      }
    });
  }

  openView(id, res): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(BannerViewForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
            }
        });
    }

    
  confirmDeleteBanner(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(BannerDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getBanner();
      }
    });
  }
    
    getNews(): void {
    this.httpClient.get<any>('http://localhost/project/exam-horse-sample/api/v1/get_news')
      .subscribe(
        (res) => {
          this.news = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }

    openDialogNews(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.news_feed_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(NewsForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getNews();
      }
    });
  }
    openNewsView(id, res): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(NewsViewForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
            }
        });
    }

    
  confirmDeleteNews(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(NewsDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getNews();
      }
    });
  }
}


@Component({
  selector: 'banner-form',
  templateUrl: 'banner-form.html',
})
export class BannerForm {
  image_url: string = 'http://localhost/project/exam-horse-sample/api/v1/';
  bannerForm: FormGroup;
  loading = false;
  member_home_id = 0;
  member_banner: string = 'Member Home Banner';
  banner_image: string = '';
  constructor(
    public dialogRef: MatDialogRef<BannerForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.bannerForm = new FormGroup({
      'title': new FormControl('', Validators.required)
    });
    if (this.data != null) {
      this.bannerForm.patchValue({
        title: this.data.title,
      });
      this.member_home_id = this.data.member_home_id;
      this.banner_image = this.data.banner_image;
    }
  }

  onSubmit() {
    if (this.bannerForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.member_home_id != 0) {
      formData.append('title', this.bannerForm.value.title);
      formData.append('banner_image', this.banner_image);
      url = 'update_record/member_home/member_home_id = ' + this.member_home_id;
    } else {
      formData.append('title', this.bannerForm.value.title);
      formData.append('member_banner', this.banner_image);
      url = 'insert_banner';
    }
    this.httpClient.post('http://localhost/project/exam-horse-sample/api/v1/' + url, formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
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
    this.httpClient.post('http://localhost/project/exam-horse-sample/api/v1/upload_file', formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this[path] = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });
  }

  removeMedia(url) {
    this[url] = '';
    if (url === 'banner_image') {
      this.member_banner = 'Member Home Banner';
    }
  }
}


@Component({
  selector: 'banner-view',
  templateUrl: 'banner-view.html',
})
export class BannerViewForm {
  image_url: string = 'http://localhost/project/exam-horse-sample/api/v1/';
  action: string = '';
  loading = false;
  member_home_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<BannerViewForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.member_home_id = this.datapopup.data;
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
  member_home_id = 0;
  constructor(
    public dialogRef: MatDialogRef<BannerDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.member_home_id = this.data;
    }
  }

  confirmDelete() {
    if (this.member_home_id == null || this.member_home_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://localhost/project/exam-horse-sample/api/v1/delete_record/member_home/member_home_id=' + this.member_home_id).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }
}


@Component({
  selector: 'news-form',
  templateUrl: 'news-form.html',
})
export class NewsForm {
  image_url: string = 'http://localhost/project/exam-horse-sample/api/v1/';
  newsForm: FormGroup;
  loading = false;
  news_feed_id = 0;
  news_image: string = 'News Feed Thumbnail';
  image_path: string = '';
  constructor(
    public dialogRef: MatDialogRef<NewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.newsForm = new FormGroup({
      'news_title': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
    });
    if (this.data != null) {
      this.newsForm.patchValue({
        news_title: this.data.news_title,
        description: this.data.description,
      });
      this.news_feed_id = this.data.news_feed_id;
      this.image_path = this.data.image_path;
    }
  }

  onSubmit() {
    if (this.newsForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.news_feed_id != 0) {
      formData.append('news_title', this.newsForm.value.news_title);
      formData.append('description', this.newsForm.value.description);
      formData.append('image_path', this.image_path);
      url = 'update_record/news_feed/news_feed_id = ' + this.news_feed_id;
    } else {
      formData.append('news_title', this.newsForm.value.news_title);
      formData.append('description', this.newsForm.value.description);
      formData.append('news_image', this.image_path);
      url = 'insert_news';
    }
    this.httpClient.post('http://localhost/project/exam-horse-sample/api/v1/' + url, formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
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
    this.httpClient.post('http://localhost/project/exam-horse-sample/api/v1/upload_file', formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this[path] = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });
  }

  removeMedia(url) {
    this[url] = '';
    if (url === 'news_image') {
      this.image_path = 'News Feed Thumbnail';
    }
  }
    editorConfig: AngularEditorConfig = {
    editable: true,
    spellcheck: true,
    height: "100px",
    minHeight: "100px",
    maxHeight: "100px",
    width: "auto",
    minWidth: "0",
    translate: "no",
    enableToolbar: true,
    showToolbar: true,
    placeholder: "Enter text here...",
    defaultParagraphSeparator: "",
    defaultFontName: "Arial",
    defaultFontSize: "3",
    fonts: [
      { class: "arial", name: "Arial" },
      { class: "times-new-roman", name: "Times New Roman" },
      { class: "calibri", name: "Calibri" },
      { class: "comic-sans-ms", name: "Comic Sans MS" }
    ],
    customClasses: [
      {
        name: "quote",
        class: "quote"
      },
      {
        name: "redText",
        class: "redText"
      },
      {
        name: "titleText",
        class: "titleText",
        tag: "h1"
      }
    ],
    uploadUrl: "http://localhost/project/exam-horse-sample/api/v1/upload_image",
    sanitize: true,
    toolbarPosition: "top"
  };
}


@Component({
  selector: 'news-view',
  templateUrl: 'news-view.html',
})

export class NewsViewForm {
  image_url: string = 'http://localhost/project/exam-horse-sample/api/v1/';
  action: string = '';
  loading = false;
  news_feed_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<NewsViewForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.news_feed_id = this.datapopup.data;
      }
    }
  }
}

@Component({
  selector: 'news-delete-confirmation',
  templateUrl: 'news-delete-confirmation.html',
})
export class NewsDelete {
  loading = false;
  news_feed_id = 0;
  constructor(
    public dialogRef: MatDialogRef<NewsDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.news_feed_id = this.data;
    }
  }

  confirmDelete() {
    if (this.news_feed_id == null || this.news_feed_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://localhost/project/exam-horse-sample/api/v1/delete_record/news_feed/news_feed_id=' + this.news_feed_id).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }
}