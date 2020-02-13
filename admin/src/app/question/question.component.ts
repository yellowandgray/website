import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import { Observable } from 'rxjs';

@Component({
    selector: 'app-question',
    templateUrl: './question.component.html',
    styleUrls: ['./question.component.css']
})
export class QuestionComponent implements OnInit {
    question = [];
    subject = [];
    chapter = [];
    topic = [];
    difficult = [];
    loading = false;
    image_url: string = 'http://localhost/project/feringo/api/v1/';
    file_name: string = 'Select Picture';
    selected_subject = 0;
    selected_chapter = 0;
    selected_topic = 0;
    searchQuestionNo = null;
    searchTerm = null;
    filter_text = 'null';
filter_question = 'null';
    constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }
    ngOnInit() {
        this.getSubject();
    }
    getSubject(): void {
    this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_subject')
      .subscribe(
        (res) => {
          this.subject = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
   getChapter(): void {
        this.chapter = [];
        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_chapter_by_subject/'+this.selected_subject)
        .subscribe(
                (res)=>{
                    this.chapter = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }    
getTopic(): void {
this.topic = [];
        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_topic_by_chapter/'+this.selected_chapter)
        .subscribe(
                (res)=>{
                    this.topic = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }
    getQuestion(): void {
if(this.selected_chapter && this.selected_chapter != 0 && this.selected_topic) {
this.question = [];
this.filter_text = 'null';
this.filter_question = 'null';
if(this.searchQuestionNo && this.searchQuestionNo != null && this.searchQuestionNo != '') {
this.filter_question = this.searchQuestionNo;
}
if(this.searchTerm && this.searchTerm != null && this.searchTerm != '') {
this.filter_text = this.searchTerm;
}
        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_question_by_topic/'+this.selected_topic+'/'+this.selected_chapter+'/'+this.filter_text+'/'+this.filter_question)
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
    }
fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        this.file_name = fileData.name;
        this.loading = true;
        var formData = new FormData();
        formData.append('file', fileData);
        this.httpClient.post('http://localhost/project/feringo/api/v1/import_question', formData).subscribe(
            (res) => {
                this.loading = false;
                this._snackBar.open(res["result"]["message"], '', {
                    duration: 2000,
                });
            },
            (error) => {
                this.loading = false;
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            });
    }
    openDialog(id, res): void {
        var data = null;
        if (id != 0) {
            this[res].forEach(val => {
                if (parseInt(val.question_id) === parseInt(id)) {
                    val.subject_id = this.selected_subject;
                    val.chapter_id = this.selected_chapter;
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(QuestionForm, {
            minWidth: "40%",
            maxWidth: "40%",
            data: {data: data, subject: this.subject}
        });

        dialogRef.afterClosed().subscribe(result => {
            if (typeof result !== 'undefined' && result !== false && result !== 'false') {
                this.getQuestion();
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
            if (typeof result !== 'undefined' && result !== false && result !== 'false') {
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
    image_url: string = 'http://localhost/project/feringo/api/v1/';
    questionForm: FormGroup;
    loading = false;
    question_id = 0;
    question_image: string = 'Select question Image';
    option_a_image: string = 'Option A Image';
    option_b_image: string = 'Option B Image';
    option_c_image: string = 'Option C Image';
    option_d_image: string = 'Option D Image';
    image_path: string = '';
    option_image_a: string = '';
    option_image_b: string = '';
    option_image_c: string = '';
    option_image_d: string = '';
    subject: any[];
    chapter: any[];
    topic: any[];
    difficult: any[];
    constructor(
        public dialogRef: MatDialogRef<QuestionForm>,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        this.questionForm = new FormGroup({
            'subject_id': new FormControl('', Validators.required),
            'chapter_id': new FormControl('', Validators.required),
            'topic_id': new FormControl('', Validators.required),
            'difficult_id': new FormControl('', Validators.required),
            'question': new FormControl(''),
            'question_no': new FormControl('', Validators.required),
            'direction': new FormControl(''),
            'a': new FormControl('', Validators.required),
            'b': new FormControl('', Validators.required),
            'c': new FormControl(''),
            'd': new FormControl(''),
            'answer': new FormControl('', Validators.required),
        });
        if (this.data.data != null) {
            this.questionForm.patchValue({
                subject_id: this.data.data.subject_id,
                chapter_id: this.data.data.chapter_id,
                difficult_id: this.data.data.difficult_id,
                topic_id: this.data.data.topic_id,
                question: this.data.data.name,
                question_no: this.data.data.question_no,
                direction: this.data.data.direction,
                a: this.data.data.a,
                b: this.data.data.b,
                c: this.data.data.c,
                d: this.data.data.d,
                answer: this.data.data.answer,
            });
            this.question_id = this.data.data.question_id;
            this.image_path = this.data.data.image_path;
            this.getChapter();
            this.getTopic();
        }
        this.subject = this.data.subject;
        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_difficult')
        .subscribe(
                (res)=>{
                    this.difficult = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }
    getChapter(): void {
        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_chapter_by_subject/'+this.questionForm.value.subject_id)
        .subscribe(
                (res)=>{
                    this.chapter = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }    
getTopic(): void {
        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_topic_by_chapter/'+this.questionForm.value.chapter_id)
        .subscribe(
                (res)=>{
                    this.topic = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
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
        var url = '';
        formData.append('topic_id', this.questionForm.value.topic_id);
            formData.append('difficult_id', this.questionForm.value.difficult_id);
            formData.append('name', this.questionForm.value.question);
            formData.append('image_path', this.image_path);
            formData.append('question_no', this.questionForm.value.question_no);
            formData.append('direction', this.questionForm.value.direction);
            formData.append('a', this.questionForm.value.a);
            formData.append('b', this.questionForm.value.b);
            formData.append('c', this.questionForm.value.c);
            formData.append('d', this.questionForm.value.d);
            formData.append('answer', this.questionForm.value.answer);
        if (this.question_id != 0) {
            url = 'update_record/question/question_id = ' + this.question_id;
        } else {
            url = 'insert_question';
        }
        this.httpClient.post('http://localhost/project/feringo/api/v1/' + url, formData).subscribe(
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
        this.httpClient.post('http://localhost/project/feringo/api/v1/upload_file', formData).subscribe(
            (res) => {
                this.loading = false;
                if (res["result"]["error"] === false) {
                    this[path] = res["result"]["data"];
                    if(path == 'option_image_a') {
                        this.questionForm.patchValue({
                            a: '<img src="'+this.image_url+res["result"]["data"]+'" alt="option" />'
                        });
                    }
                    if(path == 'option_image_b') {
                        this.questionForm.patchValue({
                            b: '<img src="'+this.image_url+res["result"]["data"]+'" alt="option" />'
                        });
                    }
                    if(path == 'option_image_c') {
                        this.questionForm.patchValue({
                            c: '<img src="'+this.image_url+res["result"]["data"]+'" alt="option" />'
                        });
                    }
                    if(path == 'option_image_d') {
                        this.questionForm.patchValue({
                            d: '<img src="'+this.image_url+res["result"]["data"]+'" alt="option" />'
                        });
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
    removeMedia(url) {
        this[url] = '';
        if (url === 'image_path') {
            this.question_image = 'Select Question Image';
        }
    }
    editorConfig: AngularEditorConfig = {
        editable: true,
        spellcheck: true,
        height: '100px',
        minHeight: '100px',
        maxHeight: '100px',
        width: 'auto',
        minWidth: '0',
        translate: 'no',
        enableToolbar: true,
        showToolbar: true,
        placeholder: 'Enter text here...',
        defaultParagraphSeparator: '',
        defaultFontName: 'Arial',
        defaultFontSize: '3',
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
        uploadUrl: 'http://localhost/project/feringo/api/v1/upload_image',
        sanitize: true,
        toolbarPosition: 'top',
    };
    editorOptionConfig: AngularEditorConfig = {
        editable: true,
        spellcheck: true,
        height: '20px',
        minHeight: '20px',
        maxHeight: '20px',
        width: 'auto',
        minWidth: '0',
        translate: 'no',
        enableToolbar: true,
        showToolbar: false,
        placeholder: 'Enter text here...',
        defaultParagraphSeparator: '',
        defaultFontName: 'Arial',
        defaultFontSize: '3',
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
        uploadUrl: 'http://localhost/project/feringo/api/v1/upload_image',
        sanitize: true,
        toolbarPosition: 'top',
    };
}



@Component({
    selector: 'question-delete-confirmation',
    templateUrl: 'question-delete-confirmation.html',
})
export class QuestionDelete {
    loading = false;
    question_id = 0;
    constructor(
        public dialogRef: MatDialogRef<QuestionDelete>,
        @Inject(MAT_DIALOG_DATA) public data: any,
        private _snackBar: MatSnackBar,
        private httpClient: HttpClient) {
        if (this.data != null) {
            this.question_id = this.data;
        }
    }

    confirmDelete() {
        if (this.question_id == null || this.question_id == 0) {
            return;
        }
        this.loading = true;
        this.httpClient.get('http://localhost/project/feringo/api/v1/delete_record/question/question_id=' + this.question_id).subscribe(
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
