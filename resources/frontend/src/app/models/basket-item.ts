import {Product} from "./product";
import {Option} from "./options";
import {Ending} from "./ending";
import {Colour} from "./colour";

export class BasketItem {
    product_id: number;
    product: Product;
    quantity: number;
    size_id: number;
    size: Option;
    colour_id: number;
    colour: Colour;
    ending_id: number;
    ending: Ending;
    width: number;
    height: number;
    depth: number;
    hinge_side: string;
    hinge_top: number;
    hinge_bottom: number;
    hinge_left: number;
    hinge_right: number;
    hinge_center: number;
    position: string;
    price: number;
    isSample: boolean;

    constructor(obj?: any) {
        Object.assign(this, obj);

        if (this.product) {
            this.product = new Product(this.product);
        }

        if (this.size) {
            this.size = new Option(this.size);
        }

        if (this.ending) {
            this.ending = new Ending(this.ending);
        }

        if (this.colour) {
            this.colour = new Colour(this.colour);
        }


    }
}
