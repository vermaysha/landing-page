@extends('dashboard.layouts.guest')

@section('pageTitle', 'Login')

@section('pageContent')
    <div class="col-lg">
        <div class="container-tight">
            <div class="text-center mb-4">
                <a href="{{ route('dashboard.home') }}" class="navbar-brand navbar-brand-autodark">
                    {{ config('app.name') }}
                </a>
            </div>
            @if ($errors->any())
                <div class="card mb-4">
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <i class="alert-icon icon ti ti-alert-circle"></i>
                                    </div>
                                    <div>
                                        {{ $error }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form action="{{ route('dashboard.login.post') }}" method="post" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="your@email.com"
                                autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" name="password" placeholder="Your password"
                                    autocomplete="off">
                                <span class="input-group-text">
                                    <a href="javascript:void(0);" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip" onclick="showPassword()">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg d-none d-lg-block">
        <img src="{{ Vite::asset('resources/img/dashboard/undraw_secure_login_pdn4.svg') }}" height="300"
            class="d-block mx-auto" alt="">
    </div>
@endsection

@push('head')
    <script>
        function showPassword() {
            const el = document.querySelector('[name=password]')
            const type = el.getAttribute('type')

            el.setAttribute('type', type === 'password' ? 'text' : 'password')
        }
    </script>
@endpush
