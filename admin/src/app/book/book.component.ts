import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-book',
  templateUrl: './book.component.html',
  styleUrls: ['./book.component.css']
})
export class BookComponent implements OnInit {
  book = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getBook();
  }
  getBook(): void {
    this.httpClient.get<any>('http://localhost/Projects/Feringo/website/api/v1/get_book')
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
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.book_id) === parseInt(id)) {
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
      if(typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getBook();
        }
    });
}

confirmDelete(id): void  {
  var data = null;
    if(id != 0) { 
      data = id;
    }
const dialogRef = this.dialog.open(BookDelete, {
  minWidth: "40%",
  maxWidth: "40%",
  data: data
});
dialogRef.afterClosed().subscribe(result => {
 if(typeof result !== 'undefined' && result !== false && result !== 'false') {
    this.getBook();
 }
});
}
}


@Component({
  selector: 'book-form',
  templateUrl: 'book-form.html',
})
export class BookForm {
    bookForm: FormGroup;
    loading = false;
    book_id = 0;
    book = [];
    constructor(
    public dialogRef: MatDialogRef<BookForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.bookForm = new FormGroup ({
            'book_name': new FormControl('', Validators.required),
            'book_name_id': new FormControl('', Validators.required),
        });
        if(this.data != null) {
           this.bookForm.patchValue({
            book_name: this.data.book_name,
            book_name_id: this.data.book_name_id,
        });
            this.book_id = this.data.book_id;
        }
    }

    onSubmit() {
      if (this.bookForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
        formData.append('book_name', this.bookForm.value.book_name);
        formData.append('book_name_id', this.bookForm.value.book_name_id);
      var url = '';
          if(this.book_id != 0) {
        url = 'update_record/book/book_id = '+this.book_id;
      } else {
        url = 'insert_book';
      }
      this.httpClient.post('http://localhost/Projects/Feringo/website/api/v1/'+url, formData).subscribe(
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
    if(this.data != null) { 
        this.book_id = this.data;
    }
}

  confirmDelete() {
      if (this.book_id == null || this.book_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/Projects/Feringo/website/api/v1/delete_record/book/book_id='+this.book_id).subscribe(
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
