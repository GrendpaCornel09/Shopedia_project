<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Shopedia')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style media="screen">
        *,
        *:before,
        *:after{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background-color: #080710;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
        }

        /* Navigation */
        nav {
            background-color: rgba(255,255,255,0.1);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 20px rgba(8,7,16,0.3);
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #23a2f6;
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 200px);
            padding: 40px 20px;
        }

        /* Background Shapes */
        .background{
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%,-50%);
            left: 50%;
            top: 50%;
            pointer-events: none;
        }

        .background .shape{
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child{
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child{
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -30px;
            bottom: -80px;
        }

        /* Form Styling */
        form{
            height: auto;
            width: 400px;
            background-color: rgba(255,255,255,0.13);
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 50px 35px;
            z-index: 10;
        }

        form *{
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3{
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            margin-bottom: 30px;
        }

        form h2{
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        label{
            display: block;
            margin-top: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        input, select, textarea{
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255,255,255,0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        input:focus, select:focus, textarea:focus{
            background-color: rgba(255,255,255,0.15);
        }

        textarea{
            height: auto;
            min-height: 100px;
            padding: 10px;
            resize: vertical;
        }

        ::placeholder{
            color: #e5e5e5;
        }

        button, .btn{
            margin-top: 30px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        button:hover, .btn:hover{
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255,255,255,0.3);
        }

        button:active{
            transform: translateY(0);
        }

        /* Social Links */
        .social{
            margin-top: 30px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .social div{
            width: 150px;
            border-radius: 3px;
            padding: 10px;
            background-color: rgba(255,255,255,0.27);
            color: #eaf0fb;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .social div:hover{
            background-color: rgba(255,255,255,0.47);
        }

        .social i{
            margin-right: 4px;
        }

        /* Error Messages */
        .error-message {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 5px;
        }

        .success-message {
            color: #51cf66;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Footer */
        footer {
            background-color: rgba(255,255,255,0.1);
            padding: 30px 20px;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 40px;
            backdrop-filter: blur(10px);
        }

        footer p {
            margin: 5px 0;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            form {
                width: 90%;
                padding: 30px 20px;
            }

            .background {
                width: 300px;
                height: 400px;
            }

            nav {
                flex-direction: column;
                gap: 10px;
            }

            nav a {
                margin: 5px 10px;
            }
        }
    </style>
    @yield('extra-css')
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <nav>
        <div>
            <strong>Shopedia</strong>
        </div>
        <div>
            <a href="{{ route('homepage') }}">Homepage</a>
            <a href="{{ route('authpage') }}">Login/Register</a>
        </div>
    </nav>

    <main>
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Shopedia. All rights reserved.</p>
        <p>Made with 💗 by GrendpaCornel09 on GitHub.</p>
    </footer>

    @yield('extra-js')
</body>
</html>