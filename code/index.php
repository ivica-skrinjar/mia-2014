<?php
$url = isset($_GET['url']) ? $_GET['url'] : 'index.html';
if ($url === '/' || $url === '') $url = 'index.html';

require_once('send-mail.php');
	
require_once('header.php');
require_once('sidebar.php');
require_once('content.php');
require_once('footer.php');
