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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .auth-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            background:
                radial-gradient(circle at 15% 25%, rgba(245, 166, 35, 0.18), transparent 25%),
                radial-gradient(circle at 85% 75%, rgba(255, 255, 255, 0.05), transparent 25%),
                linear-gradient(100deg, #040407 0%, #0d0d17 40%, #151521 70%, #0f0f1a 100%);
        }

        .auth-panel {
            width: 100%;
            max-width: 1280px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-radius: 28px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.038);
            border: 1px solid rgba(255, 255, 255, 0.09);
            box-shadow: 0 32px 120px rgba(0, 0, 0, 0.48);
            backdrop-filter: blur(18px);
            min-height: 520px;
        }

        .auth-hero {
            padding: 64px 56px;
            background:
                radial-gradient(ellipse at 100% 50%, rgba(245, 166, 35, 0.25), transparent 35%),
                linear-gradient(125deg, #0f0f1a 0%, #18182a 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .auth-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(245, 166, 35, 0.08), transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .auth-hero > * {
            position: relative;
            z-index: 2;
        }

        .auth-badge {
            display: inline-block;
            padding: 7px 16px;
            border-radius: 999px;
            background: rgba(245, 166, 35, 0.2);
            color: #f5a623;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 18px;
            width: fit-content;
            border: 1px solid rgba(245, 166, 35, 0.3);
        }

        .auth-hero h1 {
            color: #fff;
            font-size: 40px;
            font-weight: 800;
            line-height: 1.12;
            margin-bottom: 16px;
            max-width: 480px;
            letter-spacing: -0.5px;
        }

        .auth-hero p {
            color: rgba(255, 255, 255, 0.74);
            font-size: 15px;
            line-height: 1.7;
            max-width: 420px;
        }

        .auth-card {
            padding: 56px 48px;
            background: rgba(255, 255, 255, 0.025);
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-left: 1px solid rgba(255, 255, 255, 0.06);
        }

        .auth-header {
            margin-bottom: 28px;
        }

        .auth-header h2 {
            color: #fff;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 10px;
            letter-spacing: -0.3px;
        }

        .auth-header p {
            color: rgba(255, 255, 255, 0.68);
            font-size: 14px;
            line-height: 1.6;
        }

        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .auth-form .form-group label {
            color: #fff;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 8px;
            display: block;
        }

        .auth-form input {
            border-radius: 12px !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            background: rgba(255, 255, 255, 0.05) !important;
            color: #fff !important;
            padding: 10px 14px !important;
            font-size: 14px !important;
        }

        .auth-form input::placeholder {
            color: rgba(255, 255, 255, 0.35) !important;
        }

        .auth-form input:focus {
            border-color: rgba(245, 166, 35, 0.4) !important;
            background: rgba(255, 255, 255, 0.08) !important;
            outline: none !important;
        }

        @media (max-width: 1024px) {
            .auth-panel {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .auth-hero {
                padding: 40px 36px;
            }

            .auth-card {
                padding: 36px;
                border-left: none;
                border-top: 1px solid rgba(255, 255, 255, 0.06);
            }
        }

        @media (max-width: 640px) {
            .auth-shell {
                padding: 12px;
            }

            .auth-panel {
                border-radius: 18px;
            }

            .auth-hero {
                padding: 28px 20px;
            }

            .auth-hero h1 {
                font-size: 26px;
            }

            .auth-hero p {
                font-size: 13px;
            }

            .auth-card {
                padding: 24px 20px;
            }

            .auth-header h2 {
                font-size: 24px;
            }
        }
    </style>
</x-guest-layout>
