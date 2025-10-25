@extends('layouts.web')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">{{ $pageSections['header']['title'] ?? 'Contact Us' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">{{ $pageSections['header']['title'] ?? 'Contact Us' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">{{ $pageSections['content']['title'] ?? 'Contact Us' }}</h4>
                    <h1 class="display-3 mb-4">{{ $pageSections['content']['heading'] ?? 'Contact For Any Query' }}</h1>
                    <p class="mb-4">Let's walk this journey hand in hand! Whether you have questions about our programs, want to schedule a visit, or simply want to learn more about how we can support your child's development, we're here to help.</p>
                    <p class="mb-5">As you reach out, you become part of the ABC story — a story of togetherness, hope, and love. We look forward to welcoming you to our family of strong beginnings!</p>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>{{ $pageSections['info']['address_title'] ?? 'Address' }}</h4>
                                <p class="mb-2">{{ $pageSections['info']['address'] ?? '104 North tower New York, USA' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>{{ $pageSections['info']['email_title'] ?? 'Mail Us' }}</h4>
                                <p class="mb-2">{{ $pageSections['info']['email'] ?? 'info@example.com' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div class="">
                                <h4>{{ $pageSections['info']['phone_title'] ?? 'Telephone' }}</h4>
                                <p class="mb-2">{{ $pageSections['info']['phone'] ?? '(+012) 3456 7890 123' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
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
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="border border-primary h-100 rounded">
                            <iframe src="{{ $pageSections['info']['map_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.0360649959!2d-74.3093289654168!3d40.69753996411732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1691911295047!5m2!1sen!2sbd' }}" 
                            class="w-100 h-100 rounded" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection