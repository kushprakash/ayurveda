@extends('layouts.app')

@section('title', 'Ayurveda Health Research Center - Ancient Wisdom')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="floating-elements">
            <img src="{{ asset('images/leafe1.png') }}" class="leaf-1" alt="deco">
            <img src="{{ asset('images/leafe2.png') }}" class="leaf-2" alt="deco">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content text-center text-lg-start" data-aos="fade-up">
                    <div class="badge bg-primary-subtle text-primary mb-3 px-3 py-2 rounded-pill">
                        <i class="bi bi-patch-check-fill"></i> 5000+ Years of Ancient Wisdom
                    </div>
                    <h1 class="hero-title">Building a <span class="text-secondary">Healthier Society</span> <br>Through Prevention</h1>
                    <p class="hero-subtitle">At Ayurveda Health Research Center, we are committed to preventive healthcare and regular wellness programs to help you stay healthy and detect diseases early.</p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3 mb-5">
                        <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Explore Remedies</a>
                        <a href="{{ url('/booking') }}" class="btn btn-outline-primary btn-lg">Join Health Camp</a>
                    </div>
                    <div class="trust-badges d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 gap-md-4 align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i> <span>100% Natural</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-truck text-success"></i> <span>Free Shipping</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-award-fill text-success"></i> <span>Certified Doctors</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/medicine.png') }}" alt="Ayurvedic Wellness" class="mt-1 img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="mb-3">Natural Healing Starts Here</h2>
                <p class="text-muted">Explore Our Authentic Products</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-cup-hot"></i></div>
                        <h6>Herbal Tea</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-capsule"></i></div>
                        <h6>Herbal Tablets</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-droplet"></i></div>
                        <h6>Herbal Oils</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-flower1"></i></div>
                        <h6>Herbal Soaps</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-stars"></i></div>
                        <h6>Skin Care</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-box-seam"></i></div>
                        <h6>Wellness Kits</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="mb-3">Our Premium Remedies</h2>
                <p class="text-muted">Scientifically Formulated, Spiritually Rooted</p>
            </div>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <img src="{{ asset('images/herbal-tea.png') }}" alt="Herbal Tea" class="product-img">
                        </div>
                        <div class="product-info">
                            <span class="product-cat">Herbal Tea</span>
                            <h5 class="product-title">Royal Wellness Saffron Tea</h5>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i> (4.8)
                            </div>
                            <button class="btn btn-primary w-100 rounded-pill mt-3 view-product-btn" 
                                data-bs-toggle="modal" 
                                data-bs-target="#productModal"
                                data-title="Royal Wellness Saffron Tea"
                                data-cat="Herbal Tea"
                                data-price="₹1,249"
                                data-desc="A luxurious blend of premium hand-picked saffron and therapeutic Himalayan herbs. This tea is designed to rejuvenate your senses, improve skin radiance, and promote digestive health. 100% organic and caffeine-free."
                                data-img="{{ asset('images/herbal-tea.png') }}">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <img src="{{ asset('images/herbal-oil.png') }}" alt="Herbal Oil" class="product-img">
                        </div>
                        <div class="product-info">
                            <span class="product-cat">Herbal Oils</span>
                            <h5 class="product-title">Keshvardhani Hair Vitalizer</h5>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> (5.0)
                            </div>
                            <button class="btn btn-primary w-100 rounded-pill mt-3 view-product-btn"
                                data-bs-toggle="modal" 
                                data-bs-target="#productModal"
                                data-title="Keshvardhani Hair Vitalizer"
                                data-cat="Herbal Oils"
                                data-price="₹899"
                                data-desc="A potent blend of Bringraj, Brahmi, and Amla infused in pure sesame oil. This vitalizer strengthens hair roots, prevents premature graying, and reduces hair fall significantly within 4 weeks of regular use."
                                data-img="{{ asset('images/herbal-oil.png') }}">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <img src="{{ asset('images/herbal-oil.png') }}" alt="Herbal Tablet" class="product-img">
                        </div>
                        <div class="product-info">
                            <span class="product-cat">Herbal Tablets</span>
                            <h5 class="product-title">Ashwagandha Power Plus</h5>
                            <div class="rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i> (4.2)</div>
                            <button class="btn btn-primary w-100 rounded-pill mt-3 view-product-btn"
                                data-bs-toggle="modal" 
                                data-bs-target="#productModal"
                                data-title="Ashwagandha Power Plus"
                                data-cat="Herbal Tablets"
                                data-price="₹549"
                                data-desc="Maximum strength Ashwagandha tablets for stress management and physical vitality. Helps in balancing cortisol levels, improving sleep quality, and boosting overall immune response."
                                data-img="{{ asset('images/herbal-oil.png') }}">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1626784215021-2e39ccf971cd?auto=format&fit=crop&w=400&q=80" alt="Skin Care" class="product-img">
                        </div>
                        <div class="product-info">
                            <span class="product-cat">Skin Care</span>
                            <h5 class="product-title">Kumkumadi Radiance Face Oil</h5>
                            <div class="rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> (4.9)</div>
                            <button class="btn btn-primary w-100 rounded-pill mt-3 view-product-btn"
                                data-bs-toggle="modal" 
                                data-bs-target="#productModal"
                                data-title="Kumkumadi Radiance Face Oil"
                                data-cat="Skin Care"
                                data-price="₹1,799"
                                data-desc="The ultimate Ayurvedic serum for glowing skin. Infused with 24K gold dust and pure saffron, it treats pigmentation, dark circles, and fine lines while providing deep hydration for a youthful glow."
                                data-img="https://images.unsplash.com/photo-1626784215021-2e39ccf971cd?auto=format&fit=crop&w=400&q=80">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ url('/shop') }}" class="btn btn-outline-primary px-5">View All Products</a>
            </div>
        </div>
    </section>

  

    <!-- Who We Are Section -->
    <section class="py-5 position-relative overflow-hidden" style="background: #fdfbfd;">
        <!-- Deco elements -->
        <img src="{{ asset('images/neem-leaf.png') }}" class="position-absolute" style="bottom: 10%; left: -50px; width: 250px; opacity: 0.8; transform: rotate(45deg); z-index: 1;" alt="deco">
        <img src="{{ asset('images/saffron-flower.png') }}" class="position-absolute" style="bottom: -50px; right: -50px; width: 300px; opacity: 0.9; z-index: 1;" alt="deco">
        
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="rounded-5 overflow-hidden shadow-lg">
                        <img src="{{ asset('images/about-herbs.png') }}" alt="Ayurvedic Preparation" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="text-secondary fw-bold mb-2 d-block">Welcome to Ayurveda Health Research Center</span>
                    <h2 class="display-5 mb-4" style="color: var(--primary-color);">Rooted in Tradition, <br>Backed by Science</h2>
                    <p class="text-muted mb-4" style="line-height: 1.8;">
                        At Ayurveda Health Research Center, we are committed to building a healthier society through preventive healthcare and regular wellness programs. Our goal is to help people stay healthy, detect diseases early, and receive proper treatment before illnesses become serious.
                    </p>
                    <p class="text-muted mb-5" style="line-height: 1.8;">
                        We believe that prevention is better than cure, and every person deserves access to quality healthcare and wellness support. We combine Ayurvedic values with modern healthcare support to encourage early diagnosis and long-term wellness.
                    </p>
                    <a href="{{ url('/about') }}" class="btn btn-primary btn-lg rounded-pill px-5 py-3">Our Mission <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Health Card Features Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="mb-3">Our Health Card Features</h2>
                <p class="text-muted">Comprehensive wellness support for you and your family</p>
            </div>
            <div class="row g-4">
                @php
                    $features = [
                        ['icon' => 'bi-clipboard2-pulse', 'title' => 'Full Body Checkup', 'desc' => 'Every 3 months through specialized Health Camps.'],
                        ['icon' => 'bi-person-badge', 'title' => 'Doctor Consultation', 'desc' => 'Professional medical support and guidance.'],
                        ['icon' => 'bi-percent', 'title' => 'Special Discounts', 'desc' => 'Discounts on Medicines and Diagnostic Tests.'],
                        ['icon' => 'bi-shield-check', 'title' => 'Preventive Guidance', 'desc' => 'Expert advice on staying healthy and disease-free.'],
                        ['icon' => 'bi-megaphone', 'title' => 'Awareness Programs', 'desc' => 'Regular programs on health and wellness awareness.'],
                        ['icon' => 'bi-wallet2', 'title' => 'Affordable Solutions', 'desc' => 'Accessible wellness and care solutions for all.'],
                        ['icon' => 'bi-people', 'title' => 'Family Support', 'desc' => 'Comprehensive health support for the entire family.'],
                        ['icon' => 'bi-search', 'title' => 'Early Detection', 'desc' => 'Programs focused on early disease detection.'],
                    ];
                @endphp
                @foreach($features as $f)
                <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                    <div class="p-4 rounded-4 border h-100 transition-hover">
                        <div class="glass-icon mb-3 bg-primary-light text-primary"><i class="bi {{ $f['icon'] }}"></i></div>
                        <h5>{{ $f['title'] }}</h5>
                        <p class="text-muted small mb-0">{{ $f['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <!-- Floating Saffron Flowers -->
        <img src="{{ asset('images/saffron-flower.png') }}" class="position-absolute" style="top: -50px; right: -50px; width: 300px; opacity: 0.8; z-index: 1;" alt="deco">
        <img src="{{ asset('images/saffron-flower.png') }}" class="position-absolute" style="bottom: -50px; left: -50px; width: 300px; opacity: 0.8; z-index: 1;" alt="deco">

        <div class="container position-relative" style="z-index: 2;">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="mb-3">What Our Customers Say</h2>
                <p class="text-muted">Real stories from our healing community</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <div class="quote-icon"><i class="bi bi-quote"></i></div>
                        <div class="text-warning mb-3">★★★★★</div>
                        <p class="text-muted italic">"The Ashwagandha root has completely transformed my stress levels. After just 2 weeks, I feel more balanced and energized. Kumkuma's quality is unmatched!"</p>
                        <div class="testimonial-user">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80" alt="Sarah">
                            <div>
                                <h6 class="mb-0">Sarah Johnson</h6>
                                <small class="text-muted">Wellness Enthusiast</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <div class="quote-icon"><i class="bi bi-quote"></i></div>
                        <div class="text-warning mb-3">★★★★★</div>
                        <p class="text-muted">"As someone who sits at a desk all day, the consultation with Dr. Sharma was eye-opening. The personalized herbal remedies have improved my digestion and energy."</p>
                        <div class="testimonial-user">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Michael">
                            <div>
                                <h6 class="mb-0">Michael Chen</h6>
                                <small class="text-muted">Software Engineer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <div class="quote-icon"><i class="bi bi-quote"></i></div>
                        <div class="text-warning mb-3">★★★★★</div>
                        <p class="text-muted">"I've tried many Ayurvedic brands, but Kumkuma stands out for their authenticity and purity. The Tulsi tea is now a daily ritual for me and my students."</p>
                        <div class="testimonial-user">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=150&q=80" alt="Priya">
                            <div>
                                <h6 class="mb-0">Priya Patel</h6>
                                <small class="text-muted">Yoga Instructor</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5" data-aos="fade-up">
                <div class="d-inline-flex align-items-center gap-3 bg-white px-4 py-2 rounded-pill shadow-sm">
                    <div class="avatar-group d-flex">
                        <img src="https://i.pravatar.cc/30?u=1" class="rounded-circle border border-white" style="width: 30px; margin-right: -10px;">
                        <img src="https://i.pravatar.cc/30?u=2" class="rounded-circle border border-white" style="width: 30px; margin-right: -10px;">
                        <img src="https://i.pravatar.cc/30?u=3" class="rounded-circle border border-white" style="width: 30px;">
                    </div>
                    <span class="small fw-bold text-muted">Trusted by 50,000+ wellness seekers worldwide</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-white position-relative overflow-hidden">
        <!-- Floating Neem Leaves -->
        <img src="{{ asset('images/neem-leaf.png') }}" class="position-absolute" style="top: 10%; right: 5%; width: 120px; opacity: 0.6; transform: rotate(15deg); z-index: 1;" alt="deco">
        <img src="{{ asset('images/neem-leaf.png') }}" class="position-absolute" style="bottom: 20%; left: 5%; width: 100px; opacity: 0.5; transform: rotate(-20deg); z-index: 1;" alt="deco">
        <img src="{{ asset('images/neem-leaf.png') }}" class="position-absolute" style="bottom: 5%; right: 10%; width: 80px; opacity: 0.4; transform: rotate(30deg); z-index: 1;" alt="deco">

        <div class="container position-relative" style="z-index: 2;">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="mb-3">Frequently Asked Questions</h2>
                <p class="text-muted">Everything you need to know about Kumkuma Wellness</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="accordion faq-premium-accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What makes Kumkuma products different from other Ayurvedic brands?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Kumkuma stands out through our commitment to authenticity and purity. We source our herbs directly from certified organic farms, follow traditional preparation methods passed down through generations, and conduct rigorous third-party testing. Every product is 100% natural with no synthetic additives or preservatives.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Are your products safe to use with other medications?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    While our products are 100% natural, we always recommend consulting with our Ayurvedic doctors or your primary healthcare provider before starting any new supplement if you are on existing medication.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How long does it take to see results?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Ayurveda focuses on root-cause healing, which can take time. Most users report feeling a difference within 2-4 weeks of consistent use, depending on the condition and product.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <p class="text-muted small mb-3">Still have questions?</p>
                        <a href="{{ url('/consultation') }}" class="btn btn-primary rounded-pill px-5 py-3">Contact Support <i class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-5 overflow-hidden">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <img src="" id="modalProductImg" class="img-fluid h-100 w-100 object-fit-cover" alt="product">
                        </div>
                        <div class="col-lg-7 p-5">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 mb-2" id="modalProductCat">Category</span>
                                    <h3 class="modal-title h2" id="modalProductTitle" style="color: var(--primary-color);">Product Name</h3>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="text-secondary mb-4" id="modalProductPrice">Price</h4>
                            <div class="mb-4">
                                <h6 class="fw-bold mb-2">Description</h6>
                                <p class="text-muted" id="modalProductDesc" style="line-height: 1.8;">Product description goes here...</p>
                            </div>
                            <div class="d-flex gap-3 mt-5">
                                <a href="{{ url('/consultation') }}" class="btn btn-primary rounded-pill px-4">Consult Doctor</a>
                                <button class="btn btn-outline-primary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productButtons = document.querySelectorAll('.view-product-btn');
            const modalTitle = document.getElementById('modalProductTitle');
            const modalCat = document.getElementById('modalProductCat');
            const modalPrice = document.getElementById('modalProductPrice');
            const modalDesc = document.getElementById('modalProductDesc');
            const modalImg = document.getElementById('modalProductImg');

            productButtons.forEach(button => {
                button.addEventListener('click', function() {
                    modalTitle.innerText = this.getAttribute('data-title');
                    modalCat.innerText = this.getAttribute('data-cat');
                    modalPrice.innerText = this.getAttribute('data-price');
                    modalDesc.innerText = this.getAttribute('data-desc');
                    modalImg.src = this.getAttribute('data-img');
                });
            });
        });
    </script>
@endsection
