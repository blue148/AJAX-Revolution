<?php
/**
 * OnDegradeGracefully plugin for AJAX Revolution extra
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
    $keyDegrade = !empty($keyDegrade) ? $keyDegrade : $modx->getOption('key_degrade', null, 'url_degrade');
    $idDegradeTo = !empty($idDegradeTo) ? $idDegradeTo : $modx->getOption('degrade_to_template', null, 1);
    $keyURL = $modx->getOption('key_request', null, 'url_actual');

// Determine if we were told to switch
    $toURL = $_REQUEST[$keyURL];
    $switch = $_REQUEST[$keyDegrade];

//Get the System Event
    $eventName = $modx->event->name;
    switch($eventName) {
        case 'OnLoadWebDocument':
            if (!empty($switch))
            {//Refresh the Cache
                $modx->getCacheManager()->refresh(array(
                        'auto_publish' => array('contexts' => array($modx->context->key)),
                        'context_settings' => array('contexts' => array($modx->context->key)),
                        'resource' => array('contexts' => array($modx->context->key), 'ids'=> array($modx->resource->get('id'))),
                 )   );
                //$modx->reloadContext($modx->context->key);
                if ($switch == 'true')
                {//Switch the template
                    $modx->resource->set('template', $idDegradeTo);
                    $_REQUEST[$keyDegrade] = 'false';
                    $switch = 'false';
                }
            }
            break;
        case 'OnLoadWebPageCache':
            if (!empty($switch))
            {
                if (!empty($modx->resource))
                {
                    $modx->getCacheManager()->refresh(array(
                            'auto_publish' => array('contexts' => array($modx->context->key)),
                            'context_settings' => array('contexts' => array($modx->context->key)),
                        	'resource' => array('contexts' => array($modx->context->key), 'ids'=> array($modx->resource->get('id'))),
                     )   );
                    //$modx->reloadContext($modx->context->key);
                    if ($switch == 'true')
                    {// Re-Forward
                            $modx->sendForward($modx->resource->get('id'));
                    }
                }
            }
            break;
    }