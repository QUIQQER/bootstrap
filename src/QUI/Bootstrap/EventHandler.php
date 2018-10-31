<?php

/**
 * This file contains QUI\Bootstrap\EventHandler
 */

namespace QUI\Bootstrap;

use QUI;

/**
 * Class EventHandler
 * @package QUI\Bootstrap
 */
class EventHandler
{
    /**
     * Event : on smarty init
     * @param \Smarty $Smarty - \Smarty
     */
    public static function onSmartyInit($Smarty)
    {
        // {bootstrap}
        if (!isset($Smarty->registered_plugins['function']) ||
            !isset($Smarty->registered_plugins['function']['bootstrap'])
        ) {
            $Smarty->registerPlugin(
                "function",
                "bootstrap",
                "\\QUI\\Bootstrap\\EventHandler::bootstrap"
            );
        }
    }

    /**
     * Smarty area function {brickarea}
     *
     * @return array|String
     */
    public static function bootstrap()
    {
        return '<link href="' . URL_OPT_DIR . 'bin/bootstrap/dist/css/bootstrap.css"
          rel="stylesheet"
          type="text/css"
               />';
    }
}
