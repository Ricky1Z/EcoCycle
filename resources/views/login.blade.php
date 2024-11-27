<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Pixelify+Sans:wght@400..700&family=Poppins:wght@300;400;500;600;700&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: Poppins;
        }

        body {
            display: flex;
            background-color: white;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            overflow: hidden;
            height: 100vh;
        }

        h1 {
            font-weight: 500;
            letter-spacing: -1.5px;
            margin: 0;
            margin-bottom: 15px;
        }

        h1.title {
            font-size: 45px;
            line-height: 45px;
            margin: 0;
            text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
            text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
        }

        span {
            font-size: 14px;
            margin-top: 25px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
            transition: 0.3s ease-in-out;
        }

        a:hover {
            color: #4bb6b7;
        }

        .content {
            display: flex;
            width: 100%;
            height: 50px;
            align-items: center;
            justify-content: space-around;
        }

        .content .checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content input {
            accent-color: #333;
            width: 12px;
            height: 12px;
        }

        .content label {
            font-size: 14px;
            user-select: none;
            padding-left: 5px
        }

        button {
            position: relative;
            border-radius: 20px;
            border: 1px solid #4bb6b7;
            background-color: #4bb6b7;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            margin: 10px;
            padding: 12px 80px;
            letter-spacing: 1px;
            text-transform: capitalize;
            transition: 0.3s ease-in-out;
        }

        button:hover {
            letter-spacing: 3px;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: rgba(225, 225, 225, 0.2);
            border: 2px solid #fff;
            color: #fff;
        }

        button.ghost i {
            position: absolute;
            opacity: 0;
            transition: 0.3s ease-in-out;
        }

        button.ghost i.register {
            right: 70px;
        }

        button.ghost i.login {
            left: 70px;
        }

        button.ghost:hover i.register {
            right: 40px;
            opacity: 1;
        }

        button.ghost:hover i.login {
            left: 40px;
            opacity: 1;
        }

        form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border-radius: 10px;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 500px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .login-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .login-container {
            transform: translateX(100%);
        }

        .register-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .register-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translate(-100%);
        }

        .overlay {
            background-image: url('{{ asset('asset/giphy3.webp') }}');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center center;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: linear-gradient(to top,
                    rgba(46, 94, 109, 0.4) 40%,
                    rgba(46, 04, 109, 0));
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20px);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #dddddd;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
            transition: 0.3s ease-in-out;
        }

        .social-container a:hover {
            border: 1px solid #4bb6b7;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class=""form-container register-container>
            <form action="#">
                <h1>Register Here!</h1>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Register</button>
                <span>or use your account</span>
                <div class="social-container">
                    <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social"><i class="lni lni-google"></i></a>
                    <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
                </div>
            </form>
        </div>

        <div class="form-container login-container">
            <form action="#">
                <h1>Login Here!</h1>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label>Remember me</label>
                    </div>
                    <div class="pass-link">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <button>Login</button>
                <span>or use your account</span>
                <div class="social-container">
                    <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social"><i class="lni lni-google"></i></a>
                    <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Hello <br> friends</h1>
                    <p>if you have an account, login here</p>
                    <button class="ghost" id="login">Login
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Start your <br> journey now</h1>
                    <p>if you don't have an account yet, register here</p>
                    <button class="ghost" id="register">Register
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const registrationButton = document.getElementById("register");
        const loginButton = document.getElementById("login");
        const container = document.getElementById("container");

        registrationButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        loginButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>
