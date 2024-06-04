<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<body class="login-page">
    <main>
        <div class="login-block">
            <h1>Account - Daftar</h1>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form wire:submit="register">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Masukan Nama..." required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Masukan Email..." required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Masukan Password..." required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Konfirmasi Password..." name="password_confirmation" required autocomplete="new-password" />            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
                <x-primary-button class="btn btn-block mt-3">
                    {{ __('Daftar') }}
                </x-primary-button>
                <div class="smalltext"> Sudah Punya Akun ? 
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                        {{ __('Login Sekarang') }}
                    </x-nav-link>
                </div>
            </form>
        </div>
    </main>
</body>