Currently using Foundation 6.5.3.

## JointsWP Requirements
JointsWP requires [Node.js](https://nodejs.org) v6.9.x or newer. This doesn't mean you need to understand Node (or even Gulp) - it's just the steps we need to take to make sure all of our development tools are installed. 

 

## Working with JointsWP
### Watching for Changes
```bash
$ npm run watch
```
* Watches for changes in the `assets/styles/scss` directory. When a change is made the SCSS files are compiled, concatenated with Foundation files and saved to the `/styles` directory. Sourcemaps will be created.
* Watches for changes in the `assets/scripts/js` directory. When a change is made the JS files are compiled, concatenated with Foundation JS files and saved to the `/scripts` directory. Sourcemaps will be created.
* Watches for changes in the `assets/images` directory. When a change is made the image files are optimized and saved over the original image.


## Compile and Minify All Theme Assets
```bash
$ npm run build
```
Compiles and minifies all scripts and styles.

### Compile Specific Assets
* `$ npm run styles` - to compile all SCSS files in the `assets/styles/scss` directory.
* `$ npm run scripts` - to compile all JS files in the `assets/scripts/js` directory.
* `$ npm run images` - to optimize all image files in the `assets/images` directory.

## File Structure - "Where to Put Stuff"

 
## Compile Gutenburg Block scripts
```bash
$ npm run build:scripts
```
Uses the Wordpress compiler to convert React code to ES5 compatable scripts to run on the admin and front end.

## Modifying custom fields
Acf fields can be modified in the admin. All changes should be commited to the repo. Export the PHP and the JSON.
The PHP code which generates the fields is in functions/custom-fields.php
To modify the fields, we need the JSON fields settings found in includes/acf-export...json This file can be imported to make changes to the fields.