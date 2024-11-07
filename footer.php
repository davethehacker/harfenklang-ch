        <!-- Contact -->
        <section id="contact">
                <h1>Kontakt</h1>
                <p class ="name">Eliane Koradi</p>
                <p class="street">Chliacherweg 1</p>
                <p class="city">CH-5623 Boswil</p>
                <p class="tel">+41 56 221 26 60</p>
                <p>info at harfenklang.ch</p>
        </section>
        <section id="link-newsletter">
                
        </section>

    </div>


    <?php wp_footer(); ?>
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
                                        arrows: false,
                                        lazyLoad: 'progressive',
                                        cssEase: 'ease',
                                        autoplaySpeed: '6000',
                                        speed: '1200',
                                });
                                });
                        </script>

</body>

</html>