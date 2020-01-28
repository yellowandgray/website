import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-chapter',
  templateUrl: './chapter.component.html',
  styleUrls: ['./chapter.component.css']
})
export class ChapterComponent implements OnInit {
  chapter = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getChapter();
  }
  getChapter(): void {
        this.httpClient.get<any>('../api/v1/get_chapter')
        .subscribe(
                (res)=>{
                    this.chapter = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }
  openDialog(id, res): void {
    var data = null;
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.chapter_id) === parseInt(id)) {
                data = val;
                return false;
            }
        });
    }
    const dialogRef = this.dialog.open(ChapterForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
          this.getChapter();
        }
    });
}

    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(ChapterDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
          this.getChapter();
       }
    });
    }
}

@Component({
  selector: 'chapter-form',
  templateUrl: 'chapter-form.html',
})
export class ChapterForm {
    chapterForm: FormGroup;
    loading = false;
    chapter_id = 0;
    constructor(
    public dialogRef: MatDialogRef<ChapterForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.chapterForm = new FormGroup ({
            'chapter': new FormControl('', Validators.required),
            'status': new FormControl('', Validators.required)
        });
        if(this.data != null) {
           this.chapterForm.patchValue({
            chapter: this.data.chapter,
            status: this.data.status,
        });
            this.chapter_id = this.data.chapter_id;
        }
    }

    onSubmit() {
      if (this.chapterForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.chapter_id != 0) {
        formData.append('chapter', this.chapterForm.value.chapter);
        formData.append('status', this.chapterForm.value.status);
        url = 'update_record/chapter/chapter_id = '+this.chapter_id;
      } else {
        formData.append('chapter', this.chapterForm.value.chapter);
        formData.append('status', this.chapterForm.value.status);
        url = 'insert_chapter';
      }
      this.httpClient.post('../api/v1/'+url, formData).subscribe(
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
  selector: 'chapter-delete-confirmation',
  templateUrl: 'chapter-delete-confirmation.html',
})
export class ChapterDelete {
    loading = false;
    chapter_id = 0;
    constructor(
    public dialogRef: MatDialogRef<ChapterDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.chapter_id = this.data;
    }
}

  confirmDelete() {
      if (this.chapter_id == null || this.chapter_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('../api/v1/delete_record/chapter/chapter_id='+this.chapter_id).subscribe(
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