<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Everest Fashion Hub</title>	
	<link rel="icon" href="image/logo.png" type="image/icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<link href="css/style.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body oncontextmenu="return true">

<!-- Navigation-->
<nav class="navbar navbar-expand-sm navbar-dark shadow-5-strong gradient-navbar sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php"> <img class="logo" src="image/logo.png"> </a>
		<h1 class="logo-text"><a href="index.php">Everest Fashion<span>.</span></a></h1>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"> </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<?php if(isset($_SESSION['user_id'])){ ?>
				<li class="nav-active"><a class="nav-link" href="cart.php?user=<?php echo $_SESSION['user_id']; ?>"> Track Order </a></li>
				<li class="nav-active dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="navbarDropdown"><?php echo $_SESSION['fname']; ?><img src="image/user.png" class="img-fluid admin-pic"></a>
	       			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	       				<a class="dropdown-item" href="signup.php">Edit Details</a>
	      				<a class="dropdown-item" href="php/logout.php">Logout</a>
	       			</div>
         		</li>
         		<?php } else{ ?>	
				<li class="nav-active"><a class="nav-link" href="signup.php"> Sign Up  </a></li>
				<li class="nav-active"><a class="nav-link" href="login.php"> Login </a></li>
				<?php } ?>
				<li class="nav-item">
					<form action="php/search.php" method="post">
						<input type="text" name="search_item" class="search-form-alt" placeholder=" Search...">
						<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php
	$show=$_GET["show"];
?>

<section class="terms">

<?php
	if($show=="shipment"){
?>
<div class="container">
	<div class="row">
		<div class="col-12">
 			<h4 class="keyword collapse-alt" data-toggle="collapse" data-target="#shipment">Shipping Information</h4>
 			<hr class="light-100">
 			<div id="shipment" class="collapse show">
 				<h6> Shipping </h6>
 				<p>Everest Fashion Hub aims to deliver your order as quickly as possible. Due to some technical issues, it may take 2-3 business days to deliver your order. We appreciate your patience and always do our best to deliver quickly. </p>
 				<p> Exclusive pieces, limited drops, and other one-off collections may take longer than 2-3 days to deliver, however this is rare. We appreciate your patience! We have an extremely high overall customer service and satisfaction rating for a reason. :) </p>

 				<h6> Returns </h6>
 				<p> Returns are offered within 7 days after product delivery on items that are unworn, unaltered and in new condition with all tags attached.  With the exception of items marked FINAL SALE such as sale items and brown bag items. All sale items are marked as final sale. We can accommodate size exchanges on these items, but we are not able to process any refunds. </p>

 				<p> Please allow 2-3 business days from the date your package arrives to us for your return or exchange to be processed. </p>

 				<p>Please note that return delivery charges are the responsibility of the customer. If a product is defective or received incorrectly, we will be happy to provide a return delivery label.</p>

 				<p>If you wish to exchange items to a different size, we will be happy to process the exchange, so long as the new item is in stock. Customers will need to deliver the exchange back to us to process any exchanges. Once we receive the product, the exchange will be sent free of charge back out to the customer. </p>
 			</div>		
		</div>
	</div>
</div>

<?php } else if($show=="chart"){?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h4 class="keyword collapse-alt" data-toggle="collapse" data-target="#sizechart">Size Chart</h4>
 			<hr class="light-100">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<img src="image/size-chart.png" class="img-fluid">
		</div>
		<div class="col-lg-9">
 			<div id="sizechart" class="collapse show">
 				<table class="table table-striped">
 					<thead class="thead-dark">
 						<tr>
 							<td><b>SIZE</b></td>
 							<td><b>CHEST</b></td>
 							<td><b>LENGTH</b></td>
 							<td><b>SLEEVE (SHORT/LONG)</b></td>
 						</tr>
 					</thead>
 					<tbody>
 						<tr>
 							<td>S</td>
 							<td>
 								<span>36"</span>
 							</td>
 							<td>28"</td>
 							<td>
 								<span>7.25" / 26"</span>
 							</td>
 						</tr>
 						<tr>
 							<td>M</td>
 							<td>
 								<span>40"</span>
 							</td>
 							<td>29"</td>
 							<td>
 								<span><span>7.75"</span></span>
 								<span> / 26"</span>
 							</td>
 						</tr>
 						<tr>
 							<td>L</td>
 							<td>42"</td>
 							<td>30"</td>
 							<td>
 								<span><span>8.25"</span></span>
 								<span> / 26"</span>
 							</td>
 						</tr>
 						<tr>
 							<td>XL</td>
 							<td>48"</td>
 							<td>31"</td>
 							<td>
 								<span><span>8.75"</span></span>
 								<span> / 26"</span>
 							</td>
 						</tr>
 						<tr>
 							<td>XXL</td>
 							<td>52"</td>
 							<td>32"</td>
 							<td>
 								<span>9.25"</span> 
 								<span> / 26"</span>
 							</td>
 						</tr>
 					</tbody>
 				</table>
 			</div>		
		</div>
	</div>
</div>

<?php } else{ ?>

<div class="container">
	<div class="row">
		<div class="col-12">
 			<h4 class="keyword collapse-alt" data-toggle="collapse" data-target="#policies">Privacy Policies</h4>
 			<hr class="light-100">
 			<div id="policies" class="collapse show">
 				<h5>SECTION 1 – WHAT DO WE DO WITH YOUR INFORMATION?</h5>
 				<p>When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address.
 					When you browse our store, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.
 				Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.</p>

 				<h5>SECTION 2 – CONSENT</h5>

 				<h6>How do you get my consent?</h6>


 				<p>When you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.
 				If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.</p>

 				<h6>How do I withdraw my consent?</h6>


 				<p>If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at support@efhub.com.</p>

 				<h5>SECTION 3 – DISCLOSURE</h5>

 				<p>We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.</p>

 				<h5>SECTION 4 – SHOPIFY</h5>

 				<p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell our products and services to you. Your data is stored through Shopify’s data storage, databases and the general Shopify application. They store your data on a secure server behind a firewall.</p>

 				<h6>Payment:</h6>

 				<p>If you choose a direct payment gateway to complete your purchase, then Shopify stores your credit card data. It is encrypted through the Payment Card Industry Data Security Standard (PCI-DSS). Your purchase transaction data is stored only as long as is necessary to complete your purchase transaction. After that is complete, your purchase transaction information is deleted.</p>
 				<p>All direct payment gateways adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, Mastercard, American Express and Discover.</p>
 				<p>PCI-DSS requirements help ensure the secure handling of credit card information by our store and its service providers.
 				For more insight, you may also want to read Shopify’s Terms of Service (<a class="bot-link" href="https://www.shopify.com/legal/terms">https://www.shopify.com/legal/terms</a>) or Privacy Statement (<a class="bot-link" href="https://www.shopify.com/legal/privacy">https://www.shopify.com/legal/privacy</a>).</p>

 				<h5>SECTION 5 – THIRD-PARTY SERVICES</h5>

 				<p>In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.</p>


 				<p>However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.</p>
 				<p>For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.
 				In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.</p>
 				<p>As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act. Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service.</p>

 				<h6>Links</h6>

 				<p>When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</p>
 				<h6>Google analytics:</h6>
 				<p>Our store uses Google Analytics to help us learn about who visits our site and what pages are being looked at.</p>

 				<h5>SECTION 6 – SECURITY</h5>

 				<p>To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed. If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>

 				<h5>SECTION 7 – COOKIES</h5>

 				<p>Here is a list of cookies that we use. We’ve listed them here so that you can choose if you want to opt-out of cookies or not.
 					_session_id, unique token, sessional, Allows Shopify to store information about your session (referrer, landing page, etc).
 					_shopify_visit, no data held, Persistent for 30 minutes from the last visit, Used by our website provider’s internal stats tracker to record the number of visits
 					_shopify_uniq, no data held, expires midnight (relative to the visitor) of the next day, Counts the number of visits to a store by a single customer.
 					cart, unique token, persistent for 2 weeks, Stores information about the contents of your cart.
 					_secure_session_id, unique token, sessional
 					storefront_digest, unique token, indefinite If the shop has a password, this is used to determine if the current visitor has access.
 				PREF, persistent for a very short period, Set by Google and tracks who visits the store and from where.</p>


 				<h5>SECTION 8 – AGE OF CONSENT</h5>

 				<p>By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>

 				<h5>SECTION 9 – CHANGES TO THIS PRIVACY POLICY</h5>

 				<p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.</p>
 				<p>If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</p>

 				<h6>QUESTIONS AND CONTACT INFORMATION</h6>

 				<p>If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at support@efhub.com, ATTN: Compliance.</p>
 			</div>
 		</div>
 	</div>
 </div>

 <div class="container">
 	<div class="row">
 		<div class="col-12">
 			<h4 class="keyword collapse-alt" data-toggle="collapse" data-target="#terms">Terms of Service</h4>
 			<hr class="light-100">
 			<div id="terms" class="collapse">

 				<p><em>We are not responsible for international taxes and duties as well as State and Local taxes accrued for your purchase. Those fees are the the sole responsibility of the customer. In the event of a returned order, duties and shipping fees will not be refunded.</em></p>



 				<p>Everest Fashion Hub reserves the right to solely define and limit, refuse, and/or cancel orders from customers at any time due to:</p>

 				<ul type="disc">
 					<li>An irregular or excessive returns history indicative of “wardrobing;”</li>
 					<li>An irregular or excessive returns history involving worn, altered, laundered, damaged, or missing items; or,</li>
 					<li>Potential fraudulent or criminal activity.</li>
 				</ul>



 				<p>For items returned to Everest Fashion Hub due to an undeliverable address or issues with customs, refunds will be issued for the net price of your item(s) minus the shipping charge. All shipping fees are nonrefundable.</p>

 				<h5>OVERVIEW:</h5>

 				<p>This website is operated by Everest Fashion Hub. Throughout the site, the terms “we”, “us” and “our” refer to Everest Fashion Hub. Everest Fashion Hub offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>

 				<p>By visiting our site and/or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>

 				<p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p>

 				<p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p>

 				<p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell our products and services to you.</p>



 				<h5>SECTION 1 – ONLINE STORE TERMS</h5>

 				<p>You affirm that you are either more than 18 years of age, an emancipated minor, or possess legal parental or guardian consent, and are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations, and warranties set forth in these Terms of Service, and to abide by and comply with these Terms of Service.</p>

 				<p>If you are under 18 years of age, do not access or use this site for any reason. Minors are not authorized to make a purchase without parental consent. Everest Fashion Hub does not take responsibility for purchases made without parental consent by a minor. An unauthorized purchase made by a minor is not considered fraudulent and must comply with the Terms of Service. Everest Fashion Hub will not make exceptions to the Return or Shipping Policies due to unauthorized purchases made by a minor.</p>



 				<h5>SECTION 2 – GENERAL CONDITIONS</h5>

 				<p>We reserve the right to refuse service to anyone for any reason at any time.</p>

 				<p>You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.</p>

 				<p>You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.</p>

 				<p>The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p>



 				<h5>SECTION 3 – ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</h5>

 				<p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk.</p>

 				<p>This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p>



 				<h5>SECTION 4 – MODIFICATIONS TO THE SERVICE AND PRICES</h5>

 				<p>Prices for our products are subject to change without notice.</p>

 				<p>We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.</p>

 				<p>We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</p>



 				<h5>SECTION 5 – PRODUCTS OR SERVICES (if applicable)</h5>

 				<p>Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return only according to our Return Policy.</p>

 				<p>We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor’s display of any color will be accurate.</p>

 				<p>We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited.</p>

 				<p>We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p>



 				<h5>SECTION 6 – ACCURACY OF BILLING AND ACCOUNT INFORMATION</h5>

 				<p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.</p>

 				<p>You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.</p>

 				<p>For more detail, please review our returns policy in the below accordian.</p>



 				<h5>SECTION 7 – OPTIONAL TOOLS</h5>

 				<p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input.</p>

 				<p>You acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.</p>

 				<p>Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s).</p>

 				<p>We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</p>



 				<h5>SECTION 8 – THIRD-PARTY LINKS</h5>

 				<p>Certain content, products and services available via our Service may include materials from third-parties.</p>

 				<p>Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties.</p>

 				<p>We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party’s policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p>



 				<h5>SECTION 9 – USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</h5>

 				<p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, ‘comments’), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments.</p>

 				<p>We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service.</p>

 				<p>You agree when using Everest Fashion Hub Website and any associated platforms including email and social media that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. Everest Fashion Hub reserves the right to cancel accounts, block accounts, and refuse to ship orders due to abuse of these terms.</p>





 				<h5>SECTION 10 – PERSONAL INFORMATION</h5>

 				<p>Your submission of personal information through the store is governed by our Privacy Policy. To view our Privacy Policy, please see above.</p>



 				<h5>SECTION 11 – ERRORS, INACCURACIES AND OMISSIONS</h5>

 				<p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order).</p>

 				<p>We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p>



 				<h5>SECTION 12 – PROHIBITED USES</h5>

 				<p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: <em>(a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet.</em> We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>



 				<h5>SECTION 13 – DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</h5>

 				<p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free.</p>

 				<p>We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable.</p>

 				<p>You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you.</p>

 				<p>You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided ‘as is’ and ‘as available’ for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.</p>

 				<p>In no case shall our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p>



 				<h5>SECTION 14 – INDEMNIFICATION</h5>

 				<p>You agree to indemnify, defend and hold harmless shoploganpaul and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>



 				<h5>SECTION 15 – SEVERABILITY</h5>

 				<p>In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>



 				<h5>SECTION 16 – TERMINATION</h5>

 				<p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.</p>

 				<p>These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site.</p>

 				<p>If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p>



 				<h5>SECTION 17 – ENTIRE AGREEMENT</h5>

 				<p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision.</p>

 				<p>These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service).</p>

 				<p>Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p>



 				<h5>SECTION 18 – GOVERNING LAW</h5>

 				<p>These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of Columbus, Ohio.</p>



 				<h5>SECTION 19 – CHANGES TO TERMS OF SERVICE</h5>

 				<p>You can review the most current version of the Terms of Service at any time at this page.</p>

 				<p>We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>



 				<h5>SECTION 20 – CONTACT INFORMATION</h5>

 				<p>Questions about the Terms of Service should be sent to us at support@efhub.com ATTN: Compliance.</p>
 			</div>
 		</div>
 	</div>
 </div>

<?php } ?>

</section>

<!--- Footer -->

<footer class="bot">
 	<div class="container padding">
 		<div class="row text-center">
 			<div class="col-md-4">
 				<hr class="light">
 				<h6> Service / Hours </h6>
 				<hr class="light">
 				<p> Sunday - Saturday </p>
 				<p> 7am - 9pm </p>
 				<p>All Over Kathmandu</p>
 			</div>
 			<div class="col-md-4">
 				<a href="index.php" class="logo"><img src="image/logo.png" class="logo"></a>
 				<hr class="light">
 				<p> +977 986-008-1869 </p>
 				<p> info@efhub.com.np </p>
 				<p> Kathmandu-05, Nepal </p>		
 			</div>
 			<div class="col-md-4">
 				<div class="container-fluid">
 					<div class="row text-center social">
 						<div class="col-12">
			 				<a href="https://www.facebook.com/weverestfc"><i class="fab fa-facebook"></i></a>
							<a href="https://www.instagram.com/weverestfc/"><i class="fab fa-instagram"></i></a>
							<a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
							<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
						<a href="login.php?user=admin" class="bot-link"><p>Admin</p></a>
						<a href="others.php?show=chart" class="bot-link"><p>Size Chart</p></a>
						<a href="others.php?show=terms" class="bot-link"><p>Policies & Terms</p></a>
						<a href="others.php?show=shipment" class="bot-link"><p>Shipping Information</p></a>
						</div>
					</div>
				</div>
 			</div>
 			<div class="col-12">
 				<hr class="light-100">
 				<h6> Everest Fashion Hub &copy; 2022. All Rights Reserved. </h6>
 			</div>
 		</div>
 	</div>
 </footer>

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-arrow-up"></i></a>

</body>
	<script>
		document.onkeydown=function(e)
		{
			if(event.keyCode==123)
			{
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode=='I'.charCodeAt(0))
			{
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode=='J'.charCodeAt(0))
			{
				return false;
			}
			if(e.ctrlKey && e.keyCode=='U'.charCodeAt(0))
			{
				return false;
			}
		}
	</script>
</html>

