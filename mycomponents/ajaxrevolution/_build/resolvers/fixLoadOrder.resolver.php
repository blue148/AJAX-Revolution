<?php
/**
 * Resolver for AJAX Revolution extra
 *
 * Copyright 2012 by Donald Atkinson (aka Fuzzical Logic) fuzzicallogic@gmail.com
 * Created on 09-04-2012
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
 * @package AJAX Revolution
 * @subpackage build
 */

/* @var $object xPDOObject */
/* @var $modx modX */

/* @var array $options */

if ($object->xpdo) {
    $modx =& $object->xpdo;

    $fixPlugins = array();
    $fixPlugins[] = 'OnUserTypedURL';
    $fixPlugins[] = 'OnGetRequestType';
    $fixPlugins[] = 'OnParseURLParameters';
    $fixPlugins[] = 'OnFindSiteAlias';
    $fixPlugins[] = 'OnFindTemplateAction';
    $fixPlugins[] = 'OnNoCustomAlias';
    $fixPlugins[] = 'ArchivistFurl';
    $fixPlugins[] = 'ArticlesPlugin';

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
        case xPDOTransport::ACTION_UNINSTALL:
        // Loop through each. Fix the Priorities.
            $priority = 0;
            foreach ($fixPlugins as $plugin)
            {   $plugin = $modx->getObject('modPlugin', array('name' => $plugin));
                if ($plugin)
                {   $id = $plugin->get('id');
                    $event = $modx->getObject('modPluginEvent', array(
                        'pluginid' => $id,
                        'event' => 'OnPageNotFound',
                    ));
                    if ($event == null) {
                        $event = $modx->newObject('modPluginEvent');
                        $event->set('pluginid', $id);
                        $event->set('event', 'OnPageNotFound');
                        $event->set('priority', $priority);
                        $event->save();
                        $priority++;
                    }
                    else
                    {
                        $event->set('priority', $priority);
                        $event->save();
                        $priority++;
                    }
                }
            }

            break;
    }
}

return true;