<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <script src="/public/scripts/error.js" defer></script>
    <title>Login page</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form action="login" class="login"  method="POST">
                <div class="sign">
                    <p>Sign In</p>
                </div>
                <div class="error-message">
                    <?php
                        if(isset($messages)){
                            foreach ($messages as $message){
                                echo '<span class="error-text">' . $message . '</span>';
                            }
                        }
                    ?>
                </div>
                <div class="input-control">
                    <label for="username"></label>
                    <input id="username" name="username" type="text" placeholder="username">
                </div>
                <div class="input-control">
                    <label for="password"></label>
                    <input id="password" name="password" type="password" placeholder="password">
                </div>
                <button type="submit" class="btn">
                    <span>Login</span>
                </button>
                <div class="reflink">
                    <p>Don't have an account? <a href="sign">Sign up!</a> </p>
                </div>
            </form>
        </div>
        <div class="logo">
            <img src="/public/img/logo.svg">
        </div>
    </div>
</body>