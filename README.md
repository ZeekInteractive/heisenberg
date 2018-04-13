# Heisenberg - Zeek Starter Theme

A minimalistic WordPress starter theme, based on <a href="http://underscores.me/">Underscores</a> and Foundation for Sites, version ^6.4.3.

## Prerequisites
* Node.js 9.x and npm 5.x

## How to get started
1. Clone or [download](https://github.com/ZeekInteractive/heisenberg/archive/master.zip "Download the Heisenberg Zip") the project onto your `themes` directory `(./wp-content/themes)`
2. Run a find for the string/slug `heisenberg` throughout the theme and replace it with your project name.
3. Run `npm install`
4. (optional) Copy the `variables.sample.env` file and name it `variables.env` to override some development variables 
5. Run `npm start`.

## Webpack
The theme uses Webpack as its bundler with ES6 modules for JavaScript files.

## Deployment
```bash
npm run build
```
This will run both a production and development set of webpack tasks. The enqueue hook will load the correct version of the JS file, based on whether your development/staging server contains the `SCRIPT_DEBUG` set to `true`.

## Foundation

### How to use the Foundation JS files
The theme uses ES6 Modules, so use the existing `foundation.js` file as a guide to bring in additional Foundation JS modules. There is an existing module included as an example (Tabs).

### How to use the Foundation Sass files
Using the `_settings.scss` file, you can overwrite a Foundation default style before things get compiled, thereby making your final CSS lighter.  To do so, find the variable in the file, uncomment it, and set the value you desire.  The file is located in `./assets/sass`.

Also, in the `app.scss` file, you can remove a Foundation CSS module by commenting out the associated mixin. For instance, if your project doesn't use Foundation's Orbit module, simply comment out the `@include foundation-orbit` mixin and the code will never reach your final `app.css` file.

Be sure to check <a href="http://foundation.zurb.com/sites/docs/sass.html" title="Zurb Foundation documentation on using Sass">Foundation’s docs on using Sass</a> and their mixins for custom control on styles.

## History

This project is based off of Automattic's `_s` project, based on the distribution zip
generated off of commit [`f6ddaaa21ef562fe85881f7e3cc5bdd1e592bb0e`](https://github.com/Automattic/_s/tree/f6ddaaa21ef562fe85881f7e3cc5bdd1e592bb0e).
