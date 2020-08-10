<?php
////////////////////////////////////////////////////////////////////
// Shortcodes
////////////////////////////////////////////////////////////////////

// [vanderweb_accordions]
function vanderweb_accordions_func( $atts ){
    $a = shortcode_atts( array(
     'slug' => '',
     'class' => '',
     'count' => 50,
     'order' => 'ASC', // ASC, DESC
     'orderby' => 'menu_order', // none, ID, author, title, name, type, date, modified, parent, rand, menu_order,
     'open' => 'first', // first, all, none
     'icons' => 'right', // right, left, none
       ), $atts );
    $slug = $a['slug'];
    $class = $a['class'];
    $count = $a['count'];
    $order = $a['order'];
    $orderby = $a['orderby'];
    $open = $a['open'];
    $icons = $a['icons'];
    
    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'vanderweb_acc_section',
                'field' => 'slug',
                'terms' => array( $slug )
            ),
        ),
        'post_type' => 'vanderweb_accordions',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $count
    );
 
    $accordion_loop = new WP_Query($args);
    $accordionhtml = '';
    $i= 0 ;
    $item_count = $accordion_loop->found_posts;
 
    if ( $accordion_loop->have_posts() ):
        $accordionhtml .= '<div id="vanderweb-bs4-accordions-'.$slug.'" class="accordion vanderweb-bs4-accordions icons-'.$icons.' '.$class.' item-total-'.$item_count.'">';
        while( $accordion_loop->have_posts() ){
            $accordion_loop->the_post();
            $title = get_the_title();
            $desc = get_the_content();
            if( $i == 0  ) {
                $collapsed = '';
            }else{
                $collapsed = 'collapsed';
            }
            if( $i == 0 && $open == 'first' ) {
                $showitem = 'show';
            }elseif($open == 'all') {
                $showitem = 'show';
            }else{
                $showitem = '';
            }
            // Item - Start
            $accordionhtml .= '<div class="card mb-0">';
                $accordionhtml .= '<div class="card-header '.$collapsed.'" id="heading-'.$slug.'-'.$i.'" data-toggle="collapse" data-target="#collapse-'.$slug.'-'.$i.'" aria-expanded="true" aria-controls="collapse-'.$slug.'-'.$i.'">';
                    $accordionhtml .= '<a class="card-title">';
                        $accordionhtml .= $title;
                    $accordionhtml .= '</a>'; // .card-title
                $accordionhtml .= '</div>'; // .card-header
            
                $accordionhtml .= '<div id="collapse-'.$slug.'-'.$i.'" class="collapse '.$showitem.'" aria-labelledby="heading-'.$slug.'-'.$i.'" data-parent="#vanderweb-bs4-accordions-'.$slug.'">';
                    $accordionhtml .= '<div class="card-body">';
                        $accordionhtml .= $desc;
                    $accordionhtml .= '</div>'; // .card-body
                $accordionhtml .= '</div>'; // .collapse
            $accordionhtml .= '</div>'; // .card
            // Item - End
            $i++;
        }
        wp_reset_query();
        wp_reset_postdata();
        $accordionhtml .= '</div>'; // .vanderweb-accordion-bs4-inner
    endif;
 
    return $accordionhtml;
}
add_shortcode( 'vanderweb_accordions', 'vanderweb_accordions_func' );

// [vanderweb_tabs]
function vanderweb_tabs_func( $atts ){
    $a = shortcode_atts( array(
     'slug' => '',
     'class' => '',
     'count' => 50,
     'order' => 'ASC', // ASC, DESC
     'orderby' => 'menu_order', // none, ID, author, title, name, type, date, modified, parent, rand, menu_order,
       ), $atts );
    $slug = $a['slug'];
    $class = $a['class'];
    $count = $a['count'];
    $order = $a['order'];
    $orderby = $a['orderby'];
    
    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'vanderweb_acc_section',
                'field' => 'slug',
                'terms' => array( $slug )
            ),
        ),
        'post_type' => 'vanderweb_accordions',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $count
    );
 
    $tabs_loop = new WP_Query($args);
    $tabshtml = '';
    $tabsnav = '';
    $tabscontent = '';
    $i= 0 ;
    $item_count = $tabs_loop->found_posts;
 
    if ( $tabs_loop->have_posts() ):
        $tabshtml .= '<div class="vanderweb-bs4-tabs '.$class.' item-total-'.$item_count.'">';
            while( $tabs_loop->have_posts() ){
                $tabs_loop->the_post();
                $title = get_the_title();
                $desc = get_the_content();
                if( $i == 0 ) {
                    $activeitem = 'active';
                    $activecontentitem = 'show active';
                    $selecteditem = 'true';
                }else{
                    $activeitem = '';
                    $activecontentitem = '';
                    $selecteditem = 'false';
                }
                // Item - Start
                $tabsnav .= '<li class="nav-item">';
                    $tabsnav .= '<a class="nav-link '.$activeitem.'" id="tab-'.$slug.'-'.$i.'" data-toggle="tab" href="#content-'.$slug.'-'.$i.'" role="tab" aria-controls="content-'.$slug.'-'.$i.'" aria-selected="'.$selecteditem.'">';
                        $tabsnav .= $title;
                    $tabsnav .= '</a>'; // .nav-link
                $tabsnav .= '</li>'; // .nav-item
                
                $tabscontent .= '<div class="tab-pane fade '.$activecontentitem.'" id="content-'.$slug.'-'.$i.'" role="tabpanel" aria-labelledby="tab-'.$slug.'-'.$i.'">';
                    $tabscontent .= $desc;
                $tabscontent .= '</div>'; // .nav-item
                // Item - End
                $i++;
            }
            $tabshtml .= '<ul class="nav nav-tabs" id="vanderweb-bs4-tabs-'.$slug.'" role="tablist">';
                $tabshtml .= $tabsnav;
            $tabshtml .= '</ul>'; // .nav-tabs
            $tabshtml .= '<div class="tab-content" id="vanderweb-bs4-content-'.$slug.'">';
                $tabshtml .= $tabscontent;
            $tabshtml .= '</div>'; // .tab-content
            wp_reset_query();
            wp_reset_postdata();
        $tabshtml .= '</div>'; // .vanderweb-bs4-tabs
    endif;
 
    return $tabshtml;
}
add_shortcode( 'vanderweb_tabs', 'vanderweb_tabs_func' );