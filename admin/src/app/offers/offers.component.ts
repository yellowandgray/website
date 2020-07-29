import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
//import { NgxSpinnerService } from 'ngx-spinner';
@Component({
  selector: 'app-offers',
  templateUrl: './offers.component.html',
  styleUrls: ['./offers.component.css']
})
export class OffersComponent implements OnInit {
  constructor(
    //private spinner: NgxSpinnerService,
    public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
  result = []
  loading = false;
  ngOnInit() {
    this.getOffers();
  }

  showSpinner(name: string) {
    //this.spinner.show(name);
  }

  hideSpinner(name: string) {
   // this.spinner.hide(name);
  }
  image_url: string = 'http://ygonlinebuy.com/api/v1/';
  getOffers(): void {

    this.loading = true;
    this.showSpinner('sp3')


    this.httpClient.get<any>('http://ygonlinebuy.com/api/v1/get_offers')
      .subscribe(
        (res) => {
          this.loading = false;
          this.hideSpinner('sp3')
          this.result = res["result"]["data"];
        },
        (error) => {
          this.loading = false;
          this.hideSpinner('sp3')
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
        if (parseInt(val.offers_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(OffersForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getOffers();
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(OffersDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getOffers();
      }
    });
  }
  imageView(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(OffersImageView, {
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
  selector: 'offers-form',
  templateUrl: 'offers-form.html',
})
export class OffersForm {
  image_url: string = 'http://ygonlinebuy.com/api/v1/';
  offersform: FormGroup;
  loading = false;
  offers_id = 0;
  offer_image: string = 'Select Offer Image';
  image_path: string = '';
  constructor(
    public dialogRef: MatDialogRef<OffersForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.offersform = new FormGroup({
      'title': new FormControl('', Validators.required),
      'status': new FormControl('', Validators.required),
    })
    if (this.data != null) {
      this.offersform.patchValue({
        title: this.data.title,
        status: this.data.status,
      });
      this.offers_id = this.data.offers_id;
      this.image_path = this.data.image_path;
    }
  }


  onSubmit() {
    console.log("testing....");
    if (this.offersform.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.offers_id != 0) {
      formData.append('title', this.offersform.value.title);
      formData.append('status', this.offersform.value.status);
      formData.append('image_path', this.image_path);
      url = 'update_record/offers/offers_id = ' + this.offers_id;
    } else {
      formData.append('title', this.offersform.value.title);
      formData.append('status', this.offersform.value.status);
      formData.append('offer_image', this.image_path);
      url = 'insert_offers';
    }
    this.httpClient.post('http://ygonlinebuy.com/api/v1/' + url, formData).subscribe(
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
    if (url === 'image_path') {
      this.offer_image = 'Select Offer Image';
    }
  }

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('http://ygonlinebuy.com/api/v1/upload_file', formData).subscribe(
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
  selector: 'offers-delete-confirmation',
  templateUrl: 'offers-delete-confirmation.html',
})
export class OffersDelete {
  loading = false;
  offers_id = 0;
  constructor(
    public dialogRef: MatDialogRef<OffersDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.offers_id = this.data;
    }
  }

  confirmDelete() {
    if (this.offers_id == null || this.offers_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('http://ygonlinebuy.com/api/v1/delete_record/offers/offers_id=' + this.offers_id).subscribe(
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

export class OffersImageView {
  image_url: string = 'http://ygonlinebuy.com/api/v1/';
  action: string = '';
  loading = false;
  offers_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<OffersImageView>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.offers_id = this.datapopup.data;
      }
    }
  }
}
