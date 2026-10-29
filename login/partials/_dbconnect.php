<?php

// DB credentials are no longer hardcoded here.
// They live in _dbconfig.php, which is gitignored and never committed.
// See _dbconfig.sample.php for the template to copy from.

$configFile = __DIR__ . '/_dbconfig.php';
if (file_exists($configFile)) {
    require $configFile;
} else {
    // Fallback so the app still runs if _dbconfig.php hasn't been created yet
    // (e.g. fresh clone). Prefers environment variables, then XAMPP defaults.
    define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
    define('DB_USER', getenv('DB_USER') ?: 'root');
    define('DB_PASS', getenv('DB_PASS') ?: '');
    define('DB_NAME', getenv('DB_NAME') ?: 'cms');
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die("failed to connect" . mysqli_connect_error());
}
