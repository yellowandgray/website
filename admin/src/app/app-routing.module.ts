import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SubjectComponent } from './subject/subject.component';
import { QuestionComponent } from './question/question.component';
import { TopicComponent } from './topic/topic.component';
import { ChapterComponent } from './chapter/chapter.component';
import { LoginComponent } from './login/login.component';
import { DifficultyLevelComponent } from './difficulty-level/difficulty-level.component';
import { UserComponent } from './user/user.component';
import { BookComponent } from './book/book.component';


const routes: Routes = [
        {path: '', component: LoginComponent},
        {path: 'user', component: UserComponent},
        {path: 'subject', component: SubjectComponent},
        {path: 'topic', component: TopicComponent},
        {path: 'question', component: QuestionComponent},
        {path: 'chapter', component: ChapterComponent},
        {path: 'book', component: BookComponent},
        {path: 'difficulty', component: DifficultyLevelComponent}
    ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
