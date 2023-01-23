<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_all.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_navbar.css">
    <script src="/public/scripts/nav.js" defer></script>
    <title>All</title>
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
                <li class="nav-button">
                    <a href="week">
                        <img src="/public/img/week_org.svg" class="icon">
                        <span>Week</span>
                    </a>
                </li>
                <li class="nav-button active">
                    <a href="all">
                        <img src="/public/img/all_wh.svg" class="icon">
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
                    <form class="logout-form" action="logout" method="POST">
                        <button>
                            <span class="disable">Log out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
</body>
</html>