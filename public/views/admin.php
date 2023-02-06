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
                    <form class="logout-form" action="logout" method="POST">
                        <button>
                            <span class="disable">Log out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container flex">
        <table>
            <tr class="header">
                <th>username</th>
                <th>password</th>
                <th>email</th>
                <th>role</th>
                <th>action</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->getUsername(); ?></td>
                    <td><?= $user->getPassword(); ?></td>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $user->getRole(); ?></td>
                    <td>
                        <?php if($user->getRole() == 'user') : ?>
                            <button class="delete-user"></button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div> 
</body>