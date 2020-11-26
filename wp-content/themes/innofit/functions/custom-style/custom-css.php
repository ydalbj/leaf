<?php
// define function for custom color setting
function innofit_custom_light() {
	
	$link_color = get_theme_mod('link_color');
	list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
	$r = $r - 50;
	$g = $g - 25;
	$b = $b - 40;
	
	if ( $link_color != '#ff0000' ) :
	?>
<style type="text/css">


/*--------------------------------------------------------------
	Common
--------------------------------------------------------------*/

blockquote { border-left: 3px solid <?php echo $link_color; ?> }


/*--------------------------------------------------------------
5. Forms
--------------------------------------------------------------*/

button,
input[type="button"],
input[type="submit"] {
	background-color: <?php echo $link_color; ?>
}
button.secondary:hover,
button.secondary:focus,
input[type="reset"]:hover,
input[type="reset"]:focus,
input[type="button"].secondary:hover,
input[type="button"].secondary:focus,
input[type="reset"].secondary:hover,
input[type="reset"].secondary:focus,
input[type="submit"].secondary:hover,
input[type="submit"].secondary:focus {
	background: <?php echo $link_color; ?>;
	color: #fff;
}

.btn-default, .btn-animate.light, .btn-animate.dark { background: <?php echo $link_color; ?>; }
.btn-bg-default { background: <?php echo $link_color; ?> !important; }

.btn-border { border: 2px solid <?php echo $link_color; ?>; }
.btn-border:hover, .btn-border:focus { background: <?php echo $link_color; ?>; }


/*--------------------------------------------------------------
	Navbar
--------------------------------------------------------------*/

@media (max-width: 991px) {
	.navbar-custom .nav li.active a, 
	.navbar-custom .nav li.active a:hover, 
	.navbar-custom .nav li.active a:focus,
	.navbar-custom .nav li a:hover {
		color: <?php echo $link_color; ?>
	}
}

/*===================================================================================*/
/*	Woocommerce Header Cart
/*===================================================================================*/

.cart-header > a .cart-total {
	background: <?php echo $link_color; ?>
}

/*===================================================================================*/
/*	Main Slider - Owl Carousel
/*===================================================================================*/

.pointer-scroll { background: <?php echo $link_color; ?> }

/*===================================================================================*/
/*	OWL SLIDER NEXT - PREV BUTTONS
/*===================================================================================*/

.owl-theme .owl-dots .owl-dot.active span, 
.owl-theme .owl-dots .owl-dot:hover span {
	background: rgba(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>);
}

/*===================================================================================*/
/*	Mixed Classes
/*===================================================================================*/

.bg-default { background-color: <?php echo $link_color; ?> }
.text-default { color: <?php echo $link_color; ?> }
.entry-header .entry-title a:hover  { color: <?php echo $link_color; ?> }

/*===================================================================================*/
/*	SERVICE SECTION
/*===================================================================================*/

.services .post:before { border-bottom-color: <?php echo $link_color; ?> }
.services .post-thumbnail a { color: <?php echo $link_color; ?> }

/*===================================================================================*/
/*	About Section
/*===================================================================================*/

.about-thumbnail img { box-shadow: -40px -40px 0px 0px <?php echo $link_color; ?> }
@media (min-width: 768px) and (max-width: 992px) { 
	.about-thumbnail img { box-shadow: -25px -25px 0px 0px <?php echo $link_color; ?> }
}
@media (max-width: 768px) {  
	.about-thumbnail img { box-shadow: -15px -15px 0px 0px <?php echo $link_color; ?> }
}

/*===================================================================================*/
/*	PORTFOLIO FILTERS
/*===================================================================================*/

.portfolio-filters li.active a:before, 
.portfolio-filters li a:before {
	background-color: <?php echo $link_color; ?> 
}

/*===================================================================================*/
/*	Portfolio Section
/*===================================================================================*/

.portfolio .post { background-color: <?php echo $link_color; ?> }

/*===================================================================================*/
/*	SHOP & PRODUCT SECTION
/*===================================================================================*/

.product-price > .woocommerce-loop-product__title a:hover, 
.product-price > .woocommerce-loop-product__title a:focus { 
	color: <?php echo $link_color; ?> 
}


/*===================================================================================*/
/*	WOOCOMMERCE PLUGIN CSS
/*===================================================================================*/

.woocommerce ul.product_list_widget li a:hover, .woocommerce ul.product_list_widget li a:focus, 
.woocommerce .posted_in a:hover, .woocommerce .posted_in a:focus { color: <?php echo $link_color; ?> }
.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.added_to_cart, .woocommerce table.my_account_orders .order-actions .button { color: #fff; }
.woocommerce ul.products li.product .button,  
 .owl-item .item .cart .add_to_cart_button { background: <?php echo $link_color; ?> !important; }
.woocommerce ul.products li.product .button, .woocommerce ul.products li.product .button:hover, .owl-item .item .cart .add_to_cart_button { border: 1px solid <?php echo $link_color; ?> !important; }
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt { background-color: <?php echo $link_color; ?> }
.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
    background-color: <?php echo $link_color; ?>;
    color: #fff;
}
.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.button, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit, .woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus, 
.woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus, 
.woocommerce input.button:hover, .woocommerce input.button:focus, 
.woocommerce button.button:hover, .woocommerce button.button:focus, 
.woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button { 
background: <?php echo $link_color; ?> !important; 
border: 1px solid transparent !important; }
.widget.woocommerce.widget_product_search .woocommerce-product-search button[type="submit"] {
    background-color: <?php echo $link_color; ?>;
    border: 2px solid <?php echo $link_color; ?>;
}
.widget.woocommerce.widget_product_search .woocommerce-product-search button[type="submit"]:hover {
    background: <?php echo $link_color; ?>;
}
.woocommerce-message, .woocommerce-info {
    border-top-color: <?php echo $link_color; ?> !important;
}
.woocommerce-message::before, .woocommerce-info::before { color: <?php echo $link_color; ?> !important; }
.woocommerce a.added_to_cart { background: #21202e; border: 1px solid #ffffff; }
.woocommerce .checkout_coupon input.button, 
.woocommerce .woocommerce-MyAccount-content input.button, .woocommerce .login input.button { background-color: <?php echo $link_color; ?> color: #ffffff; border: 1px solid transparent; }
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
    color: <?php echo $link_color; ?> !important;
    background-color: #fff !important;
    border: 1px solid #f3f3f3;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range { background-color: <?php echo $link_color; ?> !important; }
.add-to-cart a.added_to_cart, 
.add-to-cart a.added_to_cart:hover, 
.add-to-cart a.added_to_cart:focus { 
	background: <?php echo $link_color; ?>;
}
.woocommerce-section {  background-color: <?php echo $link_color; ?> }
.rating li i { color: <?php echo $link_color; ?>; }

.woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .products .onsale { 
    background-color: <?php echo $link_color; ?> ! important;
    border: 2px solid <?php echo $link_color; ?>;
}


/*===================================================================================*/
/*	TESTIMONIAL SECTION
/*===================================================================================*/

.testmonial-block .name > a:hover { color: <?php echo $link_color; ?>; }

/*===================================================================================*/
/*	Subscribe Newsletter
/*===================================================================================*/

.subscribe-form .form-control:focus { border-color: <?php echo $link_color; ?>; }
.sib_signup_form input[type="email"]:focus {
   border-color: <?php echo $link_color; ?>
}

/*===================================================================================*/
/*	PRICING SECTION
/*===================================================================================*/

.pricing-title-bg.default { background-color: <?php echo $link_color; ?>; }
.pricing-plans .price { color: <?php echo $link_color; ?>; }

/*===================================================================================*/
/*	BLOG META
/*===================================================================================*/

.entry-meta a:hover, .entry-meta a:focus, .item-meta a:hover, .item-meta a:focus { color: <?php echo $link_color; ?>; }
.entry-meta .cat-links a, .entry-meta .tag-links a { color: <?php echo $link_color; ?>; }
.entry-meta .cat-links a , .entry-meta .cat-links, .small-social-icon li a:hover, 
.small-social-icon li a:focus{ color: <?php echo $link_color; ?>; }

/*Paginations*/
.pagination a:hover, .pagination a.active, .nav-links .page-numbers.current { color: <?php echo $link_color; ?> }

/*Blog Author*/
.blog-author img {     
	-webkit-box-shadow: 12px 12px 0px 0px <?php echo $link_color; ?>
	-moz-box-shadow: 12px 12px 0px 0px <?php echo $link_color; ?>
	box-shadow: 12px 12px 0px 0px <?php echo $link_color; ?>
}
.blog-author .small-social-icon li a:hover, 
.blog-author .small-social-icon li a:focus {
    color: <?php echo $link_color; ?>
}

.team-grid .social-links li a:hover, .team-grid .social-links li a:focus {
    color: <?php echo $link_color; ?>;
}

/*Comments*/
.reply a {
	background-color: <?php echo $link_color; ?>
    border: 1px solid <?php echo $link_color; ?>
}
.reply a:hover, .reply a:focus { 
	background-color: <?php echo $link_color; ?> 
	border: 1px solid <?php echo $link_color; ?>
}

/*===================================================================================*/
/*	Contact Form 7 & Contact Info Section
/*===================================================================================*/

.contact .subtitle { color: <?php echo $link_color; ?> }
.contact-icon { background-color: <?php echo $link_color; ?> }
.contact-form { border-top: 4px solid <?php echo $link_color; ?> }
.contact-widget address > a:hover, .contact-widget address > a:hover { color: <?php echo $link_color; ?> }  

/*===================================================================================*/
/*	Instagram Gallery Section
/*===================================================================================*/

.insta-btn a, .insta-btn a:hover, .insta-btn a:focus {
    color: <?php echo $link_color; ?>
}
.instagallery-actions .igact-instalink {
    color: <?php echo $link_color; ?>
}
.instagallery-actions .igact-instalink:hover, 
.instagallery-actions .igact-instalink:focus {
	background: <?php echo $link_color; ?>
}

/*===================================================================================*/
/*	PAGE TITLE SECTION 
/*===================================================================================*/

.page-breadcrumb > li a:hover, .page-breadcrumb > li a:focus, .page-breadcrumb > li.active a { color: <?php echo $link_color; ?> }

/*===================================================================================*/
/*	Sidebar & Widgets Section
/*===================================================================================*/

.widget a:hover, .widget a:focus,  
.widget .post .entry-title a:hover, .widget .post .entry-title a:focus { color: <?php echo $link_color; ?> !important; }
.widget .tagcloud a:hover { color: <?php echo $link_color; ?> !important; }

/*===================================================================================*/
/*	Footer Section
/*===================================================================================*/

@media (min-width: 992px){ .site-footer:before { background-color: <?php echo $link_color; ?> } }

/*===================================================================================*/
/*	404 Error Page
/*===================================================================================*/

.error-404 h1 > i { color: <?php echo $link_color; ?>;}

/*===================================================================================*/
/*	Page Scroll Up
/*===================================================================================*/

.scroll-up a:hover, .scroll-up a:focus { background: <?php echo $link_color; ?> }

/* css added by me */

.entry-meta a:hover, .entry-meta a:focus, .item-meta a:hover, .item-meta a:focus {
    color: <?php echo $link_color; ?> !important;
}
.btn-default, .btn-animate.light, .btn-animate.dark { background-color:<?php echo $link_color; ?> !important; }
.btn-default:hover, .btn-default:focus {
    background: #ffffff ! important;
  
}
</style>
<?php endif; } ?>