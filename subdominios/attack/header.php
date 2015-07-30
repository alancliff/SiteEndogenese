<?php

	/**

	* The header for our theme.

	*

	* Displays all of the <head> section and everything up till <div id="content">

	*

	* @package redwaves-lite

	*/

?><!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link rel="profile" href="http://gmpg.org/xfn/11">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php redwaves_favicon(); ?>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
		<script>
		//Script do Google Analytics
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-63717100-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<div class="hfeed site">

			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'redwaves-lite' ); ?></a>

			<header id="masthead" class="site-header" role="banner">

				<div id="mobile-menu-wrapper">

					<a href="javascript:void(0); " id="sidemenu_hide" class="sideviewtoggle">Menu</a>

					<?php redwaves_small_search_bar() ?>

					<nav id="navigation" class="clearfix">

						<div id="mobile-menu" class="mobile-menu">

							<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'nav-menu' ) ); ?>

						</div>

					</nav>							

				</div>
				<style type="text/css">
				body {
					min-width: 980px!important
				}
				@font-face {
			    font-family: Endogenese;
			    src: url("http://base.endogenese.com.br/fonts/Freehand.ttf");
			    }
				.fonte_endogenese{font-family:Endogenese;}
				@font-face {
			    font-family: Attack;
			    src: url("/wp-content/themes/redwaves-lite/images/sofachrome.ttf");
			    }
				.fonte_attack{font-family:Attack;}
				.animacao_attack{
					font-size: 0.7em;
				}
				.animacao_attack:hover{
					color: white;
				}
				footer{
					cursor: url("http://www.attackjjteam.com.br/wp-content/themes/redwaves-lite/images/attack_cursor.png"), pointer;
				}
				.img_logo_endogenese{
					margin-top: -20px;
					float: right;
					margin-left: 5px;
				}
				.main-container, .container { 
					width: 980px;
				}
				.main-navigation li {
					/*MODIFICADO*/
					float: left;
					position: relative;
					/*font-size: 15px;*/
					white-space: nowrap;
					font: 13px/1.1em Tahoma,tahoma-w01-regular,tahoma-w02-regular,tahoma-w10-regular,tahoma-w15--regular,tahoma-w99-regular,sans-serif;
					width: 196px;
					height: 38px;
				}
				.main-navigation ul li a, .main-navigation ul li a:link, .main-navigation ul li a:visited {
					/*MODIFICADO*/
					/*display: inline-block;*/
					display: block;
					/*padding: 19px 20px;*/
					text-decoration: none;
					margin: auto;	
					height: 38px;
					text-align: center;
					vertical-align: baseline;
					line-height: 38px;
					padding: 0px !important;
				}
				.main-navigation ul li a:hover{
					color: #ED1C24;
				}
				.menu-principal-container{width: 980px;}
				/*EXCLUIDO*/
				.main-navigation .menu-item-has-children>a:after, .main-navigation .page_item_has_children>a:after {
					display: none;
				}
				/*.main-navigation .menu-item-has-children>a, RETIRADO DO GRUPO ABAIXO*/
				.main-navigation .page_item_has_children>a {
					/*padding-right: 40px !important;*/
					padding-right: 0px !important;
				}
				.main-navigation ul ul li a:first-child {
					/*padding-right: 44px !important;*/
					padding-right: 0px !important;
				}
				.main-navigation ul ul > li:first-child, .main-navigation ul ul ul > li:first-child {
    				border-top: none;
				}
				.sub-menu{
					margin-top: 8px!important;
				}
				.main-navigation ul ul a, .main-navigation ul ul a:link, .main-navigation ul ul a:visited {
					/*padding: 9px 45px 9px 20px;*/
					position: relative;
					/*width: 190px;*/
					width: 195px;
					border-left: 0;
					background-color:#ED1C24;
					border-right: 0;
					-moz-border-radius: 0;
					-webkit-border-radius: 0;
					border-radius: 0;
					margin: 0;
					-moz-box-sizing: content-box;
					-webkit-box-sizing: content-box;
					box-sizing: content-box;
					height: 28px;
					vertical-align: baseline;
					line-height: 28px;
					padding: 0px;

				}
				.main-navigation ul ul li, .main-navigation ul ul a{
					height: 28px;
					padding: 0px!important;
				}
				.main-navigation ul ul a:hover{
					background-color:#000;
				}
				.main-navigation .menu-item-has-children > a{
					padding: 0px !important;
				}
				.main-navigation li:hover{
					cursor: default;
				}
				.menu_principal{
					height: 38px;
				}
				.header-inner{
					width: 980px;
					display: block;
					margin: auto;
				}
				.header-container{
					min-width: 100%; 
					height: 216px;
					background-color: white;
				}
				.entry-title{
					font-size: 1.2em !important;
					font-family: Attack;
				}
				.readmore:hover, .thecategory a:hover, .tagcloud a:hover{
					background-color: #ED1C24!important;
				}
				.nome_attack{
					width: 460px;
					position: relative;
					top: -94px;
					left: 5px;
				}
				.logo_attack{
					width: 156px;
					position: relative;
					top: -10px;
					left: 8px;
				}
				.unidade{
					text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.6), -1px -1px 1px rgba(0, 0, 0, 0.6);
					font: 14px/1.3em Tahoma,tahoma-w01-regular,tahoma-w02-regular,tahoma-w10-regular,tahoma-w15--regular,tahoma-w99-regular,sans-serif;
					color: #000;
					font-weight: bold;
					word-wrap: break-word;
					position: relative;
					letter-spacing: normal;
					top: -11px;
					left: -27px;
				}
				.convite{
					font: 12px/1.3em Tahoma,tahoma-w01-regular,tahoma-w02-regular,tahoma-w10-regular,tahoma-w15--regular,tahoma-w99-regular,sans-serif;
					color: #000;
					line-height: 1.3em;
					position: relative;
					top: -95px;
					left: -32px;
				}
				.agende{
					width: 140px;
					height: 30px;
					border-radius: 5px;
					background-color: #2D2525;
					box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.6);
					border: 0px solid #2D2525;
					cursor: pointer !important;
					padding: 4px 8px 4px 9px;
					font: 16px/1.3em Tahoma,tahoma-w01-regular,tahoma-w02-regular,tahoma-w10-regular,tahoma-w15--regular,tahoma-w99-regular,sans-serif;
					transition: color 0.4s ease 0s;
					display: inline-block;
					position: relative;
					top: 32px;
					left: -14px;
				}
				.agende a{
					color: #fff;
				}
				.agende a:hover{
					color: #45362C;

				}
				#sticky, #sideviewtoggle{
					position: absolute;
					top: 169px;
				}
				#primary{
					border-right: 5px inset gray;
				}
				a[href="http://www.attackjjteam.com.br"], a[href="http://www.attackjjteam.com.br"]:hover{
					background-color:#ED1C24!important;
					color: white !important;
				}
				.bloco_img{
					position: relative;
					float: left;
				}
				.bloco_convite{
					position: relative;
					float: right;
				}
				@media screen and (max-width:1124px) { 
					.main-container, .container {
						/*max-width: 96%;*/
						width: 980px;
					}
				}
				@media screen and (max-width:1000px) { 
					.main-navigation ul li a {
						/*padding: 19px 10px !important;*/
						padding: 0px !important;
					}
				}

	
				</style>
				<div class="container header-container" >

					<div class="header-inner">
						<div class="bloco_img">
						<img src="/wp-content/themes/redwaves-lite/images/nome_attack.png" class="nome_attack" >
						<img src="/wp-content/themes/redwaves-lite/images/logo_attack.jpeg" class="logo_attack">
						<span class="unidade" style="font-family: verdana,geneva,sans-serif;"><i>Unidade Itaituba</i></span>
						</div>
						<div class="bloco_convite">
							<div class="convite">
								<p style="position: relative;top: 160px;">Faça uma aula experimental</p>
								<p style="position: relative;top: 133px;">Faça uma aula experimental</p>

							</div>
							<div class="agende">
								<a href="http://www.attackjjteam.com/#!contato/c19rm">AGENDE AGORA!</a>
							</div>
						</div>
						<!-- <div class="logo-wrap">

							<?php // redwaves_logo(); ?>

						</div>.logo-wrap -->

						<!--<div class="header_area-wrap">

							<?php // redwaves_header_area(); ?>

						</div> .header_area-wrap -->

					</div><!-- .header-inner -->

				</div><!-- .container -->

				<div id="sideviewtoggle" class="secondary-navigation">

					<div class="container clearfix"> 

						<a href="javascript:void(0); " id="sidemenu_show" class="sideviewtoggle">Menu</a>  

					</div><!--.container-->

				</div>	

				<div id="sticky" class="secondary-navigation">

					<div class="container clearfix">

						<nav id="site-navigation" class="main-navigation" role="navigation">

							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

						</nav><!-- #site-navigation -->

					</div><!--.container -->

				</div>	

			</header><!-- #masthead -->

			<div id="content" class="main-container">

			<div id="page">			