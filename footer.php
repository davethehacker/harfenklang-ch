        <!-- Contact -->
        <section id="contact">
                <h1>Kontakt</h1>
                <p>Eliane Koradi</p>
                <p>Chliacherweg 1</p>
                <p>CH-5623</p>
                <p>+41 56 221 26 60</p>
                <p>info at harfenklang.ch</p>

            </section>


    </div>


    <?php wp_footer(); ?>
    <!-- Scripts -->
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
			<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.scrolly.min.js"></script>-->
			<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.scrollex.min.js"></script>-->
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/browser.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/breakpoints.min.js"></script>
			<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/util.js"></script>-->
                        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

                        <script type="text/javascript">
                                $(document).ready(function(){
                                $('#banner').slick({
                                        autoplay: true,
                                        arrows: false
                                });
                                });
                        </script>

</body>

</html>