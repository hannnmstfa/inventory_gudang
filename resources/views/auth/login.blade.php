<x-guest-layout>
    <div class="auth-shell">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-badge">Gudang TK. Farida</div>
                <h2>Welcome Back</h2>
                <p>Masuk untuk mengelola stok, barang masuk, dan distribusi secara lebih rapi.</p>
            </div>

            <div class="demo-box">
                <span class="demo-title">Demo Login</span>
                <p><strong>Email:</strong> superadmin@gmail.com</p>
                <p><strong>Password:</strong> •••••</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-amber-500 shadow-sm focus:ring-amber-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-5">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .auth-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: linear-gradient(135deg, #0a0a0f 0%, #171722 100%);
        }

        .auth-card {
            width: 100%;
            max-width: 460px;
            padding: 32px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(12px);
        }

        .auth-header {
            margin-bottom: 20px;
        }

        .auth-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(245, 166, 35, 0.16);
            color: #f5a623;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .auth-header h2 {
            color: #fff;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .auth-header p {
            color: rgba(255, 255, 255, 0.68);
            font-size: 14px;
            line-height: 1.7;
        }

        .demo-box {
            margin: 18px 0 20px;
            padding: 14px 16px;
            border-radius: 14px;
            background: rgba(245, 166, 35, 0.08);
            border: 1px solid rgba(245, 166, 35, 0.2);
            color: #f7d58e;
        }

        .demo-title {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #f5a623;
            margin-bottom: 8px;
        }

        .demo-box p {
            margin: 2px 0;
            font-size: 14px;
        }

        .auth-form .form-group label {
            color: #fff;
        }

        .auth-form input {
            border-radius: 12px;
        }

        @media (max-width: 640px) {
            .auth-card {
                padding: 24px;
            }
        }
    </style>
</x-guest-layout>
