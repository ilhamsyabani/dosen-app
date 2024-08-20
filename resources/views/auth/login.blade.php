@extends('layouts.guest')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Alamat Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="{{ __('Alamat email') }}" value="{{ old('email') }}" required
                                            autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="{{ __('Password') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Masuk') }}
                                        </button>
                                    </div>

                                    <hr>

                                    @if (Route::has('redirect'))
                                        <div class="mb-3 text-center">
                                            <a href="{{ route('redirect') }}"
                                                class="btn bsb-btn-2xl btn-outline-dark rounded text-center">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_67_28623)">
                                                        <path
                                                            d="M5.31891 14.5035L4.4835 17.6222L1.43011 17.6868C0.517594 15.9943 0 14.0578 0 12C0 10.0101 0.483938 8.13362 1.34175 6.48132H1.34241L4.06078 6.9797L5.25159 9.68176C5.00236 10.4084 4.86652 11.1884 4.86652 12C4.86661 12.8809 5.02617 13.7249 5.31891 14.5035Z"
                                                            fill="#FBBB00" />
                                                        <path
                                                            d="M23.7921 9.75824C23.93 10.4841 24.0018 11.2338 24.0018 12C24.0018 12.8591 23.9115 13.6971 23.7394 14.5055C23.1553 17.2563 21.6289 19.6582 19.5144 21.358L19.5137 21.3574L16.0898 21.1827L15.6052 18.1576C17.0083 17.3347 18.1048 16.047 18.6823 14.5055H12.2656V9.75824H23.7921Z"
                                                            fill="#518EF8" />
                                                        <path
                                                            d="M19.5114 21.3574L19.5121 21.358C17.4556 23.011 14.8433 24 11.9996 24C7.42969 24 3.45652 21.4457 1.42969 17.6868L5.31848 14.5035C6.33188 17.2081 8.94089 19.1334 11.9996 19.1334C13.3143 19.1334 14.546 18.778 15.6029 18.1576L19.5114 21.3574Z"
                                                            fill="#28B446" />
                                                        <path
                                                            d="M19.6577 2.76263L15.7702 5.94525C14.6763 5.26153 13.3833 4.86656 11.9981 4.86656C8.87017 4.86656 6.21236 6.88017 5.24973 9.68175L1.3405 6.48131H1.33984C3.337 2.63077 7.36028 0 11.9981 0C14.9097 0 17.5794 1.03716 19.6577 2.76263Z"
                                                            fill="#F14336" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_67_28623">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span class="ms-2 fs-6 flex-grow-1">
                                                    {{ __('Masuk dengan Google') }}</span>
                                            </a>
                                            {{-- <a href="{{ route('redirect') }}" class="btn btn-danger btn-block">
                                                    <i class="fa fa-google" aria-hidden="true"></i>
                                                    {{ __('Masuk dengan Google') }}
                                                </a> --}}

                                        </div>
                                    @endif
                                </form>

                                <hr>

                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    </div>
                                @endif

                                {{-- @if (Route::has('register'))
                                        <div class="text-center">
                                            <a class="small"
                                                href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                                        </div>
                                    @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn {
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            width: 100%;
        }


        .btn .text {
            flex-grow: 1;
            /* Allows text to grow and push the SVG to the start */
            text-align: center;
            /* Center-aligns the text */
        }
    </style>
@endsection
