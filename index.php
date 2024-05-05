<?php 
ob_start();
include __DIR__.'/_templates/home.html.php';

$output = ob_get_clean();

include __DIR__.'/_templates/layout.html.php';

