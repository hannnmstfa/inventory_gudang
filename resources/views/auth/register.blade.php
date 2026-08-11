<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Gudang TK. Farida</title>
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0a0f 0%, #1a1a2e 100%);
            color: #fff;
            overflow-x: hidden;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .accent {
            color: #f5a623;
        }

        /* ===== REGISTER CONTAINER ===== */
        .register-wrapper {
            position: relative;
            width: 100%;
            max-width: 450px;
        }

        .register-wrapper::before {
            content: '';
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 166, 35, 0.1), transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 32px;
            padding: 50px 40px;
            backdrop-filter: blur(16px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .register-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .register-header .logo {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .register-header .logo .accent {
            color: #f5a623;
        }

        .register-header p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 8px;
        }

        /* ===== FORM STYLING ===== */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group:last-of-type {
            margin-bottom: 12px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(245, 166, 35, 0.5);
            box-shadow: 0 0 0 3px rgba(245, 166, 35, 0.1);
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        /* ===== BUTTON ===== */
        .btn-register {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, #f5a623, #e8961a);
            color: #0a0a0f;
            font-weight: 700;
            font-size: 15px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(245, 166, 35, 0.35);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        /* ===== ERROR MESSAGE ===== */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        .error-text {
            font-size: 12px;
            color: #fca5a5;
            margin-top: 6px;
        }

        /* ===== LINK ===== */
        .register-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
        }

        .register-footer a {
            color: #f5a623;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-footer a:hover {
            color: #f7c948;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            body {
                padding: 16px;
            }

            .register-card {
                padding: 36px 24px;
            }

            .register-header .logo {
                font-size: 24px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 12px 14px;
                font-size: 14px;
            }

            .btn-register {
                padding: 12px 20px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 28px 20px;
            }

            .register-header .logo {
                font-size: 20px;
            }

            .register-header p {
                font-size: 12px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 11px 12px;
                font-size: 13px;
            }

            .btn-register {
                padding: 11px 18px;
                font-size: 13px;
            }

            label {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

    <div class="register-wrapper">
        <div class="register-card">
            <!-- Header -->
            <div class="register-header">
                <div class="logo">Gudang <span class="accent">TK. Farida</span></div>
                <p>Buat Akun Manajemen Gudang</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        placeholder="Masukkan nama lengkap"
                        required 
                        autofocus 
                        autocomplete="name"
                    />
                    @if ($errors->has('name'))
                        <div class="error-text">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Masukkan email Anda"
                        required 
                        autocomplete="username"
                    />
                    @if ($errors->has('email'))
                        <div class="error-text">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        placeholder="Masukkan password"
                        required 
                        autocomplete="new-password"
                    />
                    @if ($errors->has('password'))
                        <div class="error-text">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        placeholder="Ulangi password"
                        required 
                        autocomplete="new-password"
                    />
                    @if ($errors->has('password_confirmation'))
                        <div class="error-text">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn-register">Create Account</button>

                <!-- Footer Link -->
                <div class="register-footer">
                    Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
