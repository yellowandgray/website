import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SubjectComponent } from './subject/subject.component';
import { QuestionComponent } from './question/question.component';
import { TopicComponent } from './topic/topic.component';
import { UserComponent } from './user/user.component';
import { SubTopicComponent } from './sub-topic/sub-topic.component';


const routes: Routes = [
        {path: '', component: SubjectComponent},
        {path: 'subject', component: SubjectComponent},
        {path: 'topic', component: TopicComponent},
        {path: 'question', component: QuestionComponent},
        {path: 'user', component: UserComponent},
        {path: 'sub_topic', component: SubTopicComponent},
    ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
