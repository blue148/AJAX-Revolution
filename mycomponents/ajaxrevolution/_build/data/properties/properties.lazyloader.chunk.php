<?php

$properties = array( 
    array( 
        'name' => 'toSelector',
        'desc' => 'The CSS Selector to load the AJAX Partial HTML page to.',
        'type' => 'textfield',
        'options' => '',
        'value' => '#Lazy',
        'lexicon' => '',
        'area' => 'AJAX Container',
        ),
    array( 
        'name' => 'postError',
        'desc' => 'The javascript to run when an AJAX Request has failed and after the user has been notified.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => '',
        'area' => 'Post Hooks',
        ),
    array( 
        'name' => 'postSuccess',
        'desc' => 'The JavaScript to run when an AJAX Request succeeds after the page has updated.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => '',
        'area' => 'Post Hooks',
        ),
    array( 
        'name' => 'preError',
        'desc' => 'The javascript to run when an AJAX Request fails before the user has been notified.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => '',
        'area' => 'Pre Hooks',
        ),
    array( 
        'name' => 'preSuccess',
        'desc' => 'The javascript to run when an AJAX Request succeeds before the page has been updated.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => '',
        'area' => 'Pre Hooks',
        ),
    array( 
        'name' => 'fromURL',
        'desc' => 'The URL of the AJAX Page to lazily load',
        'type' => 'textfield',
        'options' => '',
        'value' => '/',
        'lexicon' => '',
        'area' => 'URL',
        ),

);

return $properties;

