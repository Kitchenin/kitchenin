import {Injectable} from '@angular/core';
import {ApiService} from "../services/api.service";
import {Setting} from "../models/setting";

@Injectable()

export class SettingsProvider {

    private settings: Setting;

    constructor(private api: ApiService) {

    }

    public getSettings(): Setting {
        return this.settings;
    }

    public getDeliveryPrice(): number {
        return parseFloat(this.settings.delivery_price);
    }

    public getFreeDelivery(): number {
        return parseFloat(this.settings.free_delivery);
    }

    public getDrillingPrice(): number {
        return parseFloat(this.settings.hinge_price);
    }

    public getVat(): number {
        return parseFloat(this.settings.vat);
    }

    load() {
        return new Promise((resolve, reject) => {
            this.api.getSettings()
                .subscribe(settings => {
                    this.settings = settings;
                    resolve(true);
                });
        });
    }
}
