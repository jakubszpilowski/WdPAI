<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_settings.css">
    <script src="/public/scripts/nav.js" defer></script>
    <title>Settings</title>
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
                    <a href="#">
                        <img src="/public/img/cross.svg" class="enable">
                        <img src="/public/img/cross_org.svg" class="disable">
                        <span class="disable">Exit</span>
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
        <ul class="list contents flex">
            <li class="info flex">
                <span class="user flex">
                    Username
                </span>
                <button class="edit-btn">
                    Edit
                </button>
            </li>
            <li class="info flex">
                <span class="user flex">
                    e-mail
                </span>
                <button class="edit-btn">
                    Edit
                </button>
            </li>
            <li class="info flex">
                <span class="user flex">
                    Password
                </span>
                <button class="edit-btn">
                    Edit
                </button>
            </li>
        </ul>
        <div class="ctn flex">
            <button class="apply-btn flex">
                Apply
            </button>
        </div>
    </div> 
</body>