<?php
require 'config.php';
require HELPERS_FOLDER.'autoloaders.php';

Router::gateKeeper();

Output::notFound();
?>