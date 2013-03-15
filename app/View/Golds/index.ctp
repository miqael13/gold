<script type="text/javascript">
    var count;
    // Initialization fancybox and haks for Safari
    jQuery(document).ready(function() {
		
        /* This is basic - uses default settings */
			
        jQuery("a.single_image").on('click',function(){
            $.fancybox({            
                'type'  : 'iframe',
                'autoSize': false,
                'width'             : 500,
                'height'            : 500,
                'href'              : '/golds/pic/',
                'transitionIn'	:	'elastic',
                'transitionOut'	:	'elastic',
                'speedIn'		:	600, 
                'speedOut'		:	200, 
                'overlayShow'	:	true
            });
            return false;
        });	
			
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
                filter: '*',
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
                count = columns;			
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
            
            $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                    var $newItem1 = '<section class="holiday item">'
                        +'<a class="single_image" href="/images/port-img4.jpg">'
                        +'<div>'
                        +'<div class="item_hover">'
                        +'<header>'         
                        +' <hgroup>'
                        +' <h2> цена $273</h2>'
                        +'<h3> вес 17.5гр</h3>'
                        +' </hgroup>'
                        +' </header>'
                        +'</div>'
                        +'<div class="n38 icons"><span>`</span></div>'
                        +'<img src="/images/port-img4.jpeg" alt="Video sit amet consectetur" />'
                        +'</div>'
                        +' </a>'
                        +'</section>';
                    var $newItem;
                    for(var i = 0; i<20; i++){
                        $newItem += $newItem1;
                    }
                    $container_isotope.isotope( 'insert', $($newItem) );
                    resizeItems();
                }
            });
            
           
        });//images loaded

    });

</script>
<div id="wrap">
    <section id="content" class="portfolio archives"> 
        <?php for ($i = 0; $i < 9; $i++) { ?>
            <section class="holiday item">
                <a class="single_image" href="/images/port-img4.jpg">
                    <div>
                        <div class="item_hover">
                            <header>         
                                <hgroup>
                                    <h2> цена $273</h2>
                                    <h3> вес 17.5гр</h3>
                                </hgroup>
                            </header>
                        </div>
                        <div class="n38 icons"><span>`</span></div>
                        <img src="/images/port-img4.jpeg" alt="Video sit amet consectetur" />
                    </div>
                </a>
            </section>
        <?php } ?>

    </section><!-- end #content --> 
</div>  


