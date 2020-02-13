import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-command',
  templateUrl: './command.component.html',
  styleUrls: ['./command.component.css']
})
export class CommandComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getCommand();
  }
  getCommand(): void {
    this.httpClient.get<any>('http://www.lemonandshadow.com/electromech/api/v1/get_command')
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
        if (parseInt(val.electromech_product_enquiry_list_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(CommandDialog, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getCommand();
      }
    });
  }

}

@Component({
  selector: 'command-form',
  templateUrl: 'command-form.html',
})
export class CommandDialog {
  commandForm: FormGroup;
  loading = false;
  electromech_product_enquiry_list_id = 0;
  product: any[];
  schedule: any[];
  constructor(
    public dialogRef: MatDialogRef<CommandDialog>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
      this.commandForm = new FormGroup({
        'enquiry_list': new FormControl('', Validators.required),
        'electromech_product_id': new FormControl('', Validators.required),
        'electromech_schedule_id': new FormControl('', Validators.required)
      });
      if (this.data != null) {
        this.commandForm.patchValue({
          enquiry_list: this.data.enquiry_list,
          electromech_product_id: this.data.electromech_product_id,
          electromech_schedule_id: this.data.electromech_schedule_id
        });
        this.electromech_product_enquiry_list_id = this.data.electromech_product_enquiry_list_id;
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
      this.httpClient.get('http://www.lemonandshadow.com/electromech/api/v1/get_schedule').subscribe(
        (res) => {
          if (res["result"]["error"] === false) {
            this.schedule = res["result"]["data"];
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
      if (this.commandForm.invalid) {
        return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
      if (this.electromech_product_enquiry_list_id != 0) {
        formData.append('enquiry_list', this.commandForm.value.enquiry_list);
        formData.append('electromech_product_id', this.commandForm.value.electromech_product_id);
        formData.append('electromech_schedule_id', this.commandForm.value.electromech_schedule_id);
        url = 'update_record/electromech_product_enquiry_list/electromech_product_enquiry_list_id = ' + this.electromech_product_enquiry_list_id;
      } else {
        formData.append('enquiry_list', this.commandForm.value.enquiry_list);
        formData.append('electromech_product_id', this.commandForm.value.electromech_product_id);
        formData.append('electromech_schedule_id', this.commandForm.value.electromech_schedule_id);
        url = 'insert_command';
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