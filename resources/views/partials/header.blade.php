<!-- Top Info Bar -->
<div class="top-info-bar">
    <div class="container">
        <div class="info-bar-content">
            <div class="free-delivery">Free delivery over £350</div>
            <div class="contact-cart">
                <a href="mailto:info@kitchenin.co.uk" class="email-link"><i class="far fa-envelope"></i> info@kitchenin.co.uk</a>
                <a href="#" class="cart-link"><i class="fas fa-shopping-cart"></i> £0.00</a>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header>
    <div class="container">
        <nav class="navbar">
            <a href="index.html" class="navbar-brand">
                <img src="{{ asset('/images/Kitchenin-Logo.png') }}" alt="Kitchenin Logo" class="logo">
            </a>
            <ul class="nav-menu">
                @foreach($menu as $category)
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">KITCHEN DOORS</a>
                        @if($category->hasChildren()>0)
                            <div class="dropdown-menu">
                                @foreach($category->children as $child)
                                    <a href="{{ $child->slug }}" class="dropdown-item">{{ $child->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>