import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';
import { Observable } from 'rxjs';
import * as moment from 'moment';

@Component({
    selector: 'app-application',
    templateUrl: './application.component.html',
    styleUrls: ['./application.component.css']
})
export class ApplicationComponent implements OnInit {
    result = [];
    loading = false;
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

    ngOnInit() {
        this.getapplication();
    }
    image_url: string = '../api/v1/';
    getapplication(): void {
        this.httpClient.get<any>('../api/v1/get_application')
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
                if (parseInt(val.application_id) === parseInt(id)) {
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(ApplicationForm, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if (result !== false && result !== 'false') {
                this.getapplication();
            }
        });
    }
    confirmDelete(id): void {
        var data = null;
        if (id != 0) {
            data = id;
        }
        const dialogRef = this.dialog.open(ApplicationDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });
        dialogRef.afterClosed().subscribe(result => {
            if (result !== false && result !== 'false') {
                this.getapplication();
            }
        });
    }
    pictureView(id, action): void {
        var data = null;
        if (id != 0) {
            data = id;
        }
        const dialogRef = this.dialog.open(ImageView, {
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
    openGallery(id): void {
        var data = null;
        if (id != 0) {
            this.result.forEach(val => {
                if (parseInt(val.application_id) === parseInt(id)) {
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(ApplicationGalleryForm, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if (result !== false && result !== 'false') {
                this.getapplication();
            }
        });
    }
}


@Component({
    selector: 'application-form',
    templateUrl: 'application-form.html',
})
export class ApplicationForm {
    image_url: string = '../api/v1/';
    applicationForm: FormGroup;
    loading = false;
    application_id = 0;
    application_thumb_image: string = 'Select Application Thumb Image';
    image_path_thumb: string = '';
    constructor(
        public dialogRef: MatDialogRef<ApplicationForm>,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        this.applicationForm = new FormGroup({
            'title': new FormControl('', Validators.required),
        });

        if (this.data != null) {
            this.applicationForm.patchValue({
                title: this.data.title,
            });
            this.application_id = this.data.application_id;
            this.image_path_thumb = this.data.image_path_thumb;
        }
    }

    onSubmit() {
        if (this.applicationForm.invalid) {
            return;
        }
        this.loading = true;
        var formData = new FormData();
        var url = '';
        if (this.application_id != 0) {
            formData.append('title', this.applicationForm.value.title);
            formData.append('image_path_thumb', this.image_path_thumb);
            url = 'update_record/application/application_id = ' + this.application_id;
        } else {
            formData.append('title', this.applicationForm.value.title);
            formData.append('application_thumb_image', this.image_path_thumb);
            url = 'insert_application';
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

    removeMedia(url) {
        this[url] = '';
        if (url === 'image_path_thumb') {
            this.application_thumb_image = 'Select Application Thumb Image';
        }
    }

}


@Component({
    selector: 'application-gallery-form',
    templateUrl: 'application-gallery-form.html',
})
export class ApplicationGalleryForm {
    image_url: string = '../api/v1/';
    applicationGalleryForm: FormGroup;
    loading = false;
    application_id = 0;
    constructor(
        public dialogRef: MatDialogRef<ApplicationGalleryForm>,
        private sanitizer: DomSanitizer,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        this.applicationGalleryForm = new FormGroup({
            'youtube_id': new FormControl('', Validators.required),
        });

        if (this.data != null) {
            this.applicationGalleryForm.patchValue({
                youtube_id: this.data.youtube_id,
            });
            this.application_id = this.data.application_id;
        }
    }

    onSubmit() {
        if (this.applicationGalleryForm.invalid) {
            return;
        }
        this.loading = true;
        var formData = new FormData();
        var url = '';
        if (this.application_id != 0) {
            formData.append('youtube_id', this.applicationGalleryForm.value.youtube_id);
            url = 'update_record/application/application_id = ' + this.application_id;
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

    getTrustURL(id) {
        return this.sanitizer.bypassSecurityTrustResourceUrl("https://www.youtube.com/embed/" + id);
    }

    fileProgress(fileInput: any) {
        console.log(fileInput.target.files);
        this.loading = true;
        var formData = new FormData();
        var filedata = [];
        for (var i = 0; i < fileInput.target.files.length; i++) {
            formData.append('file[]', <File>fileInput.target.files[i]);
        }
        formData.append('application_id', (this.application_id).toString());
        this.httpClient.post('../api/v1/upload_files', formData).subscribe(
            (res) => {
                this.loading = false;
                if (res["result"]["error"] === false) {
                    this.data.gallery = res["result"]["data"];
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

    removeMedia(id) {
        this.loading = true;
        var formData = new FormData();
        formData.append('gallery_id', id);
        this.httpClient.get('../api/v1/delete_record/application_gallery/application_gallery_id=' + id).subscribe(
            (res) => {
                this.loading = false;
                if (res["result"]["error"] === false) {
                    for (var i = 0; i < (this.data.gallery).length; i++) {
                        if (parseInt(this.data.gallery[i].application_gallery_id) === parseInt(id)) {
                            this.data.gallery.splice(i, 1);
                            break;
                        }
                    }
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
    selector: 'picture-view',
    templateUrl: 'picture-view.html',
})

export class ImageView {
    image_url: string = '../api/v1/';
    action: string = '';
    loading = false;
    application_id = 0;
    data: any;
    constructor(
        public dialogRef: MatDialogRef<ImageView>,
        @Inject(MAT_DIALOG_DATA) public datapopup: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        if (this.datapopup != null) {
            this.action = this.datapopup.action;
            this.data = this.datapopup.data;
            if (this.datapopup.action == 'delete') {
                this.application_id = this.datapopup.data;
            }
        }
    }
}

@Component({
    selector: 'application-delete-confirmation',
    templateUrl: 'application-delete-confirmation.html',
})
export class ApplicationDelete {
    loading = false;
    application_id = 0;
    constructor(
        public dialogRef: MatDialogRef<ApplicationDelete>,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        if (this.data != null) {
            this.application_id = this.data;
        }
    }

    confirmDelete() {
        if (this.application_id == null || this.application_id == 0) {
            return;
        }
        this.loading = true;
        this.httpClient.get('../api/v1/delete_record/application/application_id=' + this.application_id).subscribe(
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