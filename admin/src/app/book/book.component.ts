import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AngularEditorConfig } from '@kolkov/angular-editor';

@Component({
  selector: 'app-book',
  templateUrl: './book.component.html',
  styleUrls: ['./book.component.css']
})
export class BookComponent implements OnInit {
  book = [];
  subject = [];
  selectedbookind = 0;
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getsubject();
  }
  getsubject(): void {
    this.httpClient.get<any>('../api/v1/get_subject_for_books_tab')
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
  getBook(ev): void {
    this.selectedbookind = ev.index;
    this.httpClient.get<any>('../api/v1/get_book_by_subject/' + this.subject[ev.index].subject_id)
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
  openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.book_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(BookForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getBook({ index: this.selectedbookind });
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(BookDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getBook({ index: this.selectedbookind });
      }
    });
  }
}


@Component({
  selector: 'book-form',
  templateUrl: 'book-form.html',
})
export class BookForm {
  image_url: string = '../api/v1/';
  image_path: string = '';
  book_image: string = 'Select Book Image';
  bookForm: FormGroup;
  loading = false;
  book_id = 0;
  book = [];
  subject = [];
  constructor(
    public dialogRef: MatDialogRef<BookForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.bookForm = new FormGroup({
      'book_name': new FormControl('', Validators.required),
      'author': new FormControl('', Validators.required),
      'year': new FormControl('', Validators.required),
      'subject_id': new FormControl('', Validators.required),
      'chapter_note': new FormControl('', []),
      'solved_example': new FormControl('', []),
      'show_s_example': new FormControl('', Validators.required)
    });
    if (this.data != null) {
      this.bookForm.patchValue({
        book_name: this.data.book_name,
        author: this.data.book_author,
        year: this.data.book_year,
        subject_id: this.data.subject_id,
        chapter_note: this.data.chapter_note,
        solved_example: this.data.solved_example,
        show_s_example: this.data.show_s_example
      });
      this.image_path = this.data.image_path;
      this.book_id = this.data.book_id;
    }
    this.getSubject();
  }

  editorConfig: AngularEditorConfig = {
    editable: true,
    spellcheck: true,
    height: '100px',
    minHeight: '100px',
    maxHeight: '100px',
    width: 'auto',
    minWidth: '0',
    translate: 'no',
    enableToolbar: true,
    showToolbar: true,
    defaultParagraphSeparator: '',
    defaultFontName: 'Arial',
    defaultFontSize: '3',
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
    uploadUrl: '../api/v1/upload_image',
    sanitize: true,
    toolbarPosition: 'top',
  };

  getSubject(): void {
    this.httpClient.get<any>('../api/v1/get_subject_for_books_tab')
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

  onSubmit() {
    if (this.bookForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    formData.append('book_name', this.bookForm.value.book_name);
    formData.append('book_year', this.bookForm.value.year);
    formData.append('book_author', this.bookForm.value.author);
    formData.append('subject_id', this.bookForm.value.subject_id);
    formData.append('chapter_note', this.bookForm.value.chapter_note);
    formData.append('solved_example', this.bookForm.value.solved_example);
    formData.append('show_s_example', this.bookForm.value.show_s_example);
    formData.append('image_path', this.image_path);
    var url = '';
    if (this.book_id != 0) {
      url = 'update_record/book/book_id = ' + this.book_id;
    } else {
      url = 'insert_book';
    }
    this.httpClient.post('../api/v1/' + url, formData).subscribe(
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
    this.httpClient.post('../api/v1/upload_file', formData).subscribe(
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
    if (url === 'image_path') {
      this.book_image = 'Select Book Image';
    }
  }
}

@Component({
  selector: 'book-delete-confirmation',
  templateUrl: 'book-delete-confirmation.html',
})
export class BookDelete {
  loading = false;
  book_id = 0;
  constructor(
    public dialogRef: MatDialogRef<BookDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.book_id = this.data;
    }
  }

  confirmDelete() {
    if (this.book_id == null || this.book_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('../api/v1/delete_record/book/book_id=' + this.book_id).subscribe(
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
