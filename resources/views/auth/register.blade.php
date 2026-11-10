@extends('layouts.auth')

@section('title', 'Register - MyBDTV')

@section('content')
<div class="bg-white rounded-[32px] p-7 sm:p-10 border border-red-100/90 shadow-2xl shadow-red-500/10">
    
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto mb-4 border border-red-100 shadow-xs">
            <i class="ri-user-add-line text-2xl"></i>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
            Create an <span class="text-red-600">Account</span>
        </h1>
        <p class="text-xs sm:text-sm text-slate-500 mt-1.5 font-medium">
            Join MyBDTV to access 300+ live TV channels today
        </p>
    </div>

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

    <!-- Register Form -->
    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Full Name -->
        <div>
            <label for="name" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Full Name <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    placeholder="Enter your full name" 
                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-user-3-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            </div>
        </div>

        <!-- Username -->
        <div>
            <label for="username" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Username <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ old('username') }}" 
                    required 
                    placeholder="Choose a unique username" 
                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-at-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            </div>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Email Address <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="name@example.com" 
                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            </div>
        </div>

        <!-- Phone Number -->
        <div>
            <label for="phone" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Phone Number (Optional)
            </label>
            <div class="relative">
                <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    value="{{ old('phone') }}" 
                    placeholder="01XXXXXXXXX" 
                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-phone-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            </div>
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Password <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    placeholder="Create a strong password" 
                    class="w-full pl-11 pr-11 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-lock-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                <button type="button" onclick="togglePasswordVisibility('password', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                    <i class="ri-eye-line text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Confirm Password <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required 
                    placeholder="Re-enter your password" 
                    class="w-full pl-11 pr-11 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-lock-check-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                <button type="button" onclick="togglePasswordVisibility('password_confirmation', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                    <i class="ri-eye-line text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Terms Agreement Note -->
        <p class="text-[11px] text-slate-500 font-medium leading-relaxed pt-1">
            By signing up, you agree to our 
            <a href="{{ route('home') }}#support" class="font-bold text-red-600 hover:underline">Terms of Service</a> 
            and 
            <a href="{{ route('home') }}#support" class="font-bold text-red-600 hover:underline">Privacy Policy</a>.
        </p>

        <!-- Submit Button -->
        <div class="pt-3">
            <button 
                type="submit" 
                class="w-full py-3.5 px-6 rounded-full text-sm font-black text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 shadow-lg shadow-red-500/30 hover:shadow-red-500/50 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 group cursor-pointer"
            >
                <span>Create Account</span>
                <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>
    </form>

    <!-- Bottom Switch Link -->
    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
        <p class="text-xs sm:text-sm text-slate-500 font-medium">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-extrabold text-red-600 hover:text-red-700 transition-colors">
                Sign in
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
