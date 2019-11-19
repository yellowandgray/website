import { Component, OnInit, Inject } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';

@Component({
  selector: 'app-kural',
  templateUrl: './kural.component.html',
  styleUrls: ['./kural.component.css']
})
export class KuralComponent implements OnInit {
    result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getThirukkural();
  }
    getThirukkural(): void {
    this.httpClient.get<any>('https://localhost/project/thirukkural/api/v1/get_thirukkural')
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
           if(parseInt(val.thirukkural_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
        }
        const dialogRef = this.dialog.open(KuralForm, {
            minWidth: "50%",
            maxWidth: "50%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
              this.getThirukkural();
            }
        });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
                    data = id;
          }
        const dialogRef = this.dialog.open(ThirukkuralDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
                 this.getThirukkural();
           }
        });
    }
}

@Component({
  selector: 'kural-form',
  templateUrl: 'kural-form.html',
})
export class KuralForm {
    kuralForm: FormGroup;
    loading = false;
    muppaal:any[];
    iyalkal:any[];
    adhigaram:any[];
    thirukkural_id = 0;
    constructor(
    public dialogRef: MatDialogRef<KuralForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
       this.kuralForm = new FormGroup({
      'muppaal_id': new FormControl('', Validators.required),
      'iyal_id': new FormControl('', Validators.required),
      'adhigaram_id': new FormControl('', Validators.required),
      'thirukkural': new FormControl('', Validators.required),
      'kural_no': new FormControl('', Validators.required),
      }); 
        if(this.data != null) {
           this.kuralForm.patchValue({
           muppaal_id: this.data.muppaal_id,
           iyal_id: this.data.iyal_id,
           adhigaram_id: this.data.adhigaram_id,
           thirukkural: this.data.thirukkural,
           kural_no: this.data.kural_no,
        });
        this.thirukkural_id = this.data.thirukkural_id;
        } else {
            this.kuralForm.patchValue
        }  
        this.httpClient.get('http://localhost/project/thirukkural/api/v1/get_muppaal').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.muppaal = res["result"]["data"];
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
        this.httpClient.get('http://localhost/project/thirukkural/api/v1/get_iyalkal').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.iyalkal = res["result"]["data"];
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
        this.httpClient.get('http://localhost/project/thirukkural/api/v1/get_adhigaram').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.adhigaram = res["result"]["data"];
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

    onSubmit() {
        if (this.kuralForm.invalid) {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          var url = '';
          if(this.thirukkural_id != 0) {
          formData.append('muppaal_id', this.kuralForm.value.muppaal_id);
          formData.append('iyal_id', this.kuralForm.value.iyal_id);
          formData.append('adhigaram_id', this.kuralForm.value.adhigaram_id);
          formData.append('thirukkural', this.kuralForm.value.thirukkural);
          formData.append('kural_no', this.kuralForm.value.kural_no);
          url = 'update_record/thirukkural/thirukkural_id = '+this.thirukkural_id;
        }else{
          formData.append('muppaal_id', this.kuralForm.value.muppaal_id);
          formData.append('iyal_id', this.kuralForm.value.iyal_id);
          formData.append('adhigaram_id', this.kuralForm.value.adhigaram_id);
          formData.append('thirukkural', this.kuralForm.value.thirukkural);
          formData.append('kural_no', this.kuralForm.value.kural_no);
          url = 'insert_kural';
        }
        this.httpClient.post('https://localhost/project/thirukkural/api/v1/'+url, formData).subscribe(
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
            this._snackBar.open(error.statusText, '', {
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
}

@Component({
  selector: 'kural-delete-confirmation',
  templateUrl: 'kural-delete-confirmation.html',
})
export class ThirukkuralDelete {
    loading = false;
    thirukkural_id = 0;
    constructor(
    public dialogRef: MatDialogRef<ThirukkuralDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.thirukkural_id = this.data;
    }
}

  confirmDelete() {
      if (this.thirukkural_id == null || this.thirukkural_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://localhost/project/thirukkural/api/v1/delete_record/thirukkural/thirukkural_id='+this.thirukkural_id).subscribe(
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