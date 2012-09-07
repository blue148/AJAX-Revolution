<?php
/**
 * OnParseURLParameters plugin for AJAX Revolution extra
 *
 * Copyright 2012 by Donald Atkinson (aka Fuzzical Logic) fuzzicallogic@gmail.com
 * Created on 09-05-2012
 *
* AJAX Revolution is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * AJAX Revolution is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * AJAX Revolution; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package ajaxrevolution
 */

/**
 * Description
 * -----------
 * [[+description]]
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package ajaxrevolution
 **///Get the System Settings (if we haven't already...)
    $argsName = !empty($argsName) ? $argsName : $modx->getOption('key_params', null, 'url_params');
// Only proceed if a previous plugin has set the URL Params
    if (!empty($_REQUEST[$argsName]))
    {//Split the list of Parameters
        $list = explode('/', trim($_REQUEST[$argsName], '/'));
    // Reset the REQUEST variable
        $_REQUEST[$argsName] = array();
    // Add each of the Params to the array
        $i = 0;
        foreach ($list as $key => $value)
        {
            $_REQUEST[$argsName][$i] = strval($value);
            $i++;
        }
    }