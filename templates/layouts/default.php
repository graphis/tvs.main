<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php echo $this->render('_head'); ?>
</head>

<body role="document">

    <div id="wrapper">
        <?php echo $this->render('_masthead'); ?>

        <main role="main" id="maincontent">
            <?php echo $this->getContent(); ?>
        </main>
    </div>

    <script type="text/javascript">
        document.documentElement.className = "js";
        var menu = document.getElementById('menu');
        var toggle = document.getElementById('navToggle');
        menu.classList.add('collapsed');
        function menuToggle() {
            "use strict";
            menu.classList.toggle('collapsed');
            toggle.classList.toggle('active');
        }
        toggle.addEventListener('click', menuToggle);
    </script>

    <?php echo $this->scriptsFoot(); ?>

</body>

<!-- cheers -->
</html>
