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
import { FeedbackComponent } from './feedback/feedback.component';
import { StandardComponent } from './standard/standard.component';
import { SubTopicComponent } from './sub-topic/sub-topic.component';


const routes: Routes = [
        {path: '', component: LoginComponent},
        {path: 'user', component: UserComponent},
        {path: 'subject', component: SubjectComponent},
        {path: 'topic', component: TopicComponent},
        {path: 'question', component: QuestionComponent},
        {path: 'chapter', component: ChapterComponent},
        {path: 'difficulty', component: DifficultyLevelComponent},
        {path: 'book', component: BookComponent},
        {path: 'standard', component: StandardComponent},
        {path: 'feedback', component: FeedbackComponent},
        {path: 'sub-topic', component: SubTopicComponent},
    ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
