<?php
    $alert_msg = $this->session->flashdata('alert_msg');

    $settingResult = $this->db->get_where('site_setting');
    $settingData = $settingResult->row();

    $setting_site_name = $settingData->site_name;
    $setting_timezone = $settingData->timezone;
    $setting_pagination = $settingData->pagination;
    $setting_tax = $settingData->tax;
    $setting_currency = $settingData->currency;
    $setting_date = $settingData->datetime_format;
    $setting_product = $settingData->display_product;
    $setting_keyboard = $settingData->display_keyboard;
    $setting_customer_id = $settingData->default_customer_id;

    date_default_timezone_set("$setting_timezone");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo htmlspecialchars($setting_site_name); ?> - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color:rgb(236, 215, 27);
            --secondary-color:rgb(27, 109, 156);
            --glass-bg: rgba(255, 255, 255, 0.96);
            --text-dark: #1e293b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg,rgb(39, 59, 122) 0%,rgb(219, 147, 64) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .background-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                rgba(255,255,255,0.05) 0px,
                rgba(255,255,255,0.05) 10px,
                transparent 10px,
                transparent 20px
            );
            z-index: -1;
        }

        .card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 12px 40px rgba(31, 38, 135, 0.2);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
			width: 100%;
			max-width: 700;
			margin: 0 auto;

        }

        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, 
                rgba(99, 102, 241, 0.1) 0%, 
                rgba(79, 70, 229, 0.15) 50%, 
                rgba(99, 102, 241, 0.1) 100%);
            transform: rotate(45deg);
            z-index: -1;
        }

        .card:hover {
            transform: translateY(-8px);
        }

        .site-title {
            font-weight: 700;
            letter-spacing: -0.5px;
            margin: 1.5rem 0;
            position: relative;
            display: inline-block;
            padding: 0 1rem;
        }

        .site-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .form-control {
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            padding: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
            background: white;
        }

        .btn-login {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, 
                transparent 20%, 
                rgba(255,255,255,0.15) 50%, 
                transparent 80%);
            transform: rotate(45deg);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.35);
        }

        .btn-login:hover::after {
            left: 50%;
        }

        .footer {
            color: rgba(255, 255, 255, 0.85);
            margin-top: auto;
            padding: 2rem 1.5rem;
            position: relative;
            z-index: 1;
        }

        .footer a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .footer a:hover {
            color: white;
            text-decoration: none;
        }

        .footer a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: white;
            transition: width 0.3s ease;
        }

        .footer a:hover::after {
            width: 100%;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-dark);
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .password-toggle:hover {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .card {
                margin: 1rem;
                border-radius: 1rem;
            }
            
            .site-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="background-pattern"></div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card p-4 mt-5">
                    <div class="card-body">
                        <h1 class="h2 text-center site-title">
                            <?= htmlspecialchars($setting_site_name) ?>
                        </h1>
                        
                        <form action="<?= htmlspecialchars(base_url()) ?>auth/login" method="post">
                            <!-- Email Input -->
                            <div class="form-floating mb-4">
                                <input type="email" name="email" class="form-control" 
                                       id="floatingInput" autofocus required
                                       placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>

                            <!-- Password Input -->
                            <div class="form-floating mb-4 position-relative">
                                <input type="password" name="password" class="form-control" 
                                       id="floatingPassword" required placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                <i class="bi bi-eye-slash password-toggle" 
                                   onclick="togglePasswordVisibility()"></i>
                            </div>

                            <!-- Remember & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none small fw-medium text-primary">
                                    Forgot Password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <button class="w-100 btn btn-lg btn-login text-white mb-3" 
                                    name="sp_login" type="submit">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>

                            <!-- Alert Messages -->
                            <?php if (!empty($alert_msg)): ?>
                                <div class="alert <?= htmlspecialchars($alert_msg[0]) ?> 
                                     alert-dismissible fade show mt-3" role="alert">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    <?= htmlspecialchars($alert_msg[2]) ?>
                                    <button type="button" class="btn-close" 
                                            data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <div class="copy">
                <p class="small mb-0">
                    Powered by Mu'ammil Web Dev. Services
                    <br>
                    Tel: <a href="tel:+2348066620283">08066620283</a>
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('floatingPassword');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }

        // Add smooth form animations
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('.form-control');
            
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', () => {
                    input.parentElement.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>