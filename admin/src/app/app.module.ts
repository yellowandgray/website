import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import {MatToolbarModule} from '@angular/material/toolbar';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {MatSidenavModule} from '@angular/material/sidenav';
import {MatIconModule} from '@angular/material/icon';
import {MatTooltipModule} from '@angular/material/tooltip';
import {MatListModule} from '@angular/material/list';
import {MatTabsModule} from '@angular/material/tabs';
import {HttpClientModule} from '@angular/common/http';
import {MatSnackBarModule} from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatButtonModule} from '@angular/material/button';
import {MatButtonToggleModule} from '@angular/material/button-toggle';
import { FlexLayoutModule } from '@angular/flex-layout';
import {MatDialogModule} from '@angular/material/dialog';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import {MatProgressBarModule} from '@angular/material/progress-bar';
import {MatSelectModule} from '@angular/material/select';
import { AngularEditorModule } from '@kolkov/angular-editor';
import {MatExpansionModule} from '@angular/material/expansion';
import {MatCardModule} from '@angular/material/card';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { SubjectComponent, SubjectForm, SubjectDelete } from './subject/subject.component';
import { HeaderComponent } from './header/header.component';
import { SidenavComponent } from './sidenav/sidenav.component';
import { QuestionComponent, QuestionForm, QuestionDelete } from './question/question.component';
import { TopicComponent, TopicForm, TopicDelete } from './topic/topic.component';
import { UserComponent, PictureViewUser, UserForm, UserDelete, BlockForm, ResultForm, UserViewForm } from './user/user.component';
import { YearComponent, YearForm, YearDelete } from './year/year.component';
import { LoginComponent } from './login/login.component';
import { filterUser } from './user/filter-user';
import { BookComponent, BookForm, BookDelete } from './book/book.component';
import { FeedbackComponent, FeedbackForm, FeedbackDelete } from './feedback/feedback.component';



@NgModule({
  declarations: [
    AppComponent,
    SubjectComponent,
    SubjectForm,
    SubjectDelete,
    HeaderComponent,
    SidenavComponent,
    QuestionComponent,
    QuestionForm,
    QuestionDelete,
    TopicComponent,
    TopicForm,
    TopicDelete,
    UserComponent,
    PictureViewUser,
    UserForm,
    UserDelete,
    UserViewForm,
    BlockForm,
    ResultForm,
    YearComponent,
    YearForm,
    YearDelete,
    LoginComponent,
    filterUser,
    BookComponent,
    BookForm, 
    BookDelete, 
    FeedbackComponent,
    FeedbackForm,
    FeedbackDelete
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    MatToolbarModule,
    BrowserAnimationsModule,
    MatSidenavModule,
    MatIconModule,
    MatTooltipModule,
    MatListModule,
    MatTabsModule,
    HttpClientModule,
    MatSnackBarModule,
    MatPaginatorModule,
    MatButtonModule,
    FlexLayoutModule,
    MatDialogModule,
    MatFormFieldModule,
    MatInputModule,
    FormsModule,
    ReactiveFormsModule,
    MatProgressSpinnerModule,
    MatProgressBarModule,
    MatSelectModule,
    AngularEditorModule,
    MatExpansionModule,
    MatButtonToggleModule,
    MatCardModule
  ],
  entryComponents: [SubjectComponent, SubjectForm, SubjectDelete, QuestionComponent, QuestionForm, QuestionDelete, TopicComponent, TopicForm, TopicDelete, UserComponent, UserForm, PictureViewUser, UserDelete, BlockForm, ResultForm, UserViewForm, YearComponent, YearForm, YearDelete, BookComponent, BookForm, BookDelete, FeedbackComponent, FeedbackForm, FeedbackDelete],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
