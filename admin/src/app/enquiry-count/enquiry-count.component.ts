import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
import * as moment from 'moment';

@Component({
  selector: 'app-enquiry-count',
  templateUrl: './enquiry-count.component.html',
  styleUrls: ['./enquiry-count.component.css']
})
export class EnquiryCountComponent implements OnInit {
  result = null;
  classes = [];
  year = [];
  selectedyearind = 0;
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getYear();
  }

  getYear(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/schoolrunner/api/v1/get_year1')
      .subscribe(
        (res) => {
          this.year = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }

  getEnquiryCount(ev): void {
    this.selectedyearind = ev.index;
    this.httpClient.get<any>('http://www.lemonandshadow.com/schoolrunner/api/v1/get_enquiry_count_by_year/'+this.year[ev.index].year_id)
      .subscribe(
        (res) => {
          this.classes = res["result"]["classes"];
            this.result = null;
           if(res["result"]["error"] == false) {
                this.result = res["result"]["data"];
            }
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
        if (parseInt(val.enquiry_count_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(EnquiryCountForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getEnquiryCount({index: this.selectedyearind});
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(EnquiryCountDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getEnquiryCount({index: this.selectedyearind});
      }
    });
  }

}


@Component({
  selector: 'enquiry-count-form',
  templateUrl: 'enquiry-count-form.html',
})
export class EnquiryCountForm {
  image_url: string = 'http://www.lemonandshadow.com/schoolrunner/api/v1/';
  enquirycountform: FormGroup;
  loading = false;
  enquiry_count_id = 0;
  class: any[];
  year: any[];
  constructor(
    public dialogRef: MatDialogRef<EnquiryCountForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.enquirycountform = new FormGroup({
      'year_id': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'class_id': new FormControl(''),
      'count': new FormControl('', Validators.required),
    })
    if (this.data != null) {
      this.enquirycountform.patchValue({
        year_id: this.data.year_id,
        date: this.data.date,
        class_id: this.data.class_id,
        count: this.data.count
      });
      this.enquiry_count_id = this.data.enquiry_count_id;
    } else {
      this.enquirycountform.patchValue({
        date: new Date()
      });
    }
    this.httpClient.get('http://www.lemonandshadow.com/schoolrunner/api/v1/get_class').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.class = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });
    this.httpClient.get('http://www.lemonandshadow.com/schoolrunner/api/v1/get_year1').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.year = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });
  }


  onSubmit() {
    if (this.enquirycountform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.enquiry_count_id != 0) {
      formData.append('year_id', this.enquirycountform.value.year_id);
      formData.append('date', moment(this.enquirycountform.value.date).format('YYYY-MM-DD'));
      formData.append('class_id', this.enquirycountform.value.class_id);
      formData.append('count', this.enquirycountform.value.count);
      url = 'update_record/inquiry_form/enquiry_count_id = ' + this.enquiry_count_id;
    } else {
      formData.append('year_id', this.enquirycountform.value.year_id);
      formData.append('date', moment(this.enquirycountform.value.date).format('YYYY-MM-DD'));
      formData.append('class_id', this.enquirycountform.value.class_id);
      formData.append('count', this.enquirycountform.value.count);
      url = 'insert_enquiry_count';
    }
    this.httpClient.post('http://www.lemonandshadow.com/schoolrunner/api/v1/' + url, formData).subscribe(
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


@Component({
  selector: 'enquiry-count-delete-confirmation',
  templateUrl: 'enquiry-count-delete-confirmation.html',
})
export class EnquiryCountDelete {
  loading = false;
  enquiry_count_id = 0;
  constructor(
    public dialogRef: MatDialogRef<EnquiryCountDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.enquiry_count_id = this.data;
    }
  }

  confirmDelete() {
    if (this.enquiry_count_id == null || this.enquiry_count_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/schoolrunner/api/v1/delete_record/enquiry_count/enquiry_count_id=' + this.enquiry_count_id).subscribe(
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