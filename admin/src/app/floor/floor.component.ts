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
        if (parseInt(val.electromech_floor_id) === parseInt(id)) {
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
  electromech_floor_id = 0;
  loading = false;
  //train: any[];
  constructor(
    public dialogRef: MatDialogRef<FloorForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
      this.floorForm = new FormGroup ({
        'name': new FormControl('', Validators.required)
      });
      if(this.data != null) {
        this.floorForm.patchValue({
        name: this.data.name
     });
        this.electromech_floor_id = this.data.electromech_floor_id;
     }
    //  this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_train').subscribe(
    //   (res) => {
    //     if (res["result"]["error"] === false) {
    //       this.train = res["result"]["data"];
    //     } else {
    //       this._snackBar.open(res["result"]["message"], '', {
    //         duration: 2000,
    //       });
    //     }
    //   },
    //   (error) => {
    //     this._snackBar.open(error["statusText"], '', {
    //       duration: 2000,
    //     });
    //   });
    }
    
    onSubmit() {
      if (this.floorForm.invalid) {
        return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
      if(this.electromech_floor_id != 0) {
        formData.append('name', this.floorForm.value.name);
        url = 'update_record/electromech_floor/electromech_floor_id = ' + this.electromech_floor_id;
      } else {
        formData.append('name', this.floorForm.value.name);
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
  electromech_floor_id = 0;
  constructor(
    public dialogRef: MatDialogRef<FloorDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.electromech_floor_id = this.data;
    }
  }

  confirmDelete() {
    if (this.electromech_floor_id == null || this.electromech_floor_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/delete_record/electromech_floor/electromech_floor_id=' + this.electromech_floor_id).subscribe(
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
