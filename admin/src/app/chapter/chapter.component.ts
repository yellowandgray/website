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
  subject = [];
  chapter = [];
  selectedchapind = 0;
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getsubject();
  }
getsubject(): void {
    this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_subject')
      .subscribe(
        (res) => {
          this.subject = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  getChapter(ev): void {
    this.selectedchapind = ev.index;
        this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_chapter_by_subject/'+this.subject[ev.index].subject_id)
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
      data: {data: data, subject: this.subject}
    });

    dialogRef.afterClosed().subscribe(result => {
      if(typeof result !== 'undefined' && result !== false && result !== 'false') {
          this.getChapter({index: this.selectedchapind});
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
       if(typeof result !== 'undefined' && result !== false && result !== 'false') {
          this.getChapter({index: this.selectedchapind});
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
    subject = [];
    constructor(
    public dialogRef: MatDialogRef<ChapterForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.chapterForm = new FormGroup ({
            'name': new FormControl('', Validators.required),
            'description': new FormControl('', Validators.required),
            'subject_id': new FormControl('', Validators.required)
        });
        this.subject = this.data.subject;
        console.log(this.data);
        if(this.data.data != null) {
           this.chapterForm.patchValue({
            name: this.data.data.name,
            description: this.data.data.description,
            subject_id: this.data.data.subject_id,
        });
            this.chapter_id = this.data.data.chapter_id;
        }
    }

    onSubmit() {
      if (this.chapterForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
formData.append('name', this.chapterForm.value.name);
        formData.append('description', this.chapterForm.value.description);
        formData.append('subject_id', this.chapterForm.value.subject_id);
      var url = '';
          if(this.chapter_id != 0) {
        url = 'update_record/chapter/chapter_id = '+this.chapter_id;
      } else {
        url = 'insert_chapter';
      }
      this.httpClient.post('http://localhost/microview/feringo/api/v1/'+url, formData).subscribe(
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

editorConfig: AngularEditorConfig = {
    editable: true,
    spellcheck: true,
    height: '100px',
    minHeight: '100px',
    maxHeight: '100px',
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
      { class: 'arial', name: 'Arial' },
      { class: 'times-new-roman', name: 'Times New Roman' },
      { class: 'calibri', name: 'Calibri' },
      { class: 'comic-sans-ms', name: 'Comic Sans MS' }
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
      this.httpClient.get('http://localhost/microview/feringo/api/v1/delete_record/chapter/chapter_id='+this.chapter_id).subscribe(
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