<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }
}; ?>


<body class="login-page">
    <main>
        <div class="login-block">
            <h1>Account - Login</h1>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form wire:submit="login">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Masukan Email..." required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Masukan Password..." required autocomplete="current-password" />        
                        <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="remember" class="flex items-start justify-start mt-2">
                            <input wire:model="form.remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat Saya') }}</span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="flex items-end justify-end mt-2">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                                    {{ __('Lupa Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <x-primary-button class="btn btn-block mt-4">
                    {{ __('Login') }}
                </x-primary-button>
            </form>
            <div class="smalltext"> Belum Punya Akun ? 
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')" wire:navigate>
                    {{ __('Daftar Sekarang') }}
                </x-nav-link>
            </div>
        </div>
    </main>
</body>