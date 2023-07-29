# Setup
- `nvm use 12`

## JointsWP Requirements
JointsWP requires [Node.js](https://nodejs.org). Currently using Foundation 6.5.3.

### Watching for Changes
```
npm run watch
```
* Watches for changes in the `assets/scss/scss` directory. When a change is made the SCSS files are compiled, concatenated with Foundation files and saved to the `/public/css` directory.  
* Watches for changes in the `assets/js` directory. When a change is made the JS files are compiled, concatenated with Foundation JS files and saved to the `/public/js` directory.  

## Compile and Minify All Theme Assets
```
npm run prod
```
Compiles and minifies all scripts and styles.


## Compile Gutenburg Block scripts
```
npm run build:scripts
```
Uses the Wordpress compiler to convert React code to ES5 compatable scripts to run on the admin and front end.

## Modifying custom fields
This theme is dependend on the ACF plugin.
ACF settings can be modified in the admin. All changes there should be commited to this theme under `/includes` so your future self has access to the field settings.