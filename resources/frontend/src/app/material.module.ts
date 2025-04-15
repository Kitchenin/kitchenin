import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {
    MatCheckboxModule,
    MatDialogModule,
    MatIconModule,
    MatInputModule,
    MatRadioModule,
    MatSelectModule,
    MatSnackBarModule,
    MatTooltipModule
} from "@angular/material";
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";

@NgModule({
    imports: [
        CommonModule,
        BrowserAnimationsModule,

        MatCheckboxModule,
        MatDialogModule,
        MatIconModule,
        MatInputModule,
        MatRadioModule,
        MatSelectModule,
        MatSnackBarModule,
        MatTooltipModule
    ],
    exports: [
        BrowserAnimationsModule,

        MatCheckboxModule,
        MatDialogModule,
        MatIconModule,
        MatInputModule,
        MatRadioModule,
        MatSelectModule,
        MatSnackBarModule,
        MatTooltipModule
    ],
    declarations: []
})
export class MaterialModule {
}
