<?php
/**
 * OnGetRequestType plugin for AJAX Revolution extra
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
 **///$res = $modx->getObject('modResource',array('pagetitle'=>'onCheckAJAXRequest'));
//eval($res->getContent());

// Get System Settings
    $ajaxAlias = $modx->getOption('alias_ajax_page', null, 'ajax');
    $fullAlias = $modx->getOption('alias_degrade', null, 'full');
    $argsName = $modx->getOption('key_params', null, 'url_params');
    $keyDegrade = $modx->getOption('key_degrade', null, 'url_degrade');
    $keyURL = $modx->getOption('key_request', null, 'url_actual');

    $keyFound = !empty($keyFound) ? $keyFound : $modx->getOption('key_found_resource', null, ' bool_found');

// Get "passed" variables
    $isFound = empty($_REQUEST[$keyFound])
        ? 'false'
        : $_REQUEST[$keyFound];
// Only do this if we need to scan.
    if ($isFound == 'false')
    {
    // Get the Request URL
        $toURL = !empty($_REQUEST[$keyURL]) 
            ? $_REQUEST[$keyURL]
            : $_SERVER['REQUEST_URI'];
    // Remove GET Parameters
        $toURL = reset(explode('?', trim($toURL, '/')));
    // Find AJAX Alias and Separate from Parameters
        $pieces = explode('/'.$ajaxAlias.'/', trim($toURL, '/') . '/');
    
    //Flag as AJAX Alias
        $_REQUEST[$keyDegrade] = 'false';
    // Only proceed if Alias was found
        if (count($pieces) > 1)
        {// Add Parameters to $_REQUEST global variable
            $_REQUEST[$argsName] = $pieces[1];
        // Set the path to search for Aliases
            $_REQUEST[$keyURL] = '/'. $pieces[0] . '/';
        }
        else
        {// Find FULL Alias and Separate from Parameters
            $pieces = explode('/'.$fullAlias.'/', trim($toURL, '/') . '/');
        // Only proceed if Alias was found
            if (count($pieces) > 1)
            {//Flag for Template Switch
                $_REQUEST[$keyDegrade] = 'true';
            // Add Parameters to $_REQUEST global variable
                $_REQUEST[$argsName] = $pieces[1];
            // Set the path to search for Aliases
                $_REQUEST[$keyURL] = '/'. $pieces[0] . '/';
            }
        }
    }