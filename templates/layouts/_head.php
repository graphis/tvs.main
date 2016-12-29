<?php

$this->title()->append("travis vander sloot");

$manifest = file_get_contents('./assets/css/rev-manifest.json');
$jsonObj = json_decode($manifest);
$key = 'style.css';
$appCss = $jsonObj->$key;

$this->styles()
    ->add('/assets/css/' . $appCss)
    ->add('/assets/vendor/fontawesome/css/font-awesome.min.css');

$head = $this->metas()
    . $this->title()
    . $this->scripts()
    . $this->styles();

?>

<meta charset="utf-8" />
<meta name="title" property="og:title" content="Travis Vander Sloot" />
<meta property="og:site_name" content="Travis Vander Sloot" />
<meta name="robots" content="index, follow" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<meta property="og:url" content="http://tvsloot.com" />

<meta property="og:locale" content="en_US" />
<meta name="description" property="og:description" content="web development portfolio of Travis Vander Sloot" />

<link rel="apple-touch-icon-precomposed" sizes="180x180" href="/ico/apple-touch-icon-180x180.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/ico/apple-touch-icon-57x57.png" />
<link rel="icon" href="/ico/favicon.ico" />
<link rel="shortcut icon" href="/ico/favicon.ico" />

<?php echo $head; ?>

<!-- HTML5 shim and Respond.js
IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
