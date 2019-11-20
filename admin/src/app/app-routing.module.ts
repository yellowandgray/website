import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { KuralComponent } from './kural/kural.component';
import { HeaderComponent } from './header/header.component';
import { SidenavComponent } from './sidenav/sidenav.component';
import { MemberComponent } from './member/member.component';
import { TaskComponent } from './task/task.component';


const routes: Routes = [
    {path: '', component: KuralComponent},
    {path: 'kural', component: KuralComponent},
    {path: 'member', component: MemberComponent},
    {path: 'task', component: TaskComponent}
    ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
