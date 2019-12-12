import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { AngularEditorConfig } from '@kolkov/angular-editor';

@Component({
  selector: 'app-testimonial',
  templateUrl: './testimonial.component.html',
  styleUrls: ['./testimonial.component.css']
})
export class TestimonialComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getTestimonial();
  }
    getTestimonial(): void {
     this.httpClient.get<any>('http://ghmindia.com/api/v1/get_testimonial')
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
     openDialog(id, res): void {
            var data = null;
          if(id != 0) {
          this[res].forEach(val=> {
               if(parseInt(val.testimonial_id) === parseInt(id)) {
                    data = val;
                    return false;
               }
             });
          }
        const dialogRef = this.dialog.open(TestimonialForm, {
          minWidth: "40%",
          maxWidth: "40%",
          data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
               this.getTestimonial();
            }
        });
      }
     confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
                data = id;
      }
    const dialogRef = this.dialog.open(TestimonialDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
            this.getTestimonial();
       }
    });
}
}


@Component({
  selector: 'testimonial-form',
  templateUrl: 'testimonial-form.html',
})
export class TestimonialForm {
    testimonialForm: FormGroup;
    loading = false;
    testimonial_id = 0;
  constructor(
    public dialogRef: MatDialogRef<TestimonialForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.testimonialForm = new FormGroup ({
            'name': new FormControl('', Validators.required),
            'company': new FormControl('', Validators.required),
            'description': new FormControl('', Validators.required),
        });
        
        if(this.data != null) {
           this.testimonialForm.patchValue({
           name: this.data.name,
           company: this.data.company,
           description: this.data.description,
        });
            this.testimonial_id = this.data.testimonial_id;
        }else {
            this.testimonialForm.patchValue({
                    date: new Date()
                });
        }
    }

    onSubmit() {
      if (this.testimonialForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.testimonial_id != 0) {
        formData.append('name', this.testimonialForm.value.name);
        formData.append('company', this.testimonialForm.value.company);
        formData.append('description', this.testimonialForm.value.description);
        url = 'update_record/testimonial/testimonial_id = '+this.testimonial_id;
      } else {
        formData.append('name', this.testimonialForm.value.name);
        formData.append('company', this.testimonialForm.value.company);
        formData.append('description', this.testimonialForm.value.description);
        url = 'insert_testimonial';
      }
      this.httpClient.post('http://ghmindia.com/api/v1/'+url, formData).subscribe(
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
          height: '300px',
          minHeight: '300px',
          maxHeight: '300px',
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
  selector: 'testimonial-delete-confirmation',
  templateUrl: 'testimonial-delete-confirmation.html',
})
export class TestimonialDelete {
    loading = false;
    testimonial_id = 0;
    constructor(
    public dialogRef: MatDialogRef<TestimonialDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.testimonial_id = this.data;
    }
}

  confirmDelete() {
      if (this.testimonial_id == null || this.testimonial_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://ghmindia.com/api/v1/delete_record/testimonial/testimonial_id='+this.testimonial_id).subscribe(
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