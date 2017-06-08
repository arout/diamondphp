DIAMONDPHP
=============
Diamond PHP is a fully featured web development framework built for PHP 7 and offers extreme performance, a modular architecture, elegant syntax and an easy to use philosophy.

### PROJECT STATUS
Diamond PHP is currently in **ALPHA** stages of development. As such, it is not recommended to use the framework in a production environment yet.
A beta version is scheduled for on March 15, 2017, and a production-ready version 1.0.0 is scheduled for public release on May 15, 2017.

### PHILOSOPHY & GOALS
Like all frameworks, Diamond PHP strives to simplify and speed up the web development process. Where Diamond PHP deviates from most frameworks
is in its emphasis on the *developer*, by creating an extraordinarily easy to learn and easy to use environment -- without sacrificing performance,
features or extensibility. A framework should help a developer by completing common tasks for the developer and providing options for other tasks,
but still being perfectly capable of "getting out of the way" when needed. A framework cannot be all things to all people, so it is important to be
able to *safely* work outside the box with minimal fuss when needed.
We think that you'll find the blazing fast performance, the ultra-light footprint, the comprehensive feature set and the emphasis on ease of use 
to be an indispensable new tool in your web development repertoire.

### FEATURES
* PHP 7.0 compliant
* MVC architecture
* Pimple Dependency Injection
* Composer package management
* Symfony observer/event dispatching
* Smarty 3 template engine
* Large collection of custom developer tools (Geolocation, cronjob management, IP white & black listing, text/date/time formatting, and much more)
* Basic administration panel to build upon and customize
* Built-in login system & session management
* Profile create/edit
* View other member profiles
* Built-in messaging system
* Built-in friend management system
* Responsive theme included with framework

### Documentation
Full and comprehensive documentation is currently in development, and will be available at https://diamondphp.com/documentation

### Installation
1. Create an empty database. Using a tool of your choice (phpMyAdmin, SSH, etc), import the diamondphp.sql file located in the **/var/install** folder.
2. Go to the root directory, where you unpacked the framework. Using Composer, run the command 'composer update'. Get Composer here if you do not already have Composer installed (Composer is required in order to use the framework, and to keep everything up to date): https://getcomposer.org/download/
3. Open the configuration file: [root directory] .env (rename the included .env.example file to .env)
4. Enter your database connection settings on lines 4 - 7
5. Enter your full site URL on line 22 **[site_url=""]**, including protocol (http / https), and append a trailing slash at the end
   *http://www.example.com/*
6. Enter your site or business name on line 23 **[site_name = ""]**
7. Enter your site admin / customer care email address on line 25 **[site_email = ""]**

That's it! If you are installing the framework into a subdirectory, you'll have one more step to complete:

##### IF YOU ARE INSTALLING IN A SUBDIRECTORY
To complete installation in subdirectory, you will need to also update the RewriteBase rule in the provided .htaccess file in the root directory.  Change `RewriteBase /` to `RewriteBase /name-of-your-subdirectory/`


The remaining settings are optional to complete, but is highly recommended to go through them and add/edit as necessary.
