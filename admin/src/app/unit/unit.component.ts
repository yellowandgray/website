import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-unit',
  templateUrl: './unit.component.html',
  styleUrls: ['./unit.component.css']
})
export class UnitComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getUnit();
  }
  getUnit(): void {
    this.httpClient.get<any>('http://localhost/project/three-levan/api/v1/get_unit')
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
        if (parseInt(val.unit_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(UnitForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getUnit();
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(UnitDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getUnit();
      }
    });
  }

}


@Component({
  selector: 'unit-form',
  templateUrl: 'unit-form.html',
})
export class UnitForm {
  unitform: FormGroup;
  loading = false;
  unit_id = 0;
  constructor(
    public dialogRef: MatDialogRef<UnitForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.unitform = new FormGroup({
      'name': new FormControl('', Validators.required),
      'status': new FormControl('', Validators.required),
    })
    if (this.data != null) {
      this.unitform.patchValue({
        name: this.data.name,
        status: this.data.status,
      });
      this.unit_id = this.data.unit_id;
    }
  }


  onSubmit() {
    if (this.unitform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.unit_id != 0) {
      formData.append('name', this.unitform.value.name);
      formData.append('status', this.unitform.value.status);
      url = 'update_record/unit/unit_id = ' + this.unit_id;
    } else {
      formData.append('name', this.unitform.value.name);
      formData.append('status', this.unitform.value.status);
      url = 'insert_unit';
    }
    this.httpClient.post('http://localhost/project/three-levan/api/v1/' + url, formData).subscribe(
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
  selector: 'unit-delete-confirmation',
  templateUrl: 'unit-delete-confirmation.html',
})
export class UnitDelete {
  loading = false;
  unit_id = 0;
  constructor(
    public dialogRef: MatDialogRef<UnitDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.unit_id = this.data;
    }
  }

  confirmDelete() {
    if (this.unit_id == null || this.unit_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://localhost/project/three-levan/api/v1/delete_record/unit/unit_id=' + this.unit_id).subscribe(
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
