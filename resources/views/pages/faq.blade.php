@extends('layouts.web')
@section('title', 'FAQ')
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        FAQ
                    </h1>
                    <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            FAQ
                        </li>
                    </ul>
                </div>
                <div class="breadcrumnd-thumb position-relative">
                    <img src="{{ asset('images/bread-thumb.png') }}" alt="img" class="mimg">
                    <img src="{{ asset('images/bread-child.png') }}" alt="img" class="bread-child">
                    <img src="{{ asset('images/bread-cat.png') }}" alt="img" class="bread-cat">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section Start -->
    <section class="faq-section mt-60 overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="faq-content-wrap">
                        <span class="sub-title d-block p1-clr mb-15 wow fadeInUp">
                            Got Questions?
                        </span>
                        <h2 class="black fw-medium mb-4 wow fadeInUp" data-wow-delay=".2s">
                            Frequently Asked Questions
                        </h2>
                        <p class="pra mb-4 wow fadeInUp" data-wow-delay=".3s">
                            Find answers to common questions about our daycare services, programs, and policies. If you don't see your question here, feel free to contact us.
                        </p>
                        <div class="faq-thumb wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('images/imported/faq-section.jpeg') }}" alt="FAQ" class="round10">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-accordion-wrap">
                        <div class="accordion" id="faqAccordion">
                            @forelse($faqs as $index => $faq)
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".{{ ($index % 5 + 3) }}s">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        <span class="faq-number p1-bg">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        {{ $faq->title ?? $faq->question ?? 'Question ' . ($index + 1) }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {!! $faq->content ?? $faq->answer ?? 'Answer coming soon.' !!}
                                    </div>
                                </div>
                            </div>
                            @empty
                            <!-- Default FAQs if none in database -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".3s">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="faq-number p1-bg">01</span>
                                        What are your operating hours?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We are open Monday through Friday from 7:00 AM to 6:00 PM. We are closed on major holidays. Extended hours may be available upon request.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".4s">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="faq-number p1-bg">02</span>
                                        What age groups do you accept?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We accept children from 6 weeks to 5 years old. Our programs are designed for different age groups: Infant (6 weeks - 12 months), Toddler (1-2 years), Preschool (3-4 years), and Pre-K (4-5 years).
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".5s">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="faq-number p1-bg">03</span>
                                        What is your staff-to-child ratio?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We maintain ratios that exceed state requirements: 1:3 for infants, 1:4 for toddlers, 1:8 for preschoolers, and 1:10 for pre-K. This ensures each child receives personalized attention.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span class="faq-number p1-bg">04</span>
                                        Do you provide meals and snacks?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes! We provide nutritious breakfast, lunch, and two snacks daily. Our menus are designed by a certified nutritionist and accommodate common allergies. Parents can also send food from home if preferred.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".7s">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <span class="faq-number p1-bg">05</span>
                                        How can I enroll my child?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Enrollment is easy! Schedule a tour to visit our facility, complete the enrollment forms, and submit the required documents. We'll guide you through every step. Contact us to get started!
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item wow fadeInUp" data-wow-delay=".8s">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <span class="faq-number p1-bg">06</span>
                                        What safety measures do you have?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Safety is our top priority. We have secure entry systems, background-checked staff, surveillance cameras, regular safety drills, and strict pickup procedures. All staff are CPR and First Aid certified.
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section Start -->
    <section class="contact-cta-section overflow-hidden p1-bg py-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content">
                        <h2 class="white fw-medium mb-3">
                            Still Have Questions?
                        </h2>
                        <p class="white opacity-75">
                            Our team is here to help. Contact us anytime and we'll be happy to assist you.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="{{ route('contact') }}" class="theme-btn round100 white-bg py-3 px-xl-5 px-4">
                        <span class="p1-clr fw-medium">
                            Contact Us
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .accordion-item {
        border: 1px solid #eee;
        border-radius: 10px !important;
        margin-bottom: 15px;
        overflow: hidden;
    }
    .accordion-button {
        font-weight: 600;
        color: #333;
        padding: 20px 25px;
        gap: 15px;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #333;
        box-shadow: none;
    }
    .accordion-button:focus {
        box-shadow: none;
        border-color: transparent;
    }
    .accordion-body {
        padding: 0 25px 20px 85px;
        color: #666;
        line-height: 1.8;
    }
    .faq-number {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        flex-shrink: 0;
    }
    .faq-thumb img {
        width: 100%;
        max-width: 400px;
    }
</style>
@endpush
