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
<div id="wrap">
    <section id="content" class="portfolio archives"> 
        <h3 class="hide_outline">Archives</h3>
        <section class="photography webdesign holiday item">
            <div>
                <div>
                    <div class="item_hover block">
                        <header>
                            <h2>December 2012</h2>
                            <div class="amonut">7 posts</div>
                        </header>
                    </div>
                    <div class="n38 icons"><span>t</span></div>
                    <img src="images/default_item.jpg" alt="Video sit amet consectetur" />
                </div>
            </div>
        </section><!-- end .item -->

        <section class="item photography">
            <a class="single_image" href="images/port-img3.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>COFFE BREAK.</h2>
                                <h3>Photography</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>D</span></div>
                    <img src="images/port-img3.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="item webdesign">
            <a class="single_image" href="images/port-img5.jpg">
                <div>
                    <div class="item_hover block">
                        <p>Donec adipiscing tellus quis ipsum aliquam iaculis. Donec cursus tristique ligula,vestibulum nibh ac ...</p>
                    </div>
                    <div class="n38 icons"><span>l</span></div>
                    <!-- <span class="icon_text">l</span>-->
                    <img src="images/default_item.jpg" alt="Multiple Images" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="item holiday">
            <a class="single_image" href="images/port-img5.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>MET MY COUSIN.</h2>
                                <h3>Holiday</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>J</span></div>
                    <img src="images/port-img5.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="item photography">
            <a class="single_image" href="images/port-img5.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>LOVE THIS PLACE.</h2>
                                <h3>Photography</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>D</span></div>
                    <img src="images/port-img6.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="item holiday">
            <a class="single_image" href="images/port-img7.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>LONDON TAXI.</h2>
                                <h3>Holiday</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>J</span></div>
                    <img src="images/port-img7.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="item webdesign">
            <a class="single_image" href="images/port-img8.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>WEB FOR MY TOWN.</h2>
                                <h3>Photography</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>/</span></div>
                    <img src="images/port-img8.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="item photography">
            <a class="single_image" href="images/port-img9.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>SMILE.</h2>
                                <h3>Photography</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>p</span></div>
                    <img src="images/port-img9.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="photography webdesign holiday item">
            <div>
                <div>
                    <div class="item_hover block">
                        <header>
                            <h2>November 2012</h2>
                            <div class="amonut">6 posts</div>
                        </header>
                    </div>
                    <div class="n38 icons"><span>t</span></div>
                    <img src="images/default_item.jpg" alt="Video sit amet consectetur" />
                </div>
            </div>
        </section><!-- end .item -->

        <section class="webdesign item">
            <a class="single_image" href="images/port-img5.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>HOLIDAY WEBDESIGN.</h2>
                                <h3>Webdesign</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>/</span></div>
                    <img src="images/port-img10.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

        <section class="holiday item">
            <a class="single_image" href="images/port-img4.jpg">
                <div>
                    <div class="item_hover">
                        <header>         
                            <hgroup>
                                <h2>MY LAST VACTION.</h2>
                                <h3>Holiday</h3>
                            </hgroup>
                        </header>
                    </div>
                    <div class="n38 icons"><span>J</span></div>
                    <img src="images/port-img4.jpg" alt="Video sit amet consectetur" />
                </div>
            </a>
        </section><!-- end .item -->

    </section><!-- end #content --> 
</div>  


