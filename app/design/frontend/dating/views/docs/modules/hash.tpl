{include file=$sidebar}
{include file=$layout}
    
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
        Therefore, you should not use this function to encrypt any data that you need raw access to, such as when displaying data to a user in the browser, or passing data to other parts of the program or to third party APIs. Good examples of when to use this function for storing passwords securely into a database, or any other data integrity checks that are run in the background.
    </p>
    
    <h4>Usage</h4>
    <p>
        To hash a password (or other data), the encrypt method is used. The encrypt() method expects one parameter, the data to be encrypted, and two optional parameters: <samp>$cost</samp> and <samp>$algo</samp>.<br>
        <code>$this->toolbox('hash')->encrypt($data, $cost, $algo)</code>
    </p>
    <p>
        <code>$cost</code> is an integer which denotes the algorithmic cost that should be used. A higher value generates a more secure hash, at the expense of more computational power. Valid cost values range from 1 -32; by default, it is set to 10 by PHP. A reasonable value for most machines is between 8 - 15. Keep in mind that higher values increase processing time exponentially; increasing the default value of 10 to a new value of 12 could possibly increase processing time by seconds, rather than milliseconds, so be mindful of server resources. <br>
        For most situations, the default value of 10 should be just about right, so we'd recommend only increasing this value for very sensitive data. Again - this is one way encryption, so using the Hash module may not be suitable for some situations. A two-way encryption module will be included in a future update that is better suited for more general use. Until that is available, you may wish to either serialize data or use the already available PHP encryption functions.
    </p>
    <p>
        <code>$algo</code> is the encryption algorithm to use. We highly recommend leaving this on the <samp>PASSWORD_DEFAULT</samp> setting. If you wish to use a different algorithm, view the <a href="http://php.net/manual/en/function.password-hash.php" target="_blank">password hashing in PHP</a> documentation for available options.
    </p>
    <p>
        Let's take a quick look at the code used to hash data:
<pre class="prettyprint">
// You should always use the Sanitize module when handling user submitted data
// For clarity, we will just use $_POST directly 
$data = $_POST['password'];

// $hash now contains the encrypted data
$hash = $this->toolbox('hash')->encrypt($data);

// If we wanted to create an even more secure hash,
// we can pass the cost value as the second parameter of encrypt()
$hash = $this->toolbox('hash')->encrypt($data, 12);

// Now that we have the hashed data, it can be passed to a model for storage
return $this->model('User')->update_password($hash);
</pre>
    </p>
    <p>
        When verifying that the submitted password matches the hash created above, the verify() method is used. As an example, we will check the password submitted from a login form where a username and password is requested:
    </p>
    <p>
    <div class="console">
    {literal}
        # Again, use Sanitize module when dealing with data. <br>
        # Additionally, this SQL query should be stored in a model, not in the controller<br><br>
        # Fetch the password field<br>
        $query = "SELECT password FROM users WHERE username = ? LIMIT 1";<br>
        $result = $this->db->prepare($query);<br>
        $result->execute( array( $_POST['username'] ) );<br><br>
        
        
        if( $result ) {<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;# Query was successful<br>
        &nbsp;&nbsp;&nbsp;&nbsp;$storedpassword = $result['password'];<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;# Check the submitted password matches the password hash stored in the database<br>
        &nbsp;&nbsp;&nbsp;&nbsp;# The below will return either TRUE or FALSE<br>
        &nbsp;&nbsp;&nbsp;&nbsp;return $this->toolbox('hash')->verify($_POST['password'], $storedpassword);<br>
        }<br>
        else {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;echo 'Invalid username';<br>
        }<br>
        {/literal}
    </div>
    </p>

{include file=$layout_close}