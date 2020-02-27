import { Component, OnInit, Inject } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { MatSnackBar } from "@angular/material/snack-bar";
import { MatPaginatorModule } from "@angular/material/paginator";
import { MatDialogModule } from "@angular/material/dialog";
import {
  MatDialog,
  MatDialogRef,
  MAT_DIALOG_DATA
} from "@angular/material/dialog";
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { AngularEditorConfig } from "@kolkov/angular-editor";
import { Observable } from "rxjs";

@Component({
  selector: "app-question",
  templateUrl: "./question.component.html",
  styleUrls: ["./question.component.css"]
})
export class QuestionComponent implements OnInit {
  topic = [];
  question = [];
  year = [];
  language = [];
  loading = false;
  file_name: string = "Select Picture";
  selected_language = "";
  selected_year = "";
  selected_topic_index = 0;
  constructor(
    public dialog: MatDialog,
    private httpClient: HttpClient,
    private _snackBar: MatSnackBar
  ) {}

  ngOnInit() {
    this.getLanguage();
  }
  getLanguage(): void {
    this.httpClient
      .get<any>("http://localhost/project/exam-horse/api/v1/get_language")
      .subscribe(
        res => {
          this.language = res["result"]["data"];
          this.selected_language = res["result"]["data"][0]["language_id"];
          this.getYearByLanguage();
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
  getQuestionsByTopic(ev): void {
    var tid = this.topic[ev.index].topic_id;
    this.selected_topic_index = ev.index;
    this.httpClient
      .get<any>(
        "http://localhost/project/exam-horse/api/v1/get_question_by_topic_n_year/" +
          tid +
          "/" +
          this.selected_year
      )
      .subscribe(
        res => {
          this.question = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
  getTopicByLngNYear(ev): void {
    this.selected_year = this.year[ev.index].year_id;
    this.httpClient
      .get<any>(
        "http://localhost/project/exam-horse/api/v1/get_topic_by_lng_year/" +
          this.selected_language +
          "/" +
          this.year[ev.index].year_id
      )
      .subscribe(
        res => {
          this.topic = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
  getYearByLanguage(): void {
    this.httpClient
      .get<any>("http://localhost/project/exam-horse/api/v1/get_year")
      .subscribe(
        res => {
          this.year = res["result"]["data"];
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
        if (parseInt(val.question_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(QuestionForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        //this.getQuestionsByTopic();
      }
    });
  }

  confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(QuestionDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        this.getQuestionsByTopic({ index: this.selected_topic_index });
      }
    });
  }
  fileProgress(fileInput: any) {
    var fileData = <File>fileInput.target.files[0];
    this.file_name = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append("file", fileData);
    this.httpClient
      .post(
        "http://localhost/project/exam-horse/api/v1/import_question",
        formData
      )
      .subscribe(
        res => {
          this.loading = false;
          this._snackBar.open(res["result"]["message"], "", {
            duration: 2000
          });
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
  selector: "question-form",
  templateUrl: "question-form.html"
})
export class QuestionForm {
  image_url: string = "http://localhost/project/exam-horse/api/v1/";
  questionForm: FormGroup;
  loading = false;
  question_id = 0;
  question_image: string = "Select question Image";
  image_path: string = "";
  topic: any[];
  year: any[];
  constructor(
    public dialogRef: MatDialogRef<QuestionForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.questionForm = new FormGroup({
      topic_id: new FormControl("", Validators.required),
      question: new FormControl("", Validators.required),
      question_no: new FormControl("", Validators.required),
      direction: new FormControl("", Validators.required),
      year_id: new FormControl("", Validators.required),
      a: new FormControl("", Validators.required),
      b: new FormControl("", Validators.required),
      c: new FormControl("", Validators.required),
      d: new FormControl("", Validators.required),
      answer: new FormControl("", Validators.required)
    });
    if (this.data != null) {
      this.questionForm.patchValue({
        topic_id: this.data.topic_id,
        question: this.data.name,
        question_no: this.data.question_no,
        direction: this.data.direction,
        year_id: this.data.year_id,
        a: this.data.a,
        b: this.data.b,
        c: this.data.c,
        d: this.data.d,
        answer: this.data.answer
      });
      this.question_id = this.data.question_id;
    }
    this.httpClient
      .get("http://localhost/project/exam-horse/api/v1/get_topic_by_lng_year")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.topic = res["result"]["data"];
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
    this.httpClient
      .get("http://localhost/project/exam-horse/api/v1/get_year")
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.year = res["result"]["data"];
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
    if (this.questionForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = "";
    if (this.question_id != 0) {
      formData.append("topic_id", this.questionForm.value.topic_id);
      formData.append("name", this.questionForm.value.question);
      formData.append("image_path", this.image_path);
      formData.append("question_no", this.questionForm.value.question_no);
      formData.append("direction", this.questionForm.value.direction);
      formData.append("year_id", this.questionForm.value.year_id);
      formData.append("a", this.questionForm.value.a);
      formData.append("b", this.questionForm.value.b);
      formData.append("c", this.questionForm.value.c);
      formData.append("d", this.questionForm.value.d);
      formData.append("answer", this.questionForm.value.answer);
      url = "update_record/question/question_id = " + this.question_id;
    } else {
      formData.append("topic_id", this.questionForm.value.topic_id);
      formData.append("question", this.questionForm.value.question);
      formData.append("question_image", this.image_path);
      formData.append("question_no", this.questionForm.value.question_no);
      formData.append("direction", this.questionForm.value.direction);
      formData.append("year_id", this.questionForm.value.year_id);
      formData.append("a", this.questionForm.value.a);
      formData.append("b", this.questionForm.value.b);
      formData.append("c", this.questionForm.value.c);
      formData.append("d", this.questionForm.value.d);
      formData.append("answer", this.questionForm.value.answer);
      url = "insert_question";
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

  removeMedia(url) {
    this[url] = "";
    if (url === "image_path") {
      this.question_image = "Select Question Image";
    }
  }

  editorConfig: AngularEditorConfig = {
    editable: true,
    spellcheck: true,
    height: "100px",
    minHeight: "100px",
    maxHeight: "100px",
    width: "auto",
    minWidth: "0",
    translate: "no",
    enableToolbar: true,
    showToolbar: true,
    placeholder: "Enter text here...",
    defaultParagraphSeparator: "",
    defaultFontName: "Arial",
    defaultFontSize: "3",
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
    uploadUrl: "http://localhost/project/exam-horse/api/v1/upload_image",
    sanitize: true,
    toolbarPosition: "top"
  };
}

@Component({
  selector: "question-delete-confirmation",
  templateUrl: "question-delete-confirmation.html"
})
export class QuestionDelete {
  loading = false;
  question_id = 0;
  constructor(
    public dialogRef: MatDialogRef<QuestionDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    if (this.data != null) {
      this.question_id = this.data;
    }
  }

  confirmDelete() {
    if (this.question_id == null || this.question_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient
      .get(
        "http://localhost/project/exam-horse/api/v1/delete_record/question/question_id=" +
          this.question_id
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
