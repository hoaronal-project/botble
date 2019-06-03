<?php
include('simple_html_dom.php');

$html = file_get_html('https://viblo.asia/p/crawl-du-lieu-tu-web-su-dung-php-ORNZq3DN50n');
echo $html;
