@extends('layouts.auth')

@section('title', 'Sign In - MyBDTV')

@section('content')
<div class="bg-white rounded-[32px] p-7 sm:p-10 border border-red-100/90 shadow-2xl shadow-red-500/10">
    
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto mb-4 border border-red-100 shadow-xs">
            <i class="ri-user-smile-line text-2xl"></i>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
            Welcome <span class="text-red-600">Back</span>
        </h1>
        <p class="text-xs sm:text-sm text-slate-500 mt-1.5 font-medium">
            Sign in to continue watching your favorite TV channels
        </p>
    </div>

    <!-- Session Status Alert -->
    @if(session('status'))
        <div class="mb-5 p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold flex items-center gap-2">
            <i class="ri-checkbox-circle-fill text-base text-emerald-600"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @if(session('success'))
        <div class="mb-5 p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold flex items-center gap-2">
            <i class="ri-checkbox-circle-fill text-base text-emerald-600"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="mb-5 p-3.5 rounded-2xl bg-red-50 border border-red-200 text-red-600 text-xs font-semibold space-y-1">
            @foreach($errors->all() as $error)
                <div class="flex items-center gap-1.5">
                    <i class="ri-error-warning-fill text-sm"></i>
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Email or Username -->
        <div>
            <label for="login" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Email or Username <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    id="login" 
                    name="login" 
                    value="{{ old('login') }}" 
                    required 
                    autofocus 
                    placeholder="Enter email or username" 
                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            </div>
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider">
                    Password <span class="text-red-600">*</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-xs font-bold text-red-600 hover:text-red-700 transition-colors">
                    Forgot Password?
                </a>
            </div>
            <div class="relative">
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    placeholder="Enter your password" 
                    class="w-full pl-11 pr-11 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-lock-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                <button type="button" onclick="togglePasswordVisibility('password', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                    <i class="ri-eye-line text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center justify-between pt-1">
            <label class="flex items-center gap-2 cursor-pointer select-none">
                <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember" 
                    class="w-4 h-4 rounded text-red-600 border-slate-300 focus:ring-red-500 accent-red-600 cursor-pointer"
                />
                <span class="text-xs font-semibold text-slate-600">Remember me</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button 
                type="submit" 
                class="w-full py-3.5 px-6 rounded-full text-sm font-black text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 shadow-lg shadow-red-500/30 hover:shadow-red-500/50 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 group cursor-pointer"
            >
                <span>Sign In</span>
                <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>
    </form>

    <!-- Bottom Switch Link -->
    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
        <p class="text-xs sm:text-sm text-slate-500 font-medium">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-extrabold text-red-600 hover:text-red-700 transition-colors">
                Register now
            </a>
        </p>
    </div>

</div>

<script>
    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'ri-eye-off-line text-lg';
        } else {
            input.type = 'password';
            icon.className = 'ri-eye-line text-lg';
        }
    }
</script>
@endsection
