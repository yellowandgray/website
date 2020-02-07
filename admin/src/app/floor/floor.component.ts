import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-floor',
  templateUrl: './floor.component.html',
  styleUrls: ['./floor.component.css']
})
export class FloorComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
      this.getFloor();
  }
  getFloor(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_floor')
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
        if (parseInt(val.floor_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(FloorForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getFloor();
      }
    });
  }

  
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(FloorDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getFloor();
      }
    });
  }

}


@Component({
  selector: 'floor-form',
  templateUrl: 'floor-form.html',
})
export class FloorForm {
  floorForm: FormGroup;
  floor_id = 0;
  loading = false;
  train: any[];
  constructor(
    public dialogRef: MatDialogRef<FloorForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
      this.floorForm = new FormGroup ({
        'floor_name': new FormControl('', Validators.required),
        'train_id': new FormControl('', Validators.required),
        'status': new FormControl('', Validators.required),
      });
      if(this.data != null) {
        this.floorForm.patchValue({
        floor_name: this.data.floor_name,
        train_id: this.data.train_id,
        status: this.data.status
     });
        this.floor_id = this.data.topic_id;
     }
     this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_train').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.train = res["result"]["data"];
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
      if (this.floorForm.invalid) {
        return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
      if(this.floor_id != 0) {
        formData.append('floor_name', this.floorForm.value.floor_name);
        formData.append('train_id', this.floorForm.value.train_id);
        formData.append('status', this.floorForm.value.status);
        url = 'update_record/floor/floor_id = ' + this.floor_id;
      } else {
        formData.append('floor_name', this.floorForm.value.floor_name);
        formData.append('train_id', this.floorForm.value.train_id);
        formData.append('status', this.floorForm.value.status);
        url = 'insert_floor';
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
  selector: 'floor-delete-confirmation',
  templateUrl: 'floor-delete-confirmation.html',
})
export class FloorDelete {
  loading = false;
  floor_id = 0;
  constructor(
    public dialogRef: MatDialogRef<FloorDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.floor_id = this.data;
    }
  }

  confirmDelete() {
    if (this.floor_id == null || this.floor_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/delete_record/floor/floor_id=' + this.floor_id).subscribe(
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
