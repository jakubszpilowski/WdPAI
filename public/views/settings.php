<?php
if(!isset($_COOKIE['user'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: ${url}/start");
} else {
    setcookie('user', $_COOKIE['user'], time() + (60 * 20), "/");
}

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style_settings.css">
    <script src="/public/scripts/nav.js" defer></script>
    <script src="/public/scripts/settings_handler.js" defer></script>
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
                    <div class="back">
                        <button class="back-btn" onclick="history.back()">
                            <span class="disable">Exit</span>
                        </button>
                    </div>
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
    <div id="message-div" class="message">
    </div>
    <div class="container">
        <ul class="list contents flex">
            <li id="user-out" class="info flex">
                <span class="user flex">
                    <?php if (isset($user)){?>
                    <?= $user->getUsername()?>
                    <?php }?>
                </span>
                <div class="ctn flex">
                    <button id="edit-username" class="apply-btn flex" onclick="editUsername()">
                        Edit
                    </button>
                    <button id="cancel-username" class="apply-btn flex off" onclick="closeUsername()">
                        Cancel
                    </button>
                </div>
            </li>
            <li id="edit-user" class="info flex">
                <div class="input-control">
                    <label for="username"></label>
                    <input id="username" type="text" placeholder="enter new username">
                </div>
                <div class="ctn flex">
                    <button class="apply-btn flex" id="apply-username">
                        Apply
                    </button>
                </div>
            </li>
            <li id="email-out" class="info flex">
                <span class="user flex">
                    <?php if (isset($user)){?>
                    <?= $user->getEmail()?>
                    <?php }?>
                </span>
                <div class="ctn flex">
                    <button id="edit-e" class="apply-btn flex" onclick="editEmail()">
                        Edit
                    </button>
                    <button id="cancel-e" class="apply-btn flex off" onclick="closeEmail()">
                        Cancel
                    </button>
                </div>
            </li>
            <li id="edit-email" class="info flex">
                <div class="input-control">
                    <label for="email"></label>
                    <input id="email" type="email" placeholder="enter new email">
                </div>
                <div class="ctn flex">
                    <button id="apply-email" class="apply-btn flex">
                        Apply
                    </button>
                </div>
            </li>
            <li class="info flex">
                <span class="user flex">
                    ************
                </span>
                <div class="ctn flex">
                    <button id="edit-p" class="apply-btn flex" onclick="editPassword()">
                        Edit
                    </button>
                    <button id="cancel-p" class="apply-btn flex off" onclick="closePassword()">
                        Cancel
                    </button>
                </div>
            </li>
            <li id="edit-password" class="info flex">
                <div class="repeat flex">
                    <div class="input-control twice">
                        <label for="password"></label>
                        <input id="password" type="password" placeholder="enter new password" onfocusout="checkPassword(this.value)">
                    </div>
                    <div class="input-control twice">
                        <label for="password-repeat"></label>
                        <input id="password-repeat" type="password" placeholder="repeat password">
                    </div>
                </div>
                <div class="ctn flex">
                    <button id="apply-password" class="apply-btn flex">
                        Apply
                    </button>
                </div>
            </li>
        </ul>
    </div>
</body>

<template id="username-template">
    <span class="user flex"></span>
    <div class="ctn flex">
        <button id="edit-username" class="apply-btn flex" onclick="editUsername()">
            Edit
        </button>
        <button id="cancel-username" class="apply-btn flex off" onclick="closeUsername()">
            Cancel
        </button>
    </div>
</template>

<template id="email-template">
    <span class="user flex"></span>
    <div class="ctn flex">
        <button id="edit-e" class="apply-btn flex" onclick="editEmail()">
            Edit
        </button>
        <button id="cancel-e" class="apply-btn flex off" onclick="closeEmail()">
            Cancel
        </button>
    </div>
</template>