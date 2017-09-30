<style type="text/css" media="screen">
	.under-maintenance {
		background-image: url("{$smarty.const.BASE_URL}media/images/Website-Maintenance.jpg");
		height: 400px;
		background-repeat: no-repeat;
		margin-left: auto;
		margin-right: auto;
	}
</style>

<div class="main col-md-6 col-md-offset-3">
    <h1 class="title text-center">Down for maintenance</h1>
	<div class="container under-maintenance"></div>
    <p class="alert alert-info">
    	We are currently performing upgrades and maintenance on our system, and will be back online shortly.
    </p>
    <p class="lead">
    	Please check back soon, this shouldn't take long. If you need to contact us immediately, you can <a href="{$smarty.const.BASE_URL}contact/support">email support</a>{if $phone} or give us a call at <a href="tel:{$phone}">{$phone}</a>{/if}.
    </p>
</div>
