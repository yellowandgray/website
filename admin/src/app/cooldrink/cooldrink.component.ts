import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-cooldrink',
  templateUrl: './cooldrink.component.html',
  styleUrls: ['./cooldrink.component.css']
})
export class CooldrinkComponent implements OnInit {

  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
  result = [];
  ngOnInit() {
    this.getDrinks();
  }
  image_url: string = '../api/v1/';
  getDrinks(): void {
    this.httpClient.get<any>('../api/v1/get_drinks')
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
        if (parseInt(val.cooldrink_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(CoolDrinkForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getDrinks();
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(CooldrinkDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getDrinks();
      }
    });
  }
  imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(CooldrinkImageView, {
      minWidth: "40%",
      maxWidth: "40%",
      data: {
        data: data,
        action: action
      }
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
      }
    });
  }


}


@Component({
  selector: 'cooldrink-form',
  templateUrl: 'cooldrink-form.html',
})
export class CoolDrinkForm {
  image_url: string = '../api/v1/';
  drinksform: FormGroup;
  loading = false;
  cooldrink_id = 0;
  unit: any[];
  product_image: string = 'Select Product Image';
  imageurl: string = '';
  constructor(
    public dialogRef: MatDialogRef<CoolDrinkForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.drinksform = new FormGroup({
      'name': new FormControl('', Validators.required),
      'amount': new FormControl('', Validators.required),
      'unit_id': new FormControl('', Validators.required),
      'unit_no': new FormControl('', Validators.required),
      'status': new FormControl('', Validators.required),
    })
    if (this.data != null) {
      this.drinksform.patchValue({
        name: this.data.name,
        amount: this.data.amount,
        unit_id: this.data.unit_id,
        unit_no: this.data.unit_no,
        status: this.data.status,
      });
      this.cooldrink_id = this.data.cooldrink_id;
      this.imageurl = this.data.imageurl;
    }
    this.httpClient.get('../api/v1/get_unit').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.unit = res["result"]["data"];
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
    if (this.drinksform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.cooldrink_id != 0) {
      formData.append('name', this.drinksform.value.name);
      formData.append('amount', this.drinksform.value.amount);
      formData.append('unit_id', this.drinksform.value.unit_id);
      formData.append('unit_no', this.drinksform.value.unit_no);
      formData.append('status', this.drinksform.value.status);
      formData.append('imageurl', this.imageurl);
      url = 'update_record/cooldrink/cooldrink_id = ' + this.cooldrink_id;
    } else {
      formData.append('name', this.drinksform.value.name);
      formData.append('amount', this.drinksform.value.amount);
      formData.append('unit_id', this.drinksform.value.unit_id);
      formData.append('unit_no', this.drinksform.value.unit_no);
      formData.append('status', this.drinksform.value.status);
      formData.append('product_image', this.imageurl);
      url = 'insert_drinks';
    }
    this.httpClient.post('../api/v1/' + url, formData).subscribe(
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

  removeMedia(url) {
    this[url] = '';
    if (url === 'imageurl') {
      this.product_image = 'Select Product Image';
    }
  }

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('../api/v1/upload_file', formData).subscribe(
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
  selector: 'cooldrink-delete-confirmation',
  templateUrl: 'cooldrink-delete-confirmation.html',
})
export class CooldrinkDelete {
  loading = false;
  cooldrink_id = 0;
  constructor(
    public dialogRef: MatDialogRef<CooldrinkDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.cooldrink_id = this.data;
    }
  }

  confirmDelete() {
    if (this.cooldrink_id == null || this.cooldrink_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('../api/v1/delete_record/cooldrink/cooldrink_id=' + this.cooldrink_id).subscribe(
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
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class CooldrinkImageView {
  image_url: string = '../api/v1/';
  action: string = '';
  loading = false;
  cooldrink_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<CooldrinkImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.cooldrink_id = this.datapopup.data;
      }
    }
  }
}