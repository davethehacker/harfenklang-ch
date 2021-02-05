<?php
    add_theme_support( 'title-tag' );
    add_theme_support('post-thumbnails');

    function register_my_menus() {
        register_nav_menus(
        array(
            'menu' => __( 'Main Menu' ),
            'frontpage' => __( 'Kacheln Startseite')
        )
        );
       }
       add_action ('init', 'register_my_menus');

    // Register Custom Post Type
    function register_agenda_post_type() {

        $labels = array(
            'name'                  => 'Termine',
            'singular_name'         => 'Termin',
            'menu_name'             => 'Agenda',
            'name_admin_bar'        => 'Agenda',
            'archives'              => 'Agenda',
            'attributes'            => 'Attribute',
            'parent_item_colon'     => 'Übergeordnetes Element',
            'all_items'             => 'alle Termine',
            'add_new_item'          => 'neuen Termin hinzufügen',
            'add_new'               => 'neu Hinzufügen',
            'new_item'              => 'neuer Termin',
            'edit_item'             => 'Termin bearbeiten',
            'update_item'           => 'Termin aktualisieren',
            'view_item'             => 'Termin ansehen',
            'view_items'            => 'Termine ansehen',
            'search_items'          => 'Termine suchen',
            'not_found'             => 'nicht gefunden',
            'not_found_in_trash'    => 'im Papierkorb nicht gefunden',
            'featured_image'        => 'Featured Image',
            'set_featured_image'    => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image'    => 'Use as featured image',
            'insert_into_item'      => 'Insert into item',
            'uploaded_to_this_item' => 'Uploaded to this item',
            'items_list'            => 'Items list',
            'items_list_navigation' => 'Items list navigation',
            'filter_items_list'     => 'Filter items list',
        );
        $args = array(
            'label'                 => 'Termin',
            'description'           => 'Agenda für Konzerte und andere Events',
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'revisions' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-calendar-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'agenda', $args );

    }
    add_action( 'init', 'register_agenda_post_type', 0 );


    // ************* Remove default Posts type since no blog *************

    // Remove side menu
    add_action( 'admin_menu', 'remove_default_post_type' );

    function remove_default_post_type() {
        remove_menu_page( 'edit.php' );
    }

    // Remove +New post in top Admin Menu Bar
    add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

    function remove_default_post_type_menu_bar( $wp_admin_bar ) {
        $wp_admin_bar->remove_node( 'new-post' );
    }

    // Remove Quick Draft Dashboard Widget
    add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

    function remove_draft_widget(){
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    }
    // End remove post type



    function agenda_archive_shortcode() { 
        
        $args = array(
            'post_type' => 'agenda',
            'posts_per_page' => 100,
            'orderby' => 'date',
            'order' => 'ASC',
            'post_status' => 'archive'
           );
        $custom_query = new WP_Query($args); 
        $message = '';
        if ($custom_query->have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post();

            $date_string = get_field('date');
            $date = DateTime::createFromFormat('Ymd', $date_string);

            $message .= '<a href="' . get_permalink() .'" class="event-wrapper">';
            $message .= '<div class="date-time-block">';
            $message .= '<div class="event-date">';
            $message .= $date->format('d.m.Y');
            $message .= '</div>';
            $message .= '<div class="event-time">' . get_field('time') . '</div>';
            $message .= '</div>';
            $message .= '<div class="title-location-block">';
            $message .= '<div class="event-title" itemprop="name">';
            $message .= get_the_title();
            $message .= '</div>';
            $message .= '<div class="event-venue">';
            $message .= '<span>' . get_field('location') . '</span>';
            $message .= '</div></div>';
            $message .= '</a>';
        endwhile; else : 
            return;
        endif; 
        wp_reset_postdata(); 
         
        // Output needs to be return
        return $message;
        } 
        // register shortcode
        add_shortcode('agenda_archive', 'agenda_archive_shortcode'); 


    function agenda_current_shortcode() { 
    
        $args = array(
            'post_type' => 'agenda',
            'posts_per_page' => 100,
            'orderby' => 'date',
            'order' => 'ASC',
            'post_status' => 'published'
            );
        $custom_query = new WP_Query($args); 
        $message = '';
        if ($custom_query->have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post();
            $postid = get_the_id();
            // error here, everything gets archived
            if(date('Ymd', time()) > $post->date){
                wp_update_post(array(
                    'ID'    =>  $postid,
                    'post_status'   =>  'archive'
                    ));
                //echo "<!-- archived --->";
                continue;
            }
            // Load field value.
            $date_string = get_field('date');
            // Create DateTime object from value (formats must match).
            $date = DateTime::createFromFormat('Ymd', $date_string);

            $message .= '<a href="' . get_permalink() .'" class="event-wrapper" itemscope itemtype="https://schema.org/Event">';
            $message .= '<div class="date-time-block">';
            $message .= '<div class="event-date" itemprop="startDate" content="' . $date->format('Y-m-d') . 'T'. get_field('time') . '">';
            $message .= $date->format('d.m.Y');
            $message .= '</div>';
            $message .= '<div class="event-time">' . get_field('time') . '</div>';
            $message .= '</div>';
            $message .= '<div class="title-location-block">';
            $message .= '<div class="event-title" itemprop="name">';
            $message .= get_the_title();
            $message .= '</div>';
            $message .= '<div class="event-venue" itemprop="location" itemscope itemtype="https://schema.org/Place">';
            $message .= '<span itemprop="name">' . get_field('location') . '</span>';
            $message .= '</div></div>';
            $message .= '</a>';
        endwhile; else : 
            return;
        endif; 
        wp_reset_postdata(); 
            
        // Output needs to be return
        return $message;
        } 
        // register shortcode
        //add_shortcode('agenda', 'agenda_current_shortcode'); 
?>

