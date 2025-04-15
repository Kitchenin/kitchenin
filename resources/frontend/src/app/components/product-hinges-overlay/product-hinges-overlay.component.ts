import { Component, OnInit, Inject } from '@angular/core';
import { MAT_DIALOG_DATA } from '@angular/material';

@Component({
  selector: 'app-product-hinges-overlay',
  templateUrl: './product-hinges-overlay.component.html',
  styleUrls: ['./product-hinges-overlay.component.scss']
})
export class ProductHingesOverlayComponent implements OnInit {

  constructor(@Inject(MAT_DIALOG_DATA) public data: any) { }

  ngOnInit() {
  }

}
