<?php
/**
 * templates transport file for AJAX Revolution extra
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
$templates = array();

$templates[1] = $modx->newObject('modTemplate');
$templates[1] ->fromArray(array(
    'id' => 1,
    'property_preprocess' => '0',
    'templatename' => 'AJAX Partial HTML',
    'description' => 'Template for AJAX Requests that will result in Partial HTML. Simply returns the content of the Resource. OnDegradeGracefully Plugin will handle cached and non-cached resources.',
    'icon' => '',
    'template_type' => '0',
    'properties' => '',
    'content' => file_get_contents($sources['source_core'].'/elements/templates/ajax_partial_html.template.html'),
), '', true, true);
return $templates;
