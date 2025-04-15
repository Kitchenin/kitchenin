export class Order {
    shipping_first_name: string;
    shipping_last_name: string;
    shipping_company_name: string;
    shipping_city: string;
    shipping_county: string;
    shipping_address1: string;
    shipping_address2: string;
    shipping_postcode: string;
    shipping_phone: string;
    billing_first_name: string;
    billing_last_name: string;
    billing_company_name: string;
    billing_city: string;
    billing_county: string;
    billing_address1: string;
    billing_address2: string;
    billing_postcode: string;
    billing_phone: string;
    email: string;
    additional_info: string;
    status: string;

    delivery_price: number;
    payment_id: string;
    validated: boolean;
    paid: boolean;

    constructor(obj?: any) {
        Object.assign(this, obj);
    }
}