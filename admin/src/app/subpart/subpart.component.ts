import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-subpart',
  templateUrl: './subpart.component.html',
  styleUrls: ['./subpart.component.css']
})
export class SubpartComponent implements OnInit {
  data:any = null;
  Object = Object;  
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }
  ngOnInit() {
    this.getSubpart();
  }
  getSubpart(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_subpart')
      .subscribe(
        (res) => {
          this.data = res["result"]["data"];
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
      this.data[res].forEach(val => {
        if (parseInt(val.electromech_subpart_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(SubpartForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getSubpart();
      }
    });
  }
  imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(SubpartImageView, {
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

  
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(SubpartDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getSubpart();
      }
    });
  }


}


@Component({
  selector: 'subpart-form',
  templateUrl: 'subpart-form.html',
})
export class SubpartForm {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  subpartForm: FormGroup;
  loading = false;
  electromech_subpart_id = 0;
  product: any[];
  subpart_image: string = 'Select Subpart Image';
  image_path: string = '';
  constructor(
    public dialogRef: MatDialogRef<SubpartForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.subpartForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      'product_id': new FormControl('', Validators.required)
    });
    if (this.data != null) {
      this.subpartForm.patchValue({
        name: this.data.name,
        product_id: this.data.electromech_product_id
      });
      this.electromech_subpart_id = this.data.electromech_subpart_id;
      this.image_path = this.data.image_path;
    }
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_product').subscribe(
      (res) => {
        if (res["result"]["error"] === false) {
          this.product = res["result"]["data"];
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
    if (this.subpartForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.electromech_subpart_id != 0) {
      formData.append('name', this.subpartForm.value.name);
      formData.append('electromech_product_id', this.subpartForm.value.product_id);
      formData.append('image_path', this.image_path);
      url = 'update_record/electromech_subpart/electromech_subpart_id = ' + this.electromech_subpart_id;
    } else {
      formData.append('name', this.subpartForm.value.name);
      formData.append('product_id', this.subpartForm.value.product_id);
      formData.append('subpart_image', this.image_path);
      url = 'insert_subpart';
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

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('http://www.lemonandshadow.com/electromech/api/v1/upload_file', formData).subscribe(
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

  removeMedia(url) {
    this[url] = '';
    if (url === 'image_path') {
      this.product_image = 'Select Equipment Image';
    }
  }

}

@Component({
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class SubpartImageView {
  image_url: string = 'http://www.lemonandshadow.com/electromech/api/v1/';
  action: string = '';
  loading = false;
  id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<SubpartImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.id = this.datapopup.data;
      }
    }
  }
}


@Component({
  selector: 'subpart-delete-confirmation',
  templateUrl: 'subpart-delete-confirmation.html',
})
export class SubpartDelete {
  loading = false;
  electromech_subpart_id = 0;
  constructor(
    public dialogRef: MatDialogRef<SubpartDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.electromech_subpart_id = this.data;
    }
  }

  confirmDelete() {
    if (this.electromech_subpart_id == null || this.electromech_subpart_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/delete_record/electromech_subpart/electromech_subpart_id=' + this.electromech_subpart_id).subscribe(
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