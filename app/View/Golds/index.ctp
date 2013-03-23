<script type="text/javascript">
    var offset = 1;
    
    jQuery(".item_hover").live('click',function(){
        var jevId = $(this).attr('jevId');
        $.fancybox({            
            'type'  : 'iframe',
            'autoSize': false,
            'width'             : 500,
            'height'            : 500,
            'href'              : '/golds/pic/'+jevId,
            'transitionIn'	:	'elastic',
            'transitionOut'	:	'elastic',
            'speedIn'		:	600, 
            'speedOut'		:	200, 
            'overlayShow'	:	true
        });
        return false;
    });	
    $('.icons').live('click',function(){
        var jevId = $(this).attr('jevId'); 
        window.open('/golds/singleView/'+jevId);
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
//                var selector = $(this).attr('data-filter');
                $container_isotope.isotope({ filter: '*' });
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
            var ajax = false;
            $(window).scroll(function(){
                if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                    var $newItem;
                    if(ajax){
                        return false;
                    }
                    ajax = true;
                    $.ajax({
                        url: '/golds/addIsotope/'+offset,
                        type: 'POST',
                        beforeSend:function(){$("#infscr-loading").show()},
                        dataType: 'json',
                        success: function(data){   
                            var w = $('.item').width();
                            if(data.status){
                                $.each(data.jeverly,function(key,val){
                                    var $newItem1 = '<section class="holiday item" style="width:'+w+'px;">'
                                        +'<a class="single_image">'
                                        +'<div>'
                                        +'<div class="item_hover" jevId="'+val.Jeverly.id+'">'
                                        +'<header>'         
                                        +' <hgroup>'
                                        +' <h2> цена $'+val.Jeverly.price+'</h2>'
                                        +'<h3> вес '+val.Jeverly.weight+'гр</h3>'
                                        +' </hgroup>'
                                        +' </header>'
                                        +'</div>'
                                        +'<div class="n38 icons" jevId="'+val.Jeverly.id+'"><span>`</span></div>'
                                        +'<img src="/system/Users/'+val.Jeverly.userId+'/'+val.Jeverly.pic1+'" />'
                                        +'</div>'
                                        +' </a>'
                                        +'</section>';
                                    $newItem += $newItem1;                                    
                                });
                                var $newEls = $($newItem);
                                $container_isotope.append( $newEls ).isotope( 'appended', $newEls );
                                offset++;
                                $("#infscr-loading").hide('slow');
                            }else{
                                $("#infscr-loading").hide('slow');
                                return false;
                            }       
                            ajax = false;
                        }
                    });
                  
                }
            });
            
           
        });//images loaded

    });

</script>

<div id="wrap">    
    <div class="banner">
        <p style="font-family: fantasy;font-size: 60px;">MyGold.am</p>
    </div>
    <section id="content" class="portfolio archives"> 
        <?php foreach ($jeverly as $key => $value) { ?>
            <section class="holiday item">
                <a class="single_image" >
                    <div>
                        <div class="item_hover" jevId="<?php echo $value['Jeverly']['id']; ?>" >
                            <header>         
                                <hgroup>
                                    <h2> цена $<?php echo $value['Jeverly']['price'] ?></h2>
                                    <h3> вес <?php echo $value['Jeverly']['weight'] ?>гр</h3>
                                </hgroup>
                            </header>
                        </div>
                        <div class="n38 icons" jevId="<?php echo $value['Jeverly']['id']?>"><span>`</span></div>
                        <img src="/system/Users/<?php echo $value['Jeverly']['userId']; ?>/<?php echo $value['Jeverly']['pic1']; ?>" />
                    </div>
                </a>
            </section>
        <?php } ?>  
        <div id="infscr-loading" style="display: none;"><img alt="Loading..." src="/images/loading.gif"><div><em>Пожалуста подаждите...</em></div></div>
    </section><!-- end #content --> 

</div>  


