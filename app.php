<?php
define('PUBLIC_DIR', __DIR__);
$configPath = '[YOUR_CONFIG_DIRECTORY_PATH]'; // e.g., __DIR__ . '/myconfigs/';
$securePath = '[YOUR_APP_DIRECTORY_PATH]';    // e.g., __DIR__ . '/myapp/';

    if ($_GET['route'] === 'api') {
        require $securePath . 'api.php';
        exit;
    }

require $securePath . 'vault.php';
?>