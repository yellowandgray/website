import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import {MatToolbarModule} from '@angular/material/toolbar';
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
import {MatExpansionModule} from '@angular/material/expansion';
import {MatCardModule} from '@angular/material/card';
import {MatDatepickerModule} from '@angular/material/datepicker';

import { SidenavComponent } from './sidenav/sidenav.component';
import { HeaderComponent } from './header/header.component';
import { LoginComponent } from './login/login.component';
import { ProductComponent, ProductForm, ProductImageView, ProductDelete, TagForm, ProductViewForm } from './product/product.component';
import { TrainComponent, TrainForm, TrainDelete } from './train/train.component';
import { FloorComponent, FloorForm, FloorDelete} from './floor/floor.component';
import { StaffComponent, StaffForm, StaffImageView, StaffDelete } from './staff/staff.component';
import { CommandComponent, CommandDialog, CommandDelete } from './command/command.component';
import { CategoryComponent, CategoryForm, CategoryDelete } from './category/category.component';
import { ReportComponent } from './report/report.component';

@NgModule({
  declarations: [
    AppComponent,
    SidenavComponent,
    HeaderComponent,
    LoginComponent,
    ProductComponent,
    ProductForm,
    ProductImageView,
    ProductDelete,
    TagForm,
    ProductViewForm,
    TrainComponent,
    TrainForm,
    TrainDelete,
    FloorComponent,
    FloorForm,
    FloorDelete,
    StaffComponent,
    StaffForm,
    StaffImageView,
    StaffDelete,
    CommandComponent,
    CommandDialog,
    CommandDelete,
    CategoryComponent,
    CategoryForm,
    CategoryDelete,
    ReportComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    MatProgressBarModule,
    BrowserAnimationsModule,
    FormsModule,
    ReactiveFormsModule,
    MatFormFieldModule,
    MatCardModule,
    MatButtonModule,
    MatSnackBarModule,
    MatInputModule,
    FlexLayoutModule,
    MatToolbarModule,
    MatIconModule,
    MatTooltipModule,
    MatSidenavModule,
    MatListModule,
    MatDialogModule,
    HttpClientModule,
    MatTabsModule,
    MatPaginatorModule,
    MatProgressSpinnerModule,
    MatSelectModule,
    MatButtonToggleModule,
    MatExpansionModule,
    MatDatepickerModule
  ],
  entryComponents: [
    ProductComponent,
    ProductForm,
    ProductImageView,
    ProductDelete,
    TagForm,
    ProductViewForm,
    TrainComponent,
    TrainForm,
    TrainDelete,
    FloorComponent,
    FloorForm,
    FloorDelete,
    StaffComponent,
    StaffForm,
    StaffImageView,
    StaffDelete,
    CommandComponent,
    CommandDialog,
    CommandDelete,
    CategoryComponent,
    CategoryForm,
    CategoryDelete,
    ReportComponent
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
