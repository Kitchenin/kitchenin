export class Group {
    id: number;
    name: string;
    index: number;

    constructor(obj?: any) {
        Object.assign(this, obj);
    }
}
