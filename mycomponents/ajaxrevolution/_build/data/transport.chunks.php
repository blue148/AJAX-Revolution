<?php
/**
 * chunks transport file for AJAX Revolution extra
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
$chunks = array();

$chunks[1] = $modx->newObject('modChunk');
$chunks[1] ->fromArray(array(
    'id' => 1,
    'property_preprocess' => '0',
    'name' => 'lazyLoader',
    'description' => 'jQuery Lazy Loader - Loads a AJAX Partial HTML from the &fromURL and automatically adds it to the HTML Element of &toSelector. Allows for additional Javascript to be run on success or error with &onSuccess and &onError.',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/lazyloader.chunk.html'),
), '', true, true);

$properties = include $sources['data'].'properties/properties.lazyloader.chunk.php';
$chunks[1]->setProperties($properties);
unset($properties);

return $chunks;
