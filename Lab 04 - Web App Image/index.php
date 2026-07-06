<?php
$name = strtolower(getenv('BACKGROUND_COLOR') ?: 'white');
$map = ['red'=>'#f00','green'=>'#0f0','blue'=>'#00f','yellow'=>'#ff0','white'=>'#fff'];
$bg = $map[$name] ?? '#fff';
?>
<!doctype html>
<html><head><style>body{background:<?php echo $bg; ?>;}</style></head>
<body><h1>Hello, Docker!</h1><p>Background from an env var.</p></body></html>
