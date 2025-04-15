export class Option {
    id: number;
    name: string;
    width: number;
    height: number;
    depth: number;
    price: number;
    index: number;

    constructor(obj?: any) {
        Object.assign(this, obj);
    }
}
