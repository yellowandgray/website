import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-topic',
  templateUrl: './topic.component.html',
  styleUrls: ['./topic.component.css']
})
export class TopicComponent implements OnInit {
  subject = [];
  chapter = [];
  book = [];
  topic = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }
  selectedchapind = 0;
  selectedbookind = 0;
  selectedtopicindex = 0;
  course = 0;
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
  getChildTabs(ev): void {
    this.course = this.subject[ev.index].course_id;
    if (this.course == 1) {
      this.getChapter(ev);
    } else {
      this.getBook(ev);
    }
  }
  getChapter(ev): void {
    this.chapter = [];
    this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_chapter_by_subject/' + this.subject[ev.index].subject_id)
      .subscribe(
        (res) => {
          this.chapter = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  getBook(ev): void {
    this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_book_by_subject/' + this.subject[ev.index].subject_id)
      .subscribe(
        (res) => {
          this.book = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  getBookChapter(ev): void {
    this.selectedbookind = ev.index;
    this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_chapter_by_book/' + this.book[ev.index].book_id)
      .subscribe(
        (res) => {
          this.chapter = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  getTopic(ev): void {
    this.selectedtopicindex = ev.index;
    this.topic = [];
    if (typeof this.chapter[ev.index] !== 'undefined') {
      this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_topic_by_chapter/' + this.chapter[ev.index].chapter_id)
        .subscribe(
          (res) => {
            this.topic = res["result"]["data"];
          },
          (error) => {
            this._snackBar.open(error["statusText"], '', {
              duration: 2000,
            });
          }
        );
    }
  }
  openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.topic_id) === parseInt(id)) {
          val.subject_id = this.chapter[this.selectedtopicindex].subject_id;
          val.book_id = this.chapter[this.selectedtopicindex].book_id;
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(TopicForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: { data: data, subject: this.subject }
    });

    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getTopic({ index: this.selectedtopicindex });
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(TopicDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getTopic({ index: this.selectedtopicindex });
      }
    });
  }
}

@Component({
  selector: 'topic-form',
  templateUrl: 'topic-form.html',
})
export class TopicForm {
  topicForm: FormGroup;
  loading = false;
  topic_id = 0;
  course = 0;
  subject: any[];
  chapter: any[];
  book: any[];
  constructor(
    public dialogRef: MatDialogRef<TopicForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.topicForm = new FormGroup({
      'subject_id': new FormControl('', Validators.required),
      'chapter_id': new FormControl('', Validators.required),
      'book_id': new FormControl('', Validators.required),
      'name': new FormControl('', Validators.required)
    });
    this.subject = this.data.subject;
    if (this.data.data != null) {
      this.topicForm.patchValue({
        name: this.data.data.name,
        chapter_id: this.data.data.chapter_id,
        subject_id: this.data.data.subject_id,
        book_id: this.data.data.book_id
      });
      this.topic_id = this.data.data.topic_id;
      this.getChapter();
      if (this.data.data.book_id != 0) {
        this.getChapterByBook();
      }
    }
  }
  getChapter(): void {
    this.subject.forEach(val => {
      if (parseInt(val.subject_id) === parseInt(this.topicForm.value.subject_id)) {
        this.course = parseInt(val.course_id);
        return false;
      }
    });
    if (this.course == 1) {
      this.topicForm.patchValue({
        book_id: 0
      });
      this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_chapter_by_subject/' + this.topicForm.value.subject_id)
        .subscribe(
          (res) => {
            this.chapter = res["result"]["data"];
          },
          (error) => {
            this._snackBar.open(error["statusText"], '', {
              duration: 2000,
            });
          }
        );
    } else {
      this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_book_by_subject/' + this.topicForm.value.subject_id)
        .subscribe(
          (res) => {
            this.book = res["result"]["data"];
          },
          (error) => {
            this._snackBar.open(error["statusText"], '', {
              duration: 2000,
            });
          }
        );
    }
  }
  getChapterByBook(): void {
    this.httpClient.get<any>('http://localhost/microview/feringo/api/v1/get_chapter_by_book/' + this.topicForm.value.book_id)
      .subscribe(
        (res) => {
          this.chapter = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  onSubmit() {
    if (this.topicForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    formData.append('name', this.topicForm.value.name);
    formData.append('chapter_id', this.topicForm.value.chapter_id);
    //formData.append('description', this.topicForm.value.description);
    if (this.topic_id != 0) {
      url = 'update_record/topic/topic_id = ' + this.topic_id;
    } else {
      url = 'insert_topic';
    }
    this.httpClient.post('http://localhost/microview/feringo/api/v1/' + url, formData).subscribe(
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
  selector: 'topic-delete-confirmation',
  templateUrl: 'topic-delete-confirmation.html',
})
export class TopicDelete {
  loading = false;
  topic_id = 0;
  constructor(
    public dialogRef: MatDialogRef<TopicDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.topic_id = this.data;
    }
  }

  confirmDelete() {
    if (this.topic_id == null || this.topic_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://localhost/microview/feringo/api/v1/delete_record/topic/topic_id=' + this.topic_id).subscribe(
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
