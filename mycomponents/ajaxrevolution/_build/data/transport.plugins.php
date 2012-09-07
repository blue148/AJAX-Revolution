<?php
/**
 * plugins transport file for AJAX Revolution extra
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
$plugins = array();

$plugins[1] = $modx->newObject('modPlugin');
$plugins[1] ->fromArray(array(
    'id' => 1,
    'property_preprocess' => '0',
    'name' => 'OnNoCustomAliasFound',
    'description' => '',
    'properties' => '',
    'disabled' => '0',
    'plugincode' => stripPhpTags($sources['source_core'].'/elements/plugins/onnocustomaliasfound.plugin.php'),
), '', true, true);
$plugins[2] = $modx->newObject('modPlugin');
$plugins[2] ->fromArray(array(
    'id' => 2,
    'property_preprocess' => '0',
    'name' => 'OnGetRequestType',
    'description' => 'Runs when a page is not found. This will happen whenever false Aliases such as the AJAX Framework is requested. This simply determines if the URL is an AJAX Request or a FULL Page Request. Configured by System Setting (Namespace:modjax).',
    'properties' => '',
    'disabled' => '0',
    'plugincode' => stripPhpTags($sources['source_core'].'/elements/plugins/ongetrequesttype.plugin.php'),
), '', true, true);
$plugins[3] = $modx->newObject('modPlugin');
$plugins[3] ->fromArray(array(
    'id' => 3,
    'property_preprocess' => '0',
    'name' => 'OnParseURLParameters',
    'description' => 'Runs directly after OnGetRequestType whenever a page is not found. Places all parameters into the $_REQUEST array at the key specified by the System Setting. (Namespace:modjax)',
    'properties' => '',
    'disabled' => '0',
    'plugincode' => stripPhpTags($sources['source_core'].'/elements/plugins/onparseurlparameters.plugin.php'),
), '', true, true);
$plugins[4] = $modx->newObject('modPlugin');
$plugins[4] ->fromArray(array(
    'id' => 4,
    'property_preprocess' => '0',
    'name' => 'OnDegradeGracefully',
    'description' => 'Runs whenever a page is loaded from the database or the site cache. Simply determines whether or not an AJAX Page should switch its Template to another Template. Configured by System Settings (Namespace:modjax)',
    'properties' => '',
    'disabled' => '0',
    'plugincode' => stripPhpTags($sources['source_core'].'/elements/plugins/ondegradegracefully.plugin.php'),
), '', true, true);
return $plugins;
