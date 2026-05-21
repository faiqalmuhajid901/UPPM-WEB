@extends('layouts.auth')

@section('title', 'Login Admin')
@section('heading', 'Login Admin')
@section('subheading', 'Masuk ke dashboard UPPM')

@section('content')
    
    {{-- Session Status --}}
    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        {{-- Email --}}
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-input" 
                value="{{ old('email') }}"
                placeholder="admin@uppm.ac.id"
                required 
                autofocus
            >
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Password --}}
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <div class="password-field-wrapper">
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-input form-input--with-toggle"
                    placeholder="********"
                    required
                >
                <button
                    type="button"
                    id="togglePassword"
                    aria-label="Tampilkan password"
                    aria-pressed="false"
                    class="password-toggle-btn"
                >
                    <svg data-eye-open class="password-toggle-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg data-eye-off class="password-toggle-icon is-hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m3 3 18 18"></path>
                        <path d="M10.477 10.49a3 3 0 0 0 4.033 4.033"></path>
                        <path d="M9.88 5.09A10.94 10.94 0 0 1 12 4.95c4.18 0 7.76 2.5 9.34 6.12a1 1 0 0 1 0 .86 10.96 10.96 0 0 1-4.08 4.72"></path>
                        <path d="M6.61 6.61A10.96 10.96 0 0 0 2.66 11.07a1 1 0 0 0 0 .86A10.96 10.96 0 0 0 12 18.05c1.6 0 3.11-.35 4.46-.98"></path>
                    </svg>
                </button>
            </div>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Remember Me --}}
        <div class="form-checkbox-wrapper">
            <input type="checkbox" name="remember" id="remember" value="1" class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="form-checkbox-label">Ingat saya</label>
        </div>
        
        {{-- Submit --}}
        <button type="submit" class="btn-primary">
            Masuk
        </button>
    </form>

@endsection



