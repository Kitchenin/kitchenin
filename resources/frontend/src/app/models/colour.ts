import {Photo} from "./photo";

export class Colour {
    id: number;
    name: string;
    photos: Photo[];
    index: number;
    price: number;
    pivot: any;

    constructor(obj?: any) {
        Object.assign(this, obj);
        if (this.photos) {
            this.photos = this.photos.map(photo => new Photo(photo));
        }

        if (this.pivot && this.pivot.price) {
            this.price = this.pivot.price;
        }
    }

    getPhoto() {
        return this.photos[0].filename;
    }
}
