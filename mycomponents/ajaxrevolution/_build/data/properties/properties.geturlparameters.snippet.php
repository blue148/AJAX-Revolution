<?php

$properties = array( 
    array( 
        'name' => 'debug',
        'desc' => 'When set to 1, outputs debug text to the screen.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => '',
        'area' => 'Debug',
        ),
    array( 
        'name' => 'prefix',
        'desc' => 'The prefix to add to all Placeholders created for each URL Parameter. To access the placeholder: [[+prefix.#]]',
        'type' => 'textfield',
        'options' => '',
        'value' => 'param',
        'lexicon' => '',
        'area' => 'Placeholders',
        ),

);

return $properties;

