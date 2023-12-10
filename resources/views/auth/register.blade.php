<x-guest-layout>
    <x-auth-card>

        @include('alert')
        <h4>Register</h4>
        <form method="POST" action="{{ route('register') }}" id="login-form">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                <input id="name"
                       type="name"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{ old('name') }}"
                       autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback login-error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>


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

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="password_confirmation" type="password"
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           name="password_confirmation">
                    @error('password_confirmation')
                        <span class="invalid-feedback login-error" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-login w-100 login-btn">Register</button>
            </div>

            <div class="f-size-15 normal-text pt-3">
                    <a href="{{route('login')}}">Already registered?</a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>