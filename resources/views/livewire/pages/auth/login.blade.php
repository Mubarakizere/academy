<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->form->authenticate();

        Session::regenerate();

        $user = auth()->user();

        if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
            $this->redirect(route('admin.applications'));
        } elseif ($user && ($user->influencerProfile || $user->promoCodes()->exists())) {
            $this->redirect(route('influencer.dashboard'));
        } else {
            $this->redirect(route('dashboard'));
        }
    }

    public function autofill(string $email, string $password): void
    {
        $this->form->email = $email;
        $this->form->password = $password;
    }
}; ?>

<div class="space-y-6">
    {{-- Header --}}
    <div class="text-left space-y-2">
        <div class="inline-flex items-center gap-1.5 bg-yellow-400/15 border border-yellow-400/30 text-amber-900 px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider">
            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
            <span>Authorized Access Only</span>
        </div>
        <h2 class="text-3xl font-extrabold text-slate-900 font-heading tracking-tight">Portal Sign In</h2>
        <p class="text-xs text-slate-500 font-medium">Log in to access your Admissions Admin, Student, or Influencer Partner dashboard.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-4">
        <!-- Email -->
        <div>
            <label for="email" class="block text-xs font-bold text-slate-800 mb-1.5 uppercase tracking-wider">Email Address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <input wire:model="form.email" id="email" name="email" type="email" required autofocus autocomplete="username"
                    placeholder="partner@divahouse.com"
                    class="block w-full pl-10 pr-4 py-3 text-xs font-semibold rounded-xl border border-slate-300 focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition bg-slate-50/50">
            </div>
            <x-input-error :messages="$errors->get('form.email') ?: $errors->get('email')" class="mt-1.5" />
        </div>

        <!-- Password -->
        <div x-data="{ show: false }">
            <label for="password" class="block text-xs font-bold text-slate-800 mb-1.5 uppercase tracking-wider">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </div>
                <input wire:model="form.password" id="password" name="password" :type="show ? 'text' : 'password'" required
                    autocomplete="current-password" placeholder="••••••••••••"
                    class="block w-full pl-10 pr-10 py-3 text-xs font-semibold rounded-xl border border-slate-300 focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition bg-slate-50/50">
                <button type="button" @click="show = !show"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                    <svg x-show="!show" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg x-show="show" x-cloak class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('form.password') ?: $errors->get('password')" class="mt-1.5" />
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between text-xs pt-1">
            <label for="remember" class="inline-flex items-center cursor-pointer">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded border-slate-300 text-amber-500 shadow-xs focus:ring-amber-400">
                <span class="ml-2 font-medium text-slate-600">Remember session</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-xs text-amber-700 hover:text-amber-900 font-bold hover:underline"
                    href="{{ route('password.request') }}" wire:navigate>Forgot password?</a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full flex items-center justify-center gap-2 rounded-xl bg-yellow-400 hover:bg-yellow-300 text-slate-950 px-5 py-3.5 text-xs font-extrabold uppercase tracking-wider shadow-md transition-all hover:shadow-lg active:scale-98">
            <svg class="w-4 h-4 text-slate-950" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            <span>Sign In to Portal</span>
        </button>
    </form>

    {{-- Quick Access Autofill --}}
    <div class="border-t border-slate-100 pt-5 space-y-3">
        <p class="text-xs font-extrabold text-slate-700 uppercase tracking-wider text-center">
            Quick Portal Access
        </p>
        <div class="grid grid-cols-2 gap-2">
            <button type="button"
                wire:click="autofill('admin@divahouse.com', 'password')"
                class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 py-2.5 px-3 text-xs font-bold text-slate-800 hover:bg-slate-50 transition">
                <svg class="w-4 h-4 text-slate-700" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span>Admin Portal</span>
            </button>

            <button type="button"
                wire:click="autofill('influencer@divahouse.com', 'password')"
                class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 py-2.5 px-3 text-xs font-bold text-amber-800 hover:bg-amber-50 transition">
                <svg class="w-4 h-4 text-amber-700" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                </svg>
                <span>Influencer Partner</span>
            </button>
        </div>
    </div>
</div>