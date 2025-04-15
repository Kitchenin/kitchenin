import {Component, OnInit, DoCheck} from '@angular/core';
import {ActivatedRoute} from "@angular/router";
import {ApiService} from "../../services/api.service";
import {Product} from "../../models/product";
import {BasketItem} from "../../models/basket-item";
import {CartService} from "../../services/cart.service";
import { Colour } from '../../models/colour';
import { Ending } from '../../models/ending';
import { MatDialog, MatSnackBarConfig } from '@angular/material';
import { ProductHingesOverlayComponent } from '../product-hinges-overlay/product-hinges-overlay.component';
import { ProductImageOverlayComponent } from '../product-image-overlay/product-image-overlay.component';
import { Option } from '../../models/options';
import { SettingsProvider } from "../../providers/settings-provider";
import { MatSnackBar } from '@angular/material';

@Component({
    selector: 'app-product-detail',
    templateUrl: './product-detail.component.html',
    styleUrls: ['./product-detail.component.scss']
})
export class ProductDetailComponent implements OnInit, DoCheck {
    product: Product;
    basketItem: BasketItem;
    selectedColour: Colour;
    selectedEnding: Ending;
    selectedHingeSide: string;
    mode: string;
    selectedSize: Option;
    calculatedDoorHeight: any;
    drillingPrice: number;
    sampleFormSubmitted: boolean;
    snackConfig: MatSnackBarConfig = {
        verticalPosition: 'top',
        duration: 1000
    };

    encodeURI = encodeURI;
    isLoggedIn: boolean = (window as any).isLoggedIn;

    constructor(
        private api: ApiService,
        private route: ActivatedRoute,
        private cart: CartService,
        private dialog: MatDialog,
        private settings: SettingsProvider,
        private snackBar: MatSnackBar
    ) {
        this.basketItem = new BasketItem();
        this.basketItem.quantity = 1;
        this.drillingPrice = this.settings.getDrillingPrice();
    }

    ngOnInit() {
        this.route.params.subscribe(val => {
            this.getProduct();
        });

        this.mode = 'standard';
    }

    getProduct() {
        const id = +this.route.snapshot.paramMap.get('product_id');

        this.api.getProductDetails(id).subscribe(product => {
            this.product = product;
            this.basketItem.product = this.product;
            this.basketItem.product_id = this.product.id;
            this.getBasketItem();
        });
    }

    // selectColour(colour) {
    //     this.selectedColour = colour;
    //     this.basketItem.colour = colour;
    //     this.basketItem.colour_id = colour.id;
    // }

    selectEnding() {
        this.basketItem.ending_id = this.basketItem.ending.id;
    }

    resetHinges() {
        if (this.selectedHingeSide !== 'NO') {
            this.basketItem.hinge_side = this.selectedHingeSide;
        } else {
            delete this.basketItem.hinge_side;
        }

        delete this.basketItem.hinge_bottom;
        delete this.basketItem.hinge_top;
        delete this.basketItem.hinge_left;
        delete this.basketItem.hinge_right;

        if (!this.basketItem.hinge_side) {
            delete this.basketItem.hinge_center;
        }

        this.getBasketItem();
    }

    getBasketItem() {
        if (this.mode === 'custom' && !(this.basketItem.width && this.basketItem.height))  {
            return;
        }

        this.api.getBasketItem(this.basketItem).subscribe(res => this.basketItem = res);
    }

    addToBasket() {
        this.basketItem.product = this.product;
        this.basketItem.product_id = this.product.id;

        this.snackBar.open(this.cart.addItem(this.basketItem).message, '', this.snackConfig);
    }

    addSampleToBasket() {
        var sampleBasketItem = new BasketItem();
        sampleBasketItem.product_id = this.product.id;
        sampleBasketItem.product = this.product;

        sampleBasketItem.price = this.product.sample_price;
        sampleBasketItem.isSample = true;

        sampleBasketItem.colour = this.selectedColour;
        sampleBasketItem.colour_id = (this.selectedColour && this.selectedColour.id) || -1;
        sampleBasketItem.quantity = 1;

        this.snackBar.open(this.cart.addItem(sampleBasketItem).message, '', this.snackConfig);
    }

    viewDrillingCombinations() {
        const dialogRef = this.dialog.open(ProductHingesOverlayComponent, {
            data: {
                side: this.basketItem.hinge_side
            }
        });
    }

    bannerClick() {
        const dialogRef = this.dialog.open(ProductImageOverlayComponent, {
            data: {
                photo: this.product.getFeaturedPhoto()
            }
        });
    }

    getCenterHoles() {
        if (!this.basketItem.hinge_side) {
            return 0;
        }

        if (this.mode === 'standard') {
            if (this.selectedSize && this.selectedSize.name.indexOf('tall door') !== -1) {
                return 2;
            } else {
                return 0;
            }
        }

        if (this.mode === 'custom') {
            return 2;
        }

        return 0;
    }

    onSelectedSize() {
        this.basketItem.size_id = this.selectedSize.id;
        this.getBasketItem();
    }

    hasHiges() {
        return this.mode === 'custom' || (this.selectedSize && this.selectedSize.name.indexOf('drawer front') === -1);
    }


    calculateDoorHeight() {
        const width = this.getDoorWidth();
        const height = this.getDoorHeight()

        if (!width || !height) {
            return {
                'height': '200px'
            }
        }

        return {
            'height': 200 *  height / width  + 'px'
        };
    }

    getDoorHeight() {
        if (this.mode === 'standard') {
            return this.selectedSize && this.selectedSize.height;
        } else {
            return this.basketItem.height;
        }
    }

    getDoorWidth() {
        if (this.mode === 'standard') {
            return this.selectedSize && this.selectedSize.width;
        } else {
            return this.basketItem.width;
        }

    }

    ngDoCheck() {
        this.calculatedDoorHeight = this.calculateDoorHeight();
    }

    onAddToBasket(form) {
        if (form.valid) {
            this.addToBasket();
        }
    }

    onAddSampleToBasket(form) {
        this.sampleFormSubmitted = true;

        if (form.valid) {
            this.addSampleToBasket();
        }
    }
}
