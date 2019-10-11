import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-newsletter',
  templateUrl: './newsletter.component.html',
  styleUrls: ['./newsletter.component.css']
})
export class NewsletterComponent implements OnInit {
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getNewsletter();
  }
  getNewsletter(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_newsletter')
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
  openDialog(id): void  {
    var data = null;
      if(id != 0) { 
      this.result.forEach(val=> {
           if(parseInt(val.newsletter_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(NewsletterForm, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getNewsletter();
       }
    });
}
  confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(NewsletterDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
     this.getNewsletter();
       }
    });
}

}

@Component({
  selector: 'newsletter-form',
  templateUrl: 'newsletter-form.html',
})
export class NewsletterForm {
    newsletterForm: FormGroup;
    loading = false;
    newsletter_id = 0;
    constructor(
    public dialogRef: MatDialogRef<NewsletterForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.newsletterForm = new FormGroup({
            'email': new FormControl('', Validators.required)
        });
        if(this.data != null) { 
            this.newsletterForm.patchValue({ 
                email: this.data.email
        })
        this.newsletter_id = this.data.newsletter_id;
    }
}

  onSubmit() {
      if (this.newsletterForm.invalid) {
            return;
      }
      var formData = new FormData();
      var url = '';
      if(this.newsletter_id != 0) {
        formData.append('email', this.newsletterForm.value.email);
        url = 'update_record/category/category_id = '+this.newsletter_id;
      }
      this.loading = true;
      this.httpClient.post('../toowheel/api/v1/'+url, formData).subscribe(
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
  selector: 'newsletter-delete-confirmation',
  templateUrl: 'newsletter-delete-confirmation.html',
})
export class NewsletterDelete {
    loading = false;
    newsletter_id = 0;
    constructor(
    public dialogRef: MatDialogRef<NewsletterDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.newsletter_id = this.data;
    }
}

  confirmDelete() {
      if (this.newsletter_id == null || this.newsletter_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('../toowheel/api/v1/delete_record/newsletter/newsletter_id='+this.newsletter_id).subscribe(
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