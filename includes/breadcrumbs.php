<?php
//Add breadcrumbs

	function the_breadcrumbs() {
 
        global $post;
 
        if (!is_home()) {
 
            echo "<a href='";
            echo home_url();
            echo "'>";
            echo "Start";
            echo "</a>";
 
            if (is_category() || is_single()) {
 
                echo " > ";
                $cats = get_the_category( $post->ID );
 
                foreach ( $cats as $cat ){
                    echo $cat->cat_name;
                    echo " > ";
                }
                if (is_single()) {
                    the_title();
                }
            } elseif (is_page()) {
 
                if($post->post_parent){
                    $anc = get_post_ancestors( $post->ID );
                    $anc_link = get_page_link( $post->post_parent );
 
                    foreach ( $anc as $ancestor ) {
                        $output = " > <a href=".$anc_link.">".get_the_title($ancestor)."</a> > ";
                    }
 
                    echo $output;
                    the_title();
 
                } else {
                    echo ' > ';
                    echo the_title();
                }
            }
        }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"Archive: "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"Archive: "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"Archive: "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"Author's archive: "; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blogarchive: "; echo'';}
    elseif (is_search()) {echo"Search results: "; }
} ?>