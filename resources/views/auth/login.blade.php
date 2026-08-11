<x-guest-layout>
    <div class="auth-shell">
        <div class="auth-panel">
            <div class="auth-hero">
                <div class="auth-badge">Gudang TK. Farida</div>
                <h1>Kelola Gudang Lebih Cepat, Aman, dan Terorganisir</h1>
                <p>Monitor stok, barang masuk, dan distribusi dari satu tempat dengan tampilan yang clean dan modern.</p>
            </div>

            <div class="auth-card">
                <div class="auth-header">
                    <h2>Welcome Back</h2>
                    <p>Masuk untuk mengelola stok, barang masuk, dan distribusi secara lebih rapi.</p>
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
    </div>

    <style>
        .auth-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background:
                radial-gradient(circle at 20% 20%, rgba(245, 166, 35, 0.16), transparent 24%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.06), transparent 22%),
                linear-gradient(120deg, #06060a 0%, #10101b 45%, #171722 100%);
        }

        .auth-panel {
            width: min(1200px, 100%);
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            border-radius: 32px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 24px 90px rgba(0, 0, 0, 0.42);
            backdrop-filter: blur(16px);
        }

        .auth-hero {
            padding: 56px;
            background:
                radial-gradient(circle at right center, rgba(245, 166, 35, 0.22), transparent 28%),
                linear-gradient(135deg, #11111a 0%, #1a1a27 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 560px;
        }

        .auth-hero h1 {
            color: #fff;
            font-size: 36px;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 14px;
            max-width: 520px;
        }

        .auth-hero p {
            color: rgba(255, 255, 255, 0.72);
            font-size: 15px;
            line-height: 1.8;
            max-width: 460px;
        }

        .auth-card {
            padding: 40px 36px;
            background: rgba(255, 255, 255, 0.03);
            display: flex;
            flex-direction: column;
            justify-content: center;
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
            margin-bottom: 16px;
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

        .auth-form .form-group label {
            color: #fff;
        }

        .auth-form input {
            border-radius: 12px;
        }

        @media (max-width: 900px) {
            .auth-panel {
                grid-template-columns: 1fr;
            }

            .auth-hero {
                padding: 30px 30px 18px;
                min-height: auto;
            }

            .auth-card {
                padding: 30px;
            }
        }

        @media (max-width: 640px) {
            .auth-shell {
                padding: 12px;
                align-items: stretch;
            }

            .auth-panel {
                border-radius: 18px;
            }

            .auth-hero {
                padding: 22px 20px 16px;
            }

            .auth-hero h1 {
                font-size: 24px;
            }

            .auth-hero p {
                font-size: 13px;
            }

            .auth-card {
                padding: 20px;
            }

            .auth-header h2 {
                font-size: 24px;
            }

            .auth-header p {
                font-size: 13px;
            }
        }
    </style>
</x-guest-layout>
