import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-train',
  templateUrl: './train.component.html',
  styleUrls: ['./train.component.css']
})
export class TrainComponent implements OnInit {
  train = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getTrain();
  }

  getTrain(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_train')
      .subscribe(
        (res) => {
          this.train = res["result"]["data"];
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
        if (parseInt(val.train_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(TrainForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (typeof result !== 'undefined' && result !== false && result !== 'false') {
        this.getTrain();
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(TrainDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getTrain();
      }
    });
  }

}


@Component({
  selector: 'train-form',
  templateUrl: 'train-form.html',
})
export class TrainForm {
  trainForm: FormGroup;
  loading = false;
  train_id = 0;
  constructor(
    public dialogRef: MatDialogRef<TrainForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.trainForm = new FormGroup({
      'train_name': new FormControl('', Validators.required),
      'status': new FormControl('', Validators.required)
    });
    if (this.data != null) {
      this.trainForm.patchValue({
        train_name: this.data.train_name,
        status: this.data.status,
      });
      this.train_id = this.data.train_id;
    }
  }

  onSubmit() {
    if (this.trainForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.train_id != 0) {
      formData.append('train_name', this.trainForm.value.train_name);
      formData.append('status', this.trainForm.value.status);
      url = 'update_record/train/train_id = ' + this.train_id;
    } else {
      formData.append('train_name', this.trainForm.value.train_name);
      formData.append('status', this.trainForm.value.status);
      url = 'insert_train';
    }
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/' + url, formData).subscribe(
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
  selector: 'train-delete-confirmation',
  templateUrl: 'train-delete-confirmation.html',
})
export class TrainDelete {
  loading = false;
  train_id = 0;
  constructor(
    public dialogRef: MatDialogRef<TrainDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.train_id = this.data;
    }
  }

  confirmDelete() {
    if (this.train_id == null || this.train_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/delete_record/train/train_id=' + this.train_id).subscribe(
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

