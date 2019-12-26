import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AngularEditorConfig } from '@kolkov/angular-editor';

@Component({
    selector: 'app-question',
    templateUrl: './question.component.html',
    styleUrls: ['./question.component.css']
})
export class QuestionComponent implements OnInit {

    suject = [];
    topic = [];
    question = [];

    constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

    ngOnInit() {
        this.getsubject();
        this.gettopic();
        this.getQuestion();
    }
    getQuestion(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_question')
        .subscribe(
                (res)=>{
                    this.question = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }
    getsubject(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_subject')
            .subscribe(
                (res) => {
                    this.suject = res["result"]["data"];
                },
                (error) => {
                    this._snackBar.open(error["statusText"], '', {
                        duration: 2000,
                    });
                }
            );
    }
    gettopic(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_topic')
            .subscribe(
                (res) => {
                    this.topic = res["result"]["data"];
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
          if(id != 0) {
          this[res].forEach(val=> {
               if(parseInt(val.question_id) === parseInt(id)) {
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
            if (result !== false && result !== 'false') {
                this.getQuestion();
            }
        });
    }

}


@Component({
    selector: 'question-form',
    templateUrl: 'question-form.html',
})
export class QuestionForm {
    questionForm: FormGroup;
    loading = false;
    question_id = 0;
    subject: any[];
    topic: any[];
    constructor(
        public dialogRef: MatDialogRef<QuestionForm>,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        this.questionForm = new FormGroup({
            'subject_id': new FormControl('', Validators.required),
            'topic_id': new FormControl('', Validators.required),
            'question': new FormControl('', Validators.required),
            'a': new FormControl('', Validators.required),
            'b': new FormControl('', Validators.required),
            'c': new FormControl('', Validators.required),
            'd': new FormControl('', Validators.required),
            'answer': new FormControl('', Validators.required),
        });
        if(this.data != null) {
           this.questionForm.patchValue({
           subject_id: this.data.subject_id,
           topic_id: this.data.topic_id,
           question: this.data.name,
           a: this.data.a,
           b: this.data.b,
           c: this.data.c,
           d: this.data.d,
           answer: this.data.answer,
        });
            this.question_id = this.data.question_id;
        }
        this.httpClient.get('http://localhost/project/mekana/api/v1/get_subject').subscribe(
            (res) => {
                if (res["result"]["error"] === false) {
                    this.subject = res["result"]["data"];
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
        this.httpClient.get('http://localhost/project/mekana/api/v1/get_topic').subscribe(
            (res) => {
                if (res["result"]["error"] === false) {
                    this.topic = res["result"]["data"];
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
        if (this.questionForm.invalid) {
              return;
        }
        this.loading = true;
        var formData = new FormData();
        var url = '';
          if(this.question_id != 0) {
          formData.append('subject_id', this.questionForm.value.subject_id);
          formData.append('topic_id', this.questionForm.value.topic_id);
          formData.append('question', this.questionForm.value.question);
          formData.append('a', this.questionForm.value.a);
          formData.append('b', this.questionForm.value.b);
          formData.append('c', this.questionForm.value.c);
          formData.append('d', this.questionForm.value.d);
          formData.append('answer', this.questionForm.value.answer);
          url = 'update_record/question/question_id = '+this.question_id;
        } else {
            formData.append('subject_id', this.questionForm.value.subject_id);
            formData.append('topic_id', this.questionForm.value.topic_id);
            formData.append('question', this.questionForm.value.question);
            formData.append('a', this.questionForm.value.a);
            formData.append('b', this.questionForm.value.b);
            formData.append('c', this.questionForm.value.c);
            formData.append('d', this.questionForm.value.d);
            formData.append('answer', this.questionForm.value.answer);
          url = 'insert_question';
        }
        this.httpClient.post('http://localhost/project/mekana/api/v1/'+url, formData).subscribe(
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

    editorConfig: AngularEditorConfig = {
        editable: true,
        spellcheck: true,
        height: '100px',
        minHeight: '100px',
        maxHeight: '100px',
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
}
