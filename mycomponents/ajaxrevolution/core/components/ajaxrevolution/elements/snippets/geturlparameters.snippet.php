<?php
/**
 * getURLParameters snippet for AJAX Revolution extra
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
 *
 * @package ajaxrevolution
 */

/**
 * Description
 * -----------
 * [[+description]]
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package ajaxrevolution
 **/// Initialize Properties
    $prefix = !empty($prefix) 
        ? $prefix
        : 'param';
// Initialize System Settings
    $arrayKey = $modx->getOption('', null, '');
// Get the Parameters from Request Array
    $params = $_REQUEST[$arrayKey];
// Set a Placeholder for each Parameter
    foreach ($params as $key => $value)
        if (!empty($value))
        {   $modx->setPlaceholder($prefix.'.'.$key, $value);
            if ($debug)
                $output .= 'Parameter '.$key.' set to placeholder ('.$prefix.'.'.$key.') with value ('.$value.')';
        }
        elseif ($debug)
            $output .= 'Parameter '.$key.' has no value. No placeholder set!';

    
// Return nothing
    return $output;