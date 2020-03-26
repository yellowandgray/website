import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-year',
  templateUrl: './year.component.html',
  styleUrls: ['./year.component.css']
})
export class YearComponent implements OnInit {
  year = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getYear();
  }
  getYear(): void {
        this.httpClient.get<any>('http://localhost/project/exam-horse/api/v1/get_year')
        .subscribe(
                (res)=>{
                    this.year = res["result"]["data"];
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
           if(parseInt(val.year_id) === parseInt(id)) {
                data = val;
                return false;
            }
        });
    }
    const dialogRef = this.dialog.open(YearForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
          this.getYear();
        }
    });
}

    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(YearDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
          this.getYear();
       }
    });
    }
}

@Component({
  selector: 'year-form',
  templateUrl: 'year-form.html',
})
export class YearForm {
    yearForm: FormGroup;
    loading = false;
    year_id = 0;
    constructor(
    public dialogRef: MatDialogRef<YearForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.yearForm = new FormGroup ({
            'year': new FormControl('', Validators.required),
            'status': new FormControl('', Validators.required)
        });
        if(this.data != null) {
           this.yearForm.patchValue({
            year: this.data.year,
            status: this.data.status,
        });
            this.year_id = this.data.year_id;
        }
    }

    onSubmit() {
      if (this.yearForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.year_id != 0) {
        formData.append('year', this.yearForm.value.year);
        formData.append('status', this.yearForm.value.status);
        url = 'update_record/year/year_id = '+this.year_id;
      } else {
        formData.append('year', this.yearForm.value.year);
        formData.append('status', this.yearForm.value.status);
        url = 'insert_year';
      }
      this.httpClient.post('http://localhost/project/exam-horse/api/v1/'+url, formData).subscribe(
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
  selector: 'year-delete-confirmation',
  templateUrl: 'year-delete-confirmation.html',
})
export class YearDelete {
    loading = false;
    year_id = 0;
    constructor(
    public dialogRef: MatDialogRef<YearDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.year_id = this.data;
    }
}

  confirmDelete() {
      if (this.year_id == null || this.year_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/exam-horse/api/v1/delete_record/year/year_id='+this.year_id).subscribe(
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
