<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_admin.css">
    <script src="/public/scripts/nav.js" defer></script>
    <title>Admin panel</title>
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

    </div> 
</body>