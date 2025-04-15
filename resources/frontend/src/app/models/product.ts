import {Category} from "./category";
import {Photo} from "./photo";
import {Colour} from "./colour";
import {Parameter} from "./parameter";
import {Option} from "./options";
import {Ending} from "./ending";
import {forEach} from "@angular/router/src/utils/collection";

export class Product {
    id: number;
    name: string;
    category: Category;
    description: string;
    minPrice: number;
    price: number;
    sample_price: number;
    hasSizes: boolean;
    hasCustomOptions: boolean;
    options: Option[];
    parameters: Parameter[];
    colours: Colour[];
    photos: Photo[];
    endings: Ending[];
    customizable: string;
    category_id: number;
    group_id: string;
    index: number;

    constructor(obj?: any) {
        Object.assign(this, obj);
        if (this.category) {
            this.category = new Category(obj.category);
        }
        if (this.options) {
            this.options = this.options.map(option => new Option(option));
        }
        if (this.parameters) {
            this.parameters = this.parameters.map(parameter => new Parameter(parameter));
        }
        if (this.colours) {
            this.colours = this.colours.map(colour => new Colour(colour));
        }
        if (this.photos) {
            this.photos = this.photos.map(photo => new Photo(photo));
        }
        if (this.endings) {
            this.endings = this.endings.map(ending => new Ending(ending));
        }

        this.index = +this.index; //TOOD: backend fix
        this.minPrice = +this.minPrice; //TOOD: backend fix
    }

    hasEndings() {
        return this.endings && this.endings.length;
    }

    hasSample() {
        return this.sample_price !== null;
    }

    hasCustomSize() {
        return this.customizable === '1';
    }

    hasColours() {
        return this.colours && this.colours.length;
    }

    hasColourOptions() {
        return this.colours && this.colours.length && this.colours[0].price;
    }

    hasParameters() {
        return this.parameters && this.parameters.length;
    }

    hasOptions() {
        return this.options && this.options.length;
    }

    hasPhotos() {
        return this.photos && this.photos.length;
    }

    getFeaturedPhoto() {
        for (let photo of this.photos) {
            if (photo.featured === '1') {
                return photo;
            }
        }

        // // If no featured image found - return the first one
        // return this.photos[0];
    }

    getProductImage() {
        if (!this.photos)  {
            return;
        }

        for (let photo of this.photos) {
            if (photo.featured === '0') {
                return photo;
            }
        }
    }
}
