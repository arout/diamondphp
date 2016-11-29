<style>
    dt {
        font-size: 1.3em !important;
    }
    dd {
        margin-bottom: 30px;
    }
</style>
<div class="white-row styleSecondBackground">
    
    <div class="row">
        <div class="col-xs-12 text-center"><h1><i class="featured-icon fa fa-strikethrough"></i> String Format Helper</h1></div>
    </div>
        <div class="clear"></div>
        <p class="text-center">
	The Format helper gives you quick access to various time and date functions, as well as a phone number formatter (US phone numbers only).
        </p>
</div>

<h1 class="text-center">Use it: <code>$this->toolbox('formatter')</code></h1>

<div class="white-row">
    <legend>Syntax and Usage</legend>
    <p>
        The Format helper gives you quick access to various time and date functions, as well as a phone number formatter (US phone numbers only). The following methods are available:<br>
    <ul>
        <li><a href="#age">Age calculator</a></li>
        <li><a href="#date">Date and time functions</a></li>
        <li><a href="#phone">Phone number formatting</a></li>
    </ul>
    </p>
</div>

<div class="white-row">
    <p>
        <legend><a id="date" style="text-decoration: none !important; color: inherit;">Date and time formats</a></legend>
        <p>
            All of the date and time functions, with the exception of <var>date_to_timestamp()</var>, expect a Unix timestamp as a parameter. Below is a list 
            of available functions, and sample output of the function.
        </p>
        
        <blockquote>Converting a date to a Unix timestamp</blockquote>
        <p>
            It is not always convenient to store your date / time data in your application as a Unix timestamp, and if you wish to use existing data with these functions, 
            you will need to convert those dates into a Unix timestamp. Use the <var>date_to_timestamp()</var> function to do that for you.
        </p>
        
        <p>
<?php
$date = "2010-12-25";
$timestamp = $this->toolbox('formatter')->date_to_timestamp( $date );
?>
<pre>
### Our date that we wish to convert to a timestamp ###
$date = "2010-12-25";

### Convert the date to timestamp using date_to_timestamp() ###
$timestamp = $this->toolbox('formatter')->date_to_timestamp( $date );

### $timestamp variable returns the following unix timestamp ###
<?= $this->toolbox('formatter')->date_to_timestamp( $date ); ?>


### Now we can pass our timestamp to the other date helpers ###
$this->toolbox('formatter')->datewords( $timestamp )

### Which now gives us the following ###
<?= $this->toolbox('formatter')->datewords( $timestamp ); ?>
</pre>
        </p>
        
        <div class="alert alert-info">
            A shorthand way of doing the <strong>exact same thing as above</strong> is to simply pass the date_to_timestamp() function to the date helper you are using:
        </div>
        <p>
            <code>
                $date = "2010-12-25";<br>
                $this->toolbox('formatter')->datewords( <strong>$this->toolbox('formatter')->date_to_timestamp( $date )</strong> );
            </code>
        </p>
        
        
        <p>
        <legend>Available date / time functions</legend>
        <dl>
            <dt><dfn>date()</dfn></dt>
            <dd><em>Sample output: <code><?= $this->toolbox('formatter')->date( time() ); ?></code></em><br><br>
                <pre>
$timestamp = time();
$this->toolbox('formatter')->date( $timestamp );
                </pre></dd>
            
            <dt><dfn>datereverse()</dfn></dt>
            <dd><em>Sample output: <code><?= $this->toolbox('formatter')->datereverse( time() ); ?></code></em><br><br>
                <pre>
$timestamp = time();
$this->toolbox('formatter')->datereverse( $timestamp );
                </pre></dd>
            
            <dt><dfn>datetime()</dfn></dt>
            <dd><em>Sample output: <code><?= $this->toolbox('formatter')->datetime( time() ); ?></code></em><br><br>
                <pre>
$timestamp = time();
$this->toolbox('formatter')->datetime( $timestamp );
                </pre></dd>
                
            <dt><dfn>datewords()</dfn></dt>
            <dd><em>Sample output: <code><?= $this->toolbox('formatter')->datewords( time() ); ?></code></em><br><br>
                <pre>
$timestamp = time();
$this->toolbox('formatter')->datewords( $timestamp );
                </pre></dd>
            
            <dt><dfn>datewords_no_prefix()</dfn></dt>
            <dd><em>Sample output: <code><?= $this->toolbox('formatter')->datewords_no_prefix( time() ); ?></code></em><br><br>
                <pre>
$timestamp = time();
$this->toolbox('formatter')->datewords_no_prefix( $timestamp );
                </pre></dd>

            <dt><dfn>time()</dfn></dt>
            <dd><em>Sample output: <code><?= $this->toolbox('formatter')->time( time() ); ?></code></em><br><br>
                <pre>
$timestamp = time();
$this->toolbox('formatter')->time( $timestamp );
                </pre></dd>
        </dl>
        </p>

    </p>
</div>

<div class="white-row">
    <legend><a id="age" style="text-decoration: none !important; color: inherit;">Age Calculator</a></legend>
    <p>
        The age calculator takes a given date, and returns the amount of time that has passed since then, in years. The date being passed
        must contain a month, day and year using a dash (-) as a seperator. While the parameters may be passed in any order, i.e, MM-DD-YYYY or YYYY-DD-MM, 
        to ensure 100% accuracy, the order of the date segments should be passed as <strong>YYYY-MM-DD</strong> to the calculator:
        <br><br>
        <code>echo "I am " . <strong>$this->toolbox('formatter')->age(" 1977-02-04 ")</strong> . " years old!"</code><br><br>
        The above code will return the following: <br><br>
    <code><samp>I am <strong><?= $this->toolbox('formatter')->age(" 1977-02-04 "); ?></strong> years old!</samp></code>
    </p>
</div>

<div class="white-row">
    <legend><a id="phone" style="text-decoration: none !important; color: inherit;">Phone Numbers</a></legend>
    <p>
        The PhoneNumber() method will return a properly formatted US phone number regardless of how a user submitted their number. It will return either a seven, ten or 13 digit number,
        depending on whether or not the user included a country and/or area code.
    </p>
    <p>
        The returned number is in the following format:<br><br>
        <code>(123) 456-7890</code>
    </p>
    <h5>Example usage</h5>
    
    <p>
    <pre>
        // Malformed phone number submitted by user -- typically from form data
        $phone = " 1.800.555-4323 ";
        
        // Pass the phone number to the formatter
        $proper_formatting = $this->toolbox('formatter')->PhoneNumber( $phone );

        // Will output the following: 1+(800) 555-4323
        echo $proper_formatting;
    </pre>
    </p>
</div>

<?php $this->view('support/helpers'); ?>