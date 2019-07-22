<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\HomeAsset;
use app\models\Products;

HomeAsset::register($this);

$catmodel = new Products();
$catmodel = $catmodel -> setCat();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php 

    		// $catmodel = new Products();
    		// $catmodel = $catmodel -> setCat();
     ?>
</head>
<body class="category-page">
<?php $this->beginBody() ?>
	<!-- HEADER -->
	<div id="header" class="header">
	    <div class="top-header">
	        <div class="container">
	            <div class="nav-top-links">
	                <a class="first-item" href="#"><img alt="phone" src="../theme/images/phone.png" />00-62-658-658</a>
	                <a href="#"><img alt="email" src="../theme/images/email.png" />Contact us today!</a>
	            </div>
	           <!--  <div class="currency ">
	                <div class="dropdown">
	                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
	                      <ul class="dropdown-menu" role="menu">
	                        <li><a href="#">Dollar</a></li>
	                        <li><a href="#">Euro</a></li>
	                      </ul>
	                </div>
	            </div> -->
	           <!--  <div class="language ">
	                <div class="dropdown">
	                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
	                      <img alt="email" src="../theme/images/fr.jpg" />French
	                      </a>
	                      <ul class="dropdown-menu" role="menu">
	                        <li><a href="#"><img alt="email" src="../theme/images/en.jpg" />English</a></li>
	                        <li><a href="#"><img alt="email" src="../theme/images/fr.jpg" />French</a></li>
	                    </ul>
	                </div>
	            </div> -->
	            <div class="support-link">
	                <a href="#">Services</a>
	                <a href="#">Support</a>
	            </div>
	            <div id="user-info-top" class="user-info pull-right">
	                <div class="dropdown">
	                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
	                    	<span>
	                    		
	                    		<?php if (Yii::$app->user->isGuest): ?>
	                    			My Account
	                    		<?php else: ?>
	                    			<?= Yii::$app->user->identity->f_name ?>
	                    		<?php endif; ?>
	                    	</span>
	                    </a>
	                    <ul class="dropdown-menu mega_dropdown" role="menu">
	                        <li>
	                            <?php if (Yii::$app->user->isGuest): ?>
	                                <?php echo Html::a('Login or Register', ['site/login'], ['class' => '']) ?>
	                            <?php else: ?>
	                                <?php echo Html::a('Logout', ['site/logout'], ['data-method' => 'post','class' => 'dropdown-item']) ?>
	                            <?php endif; ?>
	                        </li>

	                        <?php if (!Yii::$app->user->isGuest): ?>
                    			<li>
		                        	<?php echo Html::a('Account', ['customer/account'], ['class' => '']) ?>
		                        	<!-- <a href="login.html">Login</a> -->
		                        </li>
                    		<?php endif; ?>

                    		<?php if (isset(Yii::$app->user->identity->role)&& Yii::$app->user->identity->role == 'admin'): ?>
                    			<li>
		                        	<?php echo Html::a('Backend', ['products/index'], ['class' => '']) ?>
		                        	<!-- <a href="login.html">Login</a> -->
		                        </li>
                    		<?php endif; ?>
	                        
	                        <li><a href="#">Compare</a></li>
	                        <li><a href="#">Wishlists</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!--/.top-header -->
	    <!-- MAIN HEADER -->
	    <div class="container main-header">
	        <div class="row">
	            <div class="col-xs-12 col-sm-3 logo">
	                <!-- <a href="index.html"><img alt="Kute shop - themelock.com" src="../theme/images/logo.png" /></a> -->
	                <?php echo Html::a(
	                	// 'link'
	                	Html::img('@web/theme/images/logo.png')
	                	, ['site/index'], ['class' => '']) ?>
	            </div>
	            <div class="col-xs-7 col-sm-7 header-search-box">
	                <form class="form-inline">
	                      <div class="form-group form-category">
	                        <select class="select-category">
	                            <option value="2">All Categories</option>
	                            <option value="1">Men</option>
	                            <option value="2">Women</option>
	                        </select>
	                      </div>
	                      <div class="form-group input-serach">
	                        <input type="text"  placeholder="Keyword here...">
	                      </div>
	                      <button type="submit" class="pull-right btn-search"></button>
	                </form>
	            </div>
	            <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
	                <a class="cart-link" href="order.html">
	                    <span class="title">Shopping cart</span>
	                    <span class="total">2 items - 12,200.38 ksh</span>
	                    <span class="notify notify-left">2</span>
	                </a>
	                <div class="cart-block">
	                    <div class="cart-block-content">
	                        <h5 class="cart-title">2 Items in my cart</h5>
	                        <div class="cart-block-list">
	                            <ul>
	                                <li class="product-info">
	                                    <div class="p-left">
	                                        <a href="#" class="remove_link"></a>
	                                        <a href="#">
	                                        <img class="img-responsive" src="../theme/data/product-100x122.jpg" alt="p10">
	                                        </a>
	                                    </div>
	                                    <div class="p-right">
	                                        <p class="p-name">Donec Ac Tempus</p>
	                                        <p class="p-rice">61,19 €</p>
	                                    </div>
	                                </li>
	                                <li class="product-info">
	                                    <div class="p-left">
	                                        <a href="#" class="remove_link"></a>
	                                        <a href="#">
	                                        <img class="img-responsive" src="../theme/data/product-s5-100x122.jpg" alt="p10">
	                                        </a>
	                                    </div>
	                                    <div class="p-right">
	                                        <p class="p-name">Donec Ac Tempus</p>
	                                        <p class="p-rice">61,19 €</p>
	                                    </div>
	                                </li>
	                            </ul>
	                        </div>
	                        <div class="toal-cart">
	                            <span>Total</span>
	                            <span class="toal-price pull-right">122.38 €</span>
	                        </div>
	                        <div class="cart-buttons">
	                            <a href="order.html" class="btn-check-out">Checkout</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- END MANIN HEADER -->
	    <div id="nav-top-menu" class="nav-top-menu">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-3" id="box-vertical-megamenus">
	                    <div class="box-vertical-megamenus">
	                    <h4 class="title">
	                        <span class="title-menu">Categories</span>
	                        <span class="btn-open-mobile pull-right"><i class="fa fa-bars"></i></span>
	                    </h4>
	                    <div class="vertical-menu-content is-home">
	                        <ul class="vertical-menu-list">
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/1.png">Electronics</a></li>
	                            <li>
	                                <a class="parent" href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/2.png">Sports &amp; Outdoors</a>
	                                <div class="vertical-dropdown-menu">
	                                    <div class="vertical-groups col-sm-12">
	                                        <div class="mega-group col-sm-4">
	                                            <h4 class="mega-group-header"><span>Tennis</span></h4>
	                                            <ul class="group-link-default">
	                                                <li><a href="#">Tennis</a></li>
	                                                <li><a href="#">Coats &amp; Jackets</a></li>
	                                                <li><a href="#">Blouses &amp; Shirts</a></li>
	                                                <li><a href="#">Tops &amp; Tees</a></li>
	                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
	                                                <li><a href="#">Intimates</a></li>
	                                            </ul>
	                                        </div>
	                                        <div class="mega-group col-sm-4">
	                                            <h4 class="mega-group-header"><span>Swimming</span></h4>
	                                            <ul class="group-link-default">
	                                                <li><a href="#">Dresses</a></li>
	                                                <li><a href="#">Coats &amp; Jackets</a></li>
	                                                <li><a href="#">Blouses &amp; Shirts</a></li>
	                                                <li><a href="#">Tops &amp; Tees</a></li>
	                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
	                                                <li><a href="#">Intimates</a></li>
	                                            </ul>
	                                        </div>
	                                        <div class="mega-group col-sm-4">
	                                            <h4 class="mega-group-header"><span>Shoes</span></h4>
	                                            <ul class="group-link-default">
	                                                <li><a href="#">Dresses</a></li>
	                                                <li><a href="#">Coats &amp; Jackets</a></li>
	                                                <li><a href="#">Blouses &amp; Shirts</a></li>
	                                                <li><a href="#">Tops &amp; Tees</a></li>
	                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
	                                                <li><a href="#">Intimates</a></li>
	                                            </ul>
	                                        </div>
	                                        <div class="mega-custom-html col-sm-12">
	                                            <a href="#"><img src="../theme/data/banner-megamenu.jpg" alt="Banner"></a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </li>
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/3.png">Smartphone &amp; Tablets</a></li>
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/4.png">Health &amp; Beauty Bags</a></li>
	                            <li>
	                                <a class="parent" href="#">
	                                <img class="icon-menu" alt="Funky roots" src="../theme/data/5.png">Shoes &amp; Accessories</a>
	                                <div class="vertical-dropdown-menu">
	                                        <div class="vertical-groups col-sm-12">
	                                            <div class="mega-group col-sm-12">
	                                                <h4 class="mega-group-header"><span>Special products</span></h4>
	                                                <div class="row mega-products">
	                                                    <div class="col-sm-3 mega-product">
	                                                        <div class="product-avatar">
	                                                            <a href="#"><img src="../theme/data/p10.jpg" alt="product1"></a>
	                                                        </div>
	                                                        <div class="product-name">
	                                                            <a href="#">Fashion hand bag</a>
	                                                        </div>
	                                                        <div class="product-price">
	                                                            <div class="new-price">$38</div>
	                                                            <div class="old-price">$45</div>
	                                                        </div>
	                                                        <div class="product-star">
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star-half-o"></i>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-sm-3 mega-product">
	                                                        <div class="product-avatar">
	                                                            <a href="#"><img src="../theme/data/p11.jpg" alt="product1"></a>
	                                                        </div>
	                                                        <div class="product-name">
	                                                            <a href="#">Fashion hand bag</a>
	                                                        </div>
	                                                        <div class="product-price">
	                                                            <div class="new-price">$38</div>
	                                                            <div class="old-price">$45</div>
	                                                        </div>
	                                                        <div class="product-star">
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star-half-o"></i>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-sm-3 mega-product">
	                                                        <div class="product-avatar">
	                                                            <a href="#"><img src="../theme/data/p12.jpg" alt="product1"></a>
	                                                        </div>
	                                                        <div class="product-name">
	                                                            <a href="#">Fashion hand bag</a>
	                                                        </div>
	                                                        <div class="product-price">
	                                                            <div class="new-price">$38</div>
	                                                            <div class="old-price">$45</div>
	                                                        </div>
	                                                        <div class="product-star">
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star-half-o"></i>
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-sm-3 mega-product">
	                                                        <div class="product-avatar">
	                                                            <a href="#"><img src="../theme/data/p13.jpg" alt="product1"></a>
	                                                        </div>
	                                                        <div class="product-name">
	                                                            <a href="#">Fashion hand bag</a>
	                                                        </div>
	                                                        <div class="product-price">
	                                                            <div class="new-price">$38</div>
	                                                            <div class="old-price">$45</div>
	                                                        </div>
	                                                        <div class="product-star">
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star"></i>
	                                                            <i class="fa fa-star-half-o"></i>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                            </li>
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/6.png">Toys &amp; Hobbies</a></li>
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/7.png">Computers &amp; Networking</a></li>
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/8.png">Laptops &amp; Accessories</a></li>
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/9.png">Jewelry &amp; Watches</a></li>
	                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/10.png">Flashlights &amp; Lamps</a></li>
	                            <li>
	                                <a href="#">
	                                    <img class="icon-menu" alt="Funky roots" src="../theme/data/11.png">
	                                    Cameras &amp; Photo
	                                </a>
	                            </li>
	                            <li class="cat-link-orther">
	                                <a href="#">
	                                    <img class="icon-menu" alt="Funky roots" src="../theme/data/5.png">
	                                    Television
	                                </a>
	                            </li>
	                            <li class="cat-link-orther">
	                                <a href="#">
	                                    <img class="icon-menu" alt="Funky roots" src="../theme/data/7.png">Computers &amp; Networking
	                                </a>
	                            </li>
	                            <li class="cat-link-orther">
	                                <a href="#">
	                                    <img class="icon-menu" alt="Funky roots" src="../theme/data/6.png">
	                                    Toys &amp; Hobbies
	                                </a>
	                            </li>
	                            <li class="cat-link-orther">
	                            <a href="#"><img class="icon-menu" alt="Funky roots" src="../theme/data/9.png">Jewelry &amp; Watches</a></li>
	                        </ul>
	                        <div class="all-category"><span class="open-cate">All Categories</span></div>
	                    </div>
	                </div>
	                </div>
	                <div id="main-menu" class="col-sm-9 main-menu">
	                    <nav class="navbar navbar-default">
	                        <div class="container-fluid">
	                            <div class="navbar-header">
	                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                                    <i class="fa fa-bars"></i>
	                                </button>
	                                <a class="navbar-brand" href="#">MENU</a>
	                            </div>
	                            <div id="navbar" class="navbar-collapse collapse">
	                                <ul class="nav navbar-nav">
	                                    <li class="active">
	                                    	<?php echo Html::a('Home', ['site/index'], ['class' => '']) ?>
	                                   	</li>
	                                    <?= $this->render('_cat-menu', [
									        	'catmodel' => $catmodel,
									    ]) ?>
	                                </ul>
	                            </div><!--/.nav-collapse -->
	                        </div>
	                    </nav>
	                </div>
	            </div>
	            <!-- userinfo on top-->
	            <div id="form-search-opntop">
	            </div>
	            <!-- userinfo on top-->
	            <div id="user-info-opntop">
	            </div>
	            <!-- CART ICON ON MMENU -->
	            <div id="shopping-cart-box-ontop">
	                <i class="fa fa-shopping-cart"></i>
	                <div class="shopping-cart-box-ontop-content"></div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end header -->

        <?= $content ?>
   
        <!-- Footer -->
	
	<footer id="footer">
	     <div class="container">
	            <!-- introduce-box -->
	            <div id="introduce-box" class="row">
	                <div class="col-md-3">
	                    <div id="address-box">
	                        <a href="#"><img src="../theme/data/introduce-logo.png" alt="" /></a>
	                        <div id="address-list">
	                            <div class="tit-name">Address:</div>
	                            <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
	                            <div class="tit-name">Phone:</div>
	                            <div class="tit-contain">+00 123 456 789</div>
	                            <div class="tit-name">Email:</div>
	                            <div class="tit-contain">support@business.com</div>
	                        </div>
	                    </div> 
	                </div>
	                <div class="col-md-6">
	                    <div class="row">
	                        <div class="col-sm-4">
	                            <div class="introduce-title">Company</div>
	                            <ul id="introduce-company"  class="introduce-list">
	                                <li><a href="#">About Us</a></li>
	                                <li><a href="#">Testimonials</a></li>
	                                <li><a href="#">Affiliate Program</a></li>
	                                <li><a href="#">Terms & Conditions</a></li>
	                                <li><a href="#">Contact Us</a></li>
	                            </ul>
	                        </div>
	                        <div class="col-sm-4">
	                            <div class="introduce-title">My Account</div>
	                            <ul id = "introduce-Account" class="introduce-list">
	                                <li><a href="#">My Order</a></li>
	                                <li><a href="#">My Wishlist</a></li>
	                                <li><a href="#">My Credit Slip</a></li>
	                                <li><a href="#">My Addresses</a></li>
	                                <li><a href="#">My Personal In</a></li>
	                            </ul>
	                        </div>
	                        <div class="col-sm-4">
	                            <div class="introduce-title">Support</div>
	                            <ul id = "introduce-support"  class="introduce-list">
	                                <li><a href="#">About Us</a></li>
	                                <li><a href="#">Testimonials</a></li>
	                                <li><a href="#">Affiliate Program</a></li>
	                                <li><a href="#">Terms & Conditions</a></li>
	                                <li><a href="#">Contact Us</a></li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-3">
	                    <div id="contact-box">
	                        <div class="introduce-title">Newsletter</div>
	                        <div class="input-group" id="mail-box">
	                          <input type="text" placeholder="Your Email Address"/>
	                          <span class="input-group-btn">
	                            <button class="btn btn-default" type="button">OK</button>
	                          </span>
	                        </div><!-- /input-group -->
	                        <div class="introduce-title">Let's Socialize</div>
	                        <div class="social-link">
	                            <a href="#"><i class="fa fa-facebook"></i></a>
	                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
	                            <a href="#"><i class="fa fa-vk"></i></a>
	                            <a href="#"><i class="fa fa-twitter"></i></a>
	                            <a href="#"><i class="fa fa-google-plus"></i></a>
	                        </div>
	                    </div>
	                </div>
	            </div><!-- /#introduce-box -->
	            <!-- #trademark-box -->
	            <div id="trademark-box" class="row">
	                <div class="col-sm-12">
	                    <ul id="trademark-list">
	                        <li id="payment-methods">Accepted Payment Methods</li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-ups.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-qiwi.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-wu.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-cn.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-visa.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-mc.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-ems.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-dhl.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-fe.jpg"  alt="ups"/></a>
	                        </li>
	                        <li>
	                            <a href="#"><img src="../theme/data/trademark-wm.jpg"  alt="ups"/></a>
	                        </li>
	                    </ul> 
	                </div>
	            </div> <!-- /#trademark-box -->
	            <!-- #trademark-text-box -->
	            <div id="trademark-text-box" class="row">
	                <div class="col-sm-12">
	                    <ul id="trademark-search-list" class="trademark-list">
	                        <li class="trademark-text-tit">HOT SEARCHED KEYWORDS:</li>
	                        <li><a href="#" >Xiaomii Mi3</a></li>
	                        <li><a href="#" >Digiflipii Pro XT 712 Tablet</a></li>
	                        <li><a href="#" >Mi 3 Phones</a></li>
	                        <li><a href="#" >Iphonei 6 Plus</a></li>
	                        <li><a href="#" >Women's Bags</a></li>
	                        <li><a href="#" >Wallets</a></li>
	                        <li><a href="#" >Women's Clutches</a></li>
	                        <li><a href="#" >Backpacks Totes</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul id="trademark-tv-list" class="trademark-list">
	                        <li class="trademark-text-tit">TVS:</li>
	                        <li><a href="#" >Sonyi TV</a></li>
	                        <li><a href="#" >Samsing TV</a></li>
	                        <li><a href="#" >LGi TV</a></li>
	                        <li><a href="#" >Onidai TV</a></li>
	                        <li><a href="#" >Toshibai TV</a></li>
	                        <li><a href="#" >Philipsi TV</a></li>
	                        <li><a href="#" >Micromaxi TV</a></li>
	                        <li><a href="#" >LED TV</a></li>
	                        <li><a href="#" >LCD TV</a></li>
	                        <li><a href="#" >Plasma TV</a></li>
	                        <li><a href="#" >3D TV</a></li>
	                        <li><a href="#" >Smart TV</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul id="trademark-mobile-list" class="trademark-list">
	                        <li class="trademark-text-tit">MOBILES:</li>  
	                        <li><a href="#" >Moto E</a></li>
	                        <li><a href="#" >Samsong Mobile</a></li>
	                        <li><a href="#" >Micromaxo Mobile</a></li>
	                        <li><a href="#" >Nokiao Mobile</a></li>
	                        <li><a href="#" >HTCo Mobile</a></li>
	                        <li><a href="#" >Sonyo Mobile</a></li>
	                        <li><a href="#" >Appleo Mobile</a></li>
	                        <li><a href="#" >LoG Mobile</a></li>
	                        <li><a href="#" >Karbonno Mobile</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul id="trademark-laptop-list" class="trademark-list">
	                        <li class="trademark-text-tit">LAPTOPS::</li> 
	                        <li><a href="#" >Appleo Laptop</a></li>
	                        <li><a href="#" >Acero Laptop</a></li>
	                        <li><a href="#" >Samsoung Laptop</a></li>
	                        <li><a href="#" >Lenoovo Laptop</a></li>
	                        <li><a href="#" >Sonoy Laptop</a></li>
	                        <li><a href="#" >Dello Laptop</a></li>
	                        <li><a href="#" >Asuos Laptop</a></li>
	                        <li><a href="#" >Toshibao Laptop</a></li>
	                        <li><a href="#" >LGo Laptop</a></li>
	                        <li><a href="#" >HPo Laptop</a></li>
	                        <li><a href="#" >Notebook</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul id="trademark-watches-list" class="trademark-list">
	                        <li class="trademark-text-tit">WATCHES:</li>  
	                        <li><a href="#" >FCUKo Watches</a></li>
	                        <li><a href="#" >Titano Watches</a></li>
	                        <li><a href="#" >Casioo Watches</a></li>
	                        <li><a href="#" >Fastracko Watches</a></li>
	                        <li><a href="#" >Timexo Watches</a></li>
	                        <li><a href="#" >Fossilo Watches</a></li>
	                        <li><a href="#" >Dieselo Watches</a></li>
	                        <li><a href="#" >Toshibao Laptop</a></li>
	                        <li><a href="#" >Luxury Watches</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul id="trademark-shoes-list" class="trademark-list">
	                        <li class="trademark-text-tit">FOOTWEAR:</li>  
	                        <li><a href="#" >Shoes</a></li>
	                        <li><a href="#" >Casualo Shoes</a></li>
	                        <li><a href="#" >Sports Shoes</a></li>
	                        <li><a href="#" >Adidaso Shoes</a></li>
	                        <li><a href="#" >Gaso Shoes</a></li>
	                        <li><a href="#" >Pumao Shoes</a></li>
	                        <li><a href="#" >Reeboko Shoes</a></li>
	                        <li><a href="#" >Woodlando Shoes</a></li>
	                        <li><a href="#" >Red tape Shoes</a></li>
	                        <li><a href="#" >Nikeo Shoes</a></li>
	                    </ul>
	                </div>
	            </div><!-- /#trademark-text-box -->
	            <div id="footer-menu-box">
	                <div class="col-sm-12">
	                    <ul class="footer-menu-list">
	                        <li><a href="#" >Company Info - Partnerships</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul class="footer-menu-list">
	                        <li><a href="#" >Online Shopping</a></li>
	                        <li><a href="#" >Promotions</a></li>
	                        <li><a href="#" >My Orders</a></li>
	                        <li><a href="#" >Help</a></li>
	                        <li><a href="#" >Site Map</a></li>
	                        <li><a href="#" >Customer Service</a></li>
	                        <li><a href="#" >Support</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul class="footer-menu-list">
	                        <li><a href="#" >Most Populars</a></li>
	                        <li><a href="#" >Best Sellers</a></li>
	                        <li><a href="#" >New Arrivals</a></li>
	                        <li><a href="#" >Special Products</a></li>
	                        <li><a href="#" >Manufacturers</a></li>
	                        <li><a href="#" >Our Stores</a></li>
	                        <li><a href="#" >Shipping</a></li>
	                        <li><a href="#" >Payments</a></li>
	                        <li><a href="#" >Warantee</a></li>
	                        <li><a href="#" >Refunds</a></li>
	                        <li><a href="#" >Checkout</a></li>
	                        <li><a href="#" >Discount</a></li>
	                    </ul>
	                </div>
	                <div class="col-sm-12">
	                    <ul class="footer-menu-list">
	                        <li><a href="#" >Terms & Conditions</a></li>
	                        <li><a href="#" >Policy</a></li>
	                        <li><a href="#" >Shipping</a></li>
	                        <li><a href="#" >Payments</a></li>
	                        <li><a href="#" >Returns</a></li>
	                        <li><a href="#" >Refunds</a></li>
	                        <li><a href="#" >Warrantee</a></li>
	                        <li><a href="#" >FAQ</a></li>
	                        <li><a href="#" >Contact</a></li>
	                    </ul>
	                </div>
	                <p class="text-center">Copyrights &#169; 2015 KuteShop. All Rights Reserved. Designed by KuteThemes.com</p>
	            </div><!-- /#footer-menu-box -->
	        </div> 
	</footer>
	<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
