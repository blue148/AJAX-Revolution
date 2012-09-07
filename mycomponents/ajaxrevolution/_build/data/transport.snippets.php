<?php
/**
 * snippets transport file for AJAX Revolution extra
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
$snippets = array();

$snippets[1] = $modx->newObject('modSnippet');
$snippets[1] ->fromArray(array(
    'id' => 1,
    'property_preprocess' => '0',
    'name' => 'getURLParameters',
    'description' => '',
    'snippet' => stripPhpTags($sources['source_core'].'/elements/snippets/geturlparameters.snippet.php'),
), '', true, true);

$properties = include $sources['data'].'properties/properties.geturlparameters.snippet.php';
$snippets[1]->setProperties($properties);
unset($properties);

return $snippets;
