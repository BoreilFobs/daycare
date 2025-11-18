@extends('layouts.web')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 data-aos="fade-down" data-aos-duration="1000">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="mx-auto text-center data-aos="fade-down" data-aos-duration="1000" style="max-width: 700px;">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Contact Us</h4>
                    <h1 class="display-3 mb-4">Contact For Any Query</h1>
                    <p class="mb-4">Let's walk this journey hand in hand! Whether you have questions about our programs, want to schedule a visit, or simply want to learn more about how we can support your child's development, we're here to help.</p>
                    <p class="mb-5">As you reach out, you become part of the ABC story — a story of togetherness, hope, and love. We look forward to welcoming you to our family of strong beginnings!</p>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-4 data-aos="fade-down" data-aos-duration="1000">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>Address</h4>
                                <p class="mb-2">{{ $siteSettings['contact_address'] ?? '123 Main Street, Downtown, Douala, Cameroon' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>Mail Us</h4>
                                <p class="mb-2">{{ $siteSettings['contact_email'] ?? 'info@abcchildrencentre.com' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>Telephone</h4>
                                <p class="mb-2">{{ $siteSettings['contact_phone'] ?? '+237 650 123 456' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <input type="text" name="name" class="w-100 form-control py-3 mb-5 border-primary" placeholder="Your Name" value="{{ old('name') }}" required>
                            <input type="email" name="email" class="w-100 form-control py-3 mb-5 border-primary" placeholder="Enter Your Email" value="{{ old('email') }}" required>
                            <input type="text" name="subject" class="w-100 form-control py-3 mb-5 border-primary" placeholder="Subject" value="{{ old('subject') }}" required>
                            <textarea name="message" class="w-100 form-control mb-5 border-primary" rows="8" cols="10" placeholder="Your Message" required>{{ old('message') }}</textarea>
                            <button class="w-100 btn btn-primary form-control py-3 border-primary text-white bg-primary" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-6 data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
                        <div class="border border-primary h-100 rounded">
                            <iframe src="{{ $siteSettings['contact_map_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741295493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sPT%20Kulkul%20Teknologi%20Internasional!5e0!3m2!1sen!2sid!4v1601138221085!5m2!1sen!2sid' }}" 
                            class="w-100 h-100 rounded" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection