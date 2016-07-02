<div class="white-row">
    
    <legend>Configuring Your New Installation</legend>
    <p>
        kW Fusion has been designed to minimize the amount of configuration needed for each installation; we like software that 
        works out of the box!
    </p>
    <p>
        Once installation is complete, there is only one more step to take before using the framework. Open the Config.php file, 
        located at <code>vendor/Fusion/Config/Config.php</code>, with your favorite text editor.
    </p>
    <p>
        <strong>Site URL</strong><br>
        The first section of interest may be on line 16, the site url ( $this->setting['site_url'] ). This setting <u>should</u> 
        automatically detect your correct url and any subdirectory that you may have installed kW Fusion in; however, if you wish, 
        or are experiencing any problems with the auto detection, you may simply hard code your website URL into this setting 
        (taking care that there are NO trailing slashes at the end of the URL).
    </p>
    <p>
        <strong>Database Settings</strong><br>
        Next is the database connection. Enter your database settings on lines 21 - 24 (see comments next to each field for details).
    </p>
    <p>
        <strong>Company Name</strong><br>
        Enter your company or website name on line 29; this is what will appear in various areas of the framework (such as the 
        "From" field in emails).
    </p>
    <p>
        <strong>Company Slogan</strong><br>
        If your company has a slogan, enter it on line 34; otherwise leave it blank.
    </p>
    <p>
        <strong>Email Address</strong><br>
        Enter your company's customer service, admin or support email address on line 39.
    </p>
    <p>
        <strong>Template Name</strong><br>
        Changing your website theme is as simple as editing line 59. The name that you enter here is the name of the folder that you 
        store your template assets in inside of the <code>public/template/</code> directory. For example, the default template that 
        comes with kW Fusion is located under the <code>public/template/<strong>default</strong>/</code> directory, so we enter the 
        name "default" on line 59.
    </p>
    <p>
        <strong>Gzip Compression</strong><br>
        Compressing your web pages can greatly reduce bandwidth usage, as well as significantly improving page load times. To enable 
        Gzip compression, set line 82 to <code>TRUE</code>. Take care to read the notes regarding this setting.
    </p>
    <p>
        <strong>Maintenance Mode</strong><br>
        To set your site into maintenance mode (i.e., take your website offline temporarily, typically for hardware or 
        software upgrades, or for other routine website maintenance), edit line 93 to <code>TRUE</code>. This will prevent the 
        public from viewing ALL sections of your website. Don't forget to change it back once you are done!
        
    <div class="alert alert-warning alert-dismissable"><i class="fa fa-info-circle"></i> To modify the default Maintenance Mode page, edit maintenance.php in the 
    root directory.</div>
    </p>
    
    <p>
        That is it, your installation and configuration is now complete! Head on over the 
        <a href="<?= BASEURL; ?>support/docs/overview" />overview</a> page to get some tips on working with the framework.
    </p>
</div>