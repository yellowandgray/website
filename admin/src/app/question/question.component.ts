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
declare const applyMathAjax: any;

@Component({
  selector: "app-question",
  templateUrl: "./question.component.html",
  styleUrls: ["./question.component.css"]
})
export class QuestionComponent implements OnInit {
  image_url: string = "http://localhost/project/examhorse/api/v1/";
  topic = [];
  question = [];
  year = [];
  language = [];
  otherlangquestion = [];
  subject = [];
  loading = false;
  file_name: string = "Select Picture";
  //selected_language = "";
  selected_language = 0;
  //selected_subject = "";
  selected_subject = 0;
  //selected_year = "";
  selected_year =0;
  //selected_topic = "";
  selected_topic = 0;
  selected_topic_index = 0;
  questionloader = false;
  showotherlang = false; 
  alllang_checked = false;

  constructor(
    public dialog: MatDialog,
    private httpClient: HttpClient,
    private _snackBar: MatSnackBar,
  ) {}
  

    
  ngOnInit() {
       this.getLanguageInit();  
  
  }

  
 getLanguageInit(): void {
    this.httpClient
      .get<any>("http://localhost/project/examhorse/api/v1/get_language")
      .subscribe(
        res => {
          this.language = res["result"]["data"];
          //this.selected_language = res["result"]["data"][0]["language_id"];
          //this.getYearByLanguage();
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }
  getLanguage(): void {
    this.httpClient
      .get<any>("http://localhost/project/examhorse/api/v1/get_language")
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
  getYearByLanguage(): void {
    this.alllang_checked = false;
    this.subject = [];
    this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_year_by_language/" +
          this.selected_language          
      )
      .subscribe(
        res => {
          this.year = res["result"]["data"];
          this.selected_year = 0;
          this.selected_subject = 0;
          this.selected_topic   = 0;
          this.getSubjectByYearnLanguage();
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }

  getSubjectByLanguage(): void {
    this.subject = [];
    this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_subject_by_language/" +
          this.selected_language         
      )
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

  getSubjectByYearnLanguage(): void {
    this.subject = [];
    this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_subject_by_language_n_year/" +
          this.selected_language +
          "/" +
          this.selected_year
      )
      .subscribe(
        res => {
          this.subject = res["result"]["data"];
          this.selected_subject = 0;
          this.selected_topic   = 0;
           this.getQuestionsByYearAndLang();
          /*
          if (this.selected_topic != "") {
            this.getQuestionsByTopicYear();                
          }
          else if(this.selected_subject == "") {
             this.getQuestionsByYearAndLang();
          }
          else if(this.selected_subject == 0) {
              this.getQuestionsByYearAndLang();
          }
          else if(this.selected_subject != "ALL" && this.selected_subject != "") {
              this.getQuestionsByYearAndLangAndSubj();
          }
           */
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }

    getQuestionsByYearAndLangAndSubj(): void {
    //var tid = this.topic[ev.value].topic_id;
    //var tid = ev.value;
    //this.selected_topic_index = ev.value;
    var lid = this.selected_language;
    var sel_year = this.selected_year;
    var subj     = this.selected_subject;
   this.questionloader = true;
    this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_question_by_year_n_lang_n_subj/"+lid+"/"+sel_year+"/"+subj
      )
      .subscribe(
        res => {
          this.question = res["result"]["data"];
          setTimeout(() => {
                            applyMathAjax();
                        }, 600);
                        this.questionloader = false;
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }   

   getQuestionsByYearAndLang(): void {
    //var tid = this.topic[ev.value].topic_id;
    //var tid = ev.value;
    //this.selected_topic_index = ev.value;
    var lid = this.selected_language;
    var sel_year = this.selected_year;
    this.questionloader = true;
    this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_question_by_year_n_lang/"+lid+"/"+sel_year
      )
      .subscribe(
        res => {
          this.question = res["result"]["data"];
          setTimeout(() => {
                            applyMathAjax();                             
                        }, 600);
                        this.questionloader = false;
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }  
      
  getTopicBySubject(): void {
    this.topic = [];
    if(this.selected_subject == 0 && this.selected_language != 0 && this.selected_year != 0) {
              //alert('1234');  
              this.getQuestionsByYearAndLang();
              this.selected_topic = 0;
     } 
    else { 
    if(this.selected_subject != 0 &&  this.selected_language != 0 && this.selected_year != 0) {
        this.getQuestionsByYearAndLangAndSubj();
        this.selected_topic = 0;
    }
    this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_topic_by_subject_n_year/" +
          this.selected_subject +
          "/" +
          this.selected_year
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
  }
  getQuestionsByTopicYear(): void {
    //var tid = this.topic[ev.value].topic_id;
    //var tid = ev.value;
    //this.selected_topic_index = ev.value;
    var tid = this.selected_topic;
    var sid = this.selected_subject;
    var sel_year = this.selected_year;

     if(tid==0 && sid!=0 && sel_year != 0){
            this.getQuestionsByYearAndLangAndSubj();
         }
    else 
        {
        this.questionloader = true;
    this.httpClient
      .get<any>(
        
       
            "http://localhost/project/examhorse/api/v1/get_question_by_topic_and_year/" +
              tid +
              "/" +
              sel_year
           
      )
      .subscribe(
        res => {
          this.question = res["result"]["data"];
          setTimeout(() => {
                            applyMathAjax();                             
                             
                        }, 600);
                        this.questionloader = false;   
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
      }   
  }
  getQuestionsByTopic(ev): void {
    //var tid = this.topic[ev.value].topic_id;
    var tid = ev.value;
    this.selected_topic_index = ev.value;
    this.questionloader = true;
    this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_question_by_topic_n_year/" +
          tid
      )
      .subscribe(
        res => {
          this.question = res["result"]["data"];
          setTimeout(() => {
                            applyMathAjax();                            
                        }, 600);
                        this.questionloader = false;   
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
        "http://localhost/project/examhorse/api/v1/get_topic_by_lng_year/" +
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
 getAlllangquestions(ev):void {

var lid                     = this.selected_language;
var sel_year                = this.selected_year;
var selected_subject        = this.selected_subject;
var selected_topic          = this.selected_topic;



this.showotherlang = false;
if(ev) {
    this.showotherlang = true;
this.httpClient
      .get<any>(
        "http://localhost/project/examhorse/api/v1/get_question_by_year_n_otherlang/"+lid+"/"+sel_year
      )
      .subscribe(
        res => {
          var res     = res["result"]["data"];
          var datares = [];
          if(res){
                res.forEach(function (value) {
                        console.log(value.question_no);
                        
                       if(value.question_no){
                            datares[value.question_no] = value;     
                       } 
                      
                });
                
          }

          
          
        if(lid!=0 && sel_year!=0 && selected_subject!=0 && selected_topic!=0)
        {
            this.getQuestionsByTopicYear();
            this.otherlangquestion = datares;
        }else if(lid!=0 && sel_year!=0 && selected_subject!=0) {
            this.getQuestionsByYearAndLangAndSubj();
            this.otherlangquestion = datares;
        }else if(lid!=0 && sel_year!=0) {
            this.getQuestionsByYearAndLang();
            this.otherlangquestion = datares;
        }

          setTimeout(() => {
                            
                            applyMathAjax();                             
                        }, 600);
                        this.questionloader = false;
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
}
else
{
    if(lid!=0 && sel_year!=0 && selected_subject!=0 && selected_topic!=0)
    {
        this.getQuestionsByTopicYear();
       
    }
    else if(lid!=0 && sel_year!=0 && selected_subject!=0) {
        this.getQuestionsByYearAndLangAndSubj();
    }
    else if(lid!=0 && sel_year!=0) {
            this.getQuestionsByYearAndLang();            
     }
    setTimeout(() => {
                            
                            applyMathAjax();                             
                        }, 600);
                        this.questionloader = false;
}
   
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
      //alert(data.topic_id);
     
      if(this.selected_subject) {
           data.subject_id = this.selected_subject;
     }

     if(this.selected_language) {
         data.language_id = this.selected_language;
     }
     console.log(data);
    }
    const dialogRef = this.dialog.open(QuestionForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== "false") {
        //this.getQuestionsByTopic({ value: this.selected_topic_index });
        //this.getQuestionsByTopicYear();
        this.getSubjectByYearnLanguage();
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
        //this.getQuestionsByTopic({ value: this.selected_topic_index });
        this.getQuestionsByTopicYear();
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
        "http://localhost/project/examhorse/api/v1/import_question",
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
  image_url: string = "http://localhost/project/examhorse/api/v1/";
  questionForm: FormGroup;
  loading = false;
  question_id = 0;
  question_image: string = "Select question Image";
  option_a_image: string = "Option A Image";
  option_b_image: string = "Option B Image";
  option_c_image: string = "Option C Image";
  option_d_image: string = "Option D Image";
  explanation_image: string = "Select Explanation Image";
  image_path: string = "";
  language:any[];
  subject: any[];
  topic: any[];
  year: any[];
  book: any[];
  option_image_a: string = "";
  option_image_b: string = "";
  option_image_c: string = "";
  option_image_d: string = "";
  image_path_explanation: string = "";
  constructor(
    public dialogRef: MatDialogRef<QuestionForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient
  ) {
    this.questionForm = new FormGroup({
      language_id: new FormControl("", Validators.required),    
      subject_id: new FormControl("", Validators.required),  
      topic_id: new FormControl("", Validators.required),
      question: new FormControl("", Validators.required),
      question_no: new FormControl("", Validators.required),
      direction: new FormControl(""),
      year_id: new FormControl("", Validators.required),
      a: new FormControl("", Validators.required),
      b: new FormControl("", Validators.required),
      c: new FormControl(""),
      d: new FormControl(""),
      answer: new FormControl("", Validators.required),
      explanation: new FormControl(""),
      explanation_img_direction: new FormControl(""),
      data_dictionary: new FormControl(""),
      book_id: new FormControl(""),
      page_no: new FormControl(""),
      notes: new FormControl("")
    });
    if (this.data != null) {
      this.questionForm.patchValue({
        language_id:this.data.language_id,
        subject_id: this.data.subject_id,
        topic_id: this.data.topic_id,
        question: this.data.name,
        question_no: this.data.question_no,
        direction: this.data.direction,
        year_id: this.data.year_id,
        a: this.data.a,
        b: this.data.b,
        c: this.data.c,
        d: this.data.d,
        answer: this.data.answer,
        explanation: this.data.explanation,
        explanation_img_direction: this.data.explanation_img_direction,
        data_dictionary: this.data.data_dictionary,
        book_id: this.data.book_id,
        page_no: this.data.page_no,
        notes: this.data.notes
      });
      this.question_id = this.data.question_id;
      this.image_path = this.data.image_path;
      this.image_path_explanation = this.data.image_path_explanation;
    }
    
    this.httpClient
      .get("http://localhost/project/examhorse/api/v1/get_language")
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
    
    if(this.data) {  
    this.httpClient
      .get("http://localhost/project/examhorse/api/v1/get_subject_by_language/"+this.data.language_id)
      .subscribe(
        res => {
          if (res["result"]["error"] === false) {
            this.subject = res["result"]["data"];
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

    if(this.data) {       
     if(!this.data.subject_id) {
     this.httpClient
            .get("http://localhost/project/examhorse/api/v1/get_topic_details/"+this.data.topic_id)
            .subscribe(
              res => {
                if (res["result"]["error"] === false) {
                    this.data.subject_id = res["result"]["data"]["subject_id"];  
                     this.questionForm.patchValue({
                        subject_id : this.data.subject_id
                    });

                    this.httpClient
                  .get("http://localhost/project/examhorse/api/v1/get_topic_by_subject/"+this.data.subject_id)
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
    else {
    this.httpClient
      .get("http://localhost/project/examhorse/api/v1/get_topic_by_subject/"+this.data.subject_id)
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
   }
  }

    this.httpClient
      .get("http://localhost/project/examhorse/api/v1/get_year")
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
    this.httpClient
      .get<any>("http://localhost/project/examhorse/api/v1/get_book")
      .subscribe(
        res => {
          this.book = res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );
  }


   getSubjectByLanguageEdit(ev): void {
     this.subject = [];
    if(ev) {

    var lang = ev.value;
   

        this.httpClient
          .get<any>(
            "http://localhost/project/examhorse/api/v1/get_subject_by_language/" +
              lang     
          )
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
    this.getTopicBySelSubjectEdit(null);
  }

  getTopicBySelSubjectEdit(ev): void {
   this.topic = [];
    if(ev) {
    var subj = ev.value;   
        this.httpClient
          .get<any>(
            "http://localhost/project/examhorse/api/v1/get_topic_by_subject/" +
              subj
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
      formData.append("image_path_explanation", this.image_path_explanation);
      formData.append("question_no", this.questionForm.value.question_no);
      formData.append("direction", this.questionForm.value.direction);
      formData.append("year_id", this.questionForm.value.year_id);
      formData.append("a", this.questionForm.value.a);
      formData.append("b", this.questionForm.value.b);
      formData.append("c", this.questionForm.value.c);
      formData.append("d", this.questionForm.value.d);
      formData.append("answer", this.questionForm.value.answer);
      formData.append("explanation", this.questionForm.value.explanation);
      formData.append(
        "explanation_img_direction",
        this.questionForm.value.explanation_img_direction
      );
      formData.append(
        "data_dictionary",
        this.questionForm.value.data_dictionary
      );
      formData.append("page_no", this.questionForm.value.page_no);
      formData.append("book_id", this.questionForm.value.book_id);
      formData.append("notes", this.questionForm.value.notes);
      url = "update_record/question/question_id = " + this.question_id;
    } else {
      formData.append("topic_id", this.questionForm.value.topic_id);
      formData.append("question", this.questionForm.value.question);
      formData.append("question_image", this.image_path);
      formData.append("explanation_image", this.image_path_explanation);
      formData.append("question_no", this.questionForm.value.question_no);
      formData.append("direction", this.questionForm.value.direction);
      formData.append("year_id", this.questionForm.value.year_id);
      formData.append("a", this.questionForm.value.a);
      formData.append("b", this.questionForm.value.b);
      formData.append("c", this.questionForm.value.c);
      formData.append("d", this.questionForm.value.d);
      formData.append("answer", this.questionForm.value.answer);
      formData.append("explanation", this.questionForm.value.explanation);
      formData.append(
        "explanation_img_direction",
        this.questionForm.value.explanation_img_direction
      );
      formData.append(
        "data_dictionary",
        this.questionForm.value.data_dictionary
      );
      formData.append("page_no", this.questionForm.value.page_no);
      formData.append("book_id", this.questionForm.value.book_id);
      formData.append("notes", this.questionForm.value.notes);
      url = "insert_question";
    }
    this.httpClient
      .post("http://localhost/project/examhorse/api/v1/" + url, formData)
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
      .post("http://localhost/project/examhorse/api/v1/upload_file", formData)
      .subscribe(
        res => {
          this.loading = false;
          if (res["result"]["error"] === false) {
            this[path] = res["result"]["data"];
            if (path == "option_image_a") {
              this.questionForm.patchValue({
                a:
                  '<img src="' +
                  this.image_url +
                  res["result"]["data"] +
                  '" alt="option" />'
              });
            }
            if (path == "option_image_b") {
              this.questionForm.patchValue({
                b:
                  '<img src="' +
                  this.image_url +
                  res["result"]["data"] +
                  '" alt="option" />'
              });
            }
            if (path == "option_image_c") {
              this.questionForm.patchValue({
                c:
                  '<img src="' +
                  this.image_url +
                  res["result"]["data"] +
                  '" alt="option" />'
              });
            }
            if (path == "option_image_d") {
              this.questionForm.patchValue({
                d:
                  '<img src="' +
                  this.image_url +
                  res["result"]["data"] +
                  '" alt="option" />'
              });
            }
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
  removeMedia1(url) {
    this[url] = "";
    if (url === "image_path_explanation") {
      this.explanation_image = "Select Explanation Image";
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
    uploadUrl: "http://localhost/project/examhorse/api/v1/upload_image",
    sanitize: true,
    toolbarPosition: "top"
  };
  editorOptionConfig: AngularEditorConfig = {
    editable: true,
    spellcheck: true,
    height: "20px",
    minHeight: "20px",
    maxHeight: "20px",
    width: "auto",
    minWidth: "0",
    translate: "no",
    enableToolbar: true,
    showToolbar: false,
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
    uploadUrl: "http://localhost/project/examhorse/api/v1/upload_image",
    sanitize: true,
    toolbarPosition: "top"
  };
  editorExplanationConfig: AngularEditorConfig = {
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
    uploadUrl: "http://localhost/project/examhorse/api/v1/upload_image",
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
        "http://localhost/project/examhorse/api/v1/delete_record/question/question_id=" +
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
