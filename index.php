<?php
require 'config.php';
require HELPERS_FOLDER.'autoloaders.php';

Router::handleCORS();
Router::gateKeeper();

Output::notFound();
?>