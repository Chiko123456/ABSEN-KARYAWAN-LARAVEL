<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Modern Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Animation */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="rgba(255,255,255,.1)"/><stop offset="100%" stop-color="rgba(255,255,255,0)"/></radialGradient></defs><circle fill="url(%23a)" cx="10" cy="10" r="10"/><circle fill="url(%23a)" cx="50" cy="10" r="10"/><circle fill="url(%23a)" cx="90" cy="10" r="10"/></svg>') repeat;
            animation: backgroundMove 20s linear infinite;
            opacity: 0.1;
        }

        @keyframes backgroundMove {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100px); }
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            font-weight: 600;
            position: relative;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .form-group:nth-child(7) { animation-delay: 0.7s; }
        .form-group:nth-child(8) { animation-delay: 0.8s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: rgba(255, 255, 255, 1);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.15);
        }

        .form-input:focus + .form-label {
            color: #667eea;
        }

        textarea.form-input {
            resize: vertical;
            min-height: 100px;
        }

        .file-input {
            position: relative;
            overflow: hidden;
            display: inline-block;
            cursor: pointer;
            width: 100%;
        }

        .file-input input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 20px;
            border: 2px dashed #e1e5e9;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            cursor: pointer;
            color: #666;
        }

        .file-input-label:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
            color: #667eea;
        }

        .file-input svg {
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .file-input:hover svg {
            transform: scale(1.1);
        }

        .btn-primary {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 20px;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .login-link a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 50%;
            background: #667eea;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .login-link a:hover::after {
            width: 100%;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .register-container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .form-title {
                font-size: 24px;
            }
        }

        /* Input validation styles */
        .form-input:valid {
            border-color: #10b981;
        }

        .form-input:invalid:not(:focus):not(:placeholder-shown) {
            border-color: #ef4444;
        }

        /* Pulse animation for submit button */
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(102, 126, 234, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
        }

        .btn-primary:focus {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="form-title">Daftar Akun</h2>
        
        <form method="POST" action="#" enctype="multipart/form-data">
            <!-- Name -->
            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input id="name" class="form-input" type="text" name="name" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap">
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input id="email" class="form-input" type="email" name="email" required autocomplete="username" placeholder="nama@email.com">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password">
            </div>

            <!-- Jabatan -->
            <div class="form-group">
                <label class="form-label" for="jabatan">Jabatan</label>
                <input id="jabatan" class="form-input" type="text" name="jabatan" required placeholder="Contoh: Manager, Staff, Direktur">
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-input" required placeholder="Masukkan alamat lengkap"></textarea>
            </div>

            <!-- No Telp -->
            <div class="form-group">
                <label class="form-label" for="no_telp">Nomor Telepon</label>
                <input id="no_telp" class="form-input" type="tel" name="no_telp" required placeholder="08xxxxxxxxxx">
            </div>

            <!-- Foto Profil -->
            <div class="form-group">
                <label class="form-label" for="foto_profil">Foto Profil</label>
                <div class="file-input">
                    <input id="foto_profil" type="file" name="foto_profil" accept="image/*">
                    <label for="foto_profil" class="file-input-label">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                        Pilih Foto Profil
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-primary">
                Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
        </div>
    </div>

    <script>
        // File input preview
        document.getElementById('foto_profil').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const label = document.querySelector('.file-input-label');
            
            if (file) {
                label.innerHTML = `
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    ${file.name}
                `;
                label.style.color = '#10b981';
                label.style.borderColor = '#10b981';
            }
        });

        // Password confirmation validation
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');

        function validatePassword() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Password tidak cocok");
            } else {
                confirmPassword.setCustomValidity('');
            }
        }

        password.addEventListener('change', validatePassword);
        confirmPassword.addEventListener('keyup', validatePassword);

        // Form submission animation
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('.btn-primary');
            submitBtn.innerHTML = `
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20" style="animation: spin 1s linear infinite; margin-right: 10px;">
                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                </svg>
                Mendaftar...
            `;
            submitBtn.style.background = 'linear-gradient(135deg, #6b7280 0%, #9ca3af 100%)';
        });

        // Input focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>

    <style>
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</body>
</html>