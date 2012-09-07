<?php
/**
 * propertySets transport file for AJAX Revolution extra
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
$propertysets = array();

$propertysets[1] = $modx->newObject('modPropertySet');
$propertysets[1] ->fromArray(array(
    'id' => 1,
    'name' => 'default',
    'description' => '',
    'properties' => '',
), '', true, true);
return $propertysets;
