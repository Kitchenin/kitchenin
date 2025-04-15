import { Photo } from "./photo";

export class Category {
    id: number;
    name: string;
    description: string;
    children: Category[];
    parentCategory: Category;
    photos: Photo[];
    index: number;

    constructor(obj?: any) {
        Object.assign(this, obj);
        this.index = +this.index; //TODO: backend fix

        if (this.children) {
            this.children = this.children.map(category => new Category(category));
        }
    }

    hasChildren() {
        return this.children && this.children.length > 0;
    }

    // getFeaturedPhoto() {
    //     // TODO: Not working, can't save featured image in the admin
    //     for (let photo of this.photos) {
    //         if (photo.featured == 1) {
    //             return photo;
    //         }
    //     }

    //     // // If no featured image found - return the first one
    //     // return this.photos[0];
    // }
}
