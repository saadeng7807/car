@extends('layouts.app')

@section('content')
 

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            @foreach($s as $car)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden car-card transition-all">
                        
                        <div class="position-relative overflow-hidden">
                            <img src="{{asset('images/'.$car['image']) }}" class="card-img-top car-img" alt="{{ $car['model'] }}">
                            <span class="position-absolute top-0 end-0 m-3 badge rounded-pill {{ $car['type'] == 'sport' ? 'bg-danger' : ($car['type'] == 'SUV' ? 'bg-primary' : 'bg-dark') }}">
                                {{ strtoupper($car['type']) }}
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small fw-bold text-uppercase">{{ $car['model_name'] }}</span>
                                <h6 class="text-primary mb-0 fw-bold">{{ $car['price'] }}</h6>
                            </div>
                            <h5 class="card-title fw-bold text-dark">{{ $car['model_name'] }}</h5>

                            <div class="d-flex gap-3 mt-3 text-muted small">
                                <span><i class="bi bi-fuel-pump me-1"></i> بنزين</span>
                                <span><i class="bi bi-gear me-1"></i> أوتوماتيك</span>
                                <span><i class="bi bi-speedometer2 me-1"></i> {{ $car['mileage'] }} كم</span>
                                 <span><i class="bi bi-speedometer2 me-1"></i><span>اللون</span> {{ $car['color'] }} </span>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 pb-4 pt-0">
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-outline-dark rounded-pill fw-bold btn-sm py-2">
                                    <i class="bi bi-eye me-1"></i> التفاصيل
                                </a>
                                <button class="btn btn-primary rounded-pill fw-bold btn-sm py-2">
                                    احجز الآن
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .transition-all {
        transition: all 0.3s ease-in-out;
    }

    .car-card {
        border-radius: 1.25rem;
    }

    .car-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
    }

    .car-img {
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .car-card:hover .car-img {
        transform: scale(1.1);
    }

    .car-card .btn {
        transition: all 0.3s;
    }

    /* تحسين زر 'احجز الآن' ليتماشى مع الهيدر البنفسجي */
    .btn-primary {
        background-color: rgb(80, 26, 167);
        border-color: rgb(80, 26, 167);
    }
    .btn-primary:hover {
        background-color: rgb(60, 20, 130);
        border-color: rgb(60, 20, 130);
    }
</style>

@endsection