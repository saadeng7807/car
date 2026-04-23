@extends('layouts.app')

@section('content')
<style>
    /* لمسات إضافية لتحسين المظهر */
    body {
        background: #f8f9fa; /* خلفية هادئة */
    }
    .auth-card {
        border-radius: 20px;
        transition: transform 0.3s ease;
    }
    .auth-card:hover {
        transform: translateY(-5px); /* تأثير ارتفاع بسيط عند التمرير */
    }
    .input-group-text {
        border-radius: 12px 0 0 12px !important; /* تناسق الحواف مع RTL */
        background-color: #f1f3f5 !important;
        color: #0d6efd;
    }
    .form-control {
        border-radius: 0 12px 12px 0 !important;
        padding: 12px;
        transition: all 0.3s;
    }
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25 red linear-gradient(45deg, #0d6efd, #0043a8); /* يمكنك تغيير اللون ليناسب علامتكم */
    }
    .btn-login {
        border-radius: 12px;
        background: linear-gradient(45deg, #0d6efd, #0043a8);
        border: none;
        transition: 0.3s;
    }
    .btn-login:hover {
        background: linear-gradient(45deg, #0043a8, #0d6efd);
        transform: scale(1.02);
    }
    .brand-logo {
        font-size: 1.8rem;
        letter-spacing: -1px;
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 85vh;">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg auth-card">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <div class="mb-2">
                             <i class="bi bi-speedometer2 text-primary display-4"></i>
                        </div>
                        <h3 class="fw-bold brand-logo text-dark">Velocity <span class="text-primary">Motors</span></h3>
                        <p class="text-muted small">سجل دخولك لإدارة محرك أعمالك اليوم</p>
                    </div>

                    {{-- عرض أخطاء التحقق بتنسيق أجمل --}}
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 rounded-3 small animate__animated animate__fadeIn">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="bi bi-exclamation-circle-fill me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">البريد الإلكتروني</label>
                            <div class="input-group">
                                <span class="input-group-text border-0"><i class="bi bi-envelope-at"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-0" placeholder="name@velocity.com" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">كلمة المرور</label>
                            <div class="input-group">
                                <span class="input-group-text border-0"><i class="bi bi-shield-lock"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-0" placeholder="••••••••" required>
                            </div>
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small text-muted" for="remember">ابقني متصلاً</label>
                            </div>
                            <a href="#" class="small text-decoration-none fw-bold">نسيت الكلمة؟</a>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-login py-3 fw-bold text-uppercase">
                                دخول للمنصة <i class="bi bi-arrow-left-short ms-1"></i>
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <p class="small text-muted">ليس لديك حساب؟ <a href="#" class="fw-bold text-decoration-none">إنشاء حساب جديد</a></p>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-4 small text-muted opacity-75">
                <p>© {{ date('Y') }} <strong>Velocity Motors</strong>. السرعة في الأداء، الدقة في التنفيذ.</p>
            </div>
        </div>
    </div>
</div>
@endsection