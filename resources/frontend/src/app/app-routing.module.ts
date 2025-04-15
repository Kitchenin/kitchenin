import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {HomeComponent} from "./components/home/home.component";
import {CategoryComponent} from "./components/category/category.component";
import {ProductDetailComponent} from "./components/product-detail/product-detail.component";
import {PageComponent} from "./components/page/page.component";
import {ErrorComponent} from "./components/error/error.component";
import {BasketComponent} from "./components/basket/basket.component";
import {CheckoutComponent} from "./components/checkout/checkout.component";
import {ThankyouComponent} from "./components/thankyou/thankyou.component";

const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'error', component: ErrorComponent},
    {path: 'page/:page_title', component: PageComponent},
    {path: 'category/:category_id', component: CategoryComponent},
    {path: 'product/:product_id', component: ProductDetailComponent},
    {path: 'cart', component: BasketComponent},
    {path: 'checkout', component: CheckoutComponent},
    {path: 'thankyou', component: ThankyouComponent}
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
