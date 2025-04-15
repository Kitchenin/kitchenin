import {Photo} from "./photo";

export class Ending {
    id: number;
    name: string;
    photos: Photo[];
    index: number;

    constructor(obj?: any) {
        Object.assign(this, obj);
        if (this.photos) {
            this.photos = this.photos.map(photo => new Photo(photo));
        }
    }
}
