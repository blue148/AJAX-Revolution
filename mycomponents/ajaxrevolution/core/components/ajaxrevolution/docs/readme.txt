
AJAX Revolution
--------------------------------------------------------------------------------
Author: Donald Atkinson (aka Fuzzical Logic) fuzzicallogic@gmail.com
Copyright 2012

Official Documentation:    
    http://rtfm.modx.com/display/ADDON/AJAX+Revolution
Development Blog:          
    http://projects.extendeddialog.com/extended-dialog/ajax-revolution/
Bugs and Feature Requests: 
    https://github.com/FuzzicalLogic/AJAX-Revolution
Questions: 
    http://forums.modx.com



Configuration
-------------------------------------------------
Configuration is managed via the System Settings of your MODx Revolution 
installation. While AJAX Revolution runs out of the box, kindly do yourself a 
favor and change all of the Request Keys in the Settings. (This may also be 
handled via Context or User Settings).

IMPORTANT: DO NOT DELETE THE SYSTEM SETTINGS!



General Usage
-------------------------------------------------
To get URL Parameters without a Snippet:
    [[!getURLParameters]]
        Gets the URL Parameters and sets them to [[+param.#]]
    [[!getURLParameters? &prefix=`ajax`]]
        Gets the URL Parameters and sets them to [[+ajax.#]]
    [[!getURLParameters? &debug=`1`]]
        Gets the URL Parameters, sets them to [[+param.#]] and displays debug text.

To Lazily Load an AJAX Page
    [[$lazyLoader? &fromURL=`/login/` &toSelector=`#AjaxLogin`]]
        Gets the '/login/' as an AJAX call and places the contents in the HTML
        Element with an id attribute of AjaxLogin.
    [[$lazyLoader? &fromURL=`/login/` &toSelector=`#AjaxLogin` &postSuccess=`myFunction();`]]
        Same as above, but runs myFunction() (if defined) after the contents are displayed.
    [[$lazyLoader? &fromURL=`/login/` &toSelector=`#AjaxLogin` &postSuccess=`[[$function]]`]]
        Same as above, but runs the javascript in the function Chunk (if defined) after the 
        contents are displayed.


Additional Notes:
------------------------------------------------
This is made to be fully compatible with Archivist and Articles. As such, it 
will change the priorities of the OnPageNotFound event in all related Plugins, 
including ArchivistFURL and ArticlesPlugin.
