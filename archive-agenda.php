<?php get_header(); ?>
<?php include 'banner.php'; ?>
    <!-- Main -->
    <div id="main" class="alt">
        <header >
            <h1 class="agenda-title">Agenda</h1><a class="archive-link" href="/archiv/">› Archiv</a>
        </header>

        <div class="clearfix"></div>
        
        <?php echo do_shortcode('[agenda]'); ?>

    </div>
        
<?php get_footer(); ?>