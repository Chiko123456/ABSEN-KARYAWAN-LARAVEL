<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background particles */
        .bg-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 120px; height: 120px; left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 60px; height: 60px; left: 60%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 100px; height: 100px; left: 80%; animation-delay: 1s; }
        .particle:nth-child(5) { width: 40px; height: 40px; left: 70%; animation-delay: 3s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(-60px) rotate(240deg); }
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
            animation: slideDown 0.8s ease-out;
        }

        .header h1 {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideUp 0.8s ease-out 0.2s both;
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .form-card:hover::before {
            left: 100%;
        }

        .form-group {
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.6s ease-out both;
            position: relative;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .form-group:nth-child(7) { animation-delay: 0.7s; }
        .form-group:nth-child(8) { animation-delay: 0.8s; }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label i {
            color: #667eea;
            width: 18px;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            position: relative;
            z-index: 1;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input:hover {
            border-color: #9ca3af;
            transform: translateY(-1px);
        }

        textarea.form-input {
            min-height: 120px;
            resize: vertical;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f9fafb;
            color: #6b7280;
            font-weight: 500;
        }

        .file-input-label:hover {
            border-color: #667eea;
            background: #f0f4ff;
            color: #667eea;
            transform: translateY(-2px);
        }

        .file-input-label i {
            font-size: 1.25rem;
        }

        .password-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #9ca3af;
            transition: color 0.3s ease;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .submit-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem auto 0;
        }

        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
            transition: left 0.5s ease;
        }

        .submit-button:hover::before {
            left: 100%;
        }

        .submit-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .submit-button:active {
            transform: translateY(-1px);
        }

        /* Floating action animations */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Slide animations */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .form-card {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .container {
                padding: 0 1rem;
            }
        }

        /* Success message styling */
        .success-message {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            animation: slideDown 0.5s ease-out;
        }

        /* Input focus glow effect */
        .form-input:focus {
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1); }
            to { box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2); }
        }
    </style>
</head>
<body>
    <div class="bg-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <div class="header">
            <h1 class="floating">Edit Data Karyawan</h1>
            <p>Perbarui informasi karyawan dengan mudah dan cepat</p>
        </div>

        <div class="form-card">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i>
                        Nama Lengkap
                    </label>
                    <input type="text" id="name" name="name" class="form-input" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email
                    </label>
                    <input type="email" id="email" name="email" class="form-input" required placeholder="nama@email.com">
                </div>

                <div class="form-group">
                    <label for="jabatan" class="form-label">
                        <i class="fas fa-briefcase"></i>
                        Jabatan
                    </label>
                    <input type="text" id="jabatan" name="jabatan" class="form-input" required placeholder="Posisi/Jabatan">
                </div>

                <div class="form-group">
                    <label for="alamat" class="form-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Alamat
                    </label>
                    <textarea id="alamat" name="alamat" class="form-input" required placeholder="Alamat lengkap karyawan"></textarea>
                </div>

                <div class="form-group">
                    <label for="no_telp" class="form-label">
                        <i class="fas fa-phone"></i>
                        No. Telepon
                    </label>
                    <input type="tel" id="no_telp" name="no_telp" class="form-input" required placeholder="08xx-xxxx-xxxx">
                </div>

                <div class="form-group">
                    <label for="foto_profil" class="form-label">
                        <i class="fas fa-camera"></i>
                        Ganti Foto Profil (Opsional)
                    </label>
                    <div class="file-input-wrapper">
                        <input type="file" id="foto_profil" name="foto_profil" class="file-input" accept="image/*">
                        <label for="foto_profil" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Pilih file gambar atau drag & drop</span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i>
                        Password Baru (Kosongkan jika tidak diubah)
                    </label>
                    <div class="password-group">
                        <input type="password" id="password" name="password" class="form-input" placeholder="Password baru">
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-lock"></i>
                        Konfirmasi Password Baru
                    </label>
                    <div class="password-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Ulangi password baru">
                        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye" id="password_confirmation-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="submit-button">
                    <i class="fas fa-save"></i>
                    Update Karyawan
                </button>
            </form>
        </div>
    </div>

    <script>
        // Password toggle functionality
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + '-eye');
            
            if (field.type === 'password') {
                field.type = 'text';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            }
        }

        // File input enhancement
        const fileInput = document.getElementById('foto_profil');
        const fileLabel = document.querySelector('.file-input-label span');
        
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                fileLabel.textContent = `File dipilih: ${e.target.files[0].name}`;
            } else {
                fileLabel.textContent = 'Pilih file gambar atau drag & drop';
            }
        });

        // Form submission with loading state
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.querySelector('.submit-button');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual form submission)
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Berhasil Disimpan!';
                
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            }, 2000);
        });

        // Add interactive hover effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Drag and drop for file input
        const fileWrapper = document.querySelector('.file-input-wrapper');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileWrapper.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            fileWrapper.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            fileWrapper.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            fileWrapper.style.background = '#e0e7ff';
            fileWrapper.style.borderColor = '#667eea';
        }
        
        function unhighlight() {
            fileWrapper.style.background = '#f9fafb';
            fileWrapper.style.borderColor = '#d1d5db';
        }
        
        fileWrapper.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                fileInput.files = files;
                fileLabel.textContent = `File dipilih: ${files[0].name}`;
            }
        }

        // Add stagger animation to form groups
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        });

        document.querySelectorAll('.form-group').forEach(group => {
            group.style.animationPlayState = 'paused';
            observer.observe(group);
        });
    </script>
</body>
</html>