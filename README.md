![QUIQQER Bootstrap](bin/img/Readme.jpg)

Bootstrap
========

Bootstrap CSS framework for QUIQQER

Package name:

    quiqqer/bootstrap


Features
--------

- Delivers generated *Bootstrap* file that contains *Unsemantic* grid classes (**bootstrap-unsemantic.css**). 
  Require this file in <head> of your main HTML file if your project uses mixed frameworks. 
 
```html
<link href="{$URL_OPT_DIR}quiqqer/bootstrap/bin/css/bootstrap-unsemantic.css" rel="stylesheet" type="text/css"/>
```


Installation
------------

The package name ist: quiqqer/bootstrap


Mitwirken
----------

- Issue Tracker: https://dev.quiqqer.com/quiqqer/bootstrap/issues
- Source Code: https://dev.quiqqer.com/quiqqer/bootstrap/tree/master 


Support
-------

If you found any flaws, have any wishes or suggestions you can send an email
to [support@pcsg.de](mailto:support@pcsg.de) to inform us about your concerns. 
We will try to respond to your request and forward it to the responsible developer.


Licence
-------

MIT

Usage
---------
If you have to regenerate the **bootstrap-unsemantic.css** file 
use the simple script`generateBootstrapFile.php` in CLI

```bash
# go to the package folder
cd (...)
# run this command
php /scripts/generateBootstrapFile.php
```