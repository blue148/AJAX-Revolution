<?php
/**
 * OnNoCustomAliasFound plugin for AJAX Revolution extra
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
    $keyURL = !empty($keyURL) ? $keyURL : $modx->getOption('key_request', null, 'url_actual');
    $keyFound = !empty($keyFound) ? $keyFound : $modx->getOption('key_found_resource', null, 'bool_found');

// Get "passed" variables
    $isFound = empty($_REQUEST[$keyFound])
        ? 'false'
        : $_REQUEST[$keyFound];
// Only do this if we need to scan.
    if ($isFound == 'false')
    {//See if a previous plugin has set the URL.
        $toURL = !empty($_REQUEST[$keyURL]) 
            ? $_REQUEST[$keyURL]
            : $_SERVER['REQUEST_URI'];
        
        function findByURL($url, $alias)
        {   global $modx;
        // Strip the extension
            $alias = reset(explode('.',trim($alias)));
            
            $q = $modx->newQuery
            (   'modResource',
                array
                (   'published'=>1,
                    'context_key'=>$modx->context->key,
                    'alias'=>$alias
                )
            );
            $q->select(array('id','alias'));
            $q->limit(25);
            $q->prepare();
            $matches=$modx->getCollection('modResource',$q);
            
            foreach($matches as $res)
            {   if (!empty($res))
                {//Align URLs by getting rid of end slashes and extensions
                    $chk_url = $modx->makeUrl($res->get('id'));
                    $chk_url = preg_replace("/\.[\w\-\h]{2,}/", "", trim($chk_url, '/'));
                // Now compare the URLs
                    if($chk_url == $url)
                        return $res->get('id');
                }
            }
            return -1;
        }
    
    // Split the Path Segments
        $toPath = explode('/', trim($toURL, '/'));
    // Align URLs by getting rid of end slashes and extensions
        $toURL = preg_replace("/\.[\w\-\h]{2,}/", "", trim($toURL, '/'));

    // Get the Resource ID
        $toID = findByURL($toURL, end($toPath));
    // Forward the client
        if ($toID == -1) $_REQUEST[$keyFound] = 'false';
        else
        {   $_REQUEST[$keyFound] = 'true';
            $modx->sendForward($toID);
        }
    }