import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-config',
  templateUrl: './config.component.html',
  styleUrls: ['./config.component.css']
})
export class ConfigComponent implements OnInit {
  result = [];
  result_home = [];
  ads = [];
  ads_card = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getConfig();
    this.getBannerAds();
    this.getCardAds();
    this.getHomeConfig();
  }
  image_url: string = '../toowheel/api/v1/';
    getConfig(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_landing_configs')
  .subscribe(
          (res)=>{
              this.result = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
    getHomeConfig(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_home_configs')
  .subscribe(
          (res)=>{
              this.result_home = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
    getBannerAds(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_banner_advertisment')
  .subscribe(
          (res)=>{
              this.ads = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
    getCardAds(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_card_advertisment')
  .subscribe(
          (res)=>{
              this.ads_card = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
  openDialog(id, res): void  {
      var data = null;
       this[res].forEach(val=> {
           if(parseInt(val.config_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
         data.ads = this.ads;
         data.ads_card = this.ads_card;
    const dialogRef = this.dialog.open(ConfigForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });
    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getConfig();
            this.getHomeConfig();
        }
    });
}

}

@Component({
  selector: 'config-form',
  templateUrl: 'config-form.html',
})
export class ConfigForm {
    configForm: FormGroup;
    loading = false;
    value: string;
    field_type: string;
    name: string;
    file_name: string = 'Select Picture';
    display_name: string;
    config_id: string;
    ads:any;
    ads_card:any;
    constructor(
    public dialogRef: MatDialogRef<ConfigForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.value = this.data.value;
        this.display_name = this.data.display_name;
        this.name = this.data.name;
        this.field_type = this.data.field_type;
        this.config_id = this.data.config_id;
        this.ads = this.data.ads;
        this.ads_card = this.data.ads_card;
    }
  ngOnInit() {
      this.configForm = new FormGroup({
      'display_name': new FormControl('', Validators.required)
        });
    }
    fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        console.log(fileData);
        this.file_name = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('../toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.value = res["result"]["data"];
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
            });
    }
    onSubmit() {
          if (this.configForm.invalid) {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          formData.append('display_name', this.configForm.value.display_name);
          formData.append('value', this.value);
          formData.append('config_id', this.config_id);
          this.httpClient.post('../toowheel/api/v1/update_config', formData).subscribe(
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
