<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>North Sweetberg University College Portal</title>
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --info: #2980b9;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background-color: #f8fafc;
        }
        
        .login-container {
            background-image: url('NORTH LOGO.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .login-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(2px);
        }
        
        .login-card {
            position: relative;
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            z-index: 10;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .dark .login-card {
            background: var(--dark);
        }
        
        .logo {
            height: 98px;
            margin-bottom: 1.75rem;
            display: block;
            margin-left: auto;
            margin-right: auto;
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .welcome-title {
            font-size: 1.625rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            height: 2.5rem;
        }
        
        .welcome-title span {
            position: absolute;
            left: 0;
            right: 0;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s ease;
        }
        
        .welcome-title span.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .dark .welcome-title {
            color: white;
        }
        
        .welcome-subtitle {
            font-size: 0.9375rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 2rem;
            line-height: 1.5;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.3s forwards;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        
        .dark .welcome-subtitle {
            color: #94a3b8;
        }
        
        .input-container {
            margin-bottom: 1.5rem;
            position: relative;
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUpInput 0.5s ease-out forwards;
        }
        
        @keyframes fadeInUpInput {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .input-container:nth-child(1) {
            animation-delay: 0.5s;
        }
        
        .input-container:nth-child(2) {
            animation-delay: 0.6s;
        }
        
        .input-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .dark .input-label {
            color: #e2e8f0;
        }
        
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.9375rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
            padding-right: 2.5rem;
        }
        
        .input-field:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            outline: none;
            transform: translateY(-2px);
        }
        
        .dark .input-field {
            background: #1e293b;
            border-color: #334155;
            color: white;
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #94a3b8;
            transition: transform 0.2s ease;
        }
        
        .password-toggle:hover {
            transform: translateY(-50%) scale(1.1);
            color: var(--secondary);
        }
        
        .login-btn {
            width: 100%;
            padding: 0.875rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9375rem;
            background: var(--primary);
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
            letter-spacing: 0.5px;
            opacity: 0;
            animation: fadeIn 0.5s ease-out 0.8s forwards;
        }
        
        .login-btn:hover {
            background: #1a2636;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .remember-forgot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1.25rem 0;
            font-size: 0.875rem;
            opacity: 0;
            animation: fadeIn 0.5s ease-out 0.7s forwards;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .remember-me input {
            width: 1rem;
            height: 1rem;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
            accent-color: var(--primary);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .remember-me input:hover {
            border-color: var(--secondary);
        }
        
        .forgot-password {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
            color: var(--primary);
        }
        
        .footer-link {
            text-align: center;
            font-size: 0.875rem;
            color: #64748b;
            margin-top: 1.75rem;
            opacity: 0;
            animation: fadeIn 0.5s ease-out 1s forwards;
        }
        
        .footer-link a {
            color: var(--secondary);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .footer-link a:hover {
            text-decoration: underline;
            color: var(--primary);
        }
        
        .error-message {
            color: var(--accent);
            font-size: 0.8125rem;
            margin-top: 0.25rem;
            animation: shake 0.5s ease;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        
        .session-status {
            padding: 0.875rem;
            border-radius: 8px;
            background-color: rgba(41, 128, 185, 0.1);
            border: 1px solid rgba(41, 128, 185, 0.2);
            color: var(--info);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body class="dark:bg-gray-900">
    <div class="login-container">
        <div class="login-overlay"></div>
        <div class="login-card">
            <img src="NORTH LOGO.png" alt="North Sweetberg University College" class="logo">
            <h1 class="welcome-title">
                <span class="active">Welcome Back</span>
                <span>North Sweetberg University</span>
            </h1>
            <p class="welcome-subtitle">Log in to access the portal</p>

            <!-- Session Status -->
            <div class="">
                <x-auth-session-status :status="session('status')" />
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="input-container">
                    <label for="email" class="input-label">Email or Username</label>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                        class="input-field"
                        placeholder="your@email.com">
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password Field -->
                <div class="input-container">
                    <label for="password" class="input-label">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="input-field"
                        placeholder="••••••••">
                    <button type="button" class="password-toggle" id="togglePassword">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input id="remember_me" name="remember" type="checkbox">
                        <label for="remember_me">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="login-btn">
                    Log In
                </button>
            </form>
        </div>
    </div>

    <script>
        // Check for dark mode preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        // Password visibility toggle
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle icon
            this.innerHTML = type === 'password' ? 
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>' :
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
        });

        // Title animation
        const welcomeTitle = document.querySelector('.welcome-title');
        const spans = welcomeTitle.querySelectorAll('span');
        let currentIndex = 0;

        function rotateTitle() {
            spans[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % spans.length;
            spans[currentIndex].classList.add('active');
        }

        // Start rotating every 3 seconds
        setInterval(rotateTitle, 3000);
    </script>
</body>
</html>