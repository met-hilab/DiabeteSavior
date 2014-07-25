#Type II Diabetes Management System

---
## DISCLAIMER
** The patient records in this system are simplified simulations of Electronic Health Records (EHRs) for research and teaching purpose only. They are different from EHRs and do not comply with HIPAA. All patient data are fictional and no actual patient data are used. **

---

## Development
The system use CakePHP 2.4.1 as the framework to implement. For developers may refer to [CakePHP web site](http://book.cakephp.org/2.0/en/index.html)

## For frontend designers
You can find view files from the path of `app/View/[CONTROLLER_NAME]/[ACTION_NAME].ctp`

### SASS
We use [SASS](http://sass-lang.com) to organize stylesheets, [compass](http://compass-style.org) configuration file (`config.rb`) had already been setup.

Using the command:

```
$ compass watch
```

Will start monitoring `sass/*.scss` and put the compiled CSS file to `app/webroot/css/*.css`
SASS files with a prefiex underscore (_) will be treated as a partial file to be used in other SASS files and will not be compiled into a standalone file.

### Backbone.js
We're plaing to adapt backbone.js as the frontend MV* framework.

### Angular.js
Some sections of website need a rich frontend but not really backend related (e.g. calculator pages) will use Angular.js to handle MV binding.

## How to use
