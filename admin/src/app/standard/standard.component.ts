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
  selector: 'app-standard',
  templateUrl: './standard.component.html',
  styleUrls: ['./standard.component.css']
})
export class StandardComponent implements OnInit {

   standard = []; 

  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getstandard();
  }

 getstandard(): void {
      this.httpClient.get<any>('http://localhost/Projects/Feringo/website/api/v1/get_standard')
      .subscribe(
        (res) => {
           this.standard = res["result"]["data"];
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
        if (parseInt(val.standard_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(StandardForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (typeof result != 'undefined' && result !== false && result !== 'false') {
        this.getstandard();
      }
    });
  } 
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(StandardDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(typeof result !== 'undefined' && result !== false && result !== 'false') {
          this.getstandard();
       }
    });
    }

}





@Component({
  selector: 'standard-form',
  templateUrl: 'standard-form.html',
})


export class StandardForm {
  //image_url: string = 'http://localhost/Projects/Feringo/website/api/v1/';
  standardForm: FormGroup;
  loading = false;
  standard_id = 0;  

  constructor(
    public dialogRef: MatDialogRef<StandardForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.standardForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'status': new FormControl(''),
    });
    if (this.data != null) {
      this.standardForm.patchValue({
        name: this.data.name,
        description: this.data.description,
        status: this.data.status,
      });
      this.standard_id = this.data.standard_id;
      //this.image_path = this.data.image_path;
    }
  }


   onSubmit() {
    if (this.standardForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.standard_id != 0) {
      formData.append('name', this.standardForm.value.name);
      formData.append('description', this.standardForm.value.description);
      formData.append('status', this.standardForm.value.status);
      url = 'update_record/standard/standard_id = ' + this.standard_id;
    } else {
      formData.append('name', this.standardForm.value.name);
      formData.append('description', this.standardForm.value.description);
      formData.append('status', this.standardForm.value.status);
      url = 'insert_standard';
    }
    this.httpClient.post('http://localhost/Projects/Feringo/website/api/v1/' + url, formData).subscribe(
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
  selector: 'standard-delete-confirmation',
  templateUrl: 'standard-delete-confirmation.html',
})
export class StandardDelete {
    loading = false;
    standard_id = 0;
    constructor(
    public dialogRef: MatDialogRef<StandardDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.standard_id = this.data;
    }
}

  confirmDelete() {
      if (this.standard_id == null || this.standard_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/Projects/Feringo/website/api/v1/delete_record/standard/standard_id='+this.standard_id).subscribe(
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
