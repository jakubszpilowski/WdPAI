<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_week.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_navbar.css">
    <script src="/public/scripts/nav.js" defer></script>
    <title>Week</title>
</head>
<body>
    <header class="primary-header flex">
        <div class="flex">
            <img src="/public/img/logo.svg" class="logo">
        </div>

        <button class="mobile-nav-toggle" aria-controls="navigation-bar" aria-expanded="false">
            <span class="btn">
                Menu
            </span>
        </button>

        <nav id="navigation-bar" data-visible="false" class="navigation-bar flex">
            <ul id="navigation" class="navigation list flex">
                <li class="nav-button">
                    <a href="home">
                        <img src="/public/img/home.svg" class="icon">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-button active">
                    <a href="week">
                        <img src="/public/img/week_wh.svg" class="icon">
                        <span>Week</span>
                    </a>
                </li>
                <li class="nav-button">
                    <a href="all">
                        <img src="/public/img/all_org.svg" class="icon">
                        <span>All</span>
                    </a>
                </li>
            </ul>
            <ul class="settings list flex">
                <li>
                    <a href="settings">
                        <img src="/public/img/profile.svg" class="enable">
                        <img src="/public/img/profile_org.svg" class="disable">
                        <span class="disable">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="start">
                        <img src="/public/img/logout.svg" class="enable">
                        <img src="/public/img/logout_org.svg" class="disable">
                        <span class="disable">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

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