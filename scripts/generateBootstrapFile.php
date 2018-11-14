<?php
/**
 * Generated Bootstrap CSS file combined with Unsemantic
 */

// no console
if (php_sapi_name() != 'cli') {
    exit;
}

$packagePath   = dirname(dirname(__FILE__));
$relationFile  = $packagePath . "/scripts/unsemanticRelations.php";
$bootstrapFile = $packagePath . '/bin/css/bootstrap.css';
$css           = file_get_contents($bootstrapFile);

// relation array (must be defined in unsemanticRelations.php)
$relation = false;

if (!file_exists($relationFile)) {
    echo "File not exist";
    exit;
}

require($relationFile);

if (!$relation) {
    echo 'Array "$relation" not exist.';
    exit;
}

foreach ($relation as $bootstrapClass => $unsemanticClass) {
    $css = str_replace($bootstrapClass, $unsemanticClass, $css);
}

// CSS classes that are not available in bootstrap
// $extras should be a string
if (isset($extras)) {
    $css = $css . $extras;
}

file_put_contents($packagePath . '/bin/css/bootstrap-unsemantic.css', $css);
