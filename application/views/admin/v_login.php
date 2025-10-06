<!DOCTYPE html>
<html lang="id">
<head>
    <title>Gerbang Administrasi | Warisan Digital Babulu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php $iden = $iden->row_array()?>
    <link rel="icon" href="<?=base_url('assetss/favicon/') . $iden['favicon']?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Lora:wght@600&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Ganti URL gambar dengan file batik seamless Anda */
            --batik-bg-url: url('https://www.transparenttextures.com/patterns/classy-fabric.png');
            
            --background-color: #1A2E40; /* Biru Dongker Tua */
            --form-bg-color: #FDFBF5; /* Krem / Putih Gading */
            --text-primary: #1A2E40;
            --text-secondary: #7A8699;
            --accent-color: #C5A265; /* Emas Antik */
            --font-serif: 'Lora', serif;
            --font-sans: 'Inter', sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body, html {
            height: 100%;
            font-family: var(--font-sans);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
            background-color: var(--background-color);
            background-image: var(--batik-bg-url);
            background-blend-mode: overlay;
            animation: fadeInBg 2s ease-in-out;
        }

        .login-panel {
            width: 100%;
            max-width: 400px;
            background: var(--form-bg-color);
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
            animation: slideUp 1s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-family: var(--font-serif);
            font-size: 2rem; /* 32px */
            color: var(--text-primary);
        }

        .header p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-top: 8px;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-field {
            width: 100%;
            border: 1px solid #DDE2E7;
            background: #fff;
            padding: 14px;
            border-radius: 6px;
            font-size: 1rem;
            color: var(--text-primary);
            transition: border-color 0.3s, box-shadow 0.3s;
            font-family: var(--font-sans);
        }
        
        .input-label {
            position: absolute;
            top: 15px;
            left: 15px;
            color: var(--text-secondary);
            background: var(--form-bg-color);
            padding: 0 4px;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        
        /* Floating Label & Gold Accent */
        .input-field:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(197, 162, 101, 0.2);
        }

        .input-field:focus + .input-label,
        .input-field:not(:placeholder-shown) + .input-label {
            top: -10px;
            left: 10px;
            font-size: 0.75rem;
            color: var(--accent-color);
        }
        
        .input-field::placeholder { color: transparent; }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: var(--text-primary);
            color: var(--form-bg-color);
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        
        .submit-btn:hover {
            background-color: #000;
            transform: translateY(-2px);
        }

        .flash-message {
            width: 100%;
            padding: 12px;
            text-align: center;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            background-color: #FFF5F5;
            color: #C53030;
            border: 1px solid #FED7D7;
        }

        @keyframes fadeInBg { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

    </style>
</head>
<body>

    <div class="main-container">
        <div class="login-panel">
            <header class="header">
                <h1>Administrasi Babulu</h1>
                <p>Silakan masuk untuk mengakses portal.</p>
            </header>

            <?php echo $this->session->flashdata('msg'); ?>
            
            <form action="<?php echo site_url('admin/login/auth') ?>" method="post">
                <div class="input-group">
                    <input type="text" id="username" name="username" class="input-field" placeholder="Username" required>
                    <label for="username" class="input-label">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="input-field" placeholder="Password" required>
                    <label for="password" class="input-label">Password</label>
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </form>
        </div>
    </div>

</body>
</html>