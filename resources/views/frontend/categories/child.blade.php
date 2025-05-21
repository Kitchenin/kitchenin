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
            @foreach($category->children as $child)
                <!-- Each .col represents a category item -->
                <div class="col-md-4 col-12">
                    <a href="#" class="category-tile d-block text-decoration-none text-center">
                        <img src="{{ asset('/images/categories/'.$child->photos->first()->filename) }}" alt="{{ $child->name }}" class="img-fluid category-image">
                        <span class="listItem__label">{{ $child->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

