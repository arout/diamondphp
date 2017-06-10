{include file=$sidebar}

<div class="white-row">
    <fieldset>
    <legend id="" style="width: auto;">Configuring Your New Installation</legend>
    <p>
        Diamond PHP has been designed to minimize the amount of configuration needed for each installation; we like software that 
        works out of the box!
    </p>
    <p>
        Once installation is complete, there is only one more step to take before using the framework. Rename the file <code>.env.example</code> to <code>.env</code>. This file is located in the root directory, alongside the <var>.htaccess</var> file.
    </p>
    <p>
        This .env file is the main configuration file that will contain many site-wide settings. Throughout the documentation, we may refer to the "configuration file". When we do so, we are talking about this .env file.
    </p>

    <p>
    <div class="row">
        <ol class="col-xs-6">
            <h5>Site Settings</h5>
            <li><a href="#db">Database</a></li>
            <li><a href="#email">Site Email</a></li>
            <li><a href="#name">Site Name</a></li>
            <li><a href="#slogan">Site Slogan</a></li>
            <li><a href="#site_url">Site URL</a></li>
            <li><a href="#emailconfirm">Signup Email Confirmation</a></li>
            <li><a href="#phone">Telephone</a></li>
            <li><a href="#tz">Time Zone</a></li>
            <li><a href="#login">Two-step login</a></li>
        </ol>

        <ol class="col-xs-6">
            <h5>System Settings</h5>
            <li><a href="#path">Controllers / Models Path</a></li>
            <li><a href="#debug">Debug Mode</a></li>
            <li><a href="#defcontroller">Default Controller</a></li>
            <li><a href="#logging">Error Logging</a></li>
            <li><a href="#reporting">Error Reporting</a></li>
            <li><a href="#gzip">Gzip Compression</a></li>
            <li><a href="#maintenance">Maintenance Mode</a></li>
            <li><a href="#architecture">Moving application out of webroot</a></li>
            <li><a href="#system_check">System Startup Check</a></li>
            <li><a href="#template">Template</a></li>
        </ol>
    </div>
    </p>
    <p>
        <div class="alert alert-info alert-dismissable">
            Additional settings may be present in the Configuration file that is not yet covered in the documentation. Some of the settings are covered in other areas of the documentation pages.
        </div>
    </p>
    <br>
     <hr>
    <p>
        <blockquote id="site_url"><strong>Site URL</strong> <small><code>site_url = ""</code> (line 22)</small></blockquote>
        This is the URL of your website. Enter the protocol (http or https), as well as the name of the sub-directory (if applicable).<br>For example:<br><br>http://www.example.com/<br>https://example.com/mysite/<br>
        <strong><em>Be sure to include the trailing slash at the end of the url.</em></strong>
    </p>
    <hr>
    <p>
        <blockquote id="db"><strong>Database Settings</strong> <small>(lines 4 - 7)<br>
        <code>db_host = ""</code><br>
        <code>db_name = ""</code><br>
        <code>db_user = ""</code><br>
        <code>db_pass = ""</code><br></small></blockquote>
        Enter your database host, database name and user / password here. If you are unsure of these settings, contact your web host.
    </p>
    <hr>
    <p>
        <blockquote id="defcontroller"><strong>Default Controller</strong> <small><code>default_controller = "Home"</code> (line 12)</small></blockquote>
        The default controller (e.g., the controller that is triggered when a visitor goes to your site homepage) is set to 'Home' upon installation. Change this setting if you wish to use a different default controller. In effect, going to http://yoursite.com and http://yoursite.com/home will display the same thing.
    </p>
    <hr>
    <p>
        <blockquote id="name"><strong>Company Name</strong> <small><code>site_name = ""</code> (line 23)</small></blockquote>
        Enter your company or website name on line 29; this is what will appear in various areas of the framework (such as the 
        "From" field in emails).
    </p>
    <hr>
    <p>
        <blockquote id="slogan"><strong>Company Slogan</strong> <small><code>site_slogan = ""</code> (line 24)</small></blockquote>
        If your company has a slogan, enter it on line 34; otherwise leave it blank.
    </p>
    <hr>
    <p>
        <blockquote id="email"><strong>Email Address</strong> <small><code>site_email = ""</code> (line 25)</small></blockquote>
        Enter your company's customer service, admin, contact or support email address on line 39.
    </p>
    <hr>
    <p>
        <blockquote id="email"><strong>Admin Controller</strong> <small><code>admin_controller = "Admin"</code> (line 19)</small></blockquote>
        By default, the admin area is located at: http://yoursite.com/admin. If you wish to change the url of the admin area, simply edit this setting.
         Be sure to capitalize the first letter of the controller name.<br>
         <strong>* The name of the admin controller must be unique -- a controller of the same name <u>cannot</u> exist in either the public/controllers/ or the  public/override/controllers directories.</strong>
    </p>
    <hr>
    <p>
        <blockquote id="phone"><strong>Telephone</strong> <small><code>telephone = ""</code> (line 31)</small></blockquote>
        Enter your company's telephone number on line 50.
    </p>
    <hr>
    <p>
        <blockquote id="tz"><strong>Timezone</strong> <small><code>time_zone = "America/New_York"</code> (line 54)</small></blockquote>
        Enter your server timezone here. Default value is <code>'America/New_York'</code>.<br>
        Visit the <a href="http://php.net/manual/en/timezones.php" target="_blank">PHP timezone</a> documentation for a complete list of supported timezones.
    </p>
    <hr>
    <p>
        <blockquote id="reporting"><strong>Error Reporting</strong> <small><code>error_reports = "TRUE"</code> (line 38)</small></blockquote>
        You may control error reporting output to the browser by using a TRUE or FALSE setting.<br>
        <h6>* It is highly recommended to turn error reporting off (E_NONE) on a production server</h6>
    </p>
    <hr>
    <p>
        <blockquote id="debug"><strong>Debug Mode</strong> <small><code>debug_mode = "on"</code> (line 45)</small></blockquote>
        Debug mode is meant to supplement PHP error reporting by giving the developer more precise error messages, specific to issues of the framework, and often will recommend a solution to fix the error. <br>
        While this is a powerful feature, it will reveal sensitive data about your environment. <strong>Be certain to turn debug mode off on a production server.</strong>
    </p>
    <hr>
    <p>
        <blockquote id="logging"><strong>Error Logging</strong> <small><code>log_errors = "TRUE"</code> (line 51)</small></blockquote>
        You can log all server and PHP errors by setting this variable to <code>TRUE</code>. All logs are stored in <code>/var/logs</code>.<br><strong>It is recommended to have error logging enabled on production servers.</strong>
    </p>
    <hr>
    <p>
        <blockquote id="path"><strong>Controllers / Models Path</strong> <small>
        <code>controllers_path = "public/controllers/"</code> <code>models_path = "public/models/"</code>(line 58 & 59)</small></blockquote>
        By default, controllers and models are stored inside the <code>public/</code> folder. Ideally, for security and server maintenance-related reasons, you should store everything except the front controller (index.php file in webroot directory) and template/media files (CSS, JS, images, videos) <strong>outside of your webroot</strong>. There are two options to doing this:
    </p>
    <hr>
    <p id="architecture">
        <div class="alert alert-info"><strong>Moving application files out of webroot</strong></div>

        <h5>1. Via Front Controller</h5>
        This is by far the simplest and most fool-proof method, but may not be possible for some users that do not have access to SSH or a file manager that gives you access to directories above your web root directory (your web root directory is typically named 'public_html', 'www' or 'htdocs' on most Apache servers).<br><br>
        Assuming you have access to those directories, simply follow the below steps:<br><br>
        1. Move all of the following files and folders up one level from your web root:<br>
        <code>app/, public/, vendor/ and var/</code> folders<br>
        <code>composer.json and composer.lock</code> files<br><br>
        2. After moving the above files and folders, go back to your web root, and open up the front controller file (index.php)<br>
        &nbsp;&nbsp;&nbsp;- Find the following constant on line 19: <code>define('BASE_PATH', $dir . '/');</code><br>
        &nbsp;&nbsp;&nbsp;- Change it to the following: <code>define('BASE_PATH', $dir . '/../');</code><br><br>
        That's it, you're done!
        <br><br>
        <h5>2. Via .htaccess</h5>
        1. Create a new folder in your document root directory. Name it "web" (or anything you wish). Then move the index.php, maintenance.php and .htaccess files to your new folder. Next, move the entire <code>media</code> folder to the new folder as well.<br><br>
        2. After moving all of your files, open your .htaccess file and edit the RewriteBase Rule on line 20. Change it from <br><code>RewriteBase /</code> to <code>RewriteBase /web/</code> <em>(Change "web" to whatever you named the new folder if you named it something else)</em>.<br><br>
        3. Open the index.php file located in the new folder you created. Edit line 19: <br><br>
        <code>define('BASE_PATH', $dir . '/');</code>
        <br><br>And change it as follows:<br><br>
        <code>define('BASE_PATH', $dir . '/../');</code><br><br>
        4. Finally, switch back to the original web root (the directory one level above your new folder, which should still contain the 'app', 'public', 'var' and 'vendor' folders). Create a <strong>new</strong> .htaccess file, enter the following and then save:<br><br>
        <code>RewriteEngine On</code><br>
        <code>RewriteCond {literal}%{REQUEST_URI}{/literal} !^/web/</code><br>
        <code>RewriteRule ^(.*)$ /web/$1 [L,R=301]</code><br>
        <em><small>* change /web/ to your new folder name if different</small></em>

    </p>
    <hr>
    <p>
        <blockquote id="template"><strong>Template Name</strong> <small><code>$this->setting['template_name']</code> (line 87)</small></blockquote>
        Changing your website theme is as simple as editing line 73. The name that you enter here is the name of the folder that you 
        store your template assets (CSS, JS, images, etc.) in, inside of the <code>media/</code> directory. For example, the default template that 
        comes with Diamond PHP is located under the <code>media/<strong>default</strong>/</code> directory, so we enter the 
        name "default" on line 73.
    </p>
    <hr>
    <p>
        <blockquote id="maintenance"><strong>Maintenance Mode</strong> <small><code>$this->setting['maintenance_mode']</code> (line 96)</small></blockquote>
        To set your site into maintenance mode (i.e., take your website offline temporarily, typically for hardware or 
        software upgrades, or for other routine website maintenance), edit line 82 to <code>TRUE</code>. This will prevent the 
        public from viewing ALL sections of your website. Don't forget to change it back once you are done!    
        <div class="alert alert-info alert-dismissable">
            <i class="fa fa-info-circle"></i> To modify the default Maintenance Mode page, edit maintenance.php in the root directory.
        </div>
    </p>
    <hr>
    <p>
        <blockquote id="system_check"><strong>System Startup Check</strong> <small><code>$this->setting['system_startup_check']</code> (line 99)</small></blockquote>
        If there are issues with the site loading incorrectly, or not at all, the framework can run a startup check to evaluate coommon issues. Edit line 85 to <code>TRUE</code>. This will show any issues found at the beginning of the web page. If no issues are found, nothing will be displayed. <br>It is recommended to turn this setting off when not needed. If issues are found, it may display sensitive environment information, which presents a security risk.   
    </p>
    <hr>
    <p>
        <blockquote id="emailconfirm"><strong>Signup Email Confirmation</strong> <small><code>$this->setting['signup_email_confirmation']</code> (line 103)</small></blockquote>
        To have an email confirmation sent to the registered address when users complete the signup form, set this value to <code>TRUE</code>. To turn confirmation emails off, set it to <code>FALSE</code>.<br>
        When enabled, users will be registered on your site and their information stored in the 'users' database table, but their account will be flagged as 'unconfirmed' until they follow the link sent in the confirmation email.  
    </p>
    <hr>
    <p>
        <blockquote id="gzip"><strong>Gzip Compression</strong> <small><code>$this->setting['compression']</code> (line 116)</small></blockquote>
        Compressing your web pages can greatly reduce bandwidth usage, as well as significantly improving page load times. To enable 
        Gzip compression, set line 99 to <code>TRUE</code>. Take care to read the notes regarding this setting.
    </p>
    <hr>
    <p>
        <blockquote id="login"><strong>Two-step login</strong> <small><code>$this->setting['login_math']</code> (line 122)</small></blockquote>
        For additional security, a two-step login process is available upon user login. In addition to entering a correct username and password, a user must also enter the correct answer to a simple math problem. Note, the purpose of this module is to deter malware from attempting to implement brute-force attacks or other automated login attempts to a user's account.<br>
        Set this value to <code>TRUE</code> to enable two-step logins, or <code>FALSE</code> to disable it.
    </p>
    <hr>
    <br><br>
    <p>
        That is it, your installation and configuration is now complete! Head on over the 
        <a href="<?= BASE_URL; ?>documentation" />overview</a> page to get some tips on working with the framework.
    </p>
    </fieldset>
</div>