import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

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
     this.httpClient.get<any>('http://localhost/microview/fresche/api/v1/get_newsletter')
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
      this.httpClient.get('http://localhost/microview/fresche/api/v1/delete_record/newsletter/newsletter_id='+this.newsletter_id).subscribe(
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