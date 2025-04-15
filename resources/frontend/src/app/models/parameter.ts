export class Parameter {
    id: number;
    name: string;
    value: string;

    constructor(obj?: any) {
        Object.assign(this, obj);
    }
}
