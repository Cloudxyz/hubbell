@extends('public.layouts.auth-master')

@section('main-content')
    <!--page start-->
    <div class="page">
        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <!-- top_bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-md-flex flex-row">
                            <div class="top_bar_contact_item">
                                <ul class="top_menu">
                                    <li><a href="#">NUESTRAS MARCAS</a></li>
                                    <li class="separator">&nbsp;</li>
                                    <li><a href="#">NOTICIAS</a></li>
                                </ul>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_user">
                                    <div><a href="#"><i class="fa fa-heart"></i>&nbsp;&nbsp;Mis listas (0)</a></div>
                                    <div><a href="#"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;(0)</a></div>
                                    <div><a href="#"><i class="fa fa-envelope"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- top_bar end-->
            <!-- header_main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-3 order-1">
                            <!-- site-branding -->
                            <div class="site-branding">
                                <a class="home-link" href="index.html" title="Fixfellow" rel="home">
                                    <img id="logo-img" class="img-center" src="{{asset('assets/public/images/logo-img.png')}}" alt="logo-img">
                                </a>
                            </div><!-- site-branding end -->
                        </div>
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search"><!-- header_search -->
                                <div class="header_search_content">
                                    <div id="search_block_top" class="search_block_top">
                                        <form id="searchbox" method="get" action="#">
                                            <input class="search_query form-control" type="text" id="search_query_top" name="s" placeholder="Buscar producto..." value="">
                                            <button type="submit" name="submit_search" class="btn btn-default button-search"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- header_search end -->
                        </div>
                        <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <!-- header_extra -->
                            <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                                <div class="account dropdown">
                                    <div class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="account_icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="account_content">
                                            <div class="account_text"><a href="#">Regístrate</a></div>
                                        </div>
                                    </div>
                                    <div class="account_extra dropdown_link" data-toggle="dropdown">Cuenta</div>
                                    <aside class="widget_account dropdown_content">
                                        <div class="widget_account_content">
                                            <ul>
                                                <li><i class="fa fa-sign-in mr-2"></i><a href="{{route('dashboard')}}">Iniciar sesión</a></li>
                                                <li><i class="fa fa-sign-in mr-2"></i><a href="{{route('dashboard')}}">Registrar</a></li>
                                            </ul>
                                        </div>
                                    </aside>
                                </div>
                            </div><!-- header_extra end -->
                        </div>
                    </div>
                </div>
            </div><!-- haeder-main end -->
            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu ttm-bgcolor-white clearfix">
                <div class="site-header-menu-inner stickable-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main_nav_content d-flex flex-row">
                                    <div class="cat_menu_container">
                                        <a href="#" class="cat_menu d-flex flex-row align-items-center">
                                            <div class="cat_icon"><i class="fa fa-bars"></i></div>
                                            <div class="cat_text"><span>Comprar por</span><h4>Categorías</h4></div>
                                        </a>
                                        <ul class="cat_menu_list menu-vertical">
                                            <li><a href="#" class="close-side"><i class="fa fa-times"></i></a></li>
                                            <li class="parent">
                                                <a href="#">Iluminación y Control</a>
                                            </li>
                                            <li class="parent">
                                                <a href="#">Artefactos Eléctricos</a>
                                            </li>
                                            <li><a href="#">Alta Tensión</a></li>
                                            <li><a href="#">Transporte de Información</a></li>

                                        </ul>
                                    </div>
                                    <!--site-navigation -->
                                    <div id="site-navigation" class="site-navigation">
                                        <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                            <span class="menubar-box">
                                                <span class="menubar-inner"></span>
                                            </span>
                                        </div>

                                        <!-- menu -->
                                        <nav class="menu menu-mobile" id="menu">
                                            <ul class="nav">
                                                <li class="mega-menu-item active">
                                                    <a href="#" class="mega-menu-link">HUBBELL MÉXICO</a>
                                                    <ul class="mega-submenu">
                                                        <li><a href="#">QUIÉNES SOMOS</a></li>

                                                        <li><a href="#">BOLSA DE TRABAJO</a></li>

                                                    </ul>
                                                </li>
                                                <!-- end link 1 -->

                                                <!--LINK 2-->
                                                <li class="mega-menu-item ">


                                                    <a href="#" class="mega-menu-link">PRODUCTOS</a>


                                                    <ul class="mega-submenu">
                                                        <li><a href="#">ARTEFACTOS ELÉCTRICOS</a></li>

                                                        <li><a href="#">ILUMINACIÓN Y CONTROL</a></li>

                                                        <li><a href="#">ALTA TENSIÓN</a></li>

                                                        <li><a href="#">TRANSPORTE DE INFORMACIÓN</a></li>

                                                    </ul>


                                                </li>
                                                <!-- LINK 2-->

                                                <!-- LINK 3-->

                                                <li >
                                                    <a href="#" class="mega-menu-link">MERCADOS</a>

                                                </li>
                                                <!--LINK3-->

                                                <!--LINK4-->
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-link">RECURSOS</a>
                                                    <ul class="mega-submenu">
                                                        <li><a href="#">CATÁLOGOS EN LÍNEA </a></li>

                                                        <li><a href="#">CROSS REFERENCE</a></li>

                                                        <li><a href="#">LITERATURA</a></li>

                                                        <li><a href="#">PUNTOS DE VENTA</a></li>

                                                        <li><a href="#">DISTRIBUIDORES</a></li>

                                                        <li><a href="#">PODCAST</a></li>

                                                    </ul>



                                                </li>
                                                <!--LINK4-->

                                                <!--LINK5-->
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-link">CAPACITACIÓN</a>

                                                    <ul class="mega-submenu">
                                                        <li><a href="#">HUBBELL UNIVERSIDAD </a></li>

                                                        <li><a href="#">WEBINARS</a></li>

                                                        <li><a href="#">LITERATURA</a></li>

                                                        <li><a href="#">CERTIFICACIÓN</a></li>

                                                        <li><a href="#">AGENDA</a></li>



                                                    </ul>
                                                </li>
                                                <!--LINK5-->
                                                <li><a href="#">INSPIRACIÓN</a></li>
                                            </ul>
                                        </nav>

                                    </div><!-- site-navigation end-->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- site-header-menu end -->
        </header><!--header end-->
        <div id="rev_slider_5_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery">
            <!-- START REVOLUTION SLIDER -->
            <div id="rev_slider_5_1" class="rev_slider fullwidthabanner" data-version="5.4.8">
                <ul>
                    <li data-index="rs-6" data-transition="fade" data-slotamount="1" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/public/images/slides/buildings2.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1   <div class="tp-caption tp-resizeme" id="slide-6-layer-1" data-x="['right','right','right','center']" data-hoffset="['50','40','-520','-520']"
                                                    data-y="['top','top','top','top']" data-voffset="['103','103','63','63']"

                                                    data-fontsize="['23','23','23','23']"
                                                    data-lineheight="['30','30','30','30']"
                                                    data-color="['rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)']"
                                                    data-width="none"
                                                    data-height="none"
                                                    data-whitespace="nowrap"

                                                    data-transform_idle="o:1;"
                                                    data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                                                    data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                                                    data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                                                    data-start="600"

                                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                                    data-paddingtop="[0,0,0,0]"
                                                    data-paddingright="[0,0,0,0]"
                                                    data-paddingbottom="[0,0,0,0]"
                                                    data-paddingleft="[0,0,0,0]"
                                                    data-type="text"
                                                    data-responsive_offset="on"> Sliding Compound Miter Saw  </div>-->
                        <!-- LAYER NR. 2  <div class="tp-caption rev-shape ttm-bgcolor-skincolor tp-resizeme" id="slide-6-layer-2" data-x="['right','right','right','center']"
                                                    data-hoffset="['50','40','30','0']" data-y="['top','top','top','middle']" data-voffset="['151','151','80','-100']"

                                                    data-fontsize="['16','16','14','13']"
                                                    data-lineheight="['20','20','20','12']"
                                                    data-fontweight="['400','400','400','400']"
                                                    data-color="['rgb(255, 255, 255)','rgb(255, 255, 255)','rgb(255, 255, 255)','rgb(242, 244, 248)']"
                                                    data-width="none"
                                                    data-height="none"
                                                    data-whitespace="nowrap"

                                                    data-transform_idle="o:1;"
                                                    data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                                                    data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                                                    data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                                                    data-start="800"

                                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                                    data-paddingtop="[13,13,10,10]"
                                                    data-paddingright="[22,22,22,10]"
                                                    data-paddingbottom="[11,11,10,10]"
                                                    data-paddingleft="[22,22,22,10]"
                                                    data-type="text"
                                                    data-responsive_offset="on">Online & In - Stores: Aug 1  - 30  </div> -->
                        <!-- LAYER NR. 3  <div class="tp-caption tp-resizeme" id="slide-6-layer-3" data-x="['right','right','right','center']" data-hoffset="['50','40','30','0']"
                                                    data-y="['top','top','top','middle']" data-voffset="['219','219','140','-45']"

                                                    data-fontsize="['48','48','42','42']"
                                                    data-lineheight="['52','52','48','48']"
                                                    data-fontweight="['600','600','600','600']"
                                                    data-color="['rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)']"
                                                    data-width="none"
                                                    data-height="none"
                                                    data-whitespace="nowrap"

                                                    data-transform_idle="o:1;"
                                                    data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                                                    data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                                                    data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                                                    data-start="1000"

                                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                                    data-paddingtop="[0,0,0,0]"
                                                    data-paddingright="[0,0,0,0]"
                                                    data-paddingbottom="[0,0,0,0]"
                                                    data-paddingleft="[0,0,0,0]"
                                                    data-type="text"
                                                    data-responsive_offset="on">Mad Sell Goods at a   </div> -->
                        <!-- LAYER NR. 4   <div class="tp-caption tp-resizeme" id="slide-6-layer-4" data-x="['right','right','right','center']" data-hoffset="['50','40','30','0']"
                                                    data-y="['top','top','top','middle']" data-voffset="['286','286','199','0']"

                                                    data-fontsize="['48','48','42','42']"
                                                    data-lineheight="['52','52','48','48']"
                                                    data-fontweight="['600','600','600','600']"
                                                    data-color="['rgba(255, 210, 0,1)','rgba(255, 210, 0,1)','rgba(255, 210, 0,1)','rgba(255, 210, 0,1)']"
                                                    data-width="none"
                                                    data-height="none"
                                                    data-whitespace="nowrap"

                                                    data-transform_idle="o:1;"
                                                    data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                                                    data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                                                    data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                                                    data-start="1200"

                                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                                    data-paddingtop="[0,0,0,0]"
                                                    data-paddingright="[0,0,0,0]"
                                                    data-paddingbottom="[0,0,0,0]"
                                                    data-paddingleft="[0,0,0,0]"
                                                    data-type="text"
                                                    data-responsive_offset="on">CONFIABLE  </div>-->
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption tp-resizeme" id="slide-6-layer-5" data-x="['right','right','right','center']" data-hoffset="['50','40','30','0']"
                             data-y="['top','top','top','middle']" data-voffset="['352','352','255','45']"

                             data-fontsize="['48','48','42','42']"
                             data-lineheight="['52','52','48','48']"
                             data-fontweight="['600','600','600','600']"
                             data-color="['rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"

                             data-transform_idle="o:1;"
                             data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                             data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                             data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                             data-start="1400"

                             data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"
                             data-type="text"
                             data-responsive_offset="on">CONFIABLE  </div>
                        <!-- LAYER NR. 6 -->
                        <a class="tp-caption rev-button ttm-bgcolor-highlight" href="#" target="_self" id="slide-6-layer-6" data-x="['right','right','right','center']" data-hoffset="['50','40','30','0']" data-y="['bottom','bottom','bottom','middle']" data-voffset="['163','163','75','103']"

                           data-fontsize="['15','15','14','12']"
                           data-lineheight="['20','20','16','15']"
                           data-fontweight="['600','600','600','600']"
                           data-color="['rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)']"
                           data-width="none"
                           data-height="none"
                           data-whitespace="nowrap"

                           data-transform_idle="o:1;"
                           data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:500;e:Power4.easeInOut;"
                           data-style_hover="c:rgb(255, 255, 255);bg:rgb(0, 11, 28);"
                           data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                           data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                           data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                           data-start="1600"

                           data-textAlign="['inherit','inherit','inherit','inherit']"
                           data-paddingtop="[15,15,14,14]"
                           data-paddingright="[30,30,22,22]"
                           data-paddingbottom="[14,14,12,12]"
                           data-paddingleft="[30,30,22,22]"
                           data-type="button"
                           data-responsive_offset="on" >EXPLORA ALCANCES<span class="ml-2"><i class="themifyicon ti-angle-right"></i></span>
                        </a>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-7" data-transition="fade" data-slotamount="1"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/public/images/slides/Powerlines-Hero.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption tp-resizeme" id="slide-7-layer-6" data-x="['left','left','left','left']" data-hoffset="['50','40','30','30']"
                             data-y="['top','top','top','middle']" data-voffset="['352','352','255','45']"

                             data-fontsize="['48','48','42','38']"
                             data-lineheight="['52','52','48','38']"
                             data-fontweight="['600','600','600','600']"
                             data-color="['rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"

                             data-transform_idle="o:1;"
                             data-transform_in="x:[-175%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;"
                             data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                             data-mask_in="x:[100%];y:0px;s:inherit;e:inherit;"
                             data-start="1400"


                             data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"

                             data-paddingleft="[0,0,0,0]"
                             data-type="text"
                             data-responsive_offset="on">ENERGÍA  </div>
                        <!-- LAYER NR. 7 -->
                        <a class="tp-caption rev-button ttm-bgcolor-highlight" href="#" target="_self" id="slide-7-layer-7" data-x="['left','left','left','left']" data-hoffset="['50','40','30','30']"  data-y="['bottom','bottom','bottom','middle']" data-voffset="['163','163','75','103']"

                           data-fontsize="['15','15','14','12']"
                           data-lineheight="['20','20','16','15']"
                           data-fontweight="['600','600','600','600']"
                           data-color="['rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)']"
                           data-width="none"
                           data-height="none"
                           data-whitespace="nowrap"

                           data-transform_idle="o:1;"
                           data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:500;e:Power4.easeInOut;"
                           data-style_hover="c:rgb(255, 255, 255);bg:rgb(0, 11, 28);"
                           data-transform_in="x:[-200%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;"
                           data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                           data-mask_in="x:[100%];y:0px;s:inherit;e:inherit;"
                           data-start="1600"

                           data-textAlign="['inherit','inherit','inherit','inherit']"
                           data-paddingtop="[15,15,14,14]"
                           data-paddingright="[30,30,22,22]"
                           data-paddingbottom="[14,14,12,12]"
                           data-paddingleft="[30,30,22,22]"
                           data-type="text"
                           data-responsive_offset="on" >PRODUCTOS UTILITARIOS<span class="ml-2"><i class="themifyicon ti-angle-right"></i></span>
                        </a>
                    </li>
                    <li data-index="rs-5" data-transition="fade" data-slotamount="1" data-easein="default" data-easeout="default" data-masterspeed="1500" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/public/images/slides/Hubbell-Inc-Day-061317.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption tp-resizeme" id="slide-6-layer-5" data-x="['right','right','right','center']" data-hoffset="['50','40','30','0']"
                             data-y="['top','top','top','middle']" data-voffset="['352','352','255','45']"

                             data-fontsize="['48','48','42','42']"
                             data-lineheight="['52','52','48','48']"
                             data-fontweight="['600','600','600','600']"
                             data-color="['rgba(255, 255, 255,1)','rgba(255, 255, 255,1)','rgba(255, 255, 255,1)','rgba(255, 255, 255,1)']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"

                             data-transform_idle="o:1;"
                             data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                             data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                             data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                             data-start="1400"

                             data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"
                             data-type="text"
                             data-responsive_offset="on">NOSOTROS  </div>
                        <!-- LAYER NR. 6 -->
                        <a class="tp-caption rev-button ttm-bgcolor-highlight" href="#" target="_self" id="slide-6-layer-6" data-x="['right','right','right','center']" data-hoffset="['50','40','30','0']" data-y="['bottom','bottom','bottom','middle']" data-voffset="['163','163','75','103']"

                           data-fontsize="['15','15','14','12']"
                           data-lineheight="['20','20','16','15']"
                           data-fontweight="['600','600','600','600']"
                           data-color="['rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)','rgba(10, 28, 55,1)']"
                           data-width="none"
                           data-height="none"
                           data-whitespace="nowrap"

                           data-transform_idle="o:1;"
                           data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:500;e:Power4.easeInOut;"
                           data-style_hover="c:rgb(255, 255, 255);bg:rgb(0, 11, 28);"
                           data-transform_in="x:[100%];y:0px;s:1500;e:Power3.easeOut;"
                           data-transform_out="x:auto;y:auto;opacity:0;s:1500;e:Power4.easeIn;"
                           data-mask_in="x:[-150%];y:0px;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:inherit;e:inherit;"
                           data-start="1600"

                           data-textAlign="['inherit','inherit','inherit','inherit']"
                           data-paddingtop="[15,15,14,14]"
                           data-paddingright="[30,30,22,22]"
                           data-paddingbottom="[14,14,12,12]"
                           data-paddingleft="[30,30,22,22]"
                           data-type="button"
                           data-responsive_offset="on" >CONOCE MÁS<span class="ml-2"><i class="themifyicon ti-angle-right"></i></span>
                        </a>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->
        <!--site-main start-->
        <div class="site-main">
            <!-- row-top-section -->
            <section class="row-top-section clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt_50 res-991-mt-0">
                                <div class="row no-gutters">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box style1 ttm-bgcolor-darkgrey">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                                    <i class="themifyicon ti-truck"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>DISTRIBUIDORES</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>Conoce los autorizados</p>
                                                </div>
                                            </div>
                                        </div><!-- featured-icon-box end-->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box style1 ttm-bgcolor-highlight">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-color-darkgrey ttm-icon_element-size-md">
                                                    <i class="themifyicon ti-reload"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>BUSCA POR MARCA</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>Específica en HUBBELL México</p>
                                                </div>
                                            </div>
                                        </div><!-- featured-icon-box end-->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box style1 ttm-bgcolor-darkgrey">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-color-white ttm-icon_element-size-md">
                                                    <i class="themifyicon ti-comments"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>OPORTUNIDADES </h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>En HUBBELL México</p>
                                                </div>
                                            </div>
                                        </div><!-- featured-icon-box end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
            <!-- row-top-section end -->

            <!--banner-box-section-->
            <section class="featured-product-section clearfix">
                <div class="content-inner active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 ml-auto mr-auto">
                                <!-- section title -->
                                <div class="section-title title-style-center_text style2">
                                    <div class="title-header">
                                        <h5>HUBBELL</h5>
                                        <h2 class="title">Categorías de productos </h2>
                                    </div>
                                </div><!-- section title end -->
                            </div>
                        </div><!-- row end -->
                        <div class="products row">
                            <!-- product -->
                            <div class="product col-md-3 col-sm-6 col-xs-12">
                                <div class="product-box">
                                    <!-- product-box-inner -->
                                    <div class="product-box-inner">
                                        <div class="product-image-box">
                                            <img class="img-fluid" src="{{asset('assets/public/images/Lighting-2x.png')}}" alt="">
                                        </div>
                                    </div><!-- product-box-inner end -->
                                    <div class="product-content-box">
                                        <h4><a href="#"> ILUMINACIÓN & CONTROL</a>
                                        </h4>
                                        <span class="price">
<inse>exterior, interior, decorativo, emergencia, control, inversor
			 </inse>
</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product end -->
                            <!-- product -->
                            <div class="product col-md-3 col-sm-6 col-xs-12">
                                <div class="product-box">
                                    <!-- product-box-inner -->
                                    <div class="product-box-inner">
                                        <div class="product-image-box">
                                            <img class="img-fluid" src="{{asset('assets/public/images/plug-2x.png')}}" alt="">
                                        </div>
                                    </div><!-- product-box-inner end -->
                                    <div class="product-content-box">
                                        <h4><a href="#"> ARTEFACTOS ELÉCTRICOS</a>
                                        </h4>
                                        <span class="price">
<ins>dispositivos de cableado, sistemas eléctricos, aproximación, gestión de cables, probadores</ins>
</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product end -->
                            <!-- product -->
                            <div class="product col-md-3 col-sm-6 col-xs-12">
                                <div class="product-box">
                                    <!-- product-box-inner -->
                                    <div class="product-box-inner">
                                        <div class="product-image-box">
                                            <img class="img-fluid" src="{{asset('assets/public/images/tower-2x.png')}}" alt="">
                                        </div>
                                    </div><!-- product-box-inner end -->
                                    <div class="product-content-box">
                                        <h4><a href="#"> ALTA <br> TENSIÓN</a>
                                        </h4>
                                        <span class="price">
<ins>descargadores, bujes, aislantes, herrajes, anclajes a tierra, desagües </ins>
</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product end -->
                            <!-- product -->
                            <div class="product col-md-3 col-sm-6 col-xs-12">
                                <div class="product-box">
                                    <!-- product-box-inner -->
                                    <div class="product-box-inner">
                                        <div class="product-image-box">
                                            <img class="img-fluid" src="{{asset('assets/public/images/page-1-2x.png')}}" alt="">
                                        </div>
                                    </div><!-- product-box-inner end -->
                                    <div class="product-content-box">
                                        <h4><a href="#">TRANSPORTE DE INFORMACIÓN</a>
                                        </h4>
                                        <span class="price">
<ins>cobre, sistemas y conectores de fibra óptica, bastidores, cableado </ins>
</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product end -->
                        </div>
                    </div>  </div>
                <!--banner-box-section end-->
            </section>


            <!-- productos -->

            <section class="featured-product-section clearfix" style="padding-top:0!important;">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                            <!-- section-title -->
                            <div class="section-title title-style-center_text style2">
                                <div class="title-header">
                                    <h5></h5>
                                    <h2 class="title">HOT SALE</h2>
                                </div>
                            </div><!-- section-title end -->
                        </div>
                    </div><!-- row end -->
                    <div class="products row">
                        <!-- product -->
                        <div class="product col-md-3 col-sm-6 col-xs-12">
                            <div class="product-box">
                                <!-- product-box-inner -->
                                <div class="product-box-inner">
                                    <div class="product-image-box">
                                        <img class="img-fluid pro-image-front" src="{{asset('assets/public/images/prods/CHL_H043297-Arran_515.jpg')}}" alt="">
                                        <img class="img-fluid pro-image-back" src="{{asset('assets/public/images/prods/CHL_H043297-Arran_515.jpg')}}" alt="">
                                    </div>
                                    <div class="product-btn-links-wrapper">

                                        <div class="product-btn"><a href="#" class="quick-view-btn tooltip-top" ><i class="ti ti-search"></i></a>
                                        </div>

                                    </div>
                                </div><!-- product-box-inner end -->
                                <div class="product-content-box">
                                    <a class="product-title" href="producto.html">
                                        <h2>Luz de Piso LED</h2>
                                    </a>


                                </div>
                            </div>
                        </div><!-- product end -->
                        <!-- product -->
                        <div class="product col-md-3 col-sm-6 col-xs-12">
                            <div class="product-box">
                                <!-- product-box-inner -->
                                <div class="product-box-inner">
                                    <div class="product-image-box">

                                        <img class="img-fluid pro-image-front" src="{{asset('assets/public/images/prods/KIL_L_ESX_wall_515.jpg')}}" alt="">
                                        <img class="img-fluid pro-image-back" src="{{asset('assets/public/images/prods/KIL_L_ESX_wall_515.jpg')}}" alt="">
                                    </div>


                                    <div class="product-btn-links-wrapper">

                                        <div class="product-btn"><a href="#" class="quick-view-btn tooltip-top" ><i class="ti ti-search"></i></a>
                                        </div>

                                    </div>
                                </div><!-- product-box-inner end -->
                                <div class="product-content-box">
                                    <a class="product-title" href="producto.html">
                                        <h2>Luz de Emergencia</h2>
                                    </a>


                                </div>
                            </div>
                        </div><!-- product end -->
                        <!-- product -->
                        <div class="product col-md-3 col-sm-6 col-xs-12">
                            <div class="product-box">
                                <!-- product-box-inner -->
                                <div class="product-box-inner">
                                    <div class="product-image-box">
                                        <img class="img-fluid pro-image-front" src="{{asset('assets/public/images/prods/WBP_HFCH2096RSBK_PRODIMAGE_515.jpg')}}" alt="">
                                        <img class="img-fluid pro-image-back" src="{{asset('assets/public/images/prods/WBP_HFCH2096RSBK_PRODIMAGE_515.jpg')}}" alt="">
                                    </div>
                                    <div class="product-btn-links-wrapper">

                                        <div class="product-btn"><a href="#" class="quick-view-btn tooltip-top" ><i class="ti ti-search"></i></a>
                                        </div>

                                    </div>
                                </div><!-- product-box-inner end -->
                                <div class="product-content-box">
                                    <a class="product-title" href="producto.html">
                                        <h2>Fibra Óptica Exteriores</h2>
                                    </a>


                                </div>
                            </div>
                        </div><!-- product end -->
                        <!-- product -->
                        <div class="product col-md-3 col-sm-6 col-xs-12">
                            <div class="product-box">
                                <!-- product-box-inner -->
                                <div class="product-box-inner">
                                    <div class="product-image-box">

                                        <img class="img-fluid pro-image-front" src="{{asset('assets/public/images/prods/WBP_FALCDSC6B_PRODIMAGE_515.jpg')}}" alt="">
                                        <img class="img-fluid pro-image-back" src="{{asset('assets/public/images/prods/WBP_FALCDSC6B_PRODIMAGE_515.jpg')}}" alt="">
                                    </div>
                                    <div class="product-btn-links-wrapper">

                                        <div class="product-btn"><a href="#" class="quick-view-btn tooltip-top" ><i class="ti ti-search"></i></a>
                                        </div>

                                    </div>
                                </div><!-- product-box-inner end -->
                                <div class="product-content-box">
                                    <a class="product-title" href="product-layout1.html">
                                        <h2>Adaptador Fibra Óptica</h2>
                                    </a>


                                </div>
                            </div>
                        </div><!-- product end -->

                    </div>
                </div>
            </section>
            <!-- end prods -->


            <!-- blog-section -->
            <section class="blog-title-section bg-img3 clearfix" style="background-image: url({{asset('assets/public/images/row-bgimage-4.jpg')}});">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-7 ml-auto mr-auto">
                            <!-- section-title -->
                            <div class="section-title title-style-center_text style2">
                                <div class="title-header">
                                    <h5>NUESTRAS ÚLTIMAS</h5>
                                    <h2 class="title">NOTICIAS</h2>
                                </div>
                            </div><!-- section-title end -->
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
            <section class="blog-section clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- slider -->
                            <div class="slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows":false, "autoplay":true}'>
                                <!-- featured-imagebox-post -->
                                <div class="featured-imagebox featured-imagebox-post ttm-box-view-top-image">
                                    <div class="ttm-post-featured-outer">
                                        <div class="ttm-post-thumbnail featured-thumbnail">
                                            <img class="img-fluid" src="{{asset('assets/public/images/blog/05.jpg')}}" alt="">
                                            <div class="ttm-box-post-date">
<span class="ttm-entry-date">
<time class="entry-date" datetime="2019-07-28T07:07:55+00:00">28<span class="entry-month">Jul</span></time>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-content featured-content-post">

                                        <div class="post-title featured-title">
                                            <h5><a href="#">Equipo para minimizar peligro del alta tensión</a></h5>
                                        </div>
                                    </div>
                                </div><!-- featured-imagebox-post end -->
                                <!-- featured-imagebox-post -->
                                <div class="featured-imagebox featured-imagebox-post ttm-box-view-top-image">
                                    <div class="ttm-post-featured-outer">
                                        <div class="ttm-post-thumbnail featured-thumbnail">
                                            <img class="img-fluid" src="{{asset('assets/public/images/blog/04.jpg')}}" alt="">
                                            <div class="ttm-box-post-date">
<span class="ttm-entry-date">
<time class="entry-date" datetime="2019-08-10T07:07:55+00:00">10<span class="entry-month">Aug</span></time>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-content featured-content-post">

                                        <div class="post-title featured-title">
                                            <h5><a href="#">Errores comunes en las instalaciones eléctricas</a></h5>
                                        </div>
                                    </div>
                                </div><!-- featured-imagebox-post end -->
                                <!-- featured-imagebox-post -->
                                <div class="featured-imagebox featured-imagebox-post ttm-box-view-top-image">
                                    <div class="ttm-post-featured-outer">
                                        <div class="ttm-post-thumbnail featured-thumbnail">
                                            <img class="img-fluid" src="{{asset('assets/public/images/blog/06.jpg')}}" alt="">
                                            <div class="ttm-box-post-date">
<span class="ttm-entry-date">
<time class="entry-date" datetime="2019-08-21T07:07:55+00:00">21<span class="entry-month">Aug</span></time>
</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-content featured-content-post">

                                        <div class="post-title featured-title">
                                            <h5><a href="#">Eligiendo el material para el cableado</a></h5>
                                        </div>
                                    </div>
                                </div><!-- featured-imagebox-post end -->



                            </div><!-- slick_slider end -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- multi-section end -->
        </div><!--site-main end-->
        <!--footer start-->
        <footer class="footer widget-footer ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey ttm-textcolor-white clearfix" style="background-image: url({{asset('assets/public/images/footer-bg.png')}});">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="first-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 widget-area">
                            <div class="widget ttm-footer-cta-wrapper">
                                <h5>Únete a nuestro Newsletter</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-5 widget-area m-auto">
                            <div class="widget ttm-footer-cta-wrapper">
                                <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                                    <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                        <p>
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="email" name="email" placeholder="Ingrese su Email..." required="">
                                        </p>
                                        <p><input type="submit" value="ENVIAR"></p>
                                    </div>
                                    <div id="subscribe-msg"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 widget-area">
                            <div class="social-icons social-hover widget text-center">
                                <ul class="list-inline">
                                    <li class="social-facebook"><a class="tooltip-top" href="#" data-tooltip="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li class="social-twitter"><a class="tooltip-top" href="#" data-tooltip="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

                                    <li class="social-linkedin"><a class="tooltip-top" href="#" data-tooltip="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sep_holder_box">
                <span class="sep_holder"><span class="sep_line"></span></span>
            </div>
            <div class="second-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 widget-area m-auto">
                            <div class="widget">
                                <div class="footer-logo">
                                    <img id="footer-logo-img" class="img-center" src="{{asset('assets/public/images/logo-footer.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 widget-area">
                            <div class="widget widget_text ml-40">
                                <ul class="widget_info_text">
                                    <li><i class="fa fa-map-marker"></i><strong>Ubicación</strong>
                                        <br> PARQUE INDUSTRIAL TOLUCA 2000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_text">
                                <ul class="widget_info_text">
                                    <li><i class="fa fa-envelope-o"></i><strong>Email </strong>
                                        <br> info@hubbell.com.mx</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_text">
                                <ul class="widget_info_text">
                                    <li><i class="fa fa-phone"></i><strong>Teléfonos</strong>
                                        <br>01800-9530957 / 7229-800600</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sep_holder_box">
                <span class="sep_holder"><span class="sep_line"></span></span>
            </div>
            <div class="third-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 widget-area mr-auto">
                            <div class="widget widget_text pr-25 clearfix">
                                <h3 class="widget-title">HUBBELL MÉXICO</h3>
                                <div class="textwidget widget-text">
                                    <p class="pb-10">Hubbell Incorporated nace cuando su fundador, Harvey Hubbell, desarrolló herramientas y equipos para satisfacer la creciente demanda de nuevas máquinas de ensamblaje y fabricación durante la revolución industrial.</p>
                                    <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor" href="" title="">Leer Más...</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                                <h3 class="widget-title">Nosotros</h3>
                                <ul class="menu-footer-quick-links">
                                    <li><a href="#">Capacitación</a>
                                    </li>
                                    <li><a href="#">Mercados</a></li>
                                    <li><a href="#">Recursos</a></li>
                                    <li><a href="#">Inspiración</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                                <h3 class="widget-title">Productos</h3>
                                <ul class="menu-footer-quick-links">
                                    <li><a href="#">Iluminación y controles</a></li>
                                    <li><a href="#">Artefactos Eléctricos</a></li>
                                    <li><a href="#">Alta Tensión</a></li>
                                    <li><a href="#">Transporte de Información</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget contact_map clearfix">
                                <h3 class="widget-title">Distribuidores</h3>
                                <div class="footer_map mb-30 mt-5">
                                    <img src="{{asset('assets/public/images/mx-map.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sep_holder_box">
                <span class="sep_holder"><span class="sep_line"></span></span>
            </div>
            <div class="bottom-footer-text">
                <div class="container">
                    <div class="row copyright">
                        <div class="col-md-12 col-lg-6 ttm-footer2-left">
                            <span>HUBBELL MÉXICO  © 2020 | DISEÑO: <a href="http://web-club.es/">WEBCLUB</a></span>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!--footer end-->
        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->
        <div class="wrap-modal1 js-modal1">
            <div class="overlay-modal1 js-hide-modal1"></div>
            <div class="container">
                <div class="modal1-content">
                    <button class="close js-hide-modal1">
                        <i class="fa fa-close"></i>
                    </button>
                    <div class="row ttm-single-product-details ttm-bgcolor-white">
                        <div class="col-lg-6 col-md-6 col-sm-12 ml-auto mr-auto">
                            <div class="product-gallery easyzoom-product-gallery">
                                <div class="product-look-views left">
                                    <div class="mt-35 mb-35">
                                        <ul class="thumbnails easyzoom-gallery-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":true, "infinite":true, "vertical":true}'>
                                            <li>
                                                <a href="https://via.placeholder.com/768x1035?text=pro-view+01.jpg" data-standard="https://via.placeholder.com/768x1035?text=pro-view+01.jpg">
                                                    <img class="img-fluid" src="https://via.placeholder.com/768x1035?text=pro-view+01.jpg" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://via.placeholder.com/768x1035?text=pro-view+02.jpg" data-standard="https://via.placeholder.com/768x1035?text=pro-view+02.jpg">
                                                    <img class="img-fluid" src="https://via.placeholder.com/768x1035?text=pro-view+02.jpg" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://via.placeholder.com/768x1035?text=pro-view+03.jpg" data-standard="https://via.placeholder.com/768x1035?text=pro-view+03.jpg">
                                                    <img class="img-fluid" src="https://via.placeholder.com/768x1035?text=pro-view+03.jpg" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://via.placeholder.com/768x1035?text=pro-view+04.jpg" data-standard="https://via.placeholder.com/768x1035?text=pro-view+04.jpg">
                                                    <img class="img-fluid" src="https://via.placeholder.com/768x1035?text=pro-view+04.jpg" alt="" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://via.placeholder.com/768x1035?text=pro-view+05.jpg" data-standard="https://via.placeholder.com/768x1035?text=pro-view+05.jpg">
                                                    <img class="img-fluid" src="https://via.placeholder.com/768x1035?text=pro-view+05.jpg" alt="" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-look-preview-plus right">
                                    <div class="pl-35 res-767-pl-15">
                                        <div class="easyzoom easyzoom-model easyzoom--overlay easyzoom--with-thumbnails">
                                            <a href="https://via.placeholder.com/768x1035?text=pro-view+01.jpg">
                                                <img class="img-fluid" src="https://via.placeholder.com/768x1035?text=pro-view+01.jpg" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="summary entry-summary pl-30 res-991-pl-0 res-991-pt-40">
                                <h2 class="product_title entry-title">DEWALT 4-Piece T-Shank Jig Saw Blade Case</h2>
                                <div class="share-icons social-links">
                                    <span>Share :</span>
                                    <a href="#"><i class="ti ti-facebook"></i></a>
                                    <a href="#"><i class="ti ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti ti-google"></i></a>
                                    <a href="#"><i class="ti ti-linkedin"></i></a>
                                </div>
                                <div class="comments-notes clearfix">
                                    &nbsp;&nbsp;<a href="javascript:void(0)" class="review-link" rel="nofollow">(No review)</a>
                                    &nbsp;&nbsp;<a href="javascript:void(0)" class="review-link" rel="nofollow">Write to Review</a>
                                    <div class="product-rating clearfix">
                                        <ul class="star-rating clearfix">
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_in-stock"><i class="fa fa-check-circle"></i><span> in Stock Only 14 left</span></div>
                                <span class="price">
<ins><span class="product-Price-amount">
<span class="product-Price-currencySymbol">$</span>110.00  </span>
</ins>
<del><span class="product-Price-amount">
<span class="product-Price-currencySymbol">$</span>123.00  </span>
</del>
</span>
                                <div class="product-details__short-description">Raising a heavy fur muff that covered the whole of her lower arm towards the viewer regor then turned to look out the window</div>
                                <div class="mt-30 mb-35">
                                    <div class="quantity">
                                        <label>Quantity: </label>
                                        <input type="text" value="1" name="quantity-number" class="qty">
                                        <span class="inc quantity-button">+</span>
                                        <span class="dec quantity-button">-</span>
                                    </div>
                                </div>
                                <div class="actions">
                                    <div class="add-to-cart">
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor" href="#">Add to cart</a>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <a href="#" rel="nofollow" data-product-id="24006456" data-product-type="simple" class="add_to_wishlist">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        <span class="wishlist-text">Add to Wish List</span>
                                    </a>
                                    <a href="#" class="compare button" data-product_id="24006456" rel="nofollow">
                                        <i class="fa fa-expand" aria-hidden="true"></i>
                                        <span class="compare-text">Compare</span>
                                    </a>
                                </div>
                                <div id="block-reassurance-1" class="block-reassurance">
                                    <ul>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <i class="fa fa-lock"></i>
                                                <span>Security policy (edit with Customer reassurance module)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <i class="fa fa-truck"></i>
                                                <span>Delivery policy (edit with Customer reassurance module)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <i class="fa fa-arrows-h"></i>
                                                <span>Return policy (edit with Customer reassurance module)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- page end -->
@endsection

