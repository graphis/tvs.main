<?php

$slug = isset($this->slug) ? $this->slug : 'default';
$menu = $this->ul(['class' => 'nav']);

$items = [
    'home' => '/',
    'projects' => '/projects',
    'about' => '/about',
    'contact' => '/contact'
];

foreach ($items as $text => $url) {
    $attr = '/' . $slug == $url ? ['class' => 'active'] : [];
    $menu->rawItem($this->anchor($url, $text), $attr);
}

?>

<header id="top" class="masthead header">
    <div id="skiptocontent">
        <a href="#maincontent" class="btn-block">skip to main content</a>
    </div>
    <nav id="navigation">
        <a id="brand" href="/">
            <img src="/img/tvsloot.png" alt="t logo" />
        </a>
        <div id="sidebar">
            <button id="navToggle" class="navbar-toggle">
                <span>toggle menu</span>
            </button>
            <ul class="social">
                <li class="github">
                    <a href="https://github.com/tvsloot"
                    title="GitHub">
                        <span>GitHub</span>
                    </a>
                </li>
                <li class="linkedin">
                    <a href="http://linkedin.com/in/tvsloot"
                    title="LinkedIn">
                        <span>LinkedIn</span>
                    </a>
                </li>
                <li class="email">
                    <a href="mailto:travis@tvsloot.com"
                    title="mailto:travis@tvsloot.com">
                        <span>email</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu" id="menu">
            <?php echo $menu; ?>
        </div>
    </nav>
</header>
