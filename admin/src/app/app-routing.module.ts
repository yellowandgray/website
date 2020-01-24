import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SubjectComponent } from './subject/subject.component';
import { QuestionComponent } from './question/question.component';
import { TopicComponent } from './topic/topic.component';
import { UserComponent } from './user/user.component';
import { YearComponent } from './year/year.component';


const routes: Routes = [
        {path: '', component: YearComponent},
        {path: 'subject', component: SubjectComponent},
        {path: 'topic', component: TopicComponent},
        {path: 'question', component: QuestionComponent},
        {path: 'user', component: UserComponent},
        {path: 'year', component: YearComponent},
    ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
