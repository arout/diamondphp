{include file=$sidebar}
{include file=$layout}

<p>
	<legend>Introduction</legend>
	Removal of unwanted HTML and script tags, otherwise commonly referred to as "data sanitization", is an important part of keeping your site protected from XSS and CSRF attacks. By allowing items like <samp>&lt;script&gt;</samp> tags to be submitted by users, you are vulnerable to malicous code being injected into your site.
</p>

<p>
	However, there are many legitimate reasons to allow the submission of certain HTML elements in your forms, especially text formatting HTML tags (p, em, ul, ol, h1, and so on) and other common items.
</p>

<p>
	The purpose of the Sanitize helper is to give you control over what is and is not allowed to be <em>safely</em> submitted. It is important to note that this does not replace the <a href="{$smarty.const.BASE_URL}documentation/modules/validation" target="_blank">form validation helper</a>, but is designed to be used <em>along with</em> the validation helper. No form validation is performed or supported in the Sanitize helper.
</p>

<p>
<h4>Note</h4>
<ul>
	<li>
		The Sanitize and Validation helpers share similar methods for stripping out unwanted characters:<br>
		Sanitize helper has the <code>xss()</code> method, and Validation helper contains the <code>xss_clean()</code> method.<br>
		The difference between the two is that the Validation's xss_clean() method strips away <em>everything</em>, regardless of any settings in the configuration file. The Sanitize's xss() method will allow you to control what gets stripped out.<br>
		Generally, you will want to rely on the Validation helper's xss_clean() method; and only use the Sanitize's xss() method when you have a specific reason to allow tags to be submitted.<br>
		If for some reason the two methods were to be used together (this should never occur - use one or the other), the Validation helper's xss_clean() method will override the xss() method, resulting in everything being stripped.
	</li>
</ul>
</p>

<p>
	<h2>Default Settings</h2>
	Some default settings are applied within the environment <code>.env</code> configuration file. These settings will be discussed further below.
</p>

<p>
	<h2>How to use</h2>
	Call the sanitize helper from within your controllers, using the following syntax:<br>
	<code>$this->toolbox('sanitize');</code>
</p>

<p>
	<h2>Available Methods</h2>
</p>

	<legend>xss</legend>
<p>
	The <code>xss()</code> method will likely be the most used method of the Sanitize helper. As mentioned in the note above, <code>xss()</code> strips away unwanted characters, and also gives you the option to allow specific characters.
</p>

<p>
	The method accepts two parameters:<br><br>
	<strong><var>$data</var></strong> <span class="red">(required)</span>: the data to be processed; typically a POST form submission. This can be either a string or an array. This parameter is required.<br><br>
	<strong><var>$allowable_tags</var></strong> <span class="green">(optional)</span>: the tags that you want to allow to be submitted. All other tags not specified in this list will be discarded. This parameter is optional.<br>
	If this parameter is not set, then it will use the <strong>'inbox_allow_formatting'</strong> configuration setting from the global <code>.env</code> file to determine what to allow. If this setting is set to "FALSE", then no tags will be allowed. If set to true, it will allow the following list of HTML text formatting tags:<br><br>
	<samp class="red">&lt;pre>&lt;code>&lt;var>&lt;samp>&lt;strong>&lt;em>&lt;u>&lt;i>&lt;b>&lt;s>&lt;sub>&lt;small>&lt;h1>&lt;h2>&lt;h3>&lt;h4>&lt;h5>&lt;h6>&lt;p>&lt;div>&lt;blockquote>&lt;ol>&lt;ul>&lt;li></samp><br><br>
	To use this parameter, pass a string containing the <em>opening tags</em> of each HTML element that you wish to allow:
</p>

<pre class="prettyprint">
// Store the form in the $data variable
$data = $_POST;

// We aren't specifying any tags here, 
// so it will fallback to the configuration settings
$sanitized = $this->toolbox('sanitize')->xss($data);

// If we wanted to specify allowable tags,
// we would do it like this instead
$allowable_tags = '&lt;div>&lt;p>&lt;strong>&lt;em>&lt;h1>';
$sanitized = $this->toolbox('sanitize')->xss($data, $allowable_tags);
</pre>

<p><hr></p>

	<legend>allow_format</legend>
<p>
	The <code>allow_format()</code> method is essentially a shortcut to the <code>xss</code> method. The only difference is that it only accepts one parameter, and you cannot specify the allowable tags - it automatically allows all of the HTML text formatting tags listed above in the XSS section. 
</p>
<p>
	The parameter passed to this function can only be a string: 
</p>

<pre class="prettyprint">
// Get some information from the database
$article_id = 123;
$query = "SELECT posts FROM blogs WHERE article_id = ?";
$posts = $this->db->prepare($query);
$posts->execute([$article_id]);

// Initiate Sanitize helper
$sanitize = $this->toolbox('sanitize');

// Loop through database results
foreach( $posts as $post )
{
	echo $sanitize->allow_format( $post );
}
</pre>

<p>
	As you can see from the code sample above, the <code>allow_format()</code> method's main usage is to format <em>existing</em> data, rather than processing incoming data. See the <code>clean()</code> method below if you wish to specify allowable tags.
</p>
<div class="alert alert-warning">
	Do not print data directly from your controllers or models. Instead, use your controller to assign the data to a Smarty variable, and print the variable from your template files. The above code was written as a demonstration on using the allow_format() method only.
</div>

<p><hr></p>

	<legend>clean</legend>
<p>
	The <code>clean()</code> method is exactly the same as the <code>allow_format()</code> method above, except that it restores the abilility to define allowable tags (as described in the <code>xss</code> section).
</p>
<p>
	The reason both of these methods exist is because <code>allow_format</code> is intended to be a quick shortcut to allowing all common HTML formatting tags, without needing to pass along (and possibly overlook) all of the required tags in the second parameter.<br>
	<code>clean</code> exists in case there are technical reasons where it may not be desirable for your application to parse specific tags, or if specific tags conflict with the layout of your site.
	<br>Generally, you should use <code>allow_format</code>, and only use <code>clean</code> to filter out any problematic tags (if found) if using <code>allow_format</code> causes issues.
</p>

<p><hr></p>

	<legend>file</legend>
<p>
	The <code>file()</code> method should be used <em>every time</em> you allow file uploads. This method protects you from common file exploits that result in security issues and other problems:
	<ul>
		<li>Replaces whitespace with dashes in the filename</li>
		<li>Removes special characters that are illegal in filenames on certain operating systems and special characters requiring special escaping to manipulate at the command line.</li>
		<li>Replaces spaces and consecutive dashes with a single dash</li>
		<li>Trim period, dash and underscore from beginning and end of filename</li>
	</ul>
</p>
<p>
	The parameter passed to this function can be either the file name from data already sanitized by the <code>xss()</code> method, or an existing file: 
</p>

<pre class="prettyprint">
// Initiate Sanitize helper
$sanitize = $this->toolbox('sanitize');

//** Sanitizing an uploaded file **//
$file = $this->toolbox('sanitize')->file($_FILES['my_uploaded_file']['name']);

//** Sanitizing an existing file **//
// Get the file
$file = 'file.txt';
// Then simply use $file_name as the name of the file
// for further processing / saving
$file_name = $this->toolbox('sanitize')->file($file);

</pre>

{include file=$layout_close}
