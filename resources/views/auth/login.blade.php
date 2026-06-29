<x-layouts.guest title="Login">

    <div class="card bg-base-100 shadow-2xl rounded-2xl w-full max-w-md">
        <div class="card-body my-2 p-10">

            {{-- Logo & Title --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo-bengkot1.jpg') }}" alt="Logo Poliklinik"
                    class="w-16 h-16 rounded-2xl object-cover mx-auto mb-3 block">

                <h1 class="text-2xl font-extrabold text-[#1e2d6b] m-0 mb-1">
                    Poliklinik
                </h1>

                <p class="text-sm text-slate-400 m-0">
                    Masuk ke akun Anda
                </p>
            </div>


            {{-- Error Alert --}}
            @if ($errors->any())
            <div class="alert alert-error mb-5 rounded-xl text-sm">
                <i class="fas fa-circle-xmark"></i>
                <span>{{ $errors->first() }}</span>
            </div>
            @endif


            <form action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="form-control mb-4">
                    <label for="email" class="label pb-1 cursor-pointer">
                        <span class="text-sm font-semibold text-gray-700">
                            Email
                        </span>
                    </label>

                    <label class="input input-bordered flex items-center gap-3 rounded-xl border-slate-200 bg-slate-50 focus-within:border-[#1e2d6b]">
                        <i class="fas fa-envelope text-slate-400 text-sm"></i>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email..."
                            class="grow bg-transparent text-slate-800 text-sm" required>
                    </label>
                </div>


                {{-- Password --}}
                <div class="form-control mb-4">
                    <label for="password_login" class="label pb-1 cursor-pointer">
                        <span class="text-sm font-semibold text-gray-700">
                            Password
                        </span>
                    </label>

                    <label class="input input-bordered flex items-center gap-3 rounded-xl border-slate-200 bg-slate-50 focus-within:border-[#1e2d6b]">
                        <i class="fas fa-lock text-slate-400 text-sm"></i>
                        <input type="password" name="password" id="password_login" placeholder="Masukkan password..."
                            class="grow bg-transparent text-slate-800 text-sm" required>
                        <i class="fas fa-eye text-slate-400 text-sm cursor-pointer hover:text-slate-600" id="toggle_login"
                            onclick="togglePassword('password_login', 'toggle_login')"></i>
                    </label>
                </div>

                {{-- Remember Me & Forgot Password --}}
                <div class="flex items-center justify-between mb-6 px-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="checkbox checkbox-sm border-slate-300 rounded" {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-sm text-slate-600">Ingat Saya</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-[#2d4499] font-semibold hover:underline">
                            Lupa Password?
                        </a>
                    @endif
                </div>


                {{-- Submit Button --}}
                <button type="submit" class="btn-primary-gradient w-full py-3 rounded-xl font-bold text-white transition-all hover:opacity-90">
                    <i class="fas fa-right-to-bracket mr-2"></i>
                    Login
                </button>

            </form>


            {{-- Register --}}
            <p class="text-center mt-6 text-sm text-slate-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-[#2d4499] font-bold no-underline hover:text-[#1e2d6b]">
                    Register
                </a>
            </p>

        </div>
    </div>


    @push('scripts')
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } 
            else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
    @endpush

</x-layouts.guest>