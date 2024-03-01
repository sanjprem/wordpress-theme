# WordPress Theme

![WordPress](https://img.shields.io/badge/WordPress-%23117AC9.svg?style=for-the-badge&logo=WordPress&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![Gulp](https://img.shields.io/badge/GULP-%23CF4647.svg?style=for-the-badge&logo=gulp&logoColor=white)
![SASS](https://img.shields.io/badge/SASS-hotpink.svg?style=for-the-badge&logo=SASS&logoColor=white)

This WordPress theme is built with the latest version of Bootstrap (5.3.2), enriched with a vast array of icons, and incorporates Sass for elegant styling. It utilizes Node.js and Gulp 4 for an updated task automation tool. Featuring a dynamic, Browsersync for real-time page refresh system for an enhanced development experience.

## Pre-Requisite

- [Node.js](https://nodejs.org/en/download/ "Node Js")
- [Gulp 4](https://gulpjs.com/ "Gulp")

## Getting Started

1. Clone repository:
   `git clone https://github.com/sanjprem/wordpress-theme.git`

2. Change directory:
   `cd wordpress-theme`

3. Install all dependencies and libraries:
   `npm install`

4. Run Gulp Task:
   - `gulp start` - Initial theme setup to move the bootstrap and vendor files to the /assets folder.

   - `gulp dev`  - Starts a local server with browserSync and hot reloading on changes to files (PHP, SCSS, JS).

   - `gulp build`  - To compile scss to css, minify css and js and build ready for production files in dist folder.

5. Customize:
    - Custom App Style : assets/scss/app.scss
    - Overriding Bootstrap variable: assets/scss/_bootstrap_variable_overrides.scss
    - Custom SCSS: assets/scss/_typography.scss, assets/scss/_features.scss, assets/scss/_main-navigation.scss
    - Custom App Javascript: assets/js/app.js

## License:

This theme is licensed under the MIT License.
