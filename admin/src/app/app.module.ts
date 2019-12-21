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
import { FlexLayoutModule } from '@angular/flex-layout';
import {MatDialogModule} from '@angular/material/dialog';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import {MatProgressBarModule} from '@angular/material/progress-bar';
import {MatSelectModule} from '@angular/material/select';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { SubjectComponent, SubjectForm, SubjectDelete } from './subject/subject.component';
import { HeaderComponent } from './header/header.component';
import { SidenavComponent } from './sidenav/sidenav.component';
import { QuestionComponent } from './question/question.component';
import { TopicComponent, TopicForm, TopicDelete } from './topic/topic.component';
import { UserComponent, UserForm, UserDelete, BlockForm, ResultForm } from './user/user.component';



@NgModule({
  declarations: [
    AppComponent,
    SubjectComponent,
    SubjectForm,
    SubjectDelete,
    HeaderComponent,
    SidenavComponent,
    QuestionComponent,
    TopicComponent,
    TopicForm,
    TopicDelete,
    UserComponent,
    UserForm,
    UserDelete,
    BlockForm,
    ResultForm
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
    
  ],
  entryComponents: [SubjectComponent, SubjectForm, SubjectDelete, QuestionComponent, TopicComponent, TopicForm, TopicDelete, UserComponent, UserForm, UserDelete, BlockForm, ResultForm],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
