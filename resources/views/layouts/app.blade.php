<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXE NAIL - @yield('title')</title>

    {{-- Bootstrap & Fonts --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="#services">Services</a>
                    <a class="nav-link" href="#gallery">Gallery</a>
                    <a class="nav-link" href="#contact">Contact</a>
                    <a class="nav-link" href="{{ route('calendar') }}">Schedule</a>
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
// Handle anchor links setelah kembali ke home page
document.addEventListener('DOMContentLoaded', function() {
    // Cek jika URL mengandung anchor
    if (window.location.hash) {
        const targetId = window.location.hash;
        const target = document.querySelector(targetId);
        
        if (target) {
            setTimeout(() => {
                const headerHeight = document.querySelector('.luxe-header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }, 100);
        }
    }
});
    </script>
</body>
</html>
    
</body>
</html>
</body>
</html>