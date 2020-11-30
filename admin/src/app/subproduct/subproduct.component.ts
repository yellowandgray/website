import { Component, OnInit, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import { Observable } from 'rxjs';
import * as moment from 'moment';

@Component({
    selector: 'app-subproduct',
    templateUrl: './subproduct.component.html',
    styleUrls: ['./subproduct.component.css']
})
export class SubproductComponent implements OnInit {
    result = [];
    result_1 = [];
    loading = false;
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

    ngOnInit() {
        this.getProduct();
        this.getSalesMode()
    }
    image_url: string = 'http://localhost/microview/fresche/api/v1/';
    getProduct(): void {
        this.httpClient.get<any>('http://localhost/microview/fresche/api/v1/get_product')
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
    getSalesMode(): void {
        this.httpClient.get<any>('http://localhost/microview/fresche/api/v1/get_sales_mode')
            .subscribe(
                (res) => {
                    this.result_1 = res["result"]["data"];
                    //this.dialogRef.close(true);
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
                if (parseInt(val.product_id) === parseInt(id)) {
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(SubproductForm, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if (result !== false && result !== 'false') {
                this.getProduct();
            }
        });
    }
    confirmDelete(id): void {
        var data = null;
        if (id != 0) {
            data = id;
        }
        const dialogRef = this.dialog.open(SubproductDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });
        dialogRef.afterClosed().subscribe(result => {
            if (result !== false && result !== 'false') {
                this.getProduct();
            }
        });
    }
    imageView(id, action): void {
        var data = null;
        if (id != 0) {
            data = id;
        }
        const dialogRef = this.dialog.open(SubproductImageView, {
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
    changeSalesStatus(ev, fid): void {
        //console.log(fid);
        var sales_mode_id = 0;
        if (ev.checked == true) {
            sales_mode_id = 1;
        }
        this.httpClient.get('http://localhost/microview/fresche/api/v1/update_sales_mode/' + fid + '/' + sales_mode_id)
            .subscribe(
                res => {
                    this.loading = false;
                    if (res["result"]["error"] === false) {
                        //this.dialogRef.close(true);
                    } else {
                        this._snackBar.open(res["result"]["message"], "", {
                            duration: 2000
                        });
                    }
                },
                error => {
                    this.loading = false;
                    this._snackBar.open(error["statusText"], "", {
                        duration: 2000
                    });
                }
            );
    }
}

@Component({
    selector: 'subproduct-form',
    templateUrl: 'subproduct-form.html',
})
export class SubproductForm {
    image_url: string = 'http://localhost/microview/fresche/api/v1/';
    productForm: FormGroup;
    loading = false;
    product_id = 0;
    product_image: string = 'Select Product Image';
    image_path: string = '';
    constructor(
        public dialogRef: MatDialogRef<SubproductForm>,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        this.productForm = new FormGroup({
            'product_price': new FormControl(''),
            'product_name': new FormControl('', Validators.required),
            'description': new FormControl('', Validators.required),
        });

        if (this.data != null) {
            this.productForm.patchValue({
                product_price: this.data.product_price,
                product_name: this.data.product_name,
                description: this.data.description,
            });
            this.product_id = this.data.product_id;
            this.image_path = this.data.image_path;
        }
    }

    onSubmit() {
        if (this.productForm.invalid) {
            return;
        }
        this.loading = true;
        var formData = new FormData();
        var url = '';
        if (this.product_id != 0) {
            formData.append('product_price', this.productForm.value.product_price);
            formData.append('product_name', this.productForm.value.product_name);
            formData.append('description', this.productForm.value.description);
            formData.append('image_path', this.image_path);
            url = 'update_record/product/product_id = ' + this.product_id;
        } else {
            formData.append('product_price', this.productForm.value.product_price);
            formData.append('product_name', this.productForm.value.product_name);
            formData.append('description', this.productForm.value.description);
            formData.append('product_image', this.image_path);
            url = 'insert_product';
        }
        this.httpClient.post('http://localhost/microview/fresche/api/v1/' + url, formData).subscribe(
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
        this.httpClient.post('http://localhost/microview/fresche/api/v1/upload_file', formData).subscribe(
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

    editorConfig: AngularEditorConfig = {
        editable: true,
        spellcheck: true,
        height: '300px',
        minHeight: '300px',
        maxHeight: '300px',
        width: 'auto',
        minWidth: '0',
        translate: 'yes',
        enableToolbar: true,
        showToolbar: true,
        placeholder: 'Enter text here...',
        defaultParagraphSeparator: '',
        defaultFontName: '',
        defaultFontSize: '',
        fonts: [
            { class: 'arial', name: 'Arial' },
            { class: 'times-new-roman', name: 'Times New Roman' },
            { class: 'calibri', name: 'Calibri' },
            { class: 'comic-sans-ms', name: 'Comic Sans MS' }
        ],
        customClasses: [
            {
                name: 'quote',
                class: 'quote',
            },
            {
                name: 'redText',
                class: 'redText'
            },
            {
                name: 'titleText',
                class: 'titleText',
                tag: 'h1',
            },
        ],
        uploadUrl: 'v1/image',
        sanitize: true,
        toolbarPosition: 'top',
    };

    removeMedia(url) {
        this[url] = '';
        if (url === 'image_path') {
            this.product_image = 'Select Product Image';
        }
    }

}


@Component({
    selector: 'subproduct-delete-confirmation',
    templateUrl: 'subproduct-delete-confirmation.html',
})
export class SubproductDelete {
    loading = false;
    product_id = 0;
    constructor(
        public dialogRef: MatDialogRef<SubproductDelete>,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        if (this.data != null) {
            this.product_id = this.data;
        }
    }

    confirmDelete() {
        if (this.product_id == null || this.product_id == 0) {
            return;
        }
        this.loading = true;
        this.httpClient.get('http://localhost/microview/fresche/api/v1/delete_record/product/product_id=' + this.product_id).subscribe(
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

export class SubproductImageView {
    image_url: string = 'http://localhost/microview/fresche/api/v1/';
    action: string = '';
    loading = false;
    product_id = 0;
    data: any;
    constructor(
        public dialogRef: MatDialogRef<SubproductImageView>,
        @Inject(MAT_DIALOG_DATA) public datapopup: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        if (this.datapopup != null) {
            this.action = this.datapopup.action;
            this.data = this.datapopup.data;
            if (this.datapopup.action == 'delete') {
                this.product_id = this.datapopup.data;
            }
        }
    }
}