import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';

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
     this.httpClient.get<any>('https://localhost/project/fresche/api/v1/get_testimonial')
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
      this.httpClient.get('https://localhost/project/fresche/api/v1/delete_record/testimonial/testimonial_id='+this.testimonial_id).subscribe(
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