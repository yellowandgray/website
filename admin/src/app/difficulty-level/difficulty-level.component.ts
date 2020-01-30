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
  selector: 'app-difficulty-level',
  templateUrl: './difficulty-level.component.html',
  styleUrls: ['./difficulty-level.component.css']
})
export class DifficultyLevelComponent implements OnInit {

  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }
  difficult = [];
  ngOnInit() {
    this.getDifficult();
  }
  getDifficult(): void {
    this.httpClient.get<any>('../api/v1/get_difficult')
      .subscribe(
        (res) => {
          this.difficult = res["result"]["data"];
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
        if (parseInt(val.difficult_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(DifficultForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (typeof result != 'undefined' && result !== false && result !== 'false') {
        this.getDifficult();
      }
    });
  }
    confirmDelete(id): void {
        var data = null;
        if (id != 0) {
          data = id;
        }
        const dialogRef = this.dialog.open(DifficultDelete, {
          minWidth: "40%",
          maxWidth: "40%",
          data: data
        });
        dialogRef.afterClosed().subscribe(result => {
          if (typeof result !== 'undefined' && result !== false && result !== 'false') {
            this.getDifficult();
          }
        });
  }
}



@Component({
  selector: 'difficult-form',
  templateUrl: 'difficult-form.html',
})
export class DifficultForm {
  difficultForm: FormGroup;
  loading = false;
  difficult_id = 0;
  constructor(
    public dialogRef: MatDialogRef<DifficultForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.difficultForm = new FormGroup({
      'title': new FormControl('', Validators.required),
      //'description': new FormControl('', Validators.required)
    });
    if (this.data != null) {
      this.difficultForm.patchValue({
        title: this.data.name,
        //description: this.data.description,
      });
      this.difficult_id = this.data.difficult_id;
    }
  }

  onSubmit() {
    if (this.difficultForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.difficult_id != 0) {
      formData.append('title', this.difficultForm.value.title);
      //formData.append('description', this.difficultForm.value.description);
      url = 'update_record/difficult/difficult_id = ' + this.difficult_id;
    } else {
      formData.append('title', this.difficultForm.value.title);
      //formData.append('description', this.difficultForm.value.description);
      url = 'insert_difficult';
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
  selector: 'difficult-delete-confirmation',
  templateUrl: 'difficult-delete-confirmation.html',
})
export class DifficultDelete {
  loading = false;
  difficult_id = 0;
  constructor(
    public dialogRef: MatDialogRef<DifficultDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.difficult_id = this.data;
    }
  }
  confirmDelete() {
    if (this.difficult_id == null || this.difficult_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('../api/v1/delete_record/difficult/difficult_id=' + this.difficult_id).subscribe(
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