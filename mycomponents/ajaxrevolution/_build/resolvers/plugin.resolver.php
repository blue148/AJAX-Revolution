<?php
/**
* Resolver to connect plugins to system events for AJAX Revolution extra
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
* @package ajaxrevolution
* @subpackage build
*/
/* @var $object xPDOObject */
/* @var $pluginObj modPlugin */
/* @var $mpe modPluginEvent */
/* @var xPDOObject $object */
/* @var array $options */
/* @var $modx modX */
/* @var $pluginObj modPlugin */
/* @var $pluginEvent modPluginEvent */
/* @var $obj modEvent */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            $newSystemEvents = '';
            $eventNames = empty($eventNames)? array() : explode(',', $eventNames);
            foreach($eventNames as $eventName) {
                $obj = $modx->getObject('modEvent', array('name' => $eventName));
                if (! $obj) {
                    $obj = $modx->newObject('modEvent');
                    {
                        $obj->set('name', $eventName);
                        $obj->set('groupname', 'AJAX Revolution');
                        $obj->set('service', 1);
                        $obj->save();
                    }
                }
            }

            

            $pluginId = null;
            $pluginObj = null;
            $mpes = array();
            $plugin = 'OnGetRequestType';
            $events = 'OnPageNotFound';
            $events = explode(',', $events);
            $pluginObj = $modx->getObject('modPlugin', array('name' => $plugin));
            if ($pluginObj) {
                $pluginId = $pluginObj->get('id');
                foreach ($events as $event) {

                    $pluginEvent = $modx->getObject('modPluginEvent', array(
                        'pluginid' => $pluginId,
                        'event' => $event,
                    ));
                    if ($pluginEvent == null) {
                        $pluginEvent = $modx->newObject('modPluginEvent');
                        $pluginEvent->set('pluginid', $pluginId);
                        $pluginEvent->set('event', $event);
                        $pluginEvent->set('priority', 0);
                        $pluginEvent->save();
                    }
                }
            }

            $pluginId = null;
            $pluginObj = null;
            $mpes = array();
            $plugin = 'OnParseURLParameters';
            $events = 'OnPageNotFound';
            $events = explode(',', $events);
            $pluginObj = $modx->getObject('modPlugin', array('name' => $plugin));
            if ($pluginObj) {
                $pluginId = $pluginObj->get('id');
                foreach ($events as $event) {

                    $pluginEvent = $modx->getObject('modPluginEvent', array(
                        'pluginid' => $pluginId,
                        'event' => $event,
                    ));
                    if ($pluginEvent == null) {
                        $pluginEvent = $modx->newObject('modPluginEvent');
                        $pluginEvent->set('pluginid', $pluginId);
                        $pluginEvent->set('event', $event);
                        $pluginEvent->set('priority', 0);
                        $pluginEvent->save();
                    }
                }
            }

            $pluginId = null;
            $pluginObj = null;
            $mpes = array();
            $plugin = 'OnDegradeGracefully';
            $events = 'OnLoadWebDocument,OnLoadWebPageCache';
            $events = explode(',', $events);
            $pluginObj = $modx->getObject('modPlugin', array('name' => $plugin));
            if ($pluginObj) {
                $pluginId = $pluginObj->get('id');
                foreach ($events as $event) {

                    $pluginEvent = $modx->getObject('modPluginEvent', array(
                        'pluginid' => $pluginId,
                        'event' => $event,
                    ));
                    if ($pluginEvent == null) {
                        $pluginEvent = $modx->newObject('modPluginEvent');
                        $pluginEvent->set('pluginid', $pluginId);
                        $pluginEvent->set('event', $event);
                        $pluginEvent->set('priority', 0);
                        $pluginEvent->save();
                    }
                }
            }

            $pluginId = null;
            $pluginObj = null;
            $mpes = array();
            $plugin = 'OnNoCustomAliasFound';
            $events = 'OnPageNotFound';
            $events = explode(',', $events);
            $pluginObj = $modx->getObject('modPlugin', array('name' => $plugin));
            if ($pluginObj) {
                $pluginId = $pluginObj->get('id');
                foreach ($events as $event) {

                    $pluginEvent = $modx->getObject('modPluginEvent', array(
                        'pluginid' => $pluginId,
                        'event' => $event,
                    ));
                    if ($pluginEvent == null) {
                        $pluginEvent = $modx->newObject('modPluginEvent');
                        $pluginEvent->set('pluginid', $pluginId);
                        $pluginEvent->set('event', $event);
                        $pluginEvent->set('priority', 0);
                        $pluginEvent->save();
                    }
                }
            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            
            break;
    }
}

return true;