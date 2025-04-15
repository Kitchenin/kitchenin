import { Component, OnInit, Input } from '@angular/core';
import { Photo } from "../../models/photo";
import { MatDialog } from "@angular/material";
import { ProductImageOverlayComponent } from '../product-image-overlay/product-image-overlay.component';

@Component({
  selector: 'app-product-images-carousel',
  templateUrl: './product-images-carousel.component.html',
  styleUrls: ['./product-images-carousel.component.scss']
})
export class ProductImagesCarouselComponent implements OnInit {
  filteredPhotos: Photo[];
  selectedPhoto: Photo;
  @Input() photos: Photo[];
  encodeURI = encodeURI;

  constructor(private dialog: MatDialog) { }

  ngOnInit() {
    if (this.photos && this.photos.length) {
      this.filteredPhotos = this.photos.filter(function (photo) {
        return photo.featured.toString() !== '1'; //TODO number or string???
      });

      if (this.filteredPhotos && this.filteredPhotos.length) {
        this.selectedPhoto = this.filteredPhotos[0];
      }
    }
  }

  selectImage(photo: Photo) {
    this.selectedPhoto = photo;
  }

  displayPanelClick() {
    const dialogRef = this.dialog.open(ProductImageOverlayComponent, {
        data: {
            photo: this.selectedPhoto
        }
    });
  }
}
