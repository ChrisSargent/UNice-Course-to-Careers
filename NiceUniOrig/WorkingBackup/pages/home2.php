<?php
include_once './pages.php';
class home extends pages{
    public function __construct() {
        parent::__construct();
        $this->PublishHTML();
    }
    
    public function PublishHTML() {
        $this->pageHTML = <<<page
</section>

            <div class="container">
                <div class="col-lg-5">
                    <h3> Recherche un diplôme </h3>
                </div>
                <div class="col-lg-2">
                    <h3> ou </h3>
                </div>
                <div class="col-lg-5">
                    <h3> Recherche un métier </h3>
                </div>

                <div class="col-lg-5">
                    <form method="get" action="{$this->Settings->RootURL}/pages/career.php" name="career" style="float:left;">
                        <input type="text" name="career" size="50">
                            <input type="submit" value="Soumettre">
                                </form>

                                </div>

                                <div class="col-lg-2">
                                </div>

                                <div class="col-lg-5">

                                    <form method="post" action="" name="diplome" style="float:left;">
                                        <input type="text" name="diploma" size="50">
                                            <input type="submit" value="Soumettre">
                                                </form>
                                                </div>

                                                <div class="col-lg-12">
                                                    <br>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h1> Lorem Ipsum </h1>
                                                </div>

                                                <div class="col-lg-12">
                                                    <br>
                                                </div>

                                                <div class="col-lg-12">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non laoreet dolor. Cras sed elit quis mi rhoncus tincidunt. Suspendisse aliquam quis lorem id lacinia. Cras auctor gravida diam, vel commodo erat viverra a. Aenean sed ligula ornare, aliquet nulla et, aliquam nisi. Ut nec ipsum facilisis nulla luctus ornare ultricies id mi. Suspendisse metus mi, egestas sit amet urna eget, semper lobortis diam. Fusce a leo molestie, pharetra nisi in, gravida mi. Cras porta ante id ultricies bibendum.
                                                </div>

                                                <div class="col-lg-12">
                                                    <br>
                                                </div>

                                                <div class="col-lg-2">
                                                </div>

                                                <div class="col-lg-2">
                                                    <center>
                                                        <table>
                                                            <tbody>
                                                                <h1>Diplômes</h1>
                                                                <img alt="Brand" src="http://ec2-52-11-78-178.us-west-2.compute.amazonaws.com/french/resources/559540573.jpg" width="150" height="300">
                                                                    <button type="button">En savoir plus</button>
                                                                    <h6>Vous souhaitez reprendre les études et connaitre les diplômes qui correspondent à un métier précis.</h6>
                                                                    </center>
                                                            </tbody>
                                                        </table>

                                                </div>

                                                <div class="col-lg-2">
                                                </div>

                                                <div class="col-lg-2">
                                                    <center>
                                                        <table>
                                                            <tbody>
                                                                <h1>Métiers</h1>
                                                                <img alt="Brand" src="http://ec2-52-11-78-178.us-west-2.compute.amazonaws.com/french/resources/558945395.jpg" width="150" height="300">
                                                                    <button type="button">En savoir plus</button>
                                                                    <h6>Vous souhaitez reprendre les études et connaitre les diplômes qui correspondent à un métier précis.</h6>
                                                                    </center>
                                                                    </div>
                                                            </tbody>
                                                        </table>

                                                        <table>
                                                            <tbody>
                                                                lorem ipsum
                                                        </table>
                                                        </tbody>
                                                        <div class="col-lg-2">
                                                        </div>


                                                </div>


                                                </div>
                                                </div>

                                                </div>


                                                </div>


                                                </div>
   
page;
        parent::PublishHTML();
    }
}

//$HomePage = new home();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr"><head><base href="http://unice.fr/personnels/espace-commun-des-personnels/" /><base href="http://unice.fr/personnels/espace-commun-des-personnels/" /><meta charset="utf-8" /><!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>--><meta name="viewport" content="width=device-width, initial-scale=1" /><meta name="description" content="" /><meta name="author" content="" /><link rel="shortcut icon" href="/++theme++ThemeUNS/assets/ico/favicon.png" /><title>Espace commun des personnels — Université Nice Sophia Antipolis</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta content="Bienvenue dans l'espace commun des personnels de l'Université Nice Sophia Antipolis.&#13;&#10;Cet espace organise l'ensemble des informations et des outils, en accès libre ou restreint, utile à l'ensemble des personnels, des services, des composantes de l'Université." name="description" /><link rel="stylesheet" type="text/css" media="screen" href="http://unice.fr/portal_css/Sunburst%20Theme/reset-cachekey-99fa0501ad40aa732cfb937566c027a6.css" /><link rel="stylesheet" type="text/css" media="screen" href="http://unice.fr/portal_css/Sunburst%20Theme/base-cachekey-7fe2f022962cd568285c92d07116a51c.css" /><link rel="stylesheet" type="text/css" href="http://unice.fr/portal_css/Sunburst%20Theme/collective.js.jqueryui.custom.min-cachekey-c341758ba5f69c01758fde27ed1911f5.css" /><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourcecontentleadimage-cachekey-1fe66c828cbd4d0ee25d65053e7dbf80.css);</style><link rel="stylesheet" type="text/css" href="http://unice.fr/portal_css/Sunburst%20Theme/resourcecollective.js.fullcalendarfullcalendar-cachekey-36d971ffc7558c748f538216c0928bf6.css" /><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/solgema_contextualcontentmenu-cachekey-35c6902f754ed9f5553e139afa527ce3.css);</style><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourceunice.portlet.stories.stylesheetsstyles-cachekey-b050f0ac1708482b1dad93c3f90b2ace.css);</style><link rel="stylesheet" type="text/css" media="all" href="http://unice.fr/portal_css/Sunburst%20Theme/facultyStaffDirectory-cachekey-779e14976199772b02adea323b133fe7.css" /><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourceunice.portlet.flickr.stylesheetsstyles-cachekey-2d7033f76633bd4c7de85d54f9897898.css);</style><link rel="stylesheet" type="text/css" href="http://unice.fr/portal_css/Sunburst%20Theme/resourcecollective.portlet.socialnetworks-cachekey-484103b92db10d3c3237a48ebf4d4064.css" /><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourceunice.portlet.titre.stylesheetsstyles-cachekey-2693cd4f27c159459172424671f35d6f.css);</style><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourceunice.theme.stylesheetsstyles_anonymous-cachekey-ee7adeea8ca7afe46e189d4c6dc13767.css);</style><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourceunice.gof.stylesheetsstyles-cachekey-530bfbaa0b713cc295ae7e03dcec6310.css);</style><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourceunice.medites.stylesheetsstyles-cachekey-f3585c06c94663bcb2984c7b83360847.css);</style><style type="text/css">@import url(http://unice.fr/portal_css/Sunburst%20Theme/resourceunice.templates.stylesheetsstyles-cachekey-ff5cf9fb7b05209c6e3aaa37a944b872.css);</style><link rel="stylesheet" type="text/css" href="http://unice.fr/portal_css/Sunburst%20Theme/ploneCustom.css" /><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/resourceplone.app.jquery-cachekey-021c0f78fe0f3d1368694c681e237503.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/collective.js.jqueryui.custom.min-cachekey-fdf9fdc0cbf9afb0fd48b53379d18134.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/resourceplone.formwidget.autocompletejquery.autocomplete.min-cachekey-40475dca9831ddb5f4fe3c30633107cf.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/resourcecollective.js.fullcalendarfullcalendar.min-cachekey-09212b88cf0b025283a8eb3d8e210e1d.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/resourcecollective.js.colorpicker.jseye-cachekey-42b3eb79ced12dbcedeba8291691ba99.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.coordonnees.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.flickr.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.vimeo.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.sygefor.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.filuns.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.carousel.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.titre.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.agenda.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.theme.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/ploneCustom.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.portlet.indicateurs.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.gof.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.medites.javascripts/scripts.js"></script><script type="text/javascript" src="http://unice.fr/portal_javascripts/Sunburst%20Theme/++resource++unice.templates.javascripts/scripts.js"></script><link rel="canonical" href="http://unice.fr/personnels/espace-commun-des-personnels" /><link rel="shortcut icon" type="image/x-icon" href="http://unice.fr/favicon.ico" /><link rel="apple-touch-icon" href="http://unice.fr/touch_icon.png" /><script type="text/javascript">
        jQuery(function($){
            $.datepicker.setDefaults(
                jQuery.extend($.datepicker.regional['fr'],
                {dateFormat: 'dd/mm/yy'}));
        });
        </script><link rel="search" href="http://unice.fr/@@search" title="Recherche dans ce site" /><meta name="generator" content="Plone - http://plone.org" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="black" /><link rel="apple-touch-icon-precomposed" sizes="144x144" href="/++theme++ThemeUNS/assets/ico/apple-touch-icon-144-precomposed.png" /><link rel="apple-touch-icon-precomposed" sizes="114x114" href="/++theme++ThemeUNS/assets/ico/apple-touch-icon-114-precomposed.png" /><link rel="apple-touch-icon-precomposed" sizes="72x72" href="/++theme++ThemeUNS/assets/ico/apple-touch-icon-72-precomposed.png" /><link rel="apple-touch-icon-precomposed" href="/++theme++ThemeUNS/assets/ico/apple-touch-icon-57-precomposed.png" /><link rel="assets/ico/apple-touch-startup-image" href="/++theme++ThemeUNS/assets/ico/apple-touch-startup-image-iphone.png" media="(device-width: 320px)" /><link rel="assets/ico/apple-touch-startup-image" href="/++theme++ThemeUNS/assets/ico/apple-touch-startup-image-iphone-retina.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" /><link rel="assets/ico/apple-touch-startup-image" href="/++theme++ThemeUNS/assets/ico/apple-touch-startup-image-ipad-portrait.png" media="(device-width: 768px) and (orientation: portrait)" /><link rel="assets/ico/apple-touch-startup-image" href="/++theme++ThemeUNS/assets/ico/apple-touch-startup-image-ipad-landscape.png" media="(device-width: 768px) and (orientation: landscape)" /><link rel="assets/ico/apple-touch-startup-image" href="/++theme++ThemeUNS/assets/ico/apple-touch-startup-image-ipad-portrait-retina.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" /><link rel="assets/ico/apple-touch-startup-image" href="/++theme++ThemeUNS/assets/ico/apple-touch-startup-image-ipad-landscape-retina.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" /><link rel="shortcut icon" href="/++theme++ThemeUNS/assets/ico/favicon.png" /><!-- Correction bug jquery dans le js du theme sunburst --><!-- D&#233;cocher "popupforms.js" dans le portal-javascript --><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/popupforms.js"></script><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/overlay.js"></script><!--[if IE 7]>
          <link rel="stylesheet" href="/++theme++ThemeUNS/assets/css/font-awesome-ie7.min.css">
        <![endif]--><!--[if lt IE 9]>
        <script src="/++theme++ThemeUNS/assets/js/html5shiv.js"></script>
        <script src="/++theme++ThemeUNS/assets/js/respond.min.js"></script>
        <![endif]--><meta property="og:title" content="" /><meta property="og:description" content="" /><meta property="og:image" content="" /><meta property="og:url" content="" /><link href="++resource++unice.theme.stylesheets/declinaisons/actualites.css" rel="stylesheet" /></head>
		<body class="template-two-columns portaltype-portlet-page site-Portail section-front-page userrole-anonymous"><div id="wrap">
			<div class="container-">
				<nav class="navbar navbar-static-top navbar-inverse visible-xs" role="navigation" id="navigation_globale"><div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar1-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="http://unice.fr">UNS</a>
					</div>
					<div class="collapse navbar-collapse navbar1-collapse">
						<ul class="nav navbar-nav"><li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Accès rapides aux outils : <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="http://unice.fr/navigations/menu-outils/personnels">


											<span class="">Personnels</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/annuaire">


											<span class="">Annuaire</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/intranet">


											<span class="">Intranet</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/ent">


											<span class="">ENT</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/jalon">


											<span class="">Jalon</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/fil-uns">


											<span class="">Fil UNS</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/bibliotheques">


											<span class="">Bibliothèques</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/facebook-uns">

											<i class="fa fa-facebook-square fa-lg"></i>
											<span class="sr-only">Facebook UNS</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/twitter-uns">

											<i class="fa fa-twitter-square fa-lg"></i>
											<span class="sr-only">Twitter UNS</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/linkedin-uns">

											<i class="fa fa-linkedin-square fa-lg"></i>
											<span class="sr-only">LinkedIn UNS</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/youtube-uns">

											<i class="fa fa-youtube-square fa-lg"></i>
											<span class="sr-only">Youtube UNS</span>


										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-outils/instagram-uns">

											<i class="fa fa-instagram fa-lg"></i>
											<span class="sr-only">Instagram UNS</span>


										</a>
									</li>
								</ul>
							</li><li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Composantes/Laboratoires/Services : <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts">


											<span class=""> Facultés/Ecoles/Instituts</span>
											<b class="caret"></b>

										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-services/laboratoires-1">


											<span class="">Laboratoires</span>
											<b class="caret"></b>

										</a>
									</li><li>
										<a href="http://unice.fr/navigations/menu-services/directions-services">


											<span class="">Directions/Services</span>


										</a>
									</li>
								</ul>
							</li><li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Navigation principale : <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="http://unice.fr/universite">


											<span class="">Université</span>
											<b class="caret"></b>

										</a>
									</li><li>
										<a href="http://unice.fr/formation">


											<span class="">Formation</span>
											<b class="caret"></b>

										</a>
									</li><li>
										<a href="http://unice.fr/recherche">


											<span class="">Recherche</span>
											<b class="caret"></b>

										</a>
									</li><li>
										<a href="http://unice.fr/international">


											<span class="">International</span>
											<b class="caret"></b>

										</a>
									</li><li>
										<a href="http://unice.fr/vie-etudiante">


											<span class="">Vie etudiante</span>
											<b class="caret"></b>

										</a>
									</li><li>
										<a href="http://unice.fr/entreprise">


											<span class="">Entreprise</span>


										</a>
									</li><li>
										<a href="http://unice.fr/le-fil-dactus-uns">


											<span class="">Fil d'actu UNS</span>


										</a>
									</li>
								</ul>
							</li></ul></div>
				</nav><div id="portal-header"><p class="hiddenStructure">
						<a accesskey="2" href="http://unice.fr/#content">Aller au contenu.</a> |
						<a accesskey="6" href="http://unice.fr/#portal-globalnav">Aller à la navigation</a>
					</p></div>
				<div id="portlets-in-header">





					<div>
						<section>
							<!-- ************************************************************************************* --><!-- *** PORTLET ************************************************************************* --><!-- ************************************************************************************* --><!-- *** Ajout du menu personnel dans le 1er nav extended *************************** --><div class="portlet portletNavigation None  navbar-style-noir navbar-align-right navbar-height-small">
								<nav role="navigation" class="navbar navbar-default hidden-xs container navbar-style-noir navbar-align-right navbar-height-small" style="z-index:15">
									<div class="collapse navbar-collapse">



										<p class="navbar-text sr-only">
											<strong>Accès rapides aux outils :</strong>
										</p>
										<ul class="nav navbar-nav"><li>
												<a href="http://unice.fr/navigations/menu-outils/personnels" class="">

													<span class="">Personnels</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/annuaire" class="">

													<span class="">Annuaire</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/intranet" class="">

													<span class="">Intranet</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/ent" class="">

													<span class="">ENT</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/jalon" class="">

													<span class="">Jalon</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/fil-uns" class="">

													<span class="">Fil UNS</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/bibliotheques" class="">

													<span class="">Bibliothèques</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/facebook-uns" class="">
													<i class="fa fa-facebook-square fa-lg"></i>
													<span class="sr-only">Facebook UNS</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/twitter-uns" class="">
													<i class="fa fa-twitter-square fa-lg"></i>
													<span class="sr-only">Twitter UNS</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/linkedin-uns" class="">
													<i class="fa fa-linkedin-square fa-lg"></i>
													<span class="sr-only">LinkedIn UNS</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/youtube-uns" class="">
													<i class="fa fa-youtube-square fa-lg"></i>
													<span class="sr-only">Youtube UNS</span>

												</a>
											</li>





											<li>
												<a href="http://unice.fr/navigations/menu-outils/instagram-uns" class="">
													<i class="fa fa-instagram fa-lg"></i>
													<span class="sr-only">Instagram UNS</span>

												</a>
											</li>



										</ul>
										<ul class="nav navbar-nav" id="portal-personaltools-">
											<li id="anon-personalbar">

												<a href="http://unice.fr/login" id="personaltools-login">Se connecter</a>

											</li>

										</ul>
									</div>
								</nav>
							</div>
						</section>
					</div><div>
						<section>
							<!-- ************************************************************************************* --><!-- *** PORTLET ************************************************************************* --><!-- ************************************************************************************* --><!-- *** PORTLET STANDARD **************************************************** --><div>

								<div style="top:" class="portlet portletNavigation None  navbar-style-logo navbar-align-right navbar-height-normal">


									<nav role="navigation" style="z-index:14" class="navbar navbar-default hidden-xs container navbar-style-logo navbar-align-right navbar-height-normal"><div class="navbar-header">

											<a class="navbar-brand" href="http://unice.fr" title="Université Nice Sophia Antipolis">
												<img src="++theme++ThemeUNS/assets/img/logo.png" alt="Université Nice Sophia Antipolis" /></a>
											<a class="navbar-brand" href="http://univ-cotedazur.fr" title="Université Côte d'Azur">
												<img src="++theme++ThemeUNS/assets/img/logo_uca.png" alt="Université Côte d'Azur" /></a>

										</div>
										<div class="collapse navbar-collapse">
											<p class="navbar-text sr-only">
												<strong>Composantes/Laboratoires/Services :</strong>
											</p>
											<ul class="nav navbar-nav"><li class="dropdown">
													<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts">

														<span class=""> Facultés/Ecoles/Instituts</span>
														<b class="caret"></b>
													</a>
													<ul class="dropdown-menu"><li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/faculte-de-chirurgie-dentaire">
																<i class="fa fa-angle-right"></i> <span>Faculté de Chirurgie Dentaire</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/faculte-de-droit-et-science-politique">
																<i class="fa fa-angle-right"></i> <span>Faculté de Droit et Science Politique</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/faculte-espaces-et-cultures">
																<i class="fa fa-angle-right"></i> <span>Faculté Espaces et Cultures</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/faculte-des-lettres-arts-et-sciences-humaines-lash">
																<i class="fa fa-angle-right"></i> <span>Faculté des lettres, Arts et Sciences Humaines (LASH)</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/faculte-de-medecine">
																<i class="fa fa-angle-right"></i> <span>Faculté de Médecine</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/ecole-polytechnice-sophia">
																<i class="fa fa-angle-right"></i> <span>École Polytech'Nice-Sophia</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/faculte-des-sciences">
																<i class="fa fa-angle-right"></i> <span>Faculté des Sciences</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/faculte-des-sciences-du-sport-staps">
																<i class="fa fa-angle-right"></i> <span>Faculté des Sciences du Sport (STAPS)</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/ecole-superieure-du-professorat-et-de-leducation-espe">
																<i class="fa fa-angle-right"></i> <span>Ecole Supérieure du Professorat et de l'Education (ESPE)</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/institut-du-droit-de-la-paix-et-du-developpement-idpd">
																<i class="fa fa-angle-right"></i> <span>Institut du Droit de la Paix et du Développement (IDPD)</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/institut-dadministration-des-entreprises-iae">
																<i class="fa fa-angle-right"></i> <span>Institut d'Administration des Entreprises (IAE)</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/institut-superieur-d2019economie-et-de-management-isem">
																<i class="fa fa-angle-right"></i> <span>Institut Supérieur d’Économie et de Management (ISEM)</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/institut-universitaire-de-technologie-nice-cote-dazur-iut">
																<i class="fa fa-angle-right"></i> <span>Institut Universitaire de Technologie Nice-Côte d'Azur (IUT)</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/facultes-ecoles-instituts/institut-mediterraneen-du-risque-de-lenvironnement-et-du-developpement-durable">
																<i class="fa fa-angle-right"></i> <span>Institut méditerranéen du risque, de l'environnement et du développement durable </span>
															</a>
														</li>
													</ul></li>





												<li class="dropdown">
													<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="http://unice.fr/navigations/menu-services/laboratoires-1">

														<span class="">Laboratoires</span>
														<b class="caret"></b>
													</a>
													<ul class="dropdown-menu"><li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-1-mathematiques-et-leurs-interactions">
																<i class="fa fa-angle-right"></i> <span>DS 1 : Mathématiques et leurs intéractions</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-2-physique">
																<i class="fa fa-angle-right"></i> <span>DS 2 : Physique</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-3-sciences-de-la-terre-et-de-lunivers-espace">
																<i class="fa fa-angle-right"></i> <span>DS 3 : Sciences de la Terre et de l'Univers, Espace</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-4-chimie">
																<i class="fa fa-angle-right"></i> <span>DS 4 : Chimie</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-5-biologie-medecine-et-sante">
																<i class="fa fa-angle-right"></i> <span>DS 5 : Biologie, Médecine et Santé</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-6-sciences-de-lhomme-et-des-humanites">
																<i class="fa fa-angle-right"></i> <span>DS 6 : Sciences de l'homme et des humanités</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-7-sciences-de-la-societe">
																<i class="fa fa-angle-right"></i> <span>DS 7 : Sciences de la Société</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-9-sciences-et-technologies-de-linformation-et-de-la-communication">
																<i class="fa fa-angle-right"></i> <span>DS 9 : Sciences et Technologies de l'Information et de la Communication</span>
															</a>
														</li>
														<li>
															<a href="http://unice.fr/navigations/menu-services/laboratoires-1/ds-10-departement-sciences-agronomiques-et-ecologiques">
																<i class="fa fa-angle-right"></i> <span>DS 10 : Département Sciences Agronomiques et Ecologiques</span>
															</a>
														</li>
													</ul></li>




												<li>
													<a href="http://unice.fr/navigations/menu-services/directions-services" class="">

														<span class="">Directions/Services</span>

													</a>
												</li>



											</ul><form id="searchGadget_form" action="http://unice.fr/@@search" class="navbar-form navbar-right" role="search">
												<div class="LSBox">
													<div class="form-group">
														<label class="hiddenStructure" for="searchGadget">Chercher par</label>
														<input name="SearchableText" type="text" size="10" title="Recherche" placeholder="Recherche" accesskey="4" class="form-control input-sm searchField" id="searchGadget" /></div>
													<button type="submit" class="searchButton btn btn-primary input-sm">
														<i class="fa fa-search"></i> 
														<span class="sr-only">Rechercher</span>
													</button>
													<div class="LSResult" id="LSResult"><div class="LSShadow" id="LSShadow"></div></div>
												</div>
											</form>
											<div id="portal-advanced-search" class="hiddenStructure">
												<a href="http://unice.fr/@@search" accesskey="5">Recherche avancée…</a>
											</div>

										</div>


									</nav></div>
							</div>
						</section>
					</div>
				</div>

				<div class="container">
					<div id="portal-columns" class="row">
					
						<!-- Ajout de la classe de largeur de grille --><div id="portal-column-content" class="col-md-6">
							<!-- Fil d'ariane -->
							<ol class="breadcrumb">
								<li>Vous êtes ici :</li><li>
									<a href="http://unice.fr">Accueil</a>

								</li>
							</ol>
							
							

							
							</div>

						</div>


					</div>
					
					</section>
				</div>
				</section>
				
		<div class="container">
			<div class="col-lg-5">
				<h3> Recherche un diplôme </h3>
			</div>
			<div class="col-lg-2">
				<h3> ou </h3>
			</div>
			<div class="col-lg-5">
				<h3> Recherche un métier </h3>
			</div>
			
			<div class="col-lg-5">
			<form method="get" action="http://ec2-52-11-78-178.us-west-2.compute.amazonaws.com/french/pages/career.php" name="careeer" style="float:left;">
			<input type="text" name="career" size="50">
			<input type="submit" value="Soumettre">
			</form>

			</div>
			
			<div class="col-lg-2">
			</div>
			
			<div class="col-lg-5">
			
			<form method="post" action="" name="diplome" style="float:left;">
			<input type="text" name="diploma" size="50">
			<input type="submit" value="Soumettre">
			</form>
			</div>
		
			<div class="col-lg-12">
			<br>
			</div>
			<div class="col-lg-12">
			<h1> Lorem Ipsum </h1>
			</div>
			
			<div class="col-lg-12">
			<br>
			</div>
			
			<div class="col-lg-12">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non laoreet dolor. Cras sed elit quis mi rhoncus tincidunt. Suspendisse aliquam quis lorem id lacinia. Cras auctor gravida diam, vel commodo erat viverra a. Aenean sed ligula ornare, aliquet nulla et, aliquam nisi. Ut nec ipsum facilisis nulla luctus ornare ultricies id mi. Suspendisse metus mi, egestas sit amet urna eget, semper lobortis diam. Fusce a leo molestie, pharetra nisi in, gravida mi. Cras porta ante id ultricies bibendum.
			</div>
			
			<div class="col-lg-12">
			<br>
			</div>
			
			<div class="col-lg-2">
			</div>
			
			<div class="col-lg-2">
			<center>
			<table>
			<tbody>
			<h1>Diplômes</h1>
			<img alt="Brand" src="http://ec2-52-11-78-178.us-west-2.compute.amazonaws.com/french/resources/559540573.jpg" width="150" height="300">
			<button type="button">En savoir plus</button>
			<h6>Vous souhaitez reprendre les études et connaitre les diplômes qui correspondent à un métier précis.</h6>
			</center>
			</tbody>
			</table>
			
			</div>
			
			<div class="col-lg-2">
			</div>
			
			<div class="col-lg-2">
			<center>
			<table>
			<tbody>
			<h1>Métiers</h1>
			<img alt="Brand" src="http://ec2-52-11-78-178.us-west-2.compute.amazonaws.com/french/resources/558945395.jpg" width="150" height="300">
			<button type="button">En savoir plus</button>
			<h6>Vous souhaitez reprendre les études et connaitre les diplômes qui correspondent à un métier précis.</h6>
			</center>
			</div>
			</tbody>
			</table>
			
			<table>
			<tbody>
			lorem ipsum
			</table>
			</tbody>
			<div class="col-lg-2">
			</div>
		
		
		</div>


		</div>
	</div>
	
</div>


</div>


</div>




<footer class="container-">

	<div class="credits">
		<strong>www.unice.fr<br />Université Nice Sophia Antipolis</strong><br /><ul class="list-inline"><li><a href="/sitemap">Plan du site</a></li>
			<li><a href="/accessibility-info">Accessibilité</a></li>
			<li><a href="/contact-info">Contact</a></li>
		</ul></div>
</footer>
<script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/jquery.min.js"></script><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/bootstrap.min.js"></script><!--<script src="assets/js/holder.js"></script>--><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/jquery.easing.1.3.js"></script><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/jquery.fitvids.js"></script><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/jquery.bxslider.min.js"></script><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/twitter-bootstrap-hover-dropdown.min.js"></script><!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>--><script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/scripts.js"></script><script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-46086415-1', 'auto');
          ga('send', 'pageview');

</script></body></html>
