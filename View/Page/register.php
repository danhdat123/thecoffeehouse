<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="View/public/css/login.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            background: linear-gradient(to right bottom, #fbdb89, #f48982);
        }

        html {
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100%;
            background-attachment: fixed;
        }

        body {
            font-family: sans-serif;
            line-height: 1.4;
            display: flex;
        }

        .container {
            width: 400px;
            margin: auto;
            padding: 36px 48px 48px 48px;
            background-color: #f2efee;
            border-radius: 11px;
            box-shadow: 0 2.4rem 4.8rem rgba(0, 0, 0, 0.15);
            
        }

        .login-title {
            padding: 15px;
            font-size: 22px;
            font-weight: 600;
            text-align: center;
        }

        .login-form {
            display: grid;
            grid-template-columns: 1fr;
            row-gap: 16px;
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
        }

        .login-form input {
            width: 100%;
            padding: 1.2rem;
            border-radius: 9px;
            border: none;
        }

        .login-form input:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(253, 242, 233, 0.5);
        }

        .btn--form {
            background-color: #f48982;
            color: #fdf2e9;
            align-self: end;
            padding: 8px;
        }

        .btn,
        .btn:link,
        .btn:visited {
            display: inline-block;
            text-decoration: none;
            font-size: 20px;
            font-weight: 600;
            border-radius: 9px;
            border: none;

            cursor: pointer;
            font-family: inherit;

            transition: all 0.3s;
        }

        button {
            outline: 1px solid #f48982;
        }

        .btn--form:hover {
            background-color: #fdf2e9;
            color: #f48982;
        }
    </style>
</head>

<body>


    <div class="container">
        <h2 class="login-title">Log in</h2>

        <form class="login-form" action="/user/confirmRegister" method="POST">
            <div>
                <label for="name">Username </label>
                <input id="name" type="text" placeholder="vd: Nguyễn Danh Đạt" name="user_name" required />
            </div>

            <div>
                <label for="email">Email </label>
                <input id="email" type="email" placeholder="vd: danhdat@gmai.com" name="email" required />
            </div>

            <div>
                <label for="phone_number">Phone Number </label>
                <input id="phone_number" type="phone_number" placeholder="vd: 0123456788" name="phone_number" required />
            </div>

            <div>
                <label for="address">Address</label>
                <input id="address" name="address"  type="address" placeholder="vd: duong, kp10, p hoa thanh tan phu" required />
            </div>

            <div>
                <label for="password">Password </label>
                <input id="password" type="password" placeholder="password" name="password" required />
            </div>

            <div>
                <?php 
                    if(isset($error)){
                        echo "<b>$error</b>";
                    }
                
                ?>
            </div>

            <button class="btn btn--form" type="submit" value="Log in">
                Log in
            </button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>