@extends('layouts.app_dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary bg-gradient text-white py-3">
                    <h5 class="card-title mb-0 font-weight-bold">
                        <i class="bi bi-plus-circle me-2"></i>إضافة سيارة جديدة
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('save_car') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">اسم الموديل</label>
                            <input type="text" class="form-control @error('model_name') is-invalid @enderror" 
                                   name="model_name" value="{{ old('model_name') }}" placeholder="مثلاً: Toyota Camry">
                            @error('model_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">السعر</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">سنة الصنع</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" placeholder="2024">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">لون السيارة</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">الممشى (كم)</label>
                            <input type="text" class="form-control @error('mileage') is-invalid @enderror" name="mileage" value="{{ old('mileage') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">فئة السيارة</label>
                            <select class="form-select @error('type') is-invalid @enderror" name="type">
                                <option value="sedan" {{ old('type') == 'sedan' ? 'selected' : '' }}>Sedan (سيدان)</option>
                                <option value="SUV" {{ old('type') == 'SUV' ? 'selected' : '' }}>SUV (عائلية)</option>
                                <option value="sport" {{ old('type') == 'sport' ? 'selected' : '' }}>Sport (رياضية)</option>
                                <option value="transport_large" {{ old('type') == 'transport_large' ? 'selected' : '' }}>نقل ثقيل</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">صورة السيارة</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <div class="form-text text-muted small">يفضل استخدام صور عالية الجودة (PNG, JPG).</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                <i class="bi bi-check2-circle me-1"></i> حفظ البيانات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h5 class="card-title mb-0 fw-bold text-dark text-center w-100">أسطول السيارات المسجلة</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>السيارة</th>
                                    <th>السعر</th>
                                    <th>التفاصيل</th>
                                    <th>الصورة</th>
                                    <th class="text-center">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $ca)
                                <tr>
                                    <td class="fw-bold text-muted">{{ $ca->id }}</td>
                                    <td>
                                        <div class="fw-bold text-primary">{{ $ca->model_name }}</div>
                                        <small class="badge bg-light text-dark border">{{ $ca->type }}</small>
                                    </td>
                                    <td class="fw-bold text-success text-nowrap">{{ number_format($ca->price) }} ريال</td>
                                    <td>
                                        <div class="small">اللون: <span class="text-muted">{{ $ca->color }}</span></div>
                                        <div class="small">الموديل: <span class="text-muted">{{ $ca->year }}</span></div>
                                    </td>
                                    <td>
                                        <img src="{{ asset('images/'.$ca->image) }}" 
                                             class="img-thumbnail rounded-3 shadow-sm" 
                                             style="width: 80px; height: 50px; object-fit: cover;"
                                             alt="{{ $ca->model_name }}">
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group shadow-sm" role="group">
                                            <a href="{{ route('edit_car', ['id' => $ca->id]) }}" class="btn btn-outline-primary btn-sm" title="تعديل">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('delete_car',['id'=>$ca->id]) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               onclick="return confirm('هل أنت متأكد من حذف هذه السيارة؟')" title="حذف">
                                                <i class="bi bi-trash3"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($cars->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-car-front text-muted display-1"></i>
                            <p class="mt-3 text-muted">لا يوجد سيارات مضافة حالياً.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* لمسة جمالية إضافية */
    .card { border-radius: 12px; overflow: hidden; }
    .table thead th { font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; }
    .img-thumbnail:hover { transform: scale(1.1); transition: 0.3s ease-in-out; cursor: pointer; }
    .btn-group .btn { padding: 0.4rem 0.8rem; }
    .form-control:focus, .form-select:focus { border-color: #0d6efd; box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1); }
</style>
@endsection