@extends('layouts.app')

@section('content')
    <style>
        .category-tile {
            background-color: #fff;
            border-radius: 0.5rem;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
            padding-bottom: 1rem;
        }

        .category-tile:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .category-image {
            height: 254px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .category-tile:hover .category-image {
            transform: scale(1.02);
        }

        .listItem__label {
            display: block;
            margin-top: 0.75rem;
            font-size: 1.125rem;
            font-weight: 600;
            color: #212529;
            text-align: center;
            text-transform: capitalize;
            transition: color 0.3s ease;
        }

        .category-tile:hover .listItem__label {
            color: #0056b3;
            text-decoration: underline;
        }

    </style>
    <div class="container py-4">
        <div class="row g-4">
            @foreach($products as $product)
                <ul>
                    <li class="col-xs-12 col-sm-6">
                        {{ dd($product->photos, $product->id) }}
                        <a class="productBoxWrapper" href="/kitchen-doors/traditional/Rydal-Cashmere-Shaker-Kitchen-Door/">
                            <div class="productBox">
                                <div class="productBox__img productBox__img--withPreview">
                                    <div class="productBox__img__cover">
                                        <img src="/images/products/Ljwjw-Rydal%20Unique%20-%20Cashmere.jpg" alt="Rydal Cashmere Shaker Kitchen Door" style="object-fit: cover;">
                                    </div>
                                    <div class="productBox__img__doorImg">
                                        <span class="productBox__newLabel">NEW</span>
                                        <img src="/images/products/8O0wu-Rydal%20Cashmere%20Flat%20Door%20Cutout%20A.jpg" alt="Rydal Cashmere Shaker Kitchen Door - single door">
                                    </div>
                                    <div class="productDetails__transport">
                                        <div class="productDetails__transportIcon productDetails__transportIcon--delivery">
                                            <span class="productDetails__transportTime">3-5</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="productBox__content">
                                    <h3 class="productBox__title">Rydal Cashmere Shaker Kitchen Door</h3>
                                    <div class="productBox__price">From £17.69</div>
                                    <div class="productBox__rating">
                                        <div class="rating">
                                            <span class="star-ratings-css">
                                                <i style="width: 100%;"></i>
                                            </span>
                                            (<span itemprop="ratingCount">56</span>)
                                        </div>
                                    </div>
                                    <div class="productBox__footer">
                                        <div class="productBox__icon productBox__icon--noCustomSize" title="Standard sizes only"></div>
                                        <button class="btn btn-primary">View product</button>
                                        <div class="productBox__icon productBox__icon--colours" title="Colour options available" style="visibility: hidden;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

            @endforeach
        </div>
    </div>
@endsection

