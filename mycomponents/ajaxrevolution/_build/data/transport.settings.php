<?php
/**
 * SystemSettings transport file for AJAX Revolution extra
 *
 * Copyright 2012 by Donald Atkinson (aka Fuzzical Logic) fuzzicallogic@gmail.com
 * Created on 09-05-2012
 *
 * @package ajaxrevolution
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<?php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
$systemsettings = array();

$systemsettings[1] = $modx->newObject('modSystemSetting');
$systemsettings[1] ->fromArray(array(
    'id' => 1,
    'key' => 'degrade_to_template',
    'value' => '1',
    'xtype' => 'modx-combo-template',
    'namespace' => 'AJAX Revolution',
    'area' => 'Templates',
    'properties' => '',
), '', true, true);
$systemsettings[2] = $modx->newObject('modSystemSetting');
$systemsettings[2] ->fromArray(array(
    'id' => 2,
    'key' => 'alias_degrade',
    'value' => 'full',
    'xtype' => 'textfield',
    'namespace' => 'AJAX Revolution',
    'area' => 'Aliases',
    'properties' => '',
), '', true, true);
$systemsettings[3] = $modx->newObject('modSystemSetting');
$systemsettings[3] ->fromArray(array(
    'id' => 3,
    'key' => 'key_degrade',
    'value' => 'url_degrade',
    'xtype' => 'textfield',
    'namespace' => 'AJAX Revolution',
    'area' => 'Request Keys',
    'properties' => '',
), '', true, true);
$systemsettings[4] = $modx->newObject('modSystemSetting');
$systemsettings[4] ->fromArray(array(
    'id' => 4,
    'key' => 'key_request',
    'value' => 'url_actual',
    'xtype' => 'textfield',
    'namespace' => 'AJAX Revolution',
    'area' => 'Request Keys',
    'properties' => '',
), '', true, true);
$systemsettings[5] = $modx->newObject('modSystemSetting');
$systemsettings[5] ->fromArray(array(
    'id' => 5,
    'key' => 'key_params',
    'value' => 'url_params',
    'xtype' => 'textfield',
    'namespace' => 'AJAX Revolution',
    'area' => 'Request Keys',
    'properties' => '',
), '', true, true);
$systemsettings[6] = $modx->newObject('modSystemSetting');
$systemsettings[6] ->fromArray(array(
    'id' => 6,
    'key' => 'key_found_resource',
    'value' => 'bool_found',
    'xtype' => 'textfield',
    'namespace' => 'AJAX Revolution',
    'area' => 'Request Keys',
    'properties' => '',
), '', true, true);
$systemsettings[7] = $modx->newObject('modSystemSetting');
$systemsettings[7] ->fromArray(array(
    'id' => 7,
    'key' => 'alias_ajax_page',
    'value' => 'ajax',
    'xtype' => 'textfield',
    'namespace' => 'AJAX Revolution',
    'area' => 'Aliases',
    'properties' => '',
), '', true, true);
return $systemsettings;
