<?php

$string = $_REQUEST['string'];
echo hash('sha256', $string);