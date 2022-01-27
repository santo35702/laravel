<x-guest-layout>
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1"><b>Shop</b>Login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-justify">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4" />
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" :value="old('email')" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Email Password Reset Link</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                @if (Route::has('login'))
                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
                @endif
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</x-guest-layout>
