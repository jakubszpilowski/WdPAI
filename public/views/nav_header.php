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
                <li id="home-page" class="nav-button">
                    <a href="home">
                        <img src="/public/img/home_wh.svg" class="icon home-on">
                        <img src="/public/img/home.svg" class="icon home-off">
                        <span>Home</span>
                    </a>
                </li>
                <li id="week-page" class="nav-button">
                    <a href="week">
                        <img src="/public/img/week_wh.svg" class="icon week-on">
                        <img src="/public/img/week_org.svg" class="icon week-off">
                        <span>Week</span>
                    </a>
                </li>
                <li id="all-page" class="nav-button">
                    <a href="all">
                        <img src="/public/img/all_wh.svg" class="icon all-on">
                        <img src="/public/img/all_org.svg" class="icon all-off">
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
