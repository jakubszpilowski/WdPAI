<?php
if(!isset($_COOKIE['user'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: ${url}/index");
} else {
    setcookie('user', $_COOKIE['user'], time() + (60 * 20), "/");
}

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_week.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_navbar.css">
    <script src="/public/scripts/nav.js" defer></script>
    <title>Week</title>
</head>
<body>
    <?php include('nav_header.php') ?>

    <div class="container">
        <div class="date-nav">
            <button>
                <img src="/public/img/arrow.svg">
            </button>
            <p>
                Example date
            </p>
            <button>
                <img src="/public/img/arrow_right_2.svg">
            </button>
        </div>
        <section class="first">
            <div class="day">
                <div class="header">
                    Monday
                </div>
                <div class="details"> 
                    <p>Example note</p>
                    <p>Example note</p>
                </div>
            </div>
            <div class="day">
                <div class="header">
                    Tuesday
                </div>
                <div class="details"> 
                    <p>Example note</p>
                </div>
            </div>
            <div class="day">
                <div class="header">
                    Wednesday
                </div>
                <div class="details"> 
                    <p>Example note</p>
                </div>
            </div>
            <div class="day">
                <div class="header">
                    Thursday
                </div>
                <div class="details"> 
                        
                </div>
            </div>
            <div class="day">
                <div class="header">
                    Friday
                </div>
                <div class="details"> 
                        
                </div>
            </div>
            <div class="day">
                <div class="header">
                    Saturday
                </div>
                <div class="details"> 
                            
                </div>
            </div>
            <div class="day">
                 <div class="header">
                     Sunday
                </div>
                 <div class="details"> 
                     <p>Example note</p>
                 </div>
             </div>
         </section>
    </div> 
</body>