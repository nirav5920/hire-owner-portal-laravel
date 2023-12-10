<x-guest-layout>
    <x-auth-card>

        @include('alert')
        <h4>Login</h4>
        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf
            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                <input id="email"
                       type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback login-error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback login-error" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-login w-100 login-btn">Log In</button>
            </div>

            <div class="f-size-15 normal-text pt-3">
                @if (Route::has('password.request'))
                    <a class="p-0" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                <br>
                    <a href="{{route('register')}}">Don't have account?</a>
                @endif
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

