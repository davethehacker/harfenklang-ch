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

    // Register Agenda Post Type
    function register_agenda_post_type() {

        $labelsA = array(
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
        $argsA = array(
            'label'                 => 'Termin',
            'description'           => 'Agenda für Konzerte und andere Events',
            'labels'                => $labelsA,
            'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail' ),
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
            'show_in_rest'          => true,
        );
        register_post_type( 'agenda', $argsA);

    }
    add_action( 'init', 'register_agenda_post_type', 0 );

    
    // Register Porjects Post Type
    function register_projects_post_type() {

        $labelsP = array(
            'name'                  => 'Projekte',
            'singular_name'         => 'Projekt',
            'menu_name'             => 'Projekte',
            'name_admin_bar'        => 'Projekte',
            'archives'              => 'Projekte',
            'attributes'            => 'Attribute',
            'parent_item_colon'     => 'Übergeordnetes Element',
            'all_items'             => 'alle Projekte',
            'add_new_item'          => 'neues Projekt hinzufügen',
            'add_new'               => 'neu Hinzufügen',
            'new_item'              => 'neues Projekt',
            'edit_item'             => 'Projekt bearbeiten',
            'update_item'           => 'Projekt aktualisieren',
            'view_item'             => 'Projekt ansehen',
            'view_items'            => 'Projekte ansehen',
            'search_items'          => 'Projekte suchen',
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
        $argsP = array(
            'label'                 => 'Projekt',
            'description'           => 'Projekte',
            'labels'                => $labelsP,
            'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 6,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'projects', $argsP );

    }
    add_action( 'init', 'register_projects_post_type', 0 );
    


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

            // Load field value.
            $date_string = get_field('date');
            // Create DateTime object from value (formats must match).
            $date = DateTime::createFromFormat('Ymd', $date_string);

            // error here, everything gets archived
            if(date('Ymd', time()) > $date_string){
                wp_update_post(array(
                    'ID'    =>  $postid,
                    'post_status'   =>  'archive'
                    ));
                //echo "<!-- archived --->";
                continue;
            }

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
            
        // Output needs to be returned
        return $message;
    } 
    // register shortcode
    add_shortcode('agenda', 'agenda_current_shortcode'); 


    
    function projects_shortcode() { 

        $args = array(
            'post_type' => 'projects',
            'posts_per_page' => 100,
            );
        $custom_query = new WP_Query($args); 
        $message = '<div class="project-covers">';
        if ($custom_query->have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post();
            $postid = get_the_id();
            $message .= '<a href="' . get_permalink() .'" class="project-cover">';
            $message .= '<img src="' . get_field('cover-img') . '"></img>';
            $message .= '<div class="project-title">' . get_the_title() . '</div>';
            $message .= '</a>';
        endwhile; else : 
            return;
        endif; 
        wp_reset_postdata(); 
        $message .= '</div>';
        // Output needs to be returned
        return $message;
    } 
        // register shortcode
    add_shortcode('projects', 'projects_shortcode'); 
    



    //import custom block
    if ( function_exists( 'lazyblocks' ) ) :

        lazyblocks()->add_block( array(
            'id' => 136,
            'title' => '->Spalten Layout',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z" /></svg>',
            'keywords' => array(
            ),
            'slug' => 'lazyblock/two-columns',
            'description' => '',
            'category' => 'design',
            'category_label' => 'design',
            'supports' => array(
                'customClassName' => true,
                'anchor' => false,
                'align' => array(
                    0 => 'wide',
                    1 => 'full',
                ),
                'html' => false,
                'multiple' => true,
                'inserter' => true,
            ),
            'ghostkit' => array(
                'supports' => array(
                    'spacings' => false,
                    'display' => false,
                    'scrollReveal' => false,
                    'frame' => false,
                    'customCSS' => false,
                ),
            ),
            'controls' => array(
                'control_96b9674767' => array(
                    'type' => 'text',
                    'name' => 'title',
                    'default' => '',
                    'label' => 'Titel',
                    'help' => '',
                    'child_of' => '',
                    'placement' => 'content',
                    'width' => '75',
                    'hide_if_not_selected' => 'false',
                    'save_in_meta' => 'false',
                    'save_in_meta_name' => '',
                    'required' => 'false',
                    'placeholder' => '',
                    'characters_limit' => '',
                ),
                'control_cd68e34057' => array(
                    'type' => 'rich_text',
                    'name' => 'text',
                    'default' => '',
                    'label' => 'Text',
                    'help' => '',
                    'child_of' => '',
                    'placement' => 'content',
                    'width' => '50',
                    'hide_if_not_selected' => 'false',
                    'save_in_meta' => 'false',
                    'save_in_meta_name' => '',
                    'required' => 'false',
                    'multiline' => 'false',
                    'placeholder' => '',
                    'characters_limit' => '',
                ),
                'control_5e4bd64578' => array(
                    'type' => 'inner_blocks',
                    'name' => 'sidebar',
                    'default' => '',
                    'label' => 'Medien',
                    'help' => '',
                    'child_of' => '',
                    'placement' => 'content',
                    'width' => '50',
                    'hide_if_not_selected' => 'false',
                    'save_in_meta' => 'false',
                    'save_in_meta_name' => '',
                    'required' => 'false',
                    'placeholder' => '',
                    'characters_limit' => '',
                ),
            ),
            'code' => array(
                'output_method' => 'html',
                'editor_html' => '',
                'editor_callback' => '',
                'editor_css' => '',
                'frontend_html' => '<div class="wp-block-columns">
            <div class="text wp-block-column" style="flex-basis:50%">
                <h2>{{title}}</h2>
                <p>{{{text}}}</p>
            </div>
            <div class="media wp-block-column" style="flex-basis:50%">
                {{{sidebar}}}
            </div>
            
        </div>',
                'frontend_callback' => '',
                'frontend_css' => '',
                'show_preview' => 'selected',
                'single_output' => true,
            ),
            'condition' => array(
            ),
        ) );
        
    endif;


    function myguten_enqueue() {
        wp_enqueue_script(
            'myguten-script',
            get_template_directory_uri() . '/modify-gutenberg.js',
            array( 'wp-blocks','wp-editor' )
        );
    }
    add_action( 'enqueue_block_editor_assets', 'myguten_enqueue' );
?>