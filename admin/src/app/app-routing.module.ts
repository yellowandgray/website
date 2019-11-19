import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { KuralComponent } from './kural/kural.component';
import { HeaderComponent } from './header/header.component';
import { SidenavComponent } from './sidenav/sidenav.component';


const routes: Routes = [
    {path: '', component: KuralComponent}
        ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
