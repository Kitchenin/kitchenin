export class Photo {
    id: number;
    filename: string;
    featured: string;

    constructor(obj?: any) {
        Object.assign(this, obj);
    }
}
