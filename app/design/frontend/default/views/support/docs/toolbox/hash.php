<div class="white-row styleSecondBackground">
    
    <div class="row">
        <div class="col-xs-12 text-center"><h1><i class="featured-icon fa fa-crosshairs"></i> Encryption Helper</h1></div>
    </div>
        <div class="clear"></div>
        <p class="text-center">
	The Encryption helper uses PHP's built-in password_hash() function to encrypt and salt important data.
        </p>
</div>

<h1 class="text-center">Use it: <code>$this->toolbox('hash')</code></h1>

<div class="white-row">
    
    <legend>Syntax and Usage</legend>
    <p>
        The Encryption helper's main purpose is to hash and salt passwords by implementing PHP's password_hash() function 
        (available in PHP 5.5 and up) -- however, it can be used to do encrypt other data as well.
    </p>
    <h4>Note about encryption</h4>
    <p>
        Please note that before using this function to encrypt your data, it is important to first understand that it only 
        provides one way encryption; that is, you will not be able to retrieve the raw data once it has been encrypted. This
        helper only returns a boolean response ( <code>TRUE or FALSE</code> ). This behavior is intentional. The purpose of PHP's
        password_hash() function is to make passwords stored in databases as difficult as possible to recover in the event that
        the database has been compromised by malicious code or users. Consider the below example of how the function operates:
    </p>
    <p>
    <table class="table">
        <tr><td>Before encryption:</td><td>secretpassword</td></tr>
        <tr><td>After encryption:</td><td><code>$2y$10$dFnSFUnDV/CkYJo/aYjC6ucJtJuVl6.PYTwGDBNj7/Ck3kBKzq.cy</code></td></tr>
    </table>
    </p>
    <p>
        After "secretpassword" has been encrypted, the resulting hash will be processed by the algorithm to verify that 
        the submitted password matches the hash; then returns true or false depending on the result of the check, each time 
        you check the submitted password.
    </p>
    <p>
        Therefore, you should not use this function to encrypt any data that you need raw access to, such as when displaying data to
        a user in the browser, or passing data to other parts of the program or to third party APIs. Good examples of when to use 
        this function for storing passwords securely into a database, or any other data integrity checks that are run in the background.
    </p>
    
    <h4>Usage</h4>
    <p>
        To hash a password (or other data), the encrypt method is used. The encrypt() method expects two parameters, the data to be
        encrypted, and a key to identify the data internally.
    </p>
    <p>
        <code>$this->toolbox('hash')->encrypt('secretpassword', 'password')</code><br>
        <em>* Note that the second parameter ('password' in the example above) is for system use only; you will not need to refer
        to it in the verification process.</em>
    </p>
    <p>
        When verifying that the submitted password matches the hash created above, the verify() method is used. As an example, we 
        will check the password submitted from a login form where a username and password is requested:
    </p>
    <p>
    <div class="console">
        # Fetch the password field<br>
        $query = "SELECT password FROM users WHERE username = ?";<br>
        $result = $this->db->prepare($query);<br>
        $result->execute( array( $_POST['username'] ) );<br><br>
        
        
        if( $result ) {<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;# Query was successful<br>
        &nbsp;&nbsp;&nbsp;&nbsp;$storedpassword = $result['password'];<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;# So check the submitted password matches the password hash stored in the database<br>
        &nbsp;&nbsp;&nbsp;&nbsp;# The below will return either TRUE or FALSE<br>
        &nbsp;&nbsp;&nbsp;&nbsp;return $this->toolbox('hash')->verify($_POST['password'], $storedpassword);<br>
        }<br>
        else {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;echo 'Invalid username';<br>
        }<br>
    </div>
    
        
    </p>
</div>

<?php $this->view('support/helpers'); ?>