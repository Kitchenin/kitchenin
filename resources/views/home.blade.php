@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <video class="hero-video" autoplay muted loop>
            <source src="images/video.mp4" type="video/mp4">
        </video>
        <div class="hero-content">
            <h1 class="hero-title">Transform Your Kitchen</h1>
            <p class="hero-subtitle">Premium kitchen doors and units tailored to your style and budget</p>
            <a href="#" class="btn">Explore Our Collections</a>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="container">
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">Looking for Replacement Kitchen Cabinet Doors?</div>
                    <div class="faq-answer">
                        <p>Our price match guarantee ensures you get the best value for your money. If you find the same product at a lower price elsewhere, we'll match it. This includes all our kitchen doors, units, and accessories. We're committed to offering competitive prices without compromising on quality.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">What Sets KitchenIN Apart?</div>
                    <div class="faq-answer">
                        <p>Installing replacement kitchen doors is a straightforward process that can transform your kitchen without the need for a complete renovation. Our doors come with detailed installation instructions, and most customers find they can complete the installation themselves with basic DIY skills and tools. If you prefer professional installation, we can recommend trusted installers in your area.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">What Do We Offer?</div>
                    <div class="faq-answer">
                        <p>We offer a comprehensive range of kitchen products including replacement doors, kitchen units, worktops, and accessories. All our products are made to the highest quality standards and come with our price match guarantee. We provide fast delivery across the UK and excellent customer service to ensure your complete satisfaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Customers Say</h2>
            <div class="testimonial-container">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="testimonial-text">"The customer service at Kitchenin is outstanding. They helped me choose the perfect style for my kitchen and guided me through the measuring process. The doors arrived exactly when promised and look fantastic. My kitchen looks brand new!"</p>
                <p class="testimonial-author">- Emma Wilson</p>
                <a href="#" class="btn trustpilot-btn">See All Reviews on Trustpilot</a>
            </div>
        </div>
    </section>

    <!-- Ready to Transform Banner -->
    <section class="transform-banner">
        <div class="container">
            <h2 class="transform-title">Ready to Transform Your Kitchen?</h2>
        </div>
    </section>

    <!-- Explore Collections Section -->
    <section class="explore-collections">
        <div class="container">
            <h2 class="section-title">Explore Our Collections</h2>
            <div class="collections-container">
                <div class="collection-item">
                    <div class="collection-image">
                        <img src="images/zurfiz-supergloss-graphite-and-matt-pistachio-kitchen.jpg" alt="Kitchen Doors">
                        <div class="collection-overlay">
                            <h3 class="collection-title">Kitchen Doors</h3>
                            <p class="collection-description">Over 1000+ styles & finishes to choose from</p>
                            <a href="#" class="btn collection-btn">View Collection</a>
                        </div>
                    </div>
                </div>
                <div class="collection-item">
                    <div class="collection-image">
                        <img src="images/zurfiz-matt-pistachio-and-ug-porcelain-gold-light-kitchen.jpg" alt="Kitchen Units">
                        <div class="collection-overlay">
                            <h3 class="collection-title">Kitchen Units</h3>
                            <p class="collection-description">High-quality units for every kitchen design</p>
                            <a href="#" class="btn collection-btn">View Collection</a>
                        </div>
                    </div>
                </div>
                <div class="collection-item">
                    <div class="collection-image">
                        <img src="images/valore-porcelain-gold-grey-and-matt-snow-white-kitchen.jpg" alt="Accessories">
                        <div class="collection-overlay">
                            <h3 class="collection-title">Accessories</h3>
                            <p class="collection-description">Complete your kitchen with our premium accessories</p>
                            <a href="#" class="btn collection-btn">View Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Accessories Section -->
    <section class="accessories-section">
        <div class="container">
            <h2 class="section-title">Accessories</h2>
            <div class="accessories-container">
                <div class="accessories-image">
                    <img src="images/valore-galvano-bronze-and-matt-cashmere-kitchenin.jpg" alt="Kitchen Accessories">
                </div>
                <div class="accessories-content">
                    <h3 class="accessories-title">Complete Your Kitchen</h3>
                    <p class="accessories-description">Enhance your kitchen with our premium accessories. From stylish handles and innovative storage solutions to modern lighting options, we have everything you need to add the perfect finishing touches to your kitchen.</p>
                    <a href="#" class="btn">EXPLORE ACCESSORIES</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Range Collection Section -->
    <section class="range-collection">
        <div class="container">
            <h2 class="section-title">Our Range Collection</h2>
            <div class="brands-container">
                <div class="brand-item">Contour Chillingham</div>
                <div class="brand-item">Firbeck</div>
                <div class="brand-item">CAMBRIDGE</div>
                <div class="brand-item">GRANTHAM</div>
                <div class="brand-item">Rydal</div>
                <div class="brand-item">Lucente</div>
                <div class="brand-item">Contour</div>
                <div class="brand-item">NEWMARKET</div>
                <div class="brand-item">OXFORD</div>
                <div class="brand-item">WINDSOR</div>
                <div class="brand-item">Bella</div>
                <div class="brand-item">Vivo</div>
                <div class="brand-item">Hettich</div>
                <div class="brand-item">JAYLINE</div>
                <div class="brand-item">Valore</div>
                <div class="brand-item">Contour Langley</div>
                <div class="brand-item">Wilton</div>
            </div>
        </div>
    </section>

    <!-- Latest Kitchen Styles Section -->
    <section class="latest-styles">
        <div class="container">
            <div class="styles-container">
                <div class="styles-image">
                    <img src="images/valore-galvano-bronze-and-matt-cashmere-kitchenin.jpg" alt="Modern Kitchen Design">
                </div>
                <div class="styles-content">
                    <h2 class="styles-title">Discover the Latest Kitchen Styles</h2>
                    <p class="styles-description">From Sleek And Modern To Timeless And Traditional, Explore Our New Kitchen Designs That Cater To Every Taste. Create A Space That's Not Just Functional But Also Truly Inspiring.</p>
                    <a href="#" class="btn">VIEW STYLES</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Kitchen Styles Gallery Section -->
    <section class="styles-gallery">
        <div class="container">
            <h2 class="section-title">Kitchen Style Inspiration</h2>
            <div class="gallery-container">
                <div class="gallery-item">
                    <img src="images/zurfiz-supergloss-graphite-and-matt-pistachio-kitchen.jpg" alt="Modern Kitchen Style">
                    <div class="gallery-caption">Modern Elegance</div>
                </div>
                <div class="gallery-item">
                    <img src="images/zurfiz-matt-pistachio-and-ug-porcelain-gold-light-kitchen.jpg" alt="Contemporary Kitchen Style">
                    <div class="gallery-caption">Contemporary Chic</div>
                </div>
                <div class="gallery-item">
                    <img src="images/valore-porcelain-gold-grey-and-matt-snow-white-kitchen.jpg" alt="Traditional Kitchen Style">
                    <div class="gallery-caption">Timeless Tradition</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kitchen Design Art Section -->
    <section class="design-art">
        <img src="images/Ranges_Kitchen-Doors.jpg" alt="Kitchen Design Art" class="design-art-bg">
        <div class="design-art-content">
            <h2 class="design-art-title">The Art of Kitchen Design</h2>
            <p class="design-art-subtitle">Transform Your Space: Kitchen Design Insights</p>
            <a href="#" class="btn">EXPLORE NOW</a>
        </div>
    </section>

    <!-- Design Showcase Section -->
    <section class="design-showcase">
        <div class="container">
            <h2 class="section-title">Design Showcase</h2>
            <div class="showcase-container">
                <div class="showcase-image">
                    <img src="images/valore-galvano-bronze-and-matt-cashmere-kitchenin.jpg" alt="Kitchen Design Showcase">
                </div>
                <div class="showcase-content">
                    <h3 class="showcase-title">Expert Design Services</h3>
                    <p class="showcase-description">Our team of experienced designers can help you create the perfect kitchen for your home. From initial concept to final installation, we provide comprehensive design services to ensure your kitchen is both beautiful and functional.</p>
                    <a href="#" class="btn">BOOK A CONSULTATION</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Cards Section -->
    <section class="features">
        <div class="container">
            <div class="features-container">
                <div class="feature-card">
                    <div class="feature-icon-container">
                        <i class="fas fa-truck feature-icon"></i>
                    </div>
                    <h3 class="feature-title">FREE DELIVERY OVER £350</h3>
                    <p class="feature-description">Fast And Reliable Delivery Services Across The UK On All Orders Over £350</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-container">
                        <i class="fas fa-ruler feature-icon"></i>
                    </div>
                    <h3 class="feature-title">MADE TO MEASURE KITCHEN DOORS</h3>
                    <p class="feature-description">Custom Kitchen Doors Delivered In 7 - 10 Business Days, Tailored To Fit Perfectly</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-container">
                        <i class="fas fa-tag feature-icon"></i>
                    </div>
                    <h3 class="feature-title">PRICE MATCH GUARANTEE</h3>
                    <p class="feature-description">We Match Competitor Prices For The Best Kitchen Deals</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-container">
                        <i class="fas fa-wrench feature-icon"></i>
                    </div>
                    <h3 class="feature-title">QUICK & EASY FITTING</h3>
                    <p class="feature-description">Transform Your Kitchen Effortlessly With Our Quick And Easy Fitting System</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Perfect Kitchen Essentials Section -->
    <section class="kitchen-essentials">
        <div class="container">
            <h2 class="essentials-title">Find the Perfect Kitchen Essentials</h2>
            <p class="essentials-subtitle">Shop Doors, Units, And Accessories To Upgrade Your Kitchen Effortlessly.</p>

            <div class="essentials-gallery">
                <div class="essentials-item">
                    <img src="images/zurfiz-supergloss-graphite-and-matt-pistachio-kitchen.jpg" alt="Premium Kitchen Doors">
                    <div class="essentials-caption">Premium Doors</div>
                </div>
                <div class="essentials-item">
                    <img src="images/zurfiz-matt-pistachio-and-ug-porcelain-gold-light-kitchen.jpg" alt="Quality Kitchen Units">
                    <div class="essentials-caption">Quality Units</div>
                </div>
                <div class="essentials-item">
                    <img src="images/valore-porcelain-gold-grey-and-matt-snow-white-kitchen.jpg" alt="Kitchen Accessories">
                    <div class="essentials-caption">Essential Accessories</div>
                </div>
            </div>

            <a href="#" class="btn essentials-btn">SHOP NOW</a>
        </div>
    </section>
@endsection