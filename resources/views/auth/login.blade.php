@extends('layouts.app_dashboard') {{-- أو أي Layout مخصص لصفحات الدخول --}}

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">تسجيل الدخول</h3>
                        <p class="text-muted">مرحباً بك في منصة Velocity Motors</p>
                    </div>

                    {{-- عرض أخطاء التحقق --}}
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 small">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">البريد الإلكتروني</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="name@example.com" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">كلمة المرور</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-0" placeholder="********" required>
                            </div>
                        </div>

                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small" for="remember">تذكرني</label>
                            </div>
                            <a href="#" class="small text-decoration-none">نسيت كلمة المرور؟</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 fw-bold shadow-sm">
                                دخول للمنصة <i class="bi bi-box-arrow-in-left ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4 small text-muted">
                © 2026 جميع الحقوق محفوظة لشركة Velocity Motors
            </div>
        </div>
    </div>
</div>
@endsection