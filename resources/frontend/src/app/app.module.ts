import {BrowserModule} from '@angular/platform-browser';
import {APP_INITIALIZER, NgModule} from '@angular/core';

import { MaterialModule } from "./material.module";
import {FormsModule, ReactiveFormsModule} from '@angular/forms'

import {AppComponent} from './app.component';
import {AppRoutingModule} from './app-routing.module';

import {BasketComponent} from './components/basket/basket.component';
import {BreadcrumbComponent} from './components/breadcrumb/breadcrumb.component';
import {NavigationComponent} from './components/navigation/navigation.component';
import {FooterComponent} from './components/footer/footer.component';
import {HomeComponent} from './components/home/home.component';
import {CategoryComponent} from './components/category/category.component';
import {ProductDetailComponent} from './components/product-detail/product-detail.component';
import {ProductImagesCarouselComponent} from './components/product-images-carousel/product-images-carousel.component';
import {ProductImageOverlayComponent} from './components/product-image-overlay/product-image-overlay.component';
import {ProductCarouselComponent} from './components/product-carousel/product-carousel.component';
import {ProductOverlayComponent} from './components/product-overlay/product-overlay.component';
import {ProductHingesOverlayComponent} from './components/product-hinges-overlay/product-hinges-overlay.component';
import {PageComponent} from './components/page/page.component';
import {ErrorComponent} from './components/error/error.component';
import {CartComponent} from './components/cart/cart.component';
import {CartItemsListComponent} from './components/cart-items-list/cart-items-list.component';
import {IntroCarouselComponent} from './components/intro-carousel/intro-carousel.component';
import {IntroBlocksComponent} from './components/intro-blocks/intro-blocks.component';
import {IntroCategoriesComponent} from './components/intro-categories/intro-categories.component';
import {IntroFeaturedProductsComponent} from './components/intro-featured-products/intro-featured-products.component';
import {ProductBoxComponent} from './components/product-box/product-box.component';
import { ScrollToTopComponent } from './components/scroll-to-top/scroll-to-top.component';
import { BasketBriefComponent } from './components/basket-brief/basket-brief.component';

import {HttpClientModule, HTTP_INTERCEPTORS} from "@angular/common/http";
import {RequestInterceptor} from "./services/http-interceptor.service";
import {CategoryProvider} from "./providers/category-provider";
import {SettingsProvider} from "./providers/settings-provider";
import {StorageServiceModule} from "angular-webstorage-service";
import {CheckoutComponent} from './components/checkout/checkout.component';
import {ThankyouComponent} from './components/thankyou/thankyou.component';

import { HtmlToTextPipe } from './pipes/html-to-text.pipe';
import { OrderModule } from 'ngx-order-pipe';


import { MINMAX_DIRECTIVES } from './third-party/minmax/index';

@NgModule({
    entryComponents: [
        ProductOverlayComponent,
        ProductHingesOverlayComponent,
        ProductImageOverlayComponent
    ],
    declarations: [
        AppComponent,
        BasketComponent,
        BasketBriefComponent,
        BreadcrumbComponent,
        NavigationComponent,
        FooterComponent,
        HomeComponent,
        CategoryComponent,
        ProductDetailComponent,
        ProductImagesCarouselComponent,
        ProductImageOverlayComponent,
        ProductCarouselComponent,
        ProductOverlayComponent,
        ProductHingesOverlayComponent,
        PageComponent,
        ErrorComponent,
        CartComponent,
        CartItemsListComponent,
        CheckoutComponent,
        ThankyouComponent,
        IntroCarouselComponent,
        IntroBlocksComponent,
        IntroCategoriesComponent,
        IntroFeaturedProductsComponent,
        ProductBoxComponent,
        ScrollToTopComponent,
        HtmlToTextPipe,
        MINMAX_DIRECTIVES
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        MaterialModule,
        FormsModule,
        ReactiveFormsModule,
        HttpClientModule,
        StorageServiceModule,
        OrderModule
    ],
    providers: [
        CategoryProvider,
        SettingsProvider,

        {provide: HTTP_INTERCEPTORS, useClass: RequestInterceptor, multi: true},
        {provide: APP_INITIALIZER, useFactory: categoryProviderFactory, deps: [CategoryProvider], multi: true},
        {provide: APP_INITIALIZER, useFactory: settingsProviderFactory, deps: [SettingsProvider], multi: true}
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}

export function categoryProviderFactory(provider: CategoryProvider) {
    return () => provider.load();
}

export function settingsProviderFactory(provider: SettingsProvider) {
    return () => provider.load();
}
