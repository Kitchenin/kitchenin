export class Setting {
    free_delivery: string;
    delivery_price: string;
    vat: string;
    hinge_price: string;

    constructor(obj?: any) {
        Object.assign(this, obj);
    }
}
