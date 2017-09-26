{nocache}
<section class="box-style-1 object-non-visible animated object-visible rotateIn" data-animation-effect="rotateIn" data-effect-delay="2900">
<blockquote>Google reports that 1 in 10 online searches are dating related.</blockquote> 
<p class="lead">The problem? Most online dating sites cater to people looking for love, yet the majority of people want sex, even those who are married. Fox News reports that 70 percent of married men admitted to cheating on their wives. That means that <span class="text-rotator text-default morphext">affairs are in high demand</span> – so what about the women? Statistics found that about 50 to 60 percent of women admitted to having an affair over the course of their marriage. Whether you’re married or single, XXXies is the best place for likeminded adults who are looking for casual sex. Connect with adults in your area looking to hook up both online and off by browsing member profiles and using our unparalleled chat and video profile features. In a world where there are endless websites that advertise you’ll find love, there's only one site you need to find hook ups: XXXies. Sign up for free and see how easy it is to find sex online!</p>
</section>

<div class="text-center container default-bg">
	<h3>Newest Members</h3>
</div>

<div class="section">
    <div class="container">
        <div class="row grid-space-20">
       
            {foreach $data.profiles as $user}   
            <!-- section start -->
            <!-- ================ -->
            <div class="col-md-3" style="height: 320px; margin-bottom: 20px;">
                <div class="box-style-1 gray-bg object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="300">
                    <div class="overlay-container">
                        <img style="height: 180px; margin-right: auto; margin-left: auto;" src="{$smarty.const.USER_PICS_URL}{$user['username']}/{$user['pic']}" alt="">
                        <a href="{$smarty.const.BASE_URL}member/view/{$user['username']}" class="overlay small">
                            <i class="fa fa-plus"></i>
                            <span>View {$user['username']}'s profile</span>
                        </a>
                    </div>
                    <h3><a href="{$smarty.const.BASE_URL}member/view/{$user['username']}">{$user['username']}</a></h3>
                    <p>{$user['headline']}</p>
                    <!-- <a class="btn btn-default" href="{$smarty.const.BASE_URL}friends/request/{$user['username']}">Add Friend</a>
                    <a class="btn btn-default" href="{$smarty.const.BASE_URL}messenger/send/{$user['username']}">Send Message</a>
                    <a class="btn btn-default" href="{$smarty.const.BASE_URL}member/block/{$user['username']}">Block</a>
                    <a class="btn btn-default" href="{$smarty.const.BASE_URL}member/block/{$user['username']}">Report Spam</a></p> -->
                </div>
            </div>
            <!-- section end -->
               
            {/foreach}
        </div>
    </div>
</div>

<hr>

<section class="main-container default-bg">
	<div class="main">
		<div class="container">
			<div class="call-to-action">
				<div class="row">
					<h1 class="title text-center">One In Four Sexual Encounters Start Online</h1>
					Several reports from highly circulated American newspapers including the Boston Herald, the New York Times and the Chicago Tribune have attributed one in every four hookups within North America in 2012 to online dating. As impressive as that number is, it's only a glance at what's to come: Experts in the field of online relations say that dating sites are expected to account for well over half of all hookups by 2017. Browse thousands of member profiles on XXXies in your area and get lucky tonight.
				</div>
			</div>
		</div>
	</div>
</section>

<section class="main-container gray-bg">
	<div class="main">
		<div class="container">
			<div class="call-to-action">
				<div class="row">
					<h1 class="title text-center">Find Action On The Go!</h1>
					Don't have time to sit at a computer and browse profiles? Then don't. XXXies offers a fully functional mobile site. Access everything you need with the convenience of your smart phone. Browse member profiles, contact new single women, and use XXXies to its fullest with the best mobile dating site available.
				</div>
			</div>
		</div>
	</div>
</section>

<section class="main-container default-bg">
	<div class="main">
		<div class="container">
			<div class="call-to-action">
				<div class="row">
					<h1 class="title text-center">Find The Kind Of Girl You've Want.</h1>
					In a survey conducted by GQ Magazine in 2010, it was found that nearly 70% of single men attributed their marital status to the fact that they simply hadn't found someone who suits their liking. Instead of going out to bars and picking up the hottest girls out of a small pool of women, why not increase your chances and find someone you think is attractive from an ocean of females? The more options you have, the better shot you have at finding what you want. And with thousands of new members registering every day, you're options are vast at XXXies!
				</div>
			</div>
		</div>
	</div>
</section>
{/nocache}