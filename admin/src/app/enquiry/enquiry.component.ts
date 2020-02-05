import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
import * as moment from 'moment';

@Component({
  selector: 'app-enquiry',
  templateUrl: './enquiry.component.html',
  styleUrls: ['./enquiry.component.css']
})
export class EnquiryComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getEnquiry();
  }

  getEnquiry(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/schoolrunner/api/v1/get_inquiry')
      .subscribe(
        (res) => {
          this.result = res["result"]["data"];
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
        if (parseInt(val.id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(EnquiryForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getEnquiry();
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(EnquiryDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getEnquiry();
      }
    });
  }

}


@Component({
  selector: 'enquiry-form',
  templateUrl: 'enquiry-form.html',
})
export class EnquiryForm {
  image_url: string = 'http://www.lemonandshadow.com/schoolrunner/api/v1/';
  enquiryform: FormGroup;
  loading = false;
  id = 0;
  constructor(
    public dialogRef: MatDialogRef<EnquiryForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.enquiryform = new FormGroup({
      'name_student': new FormControl(''),
      'name_father': new FormControl(''),
      'name_mother': new FormControl(''),
      'occupation': new FormControl(''),
      'date_of_birth': new FormControl(''),
      'gender': new FormControl(''),
      'admission': new FormControl(''),
      'where_from': new FormControl(''),
      'address': new FormControl(''),
      'contact_no': new FormControl(''),
      'why_mekana': new FormControl(''),
      'type_day': new FormControl(''),
      'came_know_mekana': new FormControl(''),
      'expect_school': new FormControl(''),
      'student_van': new FormControl(''),
      'father_smart_phone': new FormControl(''),
      'father_net_connection': new FormControl(''),
      'mother_smart_phone': new FormControl(''),
      'mother_net_connection': new FormControl(''),
      'stuent_cell_phone': new FormControl(''),
      'what_purpose': new FormControl('')
    })
    if (this.data != null) {
      this.enquiryform.patchValue({
        name_student: this.data.name_student,
        name_father: this.data.name_father,
        name_mother: this.data.name_mother,
        occupation: this.data.occupation,
        gender: this.data.gender,
        date_of_birth: this.data.date_of_birth,
        admission: this.data.admission,
        where_from: this.data.where_from,
        address: this.data.address,
        contact_no: this.data.contact_no,
        why_mekana: this.data.why_mekana,
        type_day: this.data.type_day,
        came_know_mekana: this.data.came_know_mekana,
        expect_school: this.data.expect_school,
        student_van: this.data.student_van,
        father_smart_phone: this.data.father_smart_phone,
        father_net_connection: this.data.father_net_connection,
        mother_smart_phone: this.data.mother_smart_phone,
        mother_net_connection: this.data.mother_net_connection,
        stuent_cell_phone: this.data.stuent_cell_phone,
        what_purpose: this.data.what_purpose
      });
      this.id = this.data.id;
    } else {
      this.enquiryform.patchValue({
        date_of_birth: new Date()
      });
    }
  }


  onSubmit() {
    if (this.enquiryform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.id != 0) {
      formData.append('name_student', this.enquiryform.value.name_student);
      formData.append('name_father', this.enquiryform.value.name_father);
      formData.append('name_mother', this.enquiryform.value.name_mother);
      formData.append('occupation', this.enquiryform.value.occupation);
      formData.append('gender', this.enquiryform.value.gender);
      formData.append('date_of_birth', moment(this.enquiryform.value.date_of_birth).format('YYYY-MM-DD'));
      formData.append('admission', this.enquiryform.value.admission);
      formData.append('where_from', this.enquiryform.value.where_from);
      formData.append('address', this.enquiryform.value.address);
      formData.append('contact_no', this.enquiryform.value.contact_no);
      formData.append('why_mekana', this.enquiryform.value.why_mekana);
      formData.append('type_day', this.enquiryform.value.type_day);
      formData.append('came_know_mekana', this.enquiryform.value.came_know_mekana);
      formData.append('expect_school', this.enquiryform.value.expect_school);
      formData.append('student_van', this.enquiryform.value.student_van);
      formData.append('father_smart_phone', this.enquiryform.value.father_smart_phone);
      formData.append('father_net_connection', this.enquiryform.value.father_net_connection);
      formData.append('mother_smart_phone', this.enquiryform.value.mother_smart_phone);
      formData.append('mother_net_connection', this.enquiryform.value.mother_net_connection);
      formData.append('stuent_cell_phone', this.enquiryform.value.stuent_cell_phone);
      formData.append('what_purpose', this.enquiryform.value.what_purpose);
      url = 'update_record/inquiry_form/id = ' + this.id;
    } else {
      formData.append('name_student', this.enquiryform.value.name_student);
      formData.append('name_father', this.enquiryform.value.name_father);
      formData.append('name_mother', this.enquiryform.value.name_mother);
      formData.append('occupation', this.enquiryform.value.occupation);
      formData.append('gender', this.enquiryform.value.gender);
      formData.append('date_of_birth', moment(this.enquiryform.value.date_of_birth).format('YYYY-MM-DD'));
      formData.append('admission', this.enquiryform.value.admission);
      formData.append('where_from', this.enquiryform.value.where_from);
      formData.append('address', this.enquiryform.value.address);
      formData.append('contact_no', this.enquiryform.value.contact_no);
      formData.append('why_mekana', this.enquiryform.value.why_mekana);
      formData.append('type_day', this.enquiryform.value.type_day);
      formData.append('came_know_mekana', this.enquiryform.value.came_know_mekana);
      formData.append('expect_school', this.enquiryform.value.expect_school);
      formData.append('student_van', this.enquiryform.value.student_van);
      formData.append('father_smart_phone', this.enquiryform.value.father_smart_phone);
      formData.append('father_net_connection', this.enquiryform.value.father_net_connection);
      formData.append('mother_smart_phone', this.enquiryform.value.mother_smart_phone);
      formData.append('mother_net_connection', this.enquiryform.value.mother_net_connection);
      formData.append('stuent_cell_phone', this.enquiryform.value.stuent_cell_phone);
      formData.append('what_purpose', this.enquiryform.value.what_purpose);
      url = 'insert_memberscheck';
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

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('http://www.lemonandshadow.com/schoolrunner/api/v1/upload_file', formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this[path] = res["result"]["data"];
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
      });
  }
}


@Component({
  selector: 'enquiry-delete-confirmation',
  templateUrl: 'enquiry-delete-confirmation.html',
})
export class EnquiryDelete {
  loading = false;
  id = 0;
  constructor(
    public dialogRef: MatDialogRef<EnquiryDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.id = this.data;
    }
  }

  confirmDelete() {
    if (this.id == null || this.id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/schoolrunner/api/v1/delete_record/inquiry_form/id=' + this.id).subscribe(
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
