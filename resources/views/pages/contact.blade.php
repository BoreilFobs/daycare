@extends('layouts.web')
@section('title', __('site.contact.title'))
@section('content')
    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <h1 class="black mb-lg-4 mb-md-3 mb-2">
                        {{ __('site.contact.title') }}
                    </h1>
                    <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('site.nav.home') }}
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            {{ __('site.contact.title') }}
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

    <!-- Contact Info Start -->
    <section class="contact-infosectionv1 space-top overflow-hidden space-bottom">
        <div class="container">
            <div class="row g-lg-4 g-3 justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="contact-call-info">
                        <div class="icon d-center">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h5 class="black">
                            {{ __('site.contact.location') }}
                        </h5>
                        <a href="#" class="pra">
                            {{ $contactData->address ?? __('site.contact.address') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="contact-call-info">
                        <div class="icon d-center">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h5 class="black">
                            {{ __('site.contact.email') }}
                        </h5>
                        <a href="mailto:{{ $contactData->email ?? 'abccentre4kids@gmail.com' }}" class="pra">
                            {{ $contactData->email ?? 'abccentre4kids@gmail.com' }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="contact-call-info">
                        <div class="icon d-center">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h5 class="black">
                            {{ __('site.contact.phone') }}
                        </h5>
                        <a href="tel:{{ $contactData->phone ?? '+237678165580' }}" class="pra">
                            {{ $contactData->phone ?? '+237 678 165 580' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map -->
    <section class="google-map">
        <iframe
            src="{{ $contactData->map_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1661744810296!2d10.6275!3d5.5175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzEnMDMuMCJOIDEwwrAzNyc0MC4wIkU!5e0!3m2!1sen!2scm!4v1717004161632!5m2!1sen!2scm' }}"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-sectionv02 section-padding">
        <div class="container">
            <div class="section-title text-center mb-60">
                <span class="sub-title wow fadeInUp p5-clr">
                    {{ __('site.contact.subtitle') }}
                </span>
                <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                    {{ __('site.contact.send_message') }}
                </h3>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6">
                    <div class="contact-thumbv02 position-relative">
                        <div class="thumb-smal">
                            <img src="{{ asset('images/imported/contact-section.jpeg') }}" alt="img">
                        </div>
                        <div class="thumbb">
                            <img src="{{ asset('images/imported/front-facing-of-campus.jpeg') }}" alt="img">
                        </div>
                        <div class="badg-count">
                            <img src="{{ asset('img/contact/contact-badge.png') }}" alt="img">
                            <div class="cont">
                                <h4>
                                    <span class="count">{{ $stats['projects'] ?? '2' }}</span>k+
                                </h4>
                                <span class="subti">
                                    Happy Families
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-contentv2">
                        <div class="write-comment">
                            <h4 class="black fw-semibold mb-24">
                                {{ __('site.contact.send_message') }}
                            </h4>
                            @if(session('success'))
                                <div class="alert alert-success mb-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.store') }}" method="POST" class="row g-lg-4 g-3">
                                @csrf
                                <div class="col-lg-6">
                                    <div class="comment-grp">
                                        <input type="text" name="name" placeholder="{{ __('site.contact.your_name') }}" required value="{{ old('name') }}">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="comment-grp">
                                        <input type="email" name="email" placeholder="{{ __('site.contact.your_email') }}" required value="{{ old('email') }}">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="comment-grp">
                                        <input type="tel" name="phone" placeholder="{{ __('site.contact.phone') }}" value="{{ old('phone') }}">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="comment-grp">
                                        <input type="text" name="subject" placeholder="{{ __('site.contact.subject') }}" value="{{ old('subject') }}">
                                        <i class="fa-solid fa-tag"></i>
                                    </div>
                                    @error('subject')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-xl-3">
                                    <div class="comment-grp text-aras position-relative">
                                        <textarea name="message" rows="5" placeholder="{{ __('site.contact.message') }}" required>{{ old('message') }}</textarea>
                                        <span class="enves">
                                            <i class="fa-solid fa-message"></i>
                                        </span>
                                    </div>
                                    @error('message')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="comment-btn">
                                    <button type="submit" class="theme-btn w-100 round100 p2-bg py-3 px-xl-5 px-4">
                                        <span class="white fw-medium">
                                            {{ __('site.contact.send') }}
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stay Success Section Start -->
    <section class="stay-section pt-50 pb-50 cmn-bg overflow-hidden position-relative">
        <div class="container">
            <div class="row justify-content-between align-items-center g-4">
                <div class="col-lg-5 col-md-6 col-sm-7">
                    <div class="stay-content">
                        <div class="section-title">
                            <span class="sub-title wow fadeInUp black">
                                {{ __('site.support.subtitle') }}
                            </span>
                            <h3 class="m-title wow fadeInUp black mb-sm-3 mb-2" data-wow-delay=".3s">
                                {{ __('site.support.title') }}
                            </h3>
                            <p class="mb-24 pra wow fadeInUp" data-wow-delay=".4s">
                                {{ __('site.support.description') }}
                            </p>
                            <a href="{{ route('about') }}" class="theme-btn round100 p2-bg py-3">
                                <span class="white fw-medium">
                                    {{ __('site.learn_more') }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 me-xl-5 col-sm-5">
                    <div class="stay-thumb w-100">
                        <img src="{{ asset('images/stay-thumb.png') }}" alt="img" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <!-- Element-->
        <img src="{{ asset('img/aservices/stay-shape.png') }}" alt="img" class="stay-element">
    </section>
@endsection
