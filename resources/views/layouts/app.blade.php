<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXE NAIL - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --baby-pink: #f8d7da;
            --soft-pink: #f3b8c2;
            --medium-pink: #ee9ca7;
            --dark-pink: #d87a87;
            --accent-gold: #ffd700;
            --text-dark: #451a2b;
            --text-light: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--baby-pink);
            color: var(--text-dark);
            overflow-x: hidden;
        }
        
        .luxe-header {
            background-color: var(--text-light);
            padding: 15px 0;
            box-shadow: 0 2px 15px rgba(214, 122, 135, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .logo-img {
            width: 60px;
            height: 60px;
        }
        
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-style: italic;
            color: var(--dark-pink);
            font-size: 28px;
            margin-left: 10px;
        }
        
        .nav-link {
            color: var(--text-dark) !important;
            font-size: 16px;
            margin: 0 12px;
            transition: color 0.3s;
            font-weight: 500;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--dark-pink) !important;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--dark-pink);
            transition: width 0.3s;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .btn-book {
            background-color: transparent;
            border: 2px solid var(--text-dark);
            color: var(--text-dark);
            border-radius: 25px;
            padding: 8px 25px;
            font-size: 16px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .btn-book:hover {
            background-color: var(--text-dark);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
.hero-section {
    background: linear-gradient(135deg, var(--soft-pink) 0%, var(--medium-pink) 100%);
    color: var(--text-light);
    padding: 150px 0 80px;
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
    line-height: 1.2;
}

.hero-title span.highlight {
    color: var(--accent-gold);
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.hero-subtitle {
    font-size: 1.8rem;
    margin-bottom: 25px;
    font-weight: 600;
    color: rgba(255,255,255,0.9);
}

.hero-subtitle span.highlight {
    color: var(--accent-gold);
}

.hero-description {
    font-size: 1.1rem;
    margin-bottom: 35px;
    max-width: 500px;
    line-height: 1.6;
    color: rgba(255,255,255,0.8);
}

.hero-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-hero {
    border: 3px solid var(--accent-gold);
    color: var(--text-light);
    padding: 12px 30px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 30px;
    background: transparent;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
}

.btn-hero:hover {
    background-color: var(--accent-gold);
    color: var(--text-dark);
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

.btn-hero-secondary {
    border: 2px solid rgba(255,255,255,0.3);
    color: var(--text-light);
    padding: 12px 25px;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 30px;
    background: rgba(255,255,255,0.1);
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    backdrop-filter: blur(10px);
}

.btn-hero-secondary:hover {
    background: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.5);
    transform: translateY(-2px);
    color: var(--text-light);
}

/* Nail Showcase Styles */
.nail-showcase {
    position: relative;
    padding: 20px;
}

.featured-nail {
    position: relative;
    margin-bottom: 20px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    transition: transform 0.3s ease;
}

.featured-nail:hover {
    transform: translateY(-5px);
}

.featured-nail img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.nail-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(135deg, var(--accent-gold), #ffed4e);
    color: var(--text-dark);
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.nail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.nail-item {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    cursor: pointer;
}

.nail-item:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 30px rgba(0,0,0,0.25);
}

.nail-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.nail-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    color: white;
    padding: 10px;
    text-align: center;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Floating Elements */
.floating-element {
    position: absolute;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-gold);
    backdrop-filter: blur(10px);
    animation: float 6s ease-in-out infinite;
    z-index: 2;
}

.floating-element i {
    font-size: 1.2rem;
}

.element-1 {
    width: 50px;
    height: 50px;
    top: 10%;
    left: 5%;
    animation-delay: 0s;
}

.element-2 {
    width: 40px;
    height: 40px;
    top: 70%;
    right: 10%;
    animation-delay: 2s;
}

.element-3 {
    width: 35px;
    height: 35px;
    bottom: 20%;
    left: 15%;
    animation-delay: 4s;
}

/* Responsive Design */
@media (max-width: 991px) {
    .hero-title {
        font-size: 2.8rem;
    }
    
    .hero-subtitle {
        font-size: 1.5rem;
    }
    
    .nail-showcase {
        margin-top: 40px;
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 120px 0 60px;
        text-align: center;
    }
    
    .hero-buttons {
        justify-content: center;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .featured-nail img {
        height: 250px;
    }
    
    .nail-item img {
        height: 100px;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-hero, .btn-hero-secondary {
        width: 100%;
        max-width: 250px;
        justify-content: center;
    }
}
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 50px;
            text-align: center;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: var(--dark-pink);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .about-section {
            padding: 100px 0;
            background-color: var(--text-light);
        }
        
        .about-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }
        
        .feature-icon {
            font-size: 3rem;
            color: var(--dark-pink);
            margin-bottom: 20px;
        }
        
        .services-section {
            padding: 100px 0;
            background-color: var(--baby-pink);
        }
        
        .service-card {
            background-color: var(--text-light);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .service-icon {
            font-size: 2.5rem;
            color: var(--dark-pink);
            margin-bottom: 20px;
        }
        
        .service-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--text-dark);
        }
        
        .service-description {
            color: #666;
            line-height: 1.6;
        }

/* About Section Styles */
.about-section {
    padding: 100px 0;
    background: linear-gradient(135deg, var(--text-light) 0%, #fafafa 100%);
    position: relative;
}

.about-content {
    padding-right: 30px;
}

.about-text .lead {
    font-size: 1.3rem;
    font-weight: 500;
    color: var(--text-dark);
    line-height: 1.7;
    margin-bottom: 30px;
    border-left: 4px solid var(--dark-pink);
    padding-left: 20px;
}

.about-feature {
    display: flex;
    align-items: flex-start;
    margin-bottom: 25px;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.about-feature:hover {
    transform: translateY(-5px);
}

.about-feature i {
    font-size: 1.8rem;
    color: var(--dark-pink);
    margin-right: 20px;
    margin-top: 5px;
    flex-shrink: 0;
}

.about-feature h5 {
    color: var(--text-dark);
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 1.1rem;
}

.about-feature p {
    color: #666;
    line-height: 1.6;
    margin: 0;
    font-size: 0.95rem;
}

/* Stats Section - Updated for 2 items */
.about-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 40px;
}

.stat-item {
    text-align: center;
    padding: 25px 15px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-pink);
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label {
    font-size: 0.9rem;
    color: #666;
    font-weight: 500;
}

/* Features Grid */
.features-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.feature-card {
    display: flex;
    align-items: center;
    padding: 25px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.feature-card:hover {
    transform: translateY(-5px);
    border-color: var(--soft-pink);
    box-shadow: 0 10px 30px rgba(216, 122, 135, 0.15);
}

.feature-icon-wrapper {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--soft-pink), var(--dark-pink));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 20px;
    flex-shrink: 0;
}

.feature-icon-wrapper i {
    font-size: 1.5rem;
    color: white;
}

.feature-content h4 {
    color: var(--text-dark);
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 1.1rem;
}

.feature-content p {
    color: #666;
    line-height: 1.5;
    margin: 0;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 991px) {
    .about-content {
        padding-right: 0;
        margin-bottom: 40px;
    }
    
    .about-stats {
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    
    .stat-item {
        padding: 20px 10px;
    }
    
    .stat-number {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .about-feature {
        flex-direction: column;
        text-align: center;
    }
    
    .about-feature i {
        margin-right: 0;
        margin-bottom: 15px;
    }
    
    .about-stats {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .feature-card {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    
    .feature-icon-wrapper {
        margin-right: 0;
        margin-bottom: 15px;
    }
}

@media (max-width: 576px) {
    .about-section {
        padding: 60px 0;
    }
    
    .about-text .lead {
        font-size: 1.1rem;
        padding-left: 15px;
    }
    
    .about-feature {
        padding: 15px;
    }
    
    .feature-card {
        padding: 15px;
    }
    
    .feature-icon-wrapper {
        width: 50px;
        height: 50px;
    }
    
    .feature-icon-wrapper i {
        font-size: 1.2rem;
    }
}
        
        /* Gallery Section Styles - FIXED */
.gallery-section {
    padding: 100px 0;
    background-color: var(--text-light);
    position: relative;
    overflow: hidden;
}

.gallery-slider {
    position: relative;
    padding: 0 60px;
    margin: 0 auto;
    max-width: 1400px;
}

.gallery-track {
    display: flex;
    gap: 25px;
    transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    padding: 20px 10px;
    cursor: grab;
}

.gallery-track:active {
    cursor: grabbing;
}

.gallery-item {
    flex: 0 0 300px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
}

.gallery-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

.gallery-img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-img {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(216, 122, 135, 0.9));
    color: white;
    padding: 20px;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    transform: translateY(0);
}

.gallery-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: var(--dark-pink);
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.gallery-nav:hover {
    background: var(--medium-pink);
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

.gallery-prev {
    left: 0;
}

.gallery-next {
    right: 0;
}

.gallery-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
}

.gallery-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--baby-pink);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.gallery-dot.active {
    background: var(--dark-pink);
    transform: scale(1.2);
}

/* Responsive Gallery */
@media (max-width: 768px) {
    .gallery-slider {
        padding: 0 50px;
    }
    
    .gallery-item {
        flex: 0 0 280px;
    }
    
    .gallery-img {
        height: 320px;
    }
    
    .gallery-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .gallery-slider {
        padding: 0 40px;
    }
    
    .gallery-item {
        flex: 0 0 250px;
    }
    
    .gallery-img {
        height: 280px;
    }
    
    .gallery-nav {
        width: 35px;
        height: 35px;
    }
}
        
        .contact-section {
            padding: 100px 0;
            background-color: var(--baby-pink);
        }
        
        .contact-info {
            background-color: var(--text-light);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }
        
        .contact-icon {
            font-size: 1.5rem;
            color: var(--dark-pink);
            margin-right: 15px;
            margin-top: 5px;
        }
        
        .reservation-form {
            background-color: var(--text-light);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        
        .form-control, .form-select {
            border: 1px solid var(--soft-pink);
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--dark-pink);
            box-shadow: 0 0 0 0.2rem rgba(216, 122, 135, 0.25);
        }
        
        .btn-submit {
            background: linear-gradient(135deg, var(--medium-pink) 0%, var(--dark-pink) 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(216, 122, 135, 0.3);
        }
        
        .thank-you-section {
            text-align: center;
            padding: 150px 0;
            background-color: var(--text-light);
            border-radius: 15px;
            margin: 50px 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .queue-number {
            font-size: 3rem;
            color: var(--dark-pink);
            font-weight: bold;
            margin: 20px 0;
            background: var(--baby-pink);
            display: inline-block;
            padding: 10px 30px;
            border-radius: 10px;
        }
        
        .reservation-details {
            font-size: 1.3rem;
            margin: 20px 0;
            color: #555;
        }
        
        .footer {
            background-color: var(--text-dark);
            color: var(--text-light);
            padding: 60px 0 30px;
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-style: italic;
            color: var(--baby-pink);
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
        .footer-description {
            color: #ccc;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--baby-pink);
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--baby-pink);
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
        }
        
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: var(--text-light);
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            background-color: var(--baby-pink);
            color: var(--text-dark);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #999;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.5rem;
            }
            
            .nav-link {
                margin: 0 8px;
                font-size: 14px;
            }
            
            .btn-book {
                padding: 6px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="luxe-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo-container">
                    <img src="{{ asset('img/luxe-nail-1.png') }}" alt="Luxe Nail" class="logo-img">
                    <div class="logo-text">LUXE NAIL</div>
                </div>
                <nav class="d-none d-lg-flex align-items-center">
                    <a class="nav-link" href="#home">Home</a>
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="#services">Services</a>
                    <a class="nav-link" href="#gallery">Gallery</a>
                    <a class="nav-link" href="#contact">Contact</a>
                    <a class="btn btn-book" href="{{ route('reservations.create') }}">Book Now</a>
                </nav>
                <div class="d-lg-none">
                    <button class="btn btn-book" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div class="collapse d-lg-none" id="mobileMenu">
                <div class="d-flex flex-column bg-white p-3 mt-3 rounded shadow">
                    <a class="nav-link py-2" href="#home">Home</a>
                    <a class="nav-link py-2" href="#about">About</a>
                    <a class="nav-link py-2" href="#services">Services</a>
                    <a class="nav-link py-2" href="#gallery">Gallery</a>
                    <a class="nav-link py-2" href="#contact">Contact</a>
                    <a class="btn btn-book mt-2" href="{{ route('reservations.create') }}">Book Now</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <div class="footer-logo">LUXE NAIL</div>
                    <p class="footer-description">
                        Transform your nails with our premium nail services. We offer customized nail designs, extensions, and art to make your nails look stunning.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-title">Services</h5>
                    <ul class="footer-links">
                        <li><a href="#">Nail Extensions</a></li>
                        <li><a href="#">Nail Art</a></li>
                        <li><a href="#">Manicure</a></li>
                        <li><a href="#">Pedicure</a></li>
                        <li><a href="#">Nail Care</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Contact Info</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Beauty Street, City</li>
                        <li><i class="fas fa-phone me-2"></i> +62 812 3456 7890</li>
                        <li><i class="fas fa-envelope me-2"></i> info@luxenail.com</li>
                        <li><i class="fas fa-clock me-2"></i> Mon-Sat: 9AM-8PM</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; 2023 Luxe Nail. All rights reserved.
            </div>
        </div>
    </footer>

        <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.luxe-header');
            if (window.scrollY > 50) {
                header.style.padding = '10px 0';
                header.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            } else {
                header.style.padding = '15px 0';
                header.style.boxShadow = '0 2px 15px rgba(214, 122, 135, 0.1)';
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    <!-- Gallery Slider Script -->
    <script>
        // Gallery Slider Functionality - UPDATED FOR 20+ ITEMS
document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.gallery-track');
    if (!track) return;

    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.gallery-next');
    const prevButton = document.querySelector('.gallery-prev');
    const dots = document.querySelectorAll('.gallery-dot');
    
    const slideWidth = 325; // 300px + 25px gap
    let currentSlide = 0;
    let autoScrollInterval;
    let isDragging = false;
    let startPos = 0;
    
    // Total original slides (excluding duplicates)
    const originalSlides = 20;
    
    // Initialize slider
    function initSlider() {
        updateSliderPosition();
        startAutoScroll();
    }
    
    // Update slider position
    function updateSliderPosition() {
        track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        
        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === (currentSlide % dots.length));
        });
    }
    
    // Next slide
    function nextSlide() {
        if (currentSlide >= originalSlides - 1) {
            // Reset to beginning for seamless loop
            currentSlide = 0;
            track.style.transition = 'none';
            updateSliderPosition();
            // Force reflow
            track.offsetHeight;
            track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        } else {
            currentSlide++;
        }
        updateSliderPosition();
    }
    
    // Previous slide
    function prevSlide() {
        if (currentSlide <= 0) {
            // Go to end for seamless loop
            currentSlide = originalSlides - 1;
            track.style.transition = 'none';
            updateSliderPosition();
            // Force reflow
            track.offsetHeight;
            track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        } else {
            currentSlide--;
        }
        updateSliderPosition();
    }
    
    // Auto-scroll functionality
    function startAutoScroll() {
        autoScrollInterval = setInterval(nextSlide, 4000);
    }
    
    function resetAutoScroll() {
        clearInterval(autoScrollInterval);
        startAutoScroll();
    }
    
    // Event listeners
    nextButton.addEventListener('click', () => {
        nextSlide();
        resetAutoScroll();
    });
    
    prevButton.addEventListener('click', () => {
        prevSlide();
        resetAutoScroll();
    });
    
    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index * 4; // Each dot represents 4 slides
            updateSliderPosition();
            resetAutoScroll();
        });
    });
    
    // Touch/swipe functionality
    track.addEventListener('touchstart', (e) => {
        startPos = e.touches[0].clientX;
        isDragging = true;
        track.style.transition = 'none';
    });
    
    track.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const currentPosition = e.touches[0].clientX;
        const diff = currentPosition - startPos;
        track.style.transform = `translateX(-${currentSlide * slideWidth + diff}px)`;
    });
    
    track.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        isDragging = false;
        const endPos = e.changedTouches[0].clientX;
        const diff = startPos - endPos;
        
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        } else {
            updateSliderPosition();
        }
        track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        resetAutoScroll();
    });
    
    // Mouse events for desktop drag
    track.addEventListener('mousedown', (e) => {
        startPos = e.clientX;
        isDragging = true;
        track.style.transition = 'none';
        track.style.cursor = 'grabbing';
    });
    
    track.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const currentPosition = e.clientX;
        const diff = currentPosition - startPos;
        track.style.transform = `translateX(-${currentSlide * slideWidth + diff}px)`;
    });
    
    track.addEventListener('mouseup', (e) => {
        if (!isDragging) return;
        isDragging = false;
        const endPos = e.clientX;
        const diff = startPos - endPos;
        
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        } else {
            updateSliderPosition();
        }
        track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        track.style.cursor = 'grab';
        resetAutoScroll();
    });
    
    track.addEventListener('mouseleave', () => {
        if (isDragging) {
            isDragging = false;
            updateSliderPosition();
            track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            track.style.cursor = 'grab';
            resetAutoScroll();
        }
    });
    
    // Pause auto-scroll on hover
    track.addEventListener('mouseenter', () => {
        clearInterval(autoScrollInterval);
        track.style.cursor = 'grab';
    });
    
    track.addEventListener('mouseleave', () => {
        startAutoScroll();
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
            resetAutoScroll();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            resetAutoScroll();
        }
    });
    
    // Initialize slider
    initSlider();
});
    </script>
</body>
</html>
    
</body>
</html>
</body>
</html>