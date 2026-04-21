@extends('layouts.app_dashboard')

@section('content')
<div class="container py-4">
    <div class="row g-4">
        {{-- قسم إضافة فئة جديدة --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 py-1">إضافة فئة سيارة جديدة</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('save_brand') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">اسم الفئة</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" placeholder="مثلاً: تويوتا">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">نوع المركبة</label>
                            <select class="form-select @error('type') is-invalid @enderror" name="type">
                                <option value="" selected disabled>اختر النوع...</option>
                                <option value="sedan" {{ old('type') == 'sedan' ? 'selected' : '' }}>Sedan (سيدان)</option>
                                <option value="SUV" {{ old('type') == 'SUV' ? 'selected' : '' }}>SUV (عائلية)</option>
                                <option value="sport" {{ old('type') == 'sport' ? 'selected' : '' }}>Sport (رياضية)</option>
                                <option value="transport_large" {{ old('type') == 'transport_large' ? 'selected' : '' }}>Transport Large (نقل ثقيل)</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">الوصف</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      name="description" rows="3" placeholder="وصف مختصر للفئة...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">أيقونة الفئة (Bootstrap Icon)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                <input type="text" class="form-control @error('icons') is-invalid @enderror" 
                                       name="icons" value="{{ old('icons') }}" placeholder="bi-car-front">
                            </div>
                            <small class="text-muted">أدخل اسم الكلاس الخاص بالأيقونة</small>
                            @error('icons')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> حفظ البيانات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- قسم عرض الفئات المضافة --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">الفئات المسجلة</h5>
                    <span class="badge bg-info">{{ $brands->count() }} فئة</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>المعلومات</th>
                                    <th>النوع</th>
                                    <th class="text-center">الأيقونة</th>
                                    <th class="text-center">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($brands as $brand)
                                <tr>
                                    <td><span class="text-muted fw-bold">{{ $brand->id }}</span></td>
                                    <td>
                                        <div class="fw-bold">{{ $brand->name }}</div>
                                        <div class="small text-muted text-truncate" style="max-width: 200px;">{{ $brand->description }}</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">{{ $brand->type }}</span>
                                    </td>
                                    <td class="text-center">
                                        <i class="bi {{ $brand->icons }} fs-4 text-primary"></i>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('edit_brand',['id'=>$brand->id]) }}" 
                                               class="btn btn-outline-primary btn-sm" title="تعديل">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('delete_brand',['id'=>$brand->id]) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               onclick="return confirm('هل أنت متأكد من حذف هذه الفئة؟')" title="حذف">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">لا توجد فئات مضافة حتى الآن.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection