<?php
/**
 * en default topic lexicon file for AJAX Revolution extra
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
 * en default topic lexicon strings
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package ajaxrevolution
 **/
 $_lang['setting_alias_ajax_page']='AJAX Path Alias';
 $_lang['setting_alias_ajax_page_desc']='The URL Path to add to a URL in order to parse parameters and make it an AJAX Request. This will create a URL similar to http://domain.tld/path/alias/key/value1/value2 where key is the value of this setting.';
 $_lang['setting_alias_degrade']='Degrade Path Alias';
 $_lang['setting_alias_degrade_desc']='The URL Path to add to a URL in order to parse parameters and make an AJAX Request degrade to a full page. This will create a URL similar to http://domain.tld/path/alias/key/value1/value2 where key is the value of this setting.';
 $_lang['setting_degrade_to_template']='Degradation Template';
 $_lang['setting_degrade_to_template_desc']='The Template to force degraded AJAX Requests to. These are only used when the Degrade Path Alias is in the URL.';
 $_lang['setting_key_degrade']='Degrade Array Key';
 $_lang['setting_key_degrade_desc']='The Key in $_REQUEST indicating that this AJAX Request should be degraded and its Template should be switched. This can be retrieved by $_REQUEST[key] where key is the value of this setting.';
 $_lang['setting_key_found_resource']='Found Resource Array Key';
 $_lang['setting_key_found_resource_desc']='The Key in $_REQUEST containing the indicator to other Plugins that the Resource for the URL has been found and to stop looking. This can be retrieved by $_REQUEST[key] where key is the value of this setting.';
 $_lang['setting_key_params']='URL Parameter Array Key';
 $_lang['setting_key_params_desc']='The Key in $_REQUEST containing the ordered array of URL Parameters. This can be retrieved by $_REQUEST[key] where key is the value of this setting.';
 $_lang['setting_key_request']='Find URL Array Key';
 $_lang['setting_key_request_desc']='The Key in $_REQUEST containing the modified URL after all AJAX Parameters and Custom Aliases have been removed. This can be retrieved by any Snippet or Plugin with $_REQUEST[key] where key is the value of this setting.';
