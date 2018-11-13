<?php
/**
 * Generated Bootstrap CSS file combined with Unsemantic
 */

$binPath       = dirname(dirname(__FILE__)) . '/bin/css/';
$bootstrapFile = $binPath . 'bootstrap.css';
$css           = file_get_contents($bootstrapFile);

// relation array (must be defined in unsemanticRelations.php)
$relation = false;

include 'unsemanticRelations.php';

if (!$relation) {
    echo "Array does not exist or the path is wrong.";
    exit;
}

foreach ($relation as $key => $entry) {

    // special css classes that are not available in bootstrap.
    if ($key === 'extras') {
        $css = $css . $entry;
        continue;
    }

    if (!is_array($entry)) {
        continue;
    }

    foreach ($entry as $unsemanticClass => $bootstrapClass) {
        $length = strlen($bootstrapClass);
        $pos    = strpos($css, $bootstrapClass);

        while ($pos !== false) {
            /**
             * Prevent to find and replace 10, 11 and 12 if 1 is searched for.
             * Prevent to replace .container-fluid if .container is searched for.
             * Prevent to replace .container > .navbar-header
             */
            if ($css[$pos + $length] === '0' ||
                $css[$pos + $length] === '1' ||
                $css[$pos + $length] === '2' ||
                $css[$pos + $length] === '-' ||
                ($css[$pos + $length] === ' ' && $css[$pos + $length + 1] === '>')) {
                // set new offset to start find at the new position
                $pos = strpos($css, $bootstrapClass, $pos + $length);
                continue;
            }

            // replace string
            $css = substr_replace($css, $bootstrapClass . ', ' . $unsemanticClass, $pos, $length);

            // set new offset to start find at the new position
            $pos = strpos($css, $bootstrapClass, $pos + strlen($bootstrapClass . ', ' . $unsemanticClass));
        }
    }
}

file_put_contents($binPath . 'bootstrapGenerated.css', $css);