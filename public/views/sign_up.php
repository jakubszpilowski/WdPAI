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
            <form action="register" method="POST" onsubmit="return isFormValid();">
                <div class="sign">
                    <p>Sign Up</p>
                </div>
                <div class="error-message">
                    <?php
                        if(isset($messages)){
                            foreach ($messages as $message) {
                                echo "$message";
                            }
                        }
                    ?>
                </div>
                <label for="username">
                    <input name="username" type="text" placeholder="username">
                </label>
                <label for="email">
                    <input name="email" type="email" placeholder="email">
                </label>
                <label for="password">
                    <input name="password" type="password" placeholder="password">
                </label>
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