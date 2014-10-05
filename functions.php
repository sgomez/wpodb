<?php

function twentyfourteen_child_setup () {
  // This will remove support for featured content in the parent theme  
  remove_theme_support( 'featured-content' );
  
  //This adds support for featured content in child theme 
  //with a different max_posts value of 3 instead of default 6  
  add_theme_support( 'featured-content', array(
    'featured_content_filter' => 'twentyfourteen_get_featured_posts',
	'max_posts' => 3,
  ) );

  // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'social'   => 'Redes sociales',
	) );
}


function wps_trend($atts){
        extract( shortcode_atts( array(
                'w' => '450',           // width
                'h' => '330',           // height
                'q' => '',              // query
                'geo' => 'US',          // geolocation
        ), $atts ) );
        //format input
        $h=(int)$h;
        $w=(int)$w;
        $q=esc_attr($q);
        $geo=esc_attr($geo);
         ob_start();
?>
<script type="text/javascript" src="http://www.google.com/trends/embed.js?hl=en-US&q=<?php echo $q;?>&geo=<?php echo $geo;?>&cmpt=q&content=1&cid=TIMESERIES_GRAPH_0&export=5&w=<?php echo $w;?>&h=<?php echo $h;?>"></script>
<?php
return ob_get_clean();
}
add_shortcode("trends","wps_trend");

//Action hook for theme support 
add_action( 'after_setup_theme', 'twentyfourteen_child_setup', 11);

function twtreplace($content) {
  $twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);
  return $twtreplace;
}

add_filter('the_content', 'twtreplace');   
add_filter('comment_text', 'twtreplace');