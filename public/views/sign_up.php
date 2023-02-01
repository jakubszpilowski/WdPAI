<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="/public/scripts/error.js" defer></script>
    <script src="/public/scripts/register.js" defer></script>
    <title>Register page</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form action="register" method="POST">
                <div class="sign">
                    <p>Sign Up</p>
                </div>
                <div class="error-message">
                    <?php
                        if(isset($messages)){
                            foreach ($messages as $message) {
                                echo '<span class="error-text">' . $message . '</span>';
                            }
                        }
                    ?>
                </div>
                <div class="input-control">
                    <label for="username"> </label>
                    <input id="username" name="username" type="text" placeholder="username" onfocusout="validateUsername()">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="email"></label>
                    <input id="email" name="email" type="email" placeholder="email" onfocusout="checkEmail()">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="password"></label>
                    <input id="password" name="password" type="password" placeholder="password" onfocusout="checkPassword()">
                    <div class="error"></div>
                </div>

                <div class="register-button">
                    <a href="start" class="back-btn">
                        <img src="/public/img/arrow.svg">
                    </a>
                    <button type="submit" class="btn">
                        <span>Register</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="logo">
            <img src="/public/img/logo.svg">
        </div>
    </div>
</body>