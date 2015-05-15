# Default LastAutoIndex Theme
This theme is designed to help you become familiar with how LastAutoIndex works.

I have taken the time to write various PHPDoc comments in class files and tried
to keep everything else well commented too. Please take the time to read them
and make yourself familiar with them if you plan on modifying or extending this
theme.

### Awesomeness Baked In
This theme uses some pretty awesome things, here are some of them:

- Semantic UI
- Highlight.js
- Mousetrap.js
- Webicons
- Font Awesome
- Modernizr

### File System &amp; Page Generation
In this theme there are 5 important parts to generate a page:

- Templates
- Includes
- Layouts
- Contents
- Assets

**A template file** decides which layout to use based on the type of content
that is being requested. A template file will typically have no HTML or very
little HTML, but should get all the necessary includes for the page.

**A include file** adds functionality to a page and should have no output unless
a function or method is called in a template, layout, or content file. Include
files are usually used for API classes and libararies, but can be used for
anything related to functionality.

**A layout file** decides where sidebars and other content is inserted. Layout
files should usually have a fair or large amount of HTML content, as well as a
few functionality calls; such as calling a comments thread or specific form to
be generated. The header and footer is usually inserted via the layout file.

**A content file** generates a group of elements and often has functionality
calls for specific elements, such as dynamic text and images. Content files
typically output the most text, and usually have a large amount of HTML.

**Assets** are typically static files that are commonly used. These files are
usually images, stylesheets, fonts, and javascript files, and might also
include other files that need to be precompiled before they can be used. (such
as LESS and SASS/SCSS files)
