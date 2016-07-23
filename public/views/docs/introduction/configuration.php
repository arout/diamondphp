<style>
h4, h5 { text-decoration: underline;  }
blockquote {
    padding: 0px 20px;
    margin: 20px 0 25px;
    border-left: 7px solid #c7081b !important;
    font-size: 19px;
}
</style>

<div class="white-row">
    <fieldset>
    <legend id="" style="width: auto;">Configuring Your New Installation</legend>
    <p>
        Diamond PHP has been designed to minimize the amount of configuration needed for each installation; we like software that 
        works out of the box!
    </p>
    <p>
        Once installation is complete, there is only one more step to take before using the framework. Open the Config.php file, 
        located at <code>app/code/core/config/Config.php</code>, with your favorite text editor.
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
            <li><a href="#phone">Telephone</a></li>
        </ol>

        <ol class="col-xs-6">
            <h5>System Settings</h5>
            <li><a href="#name">Error Logging</a></li>
            <li><a href="#site_url">Error Reporting</a></li>
            <li><a href="#gzip">Gzip Compression</a></li>
            <li><a href="#maintenance">Maintenance Mode</a></li>
            <li><a href="#slogan">Signup Email Confirmation</a></li>
            <li><a href="#system_check">System Startup Check</a></li>
            <li><a href="#template">Template</a></li>
            <li><a href="#db">Time Zone</a></li>
            <li><a href="#email">Two-step login</a></li>
        </ol>
    </div>
    </p>
    <p>
        <div class="alert alert-info alert-dismissable">
            <i class="fa fa-info-circle"></i> Additional settings may be present in the Configuration file that is not yet covered in the documentation. Some of the settings are covered in other areas of the documentation pages.
        </div>
    </p>
    <br>
     <hr>
    <p>
        <blockquote id="site_url"><strong>Site URL</strong> <small><code>$this->setting['site_url']</code> (line 163)</small></blockquote>
        This setting <u>should</u> automatically detect your correct url and http protocal (HTTP / HTTPS); however, if you wish, 
        or are experiencing any problems with the auto detection, you may simply hard code your website URL into this setting 
        (taking care that there are NO trailing slashes at the end of the URL, unless the framework is installed in a subdirectory).<br>
        <h5>Installing in subdirectory</h5>
        There are a couple considerations for installation in subdirectories. If installing a subdirectory (e.g., example.com/subdirectory),
        you must edit a portion of the site url variable. Make the following change from <code>$uri[0][0]</code>  to: <code>$uri[0][1].'/'</code><br><br>
        If you are installing into a subdirectory two or more levels deep, you must manually set the site url:<br><br>
        <code>$this->setting['site_url'] = 'example.com/subdir1/subdir2/';</code><br>
        <em>Be sure to include the trailing slash at the end of the url.</em>
    </p>
    <hr>
    <p>
        <blockquote id="db"><strong>Database Settings</strong> <small>(lines 14 - 17)<br>
        <code>$this->setting['db_host']</code><br>
        <code>$this->setting['db_name']</code><br>
        <code>$this->setting['db_user']</code><br>
        <code>$this->setting['db_pass']</code><br></small></blockquote>
        Enter your database host, database name and user / password here. If you are unsure of these settings, contact your web host.
    </p>
    <hr>
    <p>
        <blockquote id="name"><strong>Company Name</strong> <small><code>$this->setting['site_name']</code> (line 25)</small></blockquote>
        Enter your company or website name on line 29; this is what will appear in various areas of the framework (such as the 
        "From" field in emails).
    </p>
    <hr>
    <p>
        <blockquote id="slogan"><strong>Company Slogan</strong> <small><code>$this->setting['site_slogan']</code> (line 28)</small></blockquote>
        If your company has a slogan, enter it on line 34; otherwise leave it blank.
    </p>
    <hr>
    <p>
        <blockquote id="email"><strong>Email Address</strong> <small><code>$this->setting['site_email']</code> (line 31)</small></blockquote>
        Enter your company's customer service, admin, contact or support email address on line 39.
    </p>
    <hr>
    <p>
        <blockquote id="phone"><strong>Telephone</strong> <small><code>$this->setting['telephone']</code> (line 50)</small></blockquote>
        Enter your company's telephone number on line 50.
    </p>
    <hr>
    <p>
        <blockquote id="template"><strong>Template Name</strong> <small><code>$this->setting['template_name']</code> (line 73)</small></blockquote>
        Changing your website theme is as simple as editing line 73. The name that you enter here is the name of the folder that you 
        store your template assets in inside of the <code>app/design/frontend/</code> directory. For example, the default template that 
        comes with Diamond PHP is located under the <code>app/design/frontend/<strong>default</strong>/</code> directory, so we enter the 
        name "default" on line 73.
    </p>
    <hr>
    <p>
        <blockquote id="gzip"><strong>Gzip Compression</strong> <small><code>$this->setting['compression']</code> (line 99)</small></blockquote>
        Compressing your web pages can greatly reduce bandwidth usage, as well as significantly improving page load times. To enable 
        Gzip compression, set line 99 to <code>TRUE</code>. Take care to read the notes regarding this setting.
    </p>
    <hr>
    <p>
        <blockquote id="maintenance"><strong>Maintenance Mode</strong> <small><code>$this->setting['maintenance_mode']</code> (line 82)</small></blockquote>
        To set your site into maintenance mode (i.e., take your website offline temporarily, typically for hardware or 
        software upgrades, or for other routine website maintenance), edit line 82 to <code>TRUE</code>. This will prevent the 
        public from viewing ALL sections of your website. Don't forget to change it back once you are done!    
    </p>
    <p>
        <div class="alert alert-warning alert-dismissable">
            <i class="fa fa-info-circle"></i> To modify the default Maintenance Mode page, edit maintenance.php in the root directory.
        </div>
    </p>
    <br>
     <hr>
    <p>
        <blockquote id="system_check"><strong>System Startup Check</strong> <small><code>$this->setting['system_startup_check']</code> (line 85)</small></blockquote>
        If there are issues with the site loading incorrectly, or not at all, the framework can run a startup check to evaluate coommon issues. Edit line 85 to <code>TRUE</code>. This will show any issues found at the beginning of the web page. If no issues are found, nothing will be displayed. <br>It is recommended to turn this setting off when not needed. If issues are found, it may display sensitive environment information, which presents a security risk.   
    </p>
    <br><br>
    <p>
        That is it, your installation and configuration is now complete! Head on over the 
        <a href="<?= BASE_URL; ?>documentation" />overview</a> page to get some tips on working with the framework.
    </p>
    </fieldset>
</div>