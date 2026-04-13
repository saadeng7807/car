@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold text-dark position-relative pb-2">
                فئات السيارات المتاحة
                <span class="position-absolute bottom-0 start-0 bg-primary" style="height: 3px; width: 50px;"></span>
            </h2>
            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">متاح حالياً: {{ count($carCategories) }} فئات</span>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach($carCategories as $item)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm custom-card-hover transition-all">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper mb-4 d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle" style="width: 80px; height: 80px;">
                            <i class="bi {{ $item['icon'] }} display-5"></i>
                        </div>

                        <h5 class="card-title fw-bold mb-3">{{ $item['name'] }}</h5>
                        <p class="card-text text-muted small px-2">
                            {{ Str::limit($item['description'], 100) }} </p>
                    </div>
                    
                    <div class="card-footer bg-transparent border-0 pb-4 text-center">
                        <a href="{{ route('listcar') }}" class="btn btn-outline-primary rounded-pill px-4 btn-sm fw-bold">
                            عرض الموديلات <i class="bi bi-arrow-left ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .transition-all { transition: all 0.3s ease-in-out; }
    
    .custom-card-hover:hover {
        transform: translateY(-10px);
        shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
        border-bottom: 4px solid #0d6efd !important;
    }

    .icon-wrapper i { transition: transform 0.3s ease; }
    .custom-card-hover:hover .icon-wrapper i {
        transform: scale(1.1) rotate(-5deg);
    }
</style>
@endsection