<form>
        <div fxLayout="row" fxLayout.xs="column" fxLayoutWrap fxLayoutGap="0.5%" fxLayoutAlign="start start">
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>First Name</mat-label>
                    <input matInput placeholder="" required formControlName="" />
                    <mat-error>First Name is required</mat-error>
                </mat-form-field>
            </div>
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>Last Name</mat-label>
                    <input matInput placeholder="" required formControlName="" />
                    <mat-error>Last Name is required</mat-error>
                </mat-form-field>
            </div>
        </div>
        <div fxLayout="row" fxLayout.xs="column" fxLayoutWrap fxLayoutGap="0.5%" fxLayoutAlign="start start">
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>Gender</mat-label>
                    <mat-select formControlName="">
                        <mat-option value="male"> Male </mat-option>
                        <mat-option value="female"> Female</mat-option>
                    </mat-select>
                </mat-form-field>
            </div>
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>Age</mat-label>
                    <input matInput placeholder="" required formControlName="" />
                    <mat-error>Age is required</mat-error>
                </mat-form-field>
            </div>
        </div>
        <div fxLayout="row" fxLayout.xs="column" fxLayoutWrap fxLayoutGap="0.5%" fxLayoutAlign="start start">
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>Date of Birth</mat-label>
                    <input matInput placeholder="" required formControlName="" />
                    <mat-error>Date of Birth is required</mat-error>
                </mat-form-field>
            </div>
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>Mobile</mat-label>
                    <input matInput placeholder="" required formControlName="" />
                    <mat-error>Mobile is required</mat-error>
                </mat-form-field>
            </div>
        </div>
        <div fxLayout="row" fxLayout.xs="column" fxLayoutWrap fxLayoutGap="0.5%" fxLayoutAlign="start start">
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>Email</mat-label>
                    <input matInput placeholder="" required formControlName="" />
                    <mat-error>Email is required</mat-error>
                </mat-form-field>
            </div>
            <div fxFlex="50%">
                <mat-form-field appearance="outline" fxFlex="100%">
                    <mat-label>Mobile</mat-label>
                    <input matInput placeholder="" required formControlName="" />
                    <mat-error>Mobile is required</mat-error>
                </mat-form-field>
            </div>
        </div>
        <div fxLayout="row" fxLayout.xs="column" fxLayoutWrap fxLayoutGap="0.5%" fxLayoutAlign="start start">
            <div fxFlex="100%">
                <mat-form-field fxFlex="100%">
                    <mat-label>Description</mat-label>
                    <textarea rows="10" matInput placeholder="" required formControlName=""></textarea>
                    <mat-error>Description is required</mat-error>
                </mat-form-field>
            </div>
        </div>
        <div fxLayout="row" fxLayoutWrap fxLayoutGap="0.5%" fxLayoutAlign="end center">
            <button mat-button [mat-dialog-close]="false">Cancel</button>
            <button mat-button type="submit" [disabled]="loading">Save</button>
            <mat-progress-spinner
                class="example-margin"
                *ngIf="loading"
                [mode]="'indeterminate'"
                [strokeWidth]="3"
                [diameter]="25">
            </mat-progress-spinner>
        </div>
    </form>