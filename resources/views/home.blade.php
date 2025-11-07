@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
<section class="hero-section" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Make Your <span class="highlight">Nails</span><br>
                        Look Stunning!
                    </h1>
                    <h2 class="hero-subtitle">
                        Soft <span class="highlight">touch</span>, Luxe Finish
                    </h2>
                    <p class="hero-description">
                        Now you can design, choose, and personalize your own nail style directly from our app. Experience premium nail care with our expert technicians.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('reservations.create') }}" class="btn btn-hero">
                            <i class="fas fa-calendar-plus me-2"></i>Book Now
                        </a>
                        <a href="#gallery" class="btn btn-hero-secondary">
                            <i class="fas fa-play-circle me-2"></i>Watch Demo
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="nail-showcase">
                    <!-- Main featured nail design -->
                    <div class="featured-nail">
                        <img src="{{ asset('img/hero/nail-featured.jpg') }}" alt="Featured Nail Design">
                        <div class="nail-badge">
                            <i class="fas fa-crown"></i>
                            Most Popular
                        </div>
                    </div>
                    
                    <!-- Small nail designs grid -->
                    <div class="nail-grid">
                        <div class="nail-item">
                            <img src="{{ asset('img/hero/nail-1.jpg') }}" alt="French Nails">
                            <div class="nail-overlay">
                                <span>French</span>
                            </div>
                        </div>
                        <div class="nail-item">
                            <img src="{{ asset('img/hero/nail-2.jpg') }}" alt="Glitter Nails">
                            <div class="nail-overlay">
                                <span>Glitter</span>
                            </div>
                        </div>
                        <div class="nail-item">
                            <img src="{{ asset('img/hero/nail-3.jpg') }}" alt="Marble Nails">
                            <div class="nail-overlay">
                                <span>Marble</span>
                            </div>
                        </div>
                        <div class="nail-item">
                            <img src="{{ asset('img/hero/nail-4.jpg') }}" alt="Floral Nails">
                            <div class="nail-overlay">
                                <span>Floral</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating elements -->
                    <div class="floating-element element-1">
                        <i class="fas fa-spa"></i>
                    </div>
                    <div class="floating-element element-2">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="floating-element element-3">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <h2 class="section-title">About Luxe Nail</h2>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="about-text">
                        <p class="lead">Welcome to <strong>Luxe Nail</strong>, where we transform ordinary nails into extraordinary works of art. Our salon combines luxury, hygiene, and creativity to give you the perfect nail experience.</p>
                        
                        <div class="about-feature">
                            <i class="fas fa-mobile-alt"></i>
                            <div>
                                <h5>Innovative App Design</h5>
                                <p>With our innovative app, you can now design and customize your nail style before even stepping into our salon. Our skilled nail artists are trained to bring your vision to life with precision and care.</p>
                            </div>
                        </div>
                        
                        <div class="about-feature">
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <h5>Premium Quality & Safety</h5>
                                <p>We use only premium products and follow strict sanitization protocols to ensure your safety and satisfaction. At Luxe Nail, your beauty and comfort are our top priorities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-stats">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Client Satisfaction</div>
                    </div>
                </div>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Custom Designs</h4>
                            <p>Create your unique nail art with our advanced design tool</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-gem"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Premium Quality</h4>
                            <p>We use only the best products for long-lasting results</p>
                        </div>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Easy Booking</h4>
                            <p>Book your appointment online in just a few clicks</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-plus-square"></i>
                        </div>
                        <h3 class="service-title">Nail Extensions</h3>
                        <p class="service-description">
                            Get the perfect length and shape with our premium nail extensions. We offer various types including acrylic, gel, and dip powder.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h3 class="service-title">Nail Art</h3>
                        <p class="service-description">
                            Express your style with our creative nail art designs. From simple patterns to intricate artwork, we bring your ideas to life.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h3 class="service-title">Manicure & Pedicure</h3>
                        <p class="service-description">
                            Relax and rejuvenate with our luxury manicure and pedicure services. We offer various treatments to keep your hands and feet beautiful.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Gallery Section -->
<section class="gallery-section" id="gallery">
    <div class="container">
        <h2 class="section-title">Our Gallery</h2>
        <p class="text-center mb-5" style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">
            Explore our stunning nail art creations. Each design is uniquely crafted to match your personality and style.
        </p>
        
        <div class="gallery-slider">
            <button class="gallery-nav gallery-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="gallery-track">
                <!-- Original Items (20 items) -->
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail1.jpg') }}" alt="Elegant French Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Elegant French</h5>
                        <p>Classic white tips with golden accents</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail2.jpg') }}" alt="Sparkling Glitter Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Sparkling Glitter</h5>
                        <p>Dazzling glitter with crystal details</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail3.jpg') }}" alt="Floral Art Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Floral Art</h5>
                        <p>Delicate hand-painted flower designs</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail4.jpg') }}" alt="Marble Effect Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Marble Effect</h5>
                        <p>Sophisticated marble patterns</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail5.jpg') }}" alt="Geometric Patterns" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Geometric Patterns</h5>
                        <p>Modern geometric designs</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail6.jpg') }}" alt="Ombre Gradient Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Ombre Gradient</h5>
                        <p>Beautiful color transitions</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail7.jpg') }}" alt="3D Nail Art" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>3D Nail Art</h5>
                        <p>Textured 3D designs</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail8.jpg') }}" alt="Minimalist Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Minimalist Style</h5>
                        <p>Simple yet elegant designs</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail9.jpg') }}" alt="Chrome Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Chrome Finish</h5>
                        <p>Metallic chrome effects</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail10.jpg') }}" alt="Animal Print Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Animal Print</h5>
                        <p>Wild leopard and zebra patterns</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail11.jpg') }}" alt="Holographic Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Holographic</h5>
                        <p>Rainbow holographic effects</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail12.jpg') }}" alt="Stiletto Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Stiletto Shape</h5>
                        <p>Edgy stiletto nail shape</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail13.jpg') }}" alt="Coffin Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Coffin Shape</h5>
                        <p>Trendy coffin nail shape</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail14.jpg') }}" alt="Almond Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Almond Shape</h5>
                        <p>Elegant almond nail shape</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail15.jpg') }}" alt="Bridal Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Bridal Style</h5>
                        <p>Elegant designs for special occasions</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail16.jpg') }}" alt="Christmas Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Holiday Theme</h5>
                        <p>Festive Christmas designs</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail17.jpg') }}" alt="Halloween Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Halloween Theme</h5>
                        <p>Spooky Halloween designs</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail18.jpg') }}" alt="Summer Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Summer Vibes</h5>
                        <p>Bright summer colors</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail19.jpg') }}" alt="Abstract Art" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Abstract Art</h5>
                        <p>Modern abstract patterns</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail20.jpg') }}" alt="Pearl Accents" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Pearl Accents</h5>
                        <p>Elegant pearl decorations</p>
                    </div>
                </div>
                
                <!-- Duplicate items for seamless loop (first 4 items) -->
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail1.jpg') }}" alt="Elegant French Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Elegant French</h5>
                        <p>Classic white tips with golden accents</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail2.jpg') }}" alt="Sparkling Glitter Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Sparkling Glitter</h5>
                        <p>Dazzling glitter with crystal details</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail3.jpg') }}" alt="Floral Art Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Floral Art</h5>
                        <p>Delicate hand-painted flower designs</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="{{ asset('img/gallery/nail4.jpg') }}" alt="Marble Effect Nails" class="gallery-img">
                    <div class="gallery-overlay">
                        <h5>Marble Effect</h5>
                        <p>Sophisticated marble patterns</p>
                    </div>
                </div>
            </div>
            
            <button class="gallery-nav gallery-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="gallery-dots">
            <button class="gallery-dot active" data-slide="0"></button>
            <button class="gallery-dot" data-slide="1"></button>
            <button class="gallery-dot" data-slide="2"></button>
            <button class="gallery-dot" data-slide="3"></button>
            <button class="gallery-dot" data-slide="4"></button>
        </div>
        
        <div class="text-center mt-4">
            <p class="text-muted">Drag or use arrows to navigate through our gallery</p>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="contact-info">
                        <h3 class="mb-4">Get In Touch</h3>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Address</h5>
                                <p>123 Beauty Street, Jakarta, Indonesia</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5>Phone</h5>
                                <p>+62 812 3456 7890</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p>info@luxenail.com</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5>Working Hours</h5>
                                <p>Monday - Saturday: 9:00 AM - 8:00 PM</p>
                                <p>Sunday: 10:00 AM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="reservation-form">
                        <h3 class="mb-4">Book Your Appointment</h3>
                        <form method="POST" action="{{ route('reservations.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="treatment_type" class="form-label">Treatment Type</label>
                                    <select class="form-select" id="treatment_type" name="treatment_type" required>
                                        <option value="">Select Treatment</option>
                                        <option value="nail_extension">Nail Extension</option>
                                        <option value="nail_art">Nail Art</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="reservation_date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="reservation_date" name="reservation_date" min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="reservation_time" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="reservation_time" name="reservation_time" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-submit mt-3">Book Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection