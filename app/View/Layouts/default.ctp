<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>MyGold.am</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/jquery.fancybox-1.3.4.css" />
        <link rel="stylesheet" href="/css/desktop.css" media="all and (min-width: 1501px)" />
        <link rel="stylesheet" href="/css/tablet.css" media="all and (min-width: 650px) and (max-width: 1500px)" />
        <link rel="stylesheet" href="/css/phone.css" media="all and (max-width: 649px)" />

        <script src="/js/plugins/modernizr-2.6.1.min.js"></script>
    </head>

    <body>        
        
        <?php echo $this->element('sidebar'); ?>
        <?php echo $this->fetch('content'); ?>
             

        <script src="/js/plugins/jquery-1.8.0.min.js"></script>
        <script src="/js/plugins/jquery.isotope.min.js"></script>
        <script src="/js/plugins/jquery.debouncedresize.min.js"></script>
        <script src="/js/plugins/jquery.easing.1.3.js"></script>
        <script src="/js/plugins/jquery.fancybox-1.3.4.pack.js"></script>
        <script src="/js/plugins/jquery.mousewheel-3.0.4.pack.js"></script>
        <script src="/js/plugins/respond.min.js"></script>
        <script src="/js/plugins/css3-mediaqueries.js"></script>
        <script src="/js/custom.js"></script>    


        <script type="text/javascript">
		
            // Initialization fancybox and haks for Safari
            jQuery(document).ready(function() {
		
                /* This is basic - uses default settings */
			
                jQuery("a.single_image").fancybox();
			
                /* Using custom settings */
			
                jQuery("a#inline").fancybox({
                    'hideOnContentClick': true
                });
		
                /* Apply fancybox to multiple items */
			
                jQuery("a.group").fancybox({
                    'transitionIn'	:	'elastic',
                    'transitionOut'	:	'elastic',
                    'speedIn'		:	600, 
                    'speedOut'		:	200, 
                    'overlayShow'	:	false
                });
			
                // Safari hak
                if( jQuery.browser.safari ){
                    jQuery('h1, h2, h3, h4, h5, h6').css('font-weight', '400');
                }
			
            });

            // Initialization istope       	
            jQuery(document).ready(function(jQuery) {
                var $container_isotope = jQuery('.portfolio');
			
                $container_isotope.imagesLoaded( function( $images, $proper, $broken ) {

                    $(".preloader").hide('slow');

                    $container_isotope.isotope({
                        // options
                        animationEngine: 'jquery',
                        animationOptions: {
                            duration: 100,
                            easing: 'linear',
                            queue: true
                        },
                        itemSelector : '.item',
                        layoutMode : 'masonry',
                        resizable : false,
                        transformsEnabled : true,

                        getSortData : {
                            // ...
                            year : function ( $elem ) {
                                return parseInt( $elem.attr('data-year'));
                            }

                        }
                    });//isotope

                    //Resize Items at start
                    resizeItems();

                    // filter items when filter link is clicked
                    $('#filters a').click(function(){
                        var selector = $(this).attr('data-filter');
                        $container_isotope.isotope({ filter: selector });
                        var $parent = $(this).parents("#filters");
				  
                        $parent.find(".filter_on").removeClass('filter_on');
                        $("#filters").not($parent).find("li").removeClass('filter_on').first().addClass("filter_on");
                        $(this).parent().addClass("filter_on");
				  
                        return false;
                    });

                    function getItemWidth(){
					
                        var columns = 10;
                        var window_width = $(window).width();
					
                        if(window_width >=1950){
                            columns = 8;
                        }else if(window_width >=1750 && window_width <1950){
                            columns = 7;
                        }else if(window_width >=1550 && window_width <1750){
                            columns = 6;
                        }else if(window_width >=1350 && window_width <1550){
                            columns = 5;
                        }else if(window_width >=1150 && window_width <1350){
                            columns = 4;
                        }else if(window_width >=950 && window_width <1150){
                            columns = 3;
                        }else if(window_width >=750 && window_width <950){
                            columns = 2;
                        }else if(window_width <750){
                            columns = 1;
                        }
					
                        return Math.floor( $container_isotope.width() / columns);
                    } 

                    function resizeItems(){
                        var item_width = getItemWidth();
                        $(".item").each(function(index){
                            $(this).css('width', item_width+'px');
                        });
                        $container_isotope.isotope('reLayout'); 
                    }

                    $(window).on("debouncedresize", function( event ) {
                        resizeItems();

                    });
                });//images loaded

            });
        </script>

    </body>
</html>
