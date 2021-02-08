<?php get_header(); ?>
    <section id="banner" class="major" style="background-image: url(https://harfenklang.hexcode.ch/wp-content/uploads/2021/01/Eliane-Koradi-_MG_4980_Kornfeld-Kopie.jpg)">
        <div class="inner">
            <header class="major">
                <h1>Es beglückt mich, den Menschen meine Freude an der Musik weiterzugeben.</h1>
            </header>
                    
        </div>
    </section>
    <!-- Main -->
    <div id="main" class="alt">
        <header >
            <a href="/agenda/"><h1 class="agenda-title">Agenda</h1></a>
        </header>

        <div class="clearfix"></div>
        
        <?php 
            // Load field value.
            $date_string = get_field('date');
            // Create DateTime object from value (formats must match).
            $date = DateTime::createFromFormat('Ymd', $date_string);

            
        //echo do_shortcode('[agenda]'); 
        ?>
        <div class="event-wrapper" itemscope itemtype="https://schema.org/Event">
            <h2 class="event-title" itemprop="name">
                <?php the_title(); ?>
            </h2>
            <div class="date-time-block">
                <div class="event-date" itemprop="startDate" content="<?php echo $date->format('Y-m-d'); ?>T<?php the_field('time'); ?>">
                    <?php echo $date->format('d.m.Y'); ?>
                </div>
                <div class="event-time"><?php the_field('time'); ?></div>
            </div>
            <div class="title-location-block">
                <div class="event-venue" itemprop="location" itemscope itemtype="https://schema.org/Place">
                    <span itemprop="name"><?php the_field('location'); ?></span>
                </div>
            </div>
            <div class="content" itemprop="description">
                <?php the_content()?>
            </div>
        </div>
        

    </div>
        
<?php get_footer(); ?>