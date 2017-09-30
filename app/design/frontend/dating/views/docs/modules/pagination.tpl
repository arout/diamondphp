{include file=$sidebar}
{include file=$layout}
    {nocache}
<div class="white-row">

<p>
	Paginating data is to break up a large data set into small, manageable chunks. For example, if you have a hundred records to display, rather than displaying all 
	those records onto one page, you would instead break it up into five different pages, each containing 20 records. Each page would then contain links to the next 
	(or previous page). Below is an example of how the pagination links are commonly displayed:
</p>

<ul>
    <li>Data record 1</li>
    <li>Data record 2</li>
    <li>Data record 3</li>
    <li>Etc....</li>
</ul>

<ul class='pagination'>
	<li><a class='current'>1</a></li>
	<li><a class='current'>2</a></li>
	<li><a class='current'>3</a></li>
	<li><a class='dot'>...</a></li>
	<li><a class='current'>8</a></li>
	<li><a class='current'>9</a></li>
	<li><a class='current'>10</a></li>
	<li><a class='current'>Last</a></li>
</ul>

<p>
Creating a script to paginate data isn't terribly complex, but is very tedious. Fortunately, the Pagination helper makes it very quick and simple to paginate 
your data for you.
</p>


<legend>Accessing Pagination Helper</legend>
<p>
The Pagination Toolbox is accessed through your controllers and models, using the following command: <code>$this->toolbox('pagination');</code>
</p>

<legend>Usage Examples</legend>

<p>
The first step when using the helper is to assign it to a variable: <code>$pager = $this->toolbox('pagination');</code><br>

Next, you will need to setup a few configuration options.

	<h4 class="bg10">$url_segment</h4>
	The URL segment used to track the current page number. 
	Use the <a href="{$smarty.const.BASE_URL}support/docs/router">router class</a> to identify the URL segment.<br><br>

	<div class="alert alert-warning"> 
	Note that when using the router url segments, the first segment, <strong>$this->route->request[0]</strong> is always reserved for the controller, 
	and the second segment, <strong>$this->route->request[1]</strong> is reserved for the controller actions. All segments after the 
	controller action are called <em>parameters.</em><br>
	The $url_segment <strong>CANNOT</strong> be set to either of the first two segments ($this->route->request[0] or $this->route->request[1]), 
	it must be the third segment, <strong>$this->route->request[2]</strong> or after.<br><br>
	</div>

	<blockquote>http://shoestore.com/shoes/men/1</blockquote>

	In the above URL, we can set the current page <em>(http://shoestore.com/shoes/men/<strong>1</strong>)</em> to the third url segment:<br>
	
	<code>$url_segment = $this->route->request[2]</code>. <br>
	However, in case it is not set, we want to default to page one, so instead of the above, we assign <var>$url_segment</var> the following value instead:<br>
	<code>$url_segment = (int) (empty($this->route->request[2]) ? 1 : $this->route->request[2]);</code>
	
	<br><br>

	<h4 class="bg10">$per_page</h4>
	Number of records to display per page. This must be an integer.<br>
	<code>$per_page = 10;</code><br><br>

	<h4 class="bg10">$adjacent_links</h4>
	For large data sets that result in many pages, you can specify how many links to previous and next pages to display around the current active page in 
	the pagination bar. See below example. If page 46 is the page currently being viewed, we are displaying links to the three pages preceeding it (43, 44, 45), 
	and the three pages following it (47, 48, 49), by setting <code>$adjacent_links = 3;</code><br>

	<ul class='pagination'>
		<li><a class='current'>First page</a></li>
		<li><a class='current'>43</a></li>
		<li><a class='current'>44</a></li>
		<li><a class='current'>45</a></li>
		<li><a class='dot'><strong>46</strong></a></li>
		<li><a class='current'>47</a></li>
		<li><a class='current'>48</a></li>
		<li><a class='current'>49</a></li>
		<li><a class='current'>Last page</a></li>
	</ul>
	<br>
	The <var>$adjacent_links</var> variable is optional. 
	By default, the system will display up to five adjacent links, depending on the total number of records recieved.
	<br><br>

	<h4 class="bg10">$table</h4>
	The database table name being queried.<br>
	<code>$table = "db_table_name";</code><br><br>

<br>
After the configuration options are set, they are passed to the Pagination helper's pagination() function, as shown below:<br>
<code>$p = $this->toolbox('pagination');</code><br>
<code>$p->paginate( $table, $where = null, $where_values = null, $per_page, $page );</code>
</p>

<p>
<h6>Below is an example script which retrieves city/states from the database.</h6>


<legend>Setting up pagination</legend>

<em><strong>Controller file</strong></em>

<pre class="prettyprint">
$pager = $this->toolbox("pagination");

$url_segment = (int) (empty($this->route->request[2]) ? 1 : $this->route->request[2]);
$per_page    = 20;
# Optional; send to paginate()
$adjacent_links = 3;

# Table being queried; needed to count results
$table = "zips";

//count records
$sql = "SELECT DISTINCT citycode, statecode FROM $table ORDER BY citycode ASC";
$pager->config($sql, $url_segment, $per_page);

$query = $this->db->prepare("$sql LIMIT $pager->startpoint, $per_page");
$query->execute();

foreach ($query as $row)
{
	// Send results to view file
	$data['location'][] = $row;
}

$data['pagination_links'] = $pager->paginate($adjacent_links);

$this->template->assign('data', $data);
$this->template->assign('content', 'geo/index.tpl');
</pre>

<p>&nbsp;</p>

<em><strong>View file</strong></em>
<pre class="prettyprint">
/**
 &nbsp;* $data['location'] is the array created by the query loop in the controller file
 &nbsp;* $data['pagination'] is the pagination links, also created in the controller file
 &nbsp;*/
&#123;foreach $data.location as $city}:
	 &#123;$city.citycode}, &#123;$city.statecode} &lt;br>
&#123;/foreach}

&#123;$data.pagination}
</pre>
</p>

</div>
{/nocache}

{include file=$layout_close}
