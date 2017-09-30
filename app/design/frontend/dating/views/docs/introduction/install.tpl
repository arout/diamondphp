{include file=$sidebar}
<div class="col-md-8">

    <legend style="width: auto;">Installation</legend>
    <p>
        Installing DiamondPHP is a very quick and simple procedure. Most people will be up and running in 5 minutes or less!
    </p>
    <strong>1. Create an empty database</strong>
    <p>
        Using a database tool of your choice, create a new database. Once the database is created, import the <code>diamondphp.sql</code> file located in the <var>/var/install directory</var>.<br><br>
        The <code>diamondphp.sql</code> file comes with Geolocation data and is approximately 12.2 MB in size as a result; you may need to increase your POST and Max File Upload settings in your PHP configuration if it is still set to the default 2 MB settings.<br><br>
        <em>If you need to adjust your POST and Max File Upload settings, and are unsure how to do so, contact your web host for information. Some web hosts will provide a control panel or GUI to change PHP settings; others require you to add a php.ini file to your web directory.</em>
    </p>

    <strong>2. Download an unpack the framework</strong>
    <p>
        After downloading the framework, copy the package to the location you wish to install the framework (typically, the root directory of your web server). Unzip the package.
    </p>
    <p>
        Once all the files are unpacked, open a terminal (command prompt for Windows users) and change to the directory where you just unzipped the framework:<br><br><span class="console">cd /path/to/install/directory</span>
    </p>
    <p>
        Run the following command:
    </p>
    <p>
        <span class="console">composer update</span>
    </p>
    <p>
        Composer will then download and install any required files the framework requires. To view what packages Composer is installing, simply open the <code>composer.json</code> file located in the root directory.
    </p>
    <p>
        <div class="alert alert-info">
            Composer needs to be available in your global path in order to run. If you are unable to run the <code>composer</code> command, please visit the <a href="https://getcomposer.org/download/" target="_blank">Composer installation page</a>.
        </div>
    </p>

    <strong>3. Edit the configuration file</strong>
    <p>
        Located in the root directory, you will find a configuration file named <code>.env.example</code>. Rename this file to <code>.env</code>, and then open it in a text editor.
    </p>
    <p>
        You will find that most of the settings are blank, and a few are already filled out. For more information regarding these settings, view the <a href="{$smarty.const.BASE_URL}documentation/introduction/configuration" target="_blank">configuration documentation</a>. Some of the settings are optional, but it is recommended to ensure all are completed.
    </p>
    <p>
        <div class="alert alert-warning">
            There are some settings that are mandatory:<br>
            Database settings, site URL, site name, site email address, time zone and all of the settings that already contain a default value (you may change these if you wish). This information is <strong>not</strong> collected in any way by us, but is necessary for the proper operation of various framework features.
        </div>
    </p>

    <p>
        <strong>If you are installing the framework in the root directory of your server, installation is complete! You may now continue using the framework.</strong>
    </p>
    <p><h3 class="red">If you are installing the framework to a sub-directory, you have one final step</h3></p>

    <strong>4. Installing to a sub-directory</strong>
    <p>
        To complete installation in a subdirectory, you will need to also update the RewriteBase rule in the provided .htaccess file in the root directory. Change the following line: <code>RewriteBase /</code> to <code>RewriteBase /name-of-your-subdirectory/</code>.
        <br><br>Congratulations, installation is now complete!
    </p>
    <div>
    <h4>Note</h4>
        If, after installation, you experience any issues or see a blank white page, re-open the <code>.env</code> configuration file, run the system startup check:<br>
        <code>system_startup_check = "TRUE"</code><br>
        This will look for any common environment issues that may cause errors. Address any issues that it may have indicated, and then re-run the startup check, until no further issues are found. At that point, turn the startup check back off: <br><code>system_startup_check = "FALSE"</code><br>
        If you are still experiencing problems even after the startup check finds no issues, turn on error reporting and error logging in the <code>.env</code> configuration file. Any errors or exceptions should then be displayed in your browser, as well as logged in the <code>system.log</code> file, located in <em>/var/logs</em>.<br><br>
        <p><em>A common issue may be with server file permissions, preventing the framework from reading or writing to important files (especially the Smarty template engine and it's cache directories). If this is the case, the framework likely cannot log the errors to the system logger either. Ensure that all folders have file permissions set to 0755 and all files have write permission 0644.</em></p>
    </div>
    
</div>