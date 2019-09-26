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

    getNews(): void {
  this.httpClient.get<any>('http://localhost:3000/news')
  .subscribe(
          (res)=>{
              this.result = res.data;
        },
        (error)=>{
            this._snackBar.open(error.statusText, '', {
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
        if(result !== false && result !== 'false') {
            this.getNews();
        }
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
    constructor(
    public dialogRef: MatDialogRef<NewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}

    ngOnInit() {
      this.newsForm = new FormGroup({
      'club_type': new FormControl('', Validators.required),
      'club_category': new FormControl('', Validators.required),
      'club_name': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'media': new FormControl('', Validators.required),
      'moto_text': new FormControl('', Validators.required),
      'author_name': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'description_1': new FormControl('', Validators.required)
        });
    }

  onSubmit() {
      if (this.newsForm.invalid) {
            return;
      }
      this.loading = true;
      this.httpClient.post('http://localhost:3000/news', {club_type: this.newsForm.value.name, club_category: this.newsForm.value.name, club_name: this.newsForm.value.name, title: this.newsForm.value.name, date: this.newsForm.value.name, media: this.newsForm.value.name, banner: this.newsForm.value.name, moto_text: this.newsForm.value.name, description: this.newsForm.value.name, sub_banner: this.newsForm.value.name, sub_banner_1: this.newsForm.value.name, description_1: this.newsForm.value.name, author_name: this.newsForm.value.name, created_by: 'Admin', updated_by: 'Admin'}).subscribe(
          (res)=>{
            this.loading = false;
            this.dialogRef.close(true);
        },
        (error)=>{
            this.loading = false;
            this._snackBar.open(error.statusText, '', {
      duration: 2000,
    });
        }
        );
  }
}