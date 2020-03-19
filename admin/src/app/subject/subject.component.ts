import { Component, OnInit, Inject } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { MatSnackBar } from "@angular/material/snack-bar";
import { MatPaginatorModule } from "@angular/material/paginator";
import { MatDialogModule } from "@angular/material/dialog";
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from "@angular/material/dialog";
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { AngularEditorConfig } from "@kolkov/angular-editor";
import { Observable } from "rxjs";

@Component({
  selector: "app-subject",
  templateUrl: "./subject.component.html",
  styleUrls: ["./subject.component.css"]
})
export class SubjectComponent implements OnInit {
  subject = [];
  language = [];
  selectedsubind = 0;

  constructor(
    public dialog: MatDialog,
    private httpClient: HttpClient,
    private _snackBar: MatSnackBar
  ) {}

  ngOnInit() {
    this.getlanguage();
  }
  image_url: string = "http://localhost/project/exam-horse/api/v1/";
  getlanguage(): void {
    this.httpClient.get<any>('http://localhost/project/exam-horse/api/v1/get_language')
      .subscribe(
        (res) => {
          this.language = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
  getsubject(ev): void {
    this.selectedsubind = ev.index;
    this.httpClient
      .get<any>("http://localhost/project/exam-horse/api/v1/get_subject_by_language/"+this.language[ev.index].language_id)
      .subscribe(
        res => {
          this.subject = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }

  openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.subject_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(SubjectForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getsubject({index: this.selectedsubind});
      }
    });
  }
  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(SubjectDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getsubject({index: this.selectedsubind});
      }
    });
  }
}

@Component({
  selector: "subject-form",
  templateUrl: "subject-form.html"
})
export class SubjectForm {
  image_url: string = "http://localhost/project/exam-horse/api/v1/";
  subjectForm: FormGroup;
  loading = false;
  subject_id = 0;
  subject_image: string = "Select Subject Image";
  image_path: string = "";
  language: any[];
  constructor(
    public dialogRef: MatDialogRef<SubjectForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.subjectForm = new FormGroup({
      name: new FormControl("", Validators.required),
      language_id: new FormControl("", Validators.required),
      description: new FormControl("")
    });
    if (this.data != null) {
      this.subjectForm.patchValue({
        name: this.data.name,
        language_id: this.data.language_id,
        description: this.data.description
      });
      this.subject_id = this.data.subject_id;
      this.image_path = this.data.image_path;
    }

    this.httpClient
      .get("http://localhost/project/exam-horse/api/v1/get_language")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.language = res["result"]["data"];
          } else {
            this._snackBar.open(res["result"]["message"], "", {
              duration: 2000
            });
          }
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }

  onSubmit() {
    if (this.subjectForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.subject_id != 0) {
      formData.append("name", this.subjectForm.value.name);
      formData.append("language_id", this.subjectForm.value.language_id);
      formData.append("description", this.subjectForm.value.description);
      formData.append("image_path", this.image_path);
      url = "update_record/subject/subject_id = " + this.subject_id;
    } else {
      formData.append("name", this.subjectForm.value.name);
      formData.append("language_id", this.subjectForm.value.language_id);
      formData.append("description", this.subjectForm.value.description);
      formData.append("subject_image", this.image_path);
      url = "insert_subject";
    }
    this.httpClient
      .post("http://localhost/project/exam-horse/api/v1/" + url, formData)
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this.dialogRef.close(true);
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

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append("file", fileData);
    this.httpClient
      .post("http://localhost/project/exam-horse/api/v1/upload_file", formData)
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this[path] = res["result"]["data"];
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

  editorConfig: AngularEditorConfig = {
    editable: true,
    spellcheck: true,
    height: "100px",
    minHeight: "100px",
    maxHeight: "100px",
    width: "auto",
    minWidth: "0",
    translate: "yes",
    enableToolbar: true,
    showToolbar: true,
    placeholder: "Enter text here...",
    defaultParagraphSeparator: "",
    defaultFontName: "",
    defaultFontSize: "",
    fonts: [
      { class: "arial", name: "Arial" },
      { class: "times-new-roman", name: "Times New Roman" },
      { class: "calibri", name: "Calibri" },
      { class: "comic-sans-ms", name: "Comic Sans MS" }
    ],
    customClasses: [
      {
        name: "quote",
        class: "quote"
      },
      {
        name: "redText",
        class: "redText"
      },
      {
        name: "titleText",
        class: "titleText",
        tag: "h1"
      }
    ],
    uploadUrl: "v1/image",
    sanitize: true,
    toolbarPosition: "top"
  };

  removeMedia(url) {
    this[url] = "";
    if (url === "image_path") {
      this.subject_image = "Select Subject Image";
    }
  }
}

@Component({
  selector: "subject-delete-confirmation",
  templateUrl: "subject-delete-confirmation.html"
})
export class SubjectDelete {
  loading = false;
  subject_id = 0;
  constructor(
    public dialogRef: MatDialogRef<SubjectDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.subject_id = this.data;
    }
  }
  confirmDelete() {
    if (this.subject_id == null || this.subject_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "http://localhost/project/exam-horse/api/v1/delete_record/subject/subject_id=" +
          this.subject_id
      )
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this.dialogRef.close(true);
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
