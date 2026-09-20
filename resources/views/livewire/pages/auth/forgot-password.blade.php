<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div>
    {{-- Header --}}
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Reset Password</h2>
        <p class="text-sm text-gray-500 mt-2">Enter your email to receive a password reset link</p>
    </div>

    <div class="mb-4 text-sm text-gray-600 bg-gray-50 p-3.5 rounded-lg border border-gray-100">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus placeholder="name@school.id" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 hover:text-emerald-600" href="{{ route('login') }}" wire:navigate>
                Back to Sign In
            </a>

            <x-primary-button class="bg-emerald-600 hover:bg-emerald-500">
                Email Password Reset Link
            </x-primary-button>
        </div>
    </form>
</div>
