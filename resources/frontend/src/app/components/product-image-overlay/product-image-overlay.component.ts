import { Component, OnInit, Inject } from '@angular/core';
import { MAT_DIALOG_DATA } from '@angular/material';

@Component({
  selector: 'app-product-image-overlay',
  templateUrl: './product-image-overlay.component.html',
  styleUrls: ['./product-image-overlay.component.scss']
})
export class ProductImageOverlayComponent implements OnInit {
  filename: string;

  constructor(@Inject(MAT_DIALOG_DATA) public data: any) { }

  ngOnInit() {
    this.filename = encodeURI(this.data.photo.filename);
  }

}
