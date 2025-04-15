export class Page {
    id: number;
    title: string;
    slug: string;
    short_description: any;
    content: any;

    constructor(obj?: any) {
        Object.assign(this, obj);
    }
}