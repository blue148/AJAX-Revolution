## AJAX Revolution *(for MODx Revolution 2.0+)*

AJAX Revolution makes SEO Friendly AJAX-Integration for the MODx Revoluton platform quick and simple. It's the easiest way to perform AJAX, ever. There are no Controllers, Procesors or complex classes needed. Every AJAX Request has its own Resource and URL and may accept URL Parameter, GET and/or POST, at your leisure. While, it doesn't require any specific JavaScript AJAX-library, the lazyLoader Chunk uses jQuery. You may add your own Chunks to replace this functionality.

### Supporting Links
* [Development Blog](http://projects.extendeddialog.com/extended-dialog/ajax-revolution/)
* [Forum Discussion](http://forums.modx.com/thread/78039/tutorial-create-seo-ajax-framework-revo-2)
* [GitHub/Donations Page](http://fuzzicallogic.github.com/AJAX-Revolution/)

### Quick Navigation
* [Installation Instructions](#installation)
* [Usage Instructions](#usage)
* [Configuration](#system-settings-configuration)
* [Components](#components)
* [Compatibility](#compatibility)

### Installation
---
There are currently two methods of installation. When the MODx Team adds it to their repository, there shall be a 3rd.

#### Package Installation

1.  Download the transport file from the tranport folder.
2.  Upload to your Installation's "core/packages/" directory.
3.  In your MODx Manager, go to the Package Manager.
4.  Click the down arrow next to "Download Packages"
5.  Choose "Search Locally for Packages"
6.  When "ajaxrevolution" appears, click Install.

#### Build Script

1.  Download all of the files in mycomponents and all subfolders. (Include the "mycomponents" folder)
2.  Upload all files to your Installation's "assets" folder.
3.  Run the file "build.transport.php" in the "_build" folder. (Navigate to `http://domain.tld/assets/mycomponents/ajaxrevolution/_build/build.transport.php` in your browser)
4.  This will place the Package in your "core/packages/" folder.
5.  Go to your Package Manager in your MODx Manager.
6.  Click the down arrow next to "Download Packages"
7.  Choose "Search Locally for Packages"
8.  When "ajaxrevolution" appears, click Install.

### Usage
---
In general, AJAX Revolution does its work automatically and is extremely flexible. Any page in your MODx installation may be retrieved via an AJAX Request and may receive URL Parameters. For your convenience, AJAX Revolution comes with 1 Template, 1 Chunk and 1 Snippet to make your code as light as possible. Additionally, for security and maximum usability, you may configure nearly everything via System Settings.

#### To Send URL Parameters to any Page

Go to the URL `http://sub.domain.tld/path/to/resource/[[++alias_ajax_page]]/value1/value2/etc../`

Do **NOT** send parameter names in URL Parameters. AJAX Revolution does not distinguish these and will make them part of the value. This is also not considered SEO Friendly. 

#### To retrieve URL Parameters

There are two ways to retrieve your URL Parameter values. You may do this using our convenience Snippet getURLParameters, or you may get them manually in any of your Snippets.

##### In a Resource, Template or Chunk

*  `[[!getURLParameters]]` - This will get the Parameters and place them in placeholders named `param.#` where number is the order of the parameter. (starts at 0)
*  `[[+param.0]]` gets the value of the first URL Parameter
*  `&prefix` - This allows you to change the prefix from `param` to one of your choice. Do not include the `.`, as getURLParameters handles this for you.
*  `[[+prefix.2]]` gets the value of the third URL Parameter with a custom prefix

##### In a Snippet

*  Add the following lines to the top of your Snippet:

`// Initialize System Settings`  
`    $paramsKey = $modx->getOption('key_params', null, 'url_params');`  
`// Get the Parameters from Request Array`  
`    $params = $_REQUEST[$paramsKey];`  

*  Now, you may access a given value with

`    $params[#] // <-- Set # to the number of the parameter to retrieve`  

This will allow you to access the parameters within the current Snippet. (Alternatively, you may use `[[!getURLParameters]]` and pass them to any Chunk or Snippet.

### System Settings *(Configuration)*
---
AJAX Revolution is highly configurable for both security and compatibility. This allows you to have different settings on a per Context or even per User basis. System Settings are in the Namespace "AJAX Revolution"

#### Aliasing

* `alias_ajax_page` - This allows you to change the path segment that separates the page URL from the URL Parameters. This does not really affect security, but allows you to avoid conflicts as necessary
* `alias_degrade` - This allows you to change the path segment that both indicates that a page must be degraded gracefully and separates the page URL from the URL Parameters. 

#### $_REQUEST Keys

* `key_request` - Perhaps the most important, as it tells all related Plugins which page is being requested. It is recommended to change this setting immediately after installation.
* `key_params` - Another important setting, as this is how getURLParameters and your Snippets will retrieve URL Parameters. For security, it is also recommended that you change this immediately after installation.
* `key_degrade` - This setting is provided to avoid potential conflicts. This simply indicates to onDegradeGracefully where to check if the Template needs to be switched.
* `key_found_resource` - For compatibility, this will indicate to any subsequent Custom Aliasing script that the Resource has been found and it should not try to find another.

#### Templating

* `degrade_to_template` - This setting controls which Template is used if the AJAX Page needs to be fully degraded.

### Components
---
There are 4 Plugins, 1 Template, 1 Chunk, and 1 Snippet. The Plugins are required and probably should not be modified in any way, except to change Priorities to allow for other Plugins using the OnPageNotFound System Event. Their own order is required, so OnGetRequestType must be before OnParseURLParameters which must be before OnNoCustomAlias. If you have Custom Aliasing Plugins, you should place their priority between OnParseURLParameters and OnNoCustomAlias.

#### Plugins

* OnGetRequestType - Separates the actual URL from the URL Parameters and determines if the page should be degraded.
* OnParseURLParamets - Simply parse the Parameters from OnGetRequestType and places them in the $_REQUEST array.
* OnNoCustomAlias - If the document has not been found by another Custom Alias plugin, it finds it using the current URL.
* OnDegradeGracefully - Fires on OnLoadWebDocument and OnLoadWebCache. If the Template needs to be switched, this changes the Template (without saving) and reforwards to the same page.

#### Templates

* AJAX Partial HTML - This is a convenience Template. It is not required for the addon to work. It simply provides a Template that does not wrap the content with HTML.

#### Chunks

##### `[[$lazyLoader]]`
LazyLoader is a convenience jQuery Chunk that allows you load an AJAX Partial HTML page into an HTML element specified by its CSS Selector. The LazyLoader also allows for pre-hooks and post-hooks so that you may perform additional processing before or after the page has been altered with the results. Simply place a LazyLoader call after the element you wish to lazily load. Hint: Inside the element, you may have a link to the full page, for easy graceful degradation.

###### LazyLoader Properties
* &fromURL - **(required)** This is the actual URL to lazy load. 
* &toSelector - **(required)** This is the CSS Selector of the element to place the page in.
* &preSuccess - A chunk (with JS only)or pure JS to run after the AJAX page is received, but before it is added to the current resource.
* $postSuccess - A chunk (with JS only) or pure JS to run after the AJAX page is received and added to the current resource.
* &preError - A chunk (with JS only) or pure JS to run after the AJAX page has failed, but before the error is added to the current resource.
* $postError - A chunk (with JS only) or pure JS to run after the AJAX page has failed and the error has been added to the current resource.

###### Example:
* `[[$lazyLoader? &fromURL=`[[~[[15]]]]/[[++alias_ajax]]/` &toSelector=`#MyDiv`]]` 

#### Snippets

* getURLParameters - Allows you to get the URL Parameters without having to get your own Snippet.

### Compatibility
---
This is compatible with all of my Tutorials, and future Custom Alias addons. In order to maintain compatibility, it will automatically adjust the priorities of all potentially conflicting OnPageNotFound Plugins on both Install and Uninstall. Below are known to be compatible with this addon.

* Articles
* Archivist
* Template Toolkit
* Clean Extensions
* Cross-Context Aliases
* Ringo (in development)