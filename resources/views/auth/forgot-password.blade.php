@extends('layouts.auth')

@section('title', 'Forgot Password - MyBDTV')

@section('content')
<div class="bg-white rounded-[32px] p-7 sm:p-10 border border-red-100/90 shadow-2xl shadow-red-500/10">
    
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto mb-4 border border-red-100 shadow-xs">
            <i class="ri-key-2-line text-2xl"></i>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
            Forgot <span class="text-red-600">Password?</span>
        </h1>
        <p class="text-xs sm:text-sm text-slate-500 mt-1.5 font-medium leading-relaxed">
            No worries! Enter your registered email address and we'll send you a password reset link.
        </p>
    </div>

    <!-- Status Message -->
    @if(session('status'))
        <div class="mb-5 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-start gap-2.5">
            <i class="ri-checkbox-circle-fill text-lg text-emerald-600 shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold">Reset link sent!</p>
                <p class="mt-0.5 text-emerald-700 font-medium">{{ session('status') }}</p>
            </div>
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

    <!-- Forgot Password Form -->
    <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider mb-1.5">
                Registered Email Address <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    placeholder="Enter your email address" 
                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm placeholder:text-slate-400 focus:bg-white focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                />
                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button 
                type="submit" 
                class="w-full py-3.5 px-6 rounded-full text-sm font-black text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 shadow-lg shadow-red-500/30 hover:shadow-red-500/50 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 group cursor-pointer"
            >
                <i class="ri-send-plane-fill group-hover:translate-x-0.5 transition-transform"></i>
                <span>Send Reset Link</span>
            </button>
        </div>
    </form>

    <!-- Bottom Switch Link -->
    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
        <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-extrabold text-slate-600 hover:text-red-600 transition-colors">
            <i class="ri-arrow-left-line"></i>
            <span>Return to Sign In</span>
        </a>
    </div>

</div>
@endsection
