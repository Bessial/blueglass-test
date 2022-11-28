            <footer class="footer">
                <div class="footer-up">
                    <div class="section-left">
                        <div class="footer logo">
                            <a href="<?= get_home_url(); ?>">
                                <img src="<?= wp_get_attachment_url(get_field('logo2', 'option')); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="section-right">
                        <div class="footer-menu-left">
                            <div class="footer-menu-left top-destinations">
                                <?php 
                                    $menu = wp_get_nav_menu_object("Top destinations");
                                    echo $menu->name;
                                ?>
                            </div>
                            <?php wp_nav_menu( 
                                array(
                                    'menu' => 'Top destinations'
                                    )
                                );
                            ?>
                        </div>
                        <div class="footer-menu-right">
                            <div class="footer-menu-right travel-information">
                                <?php 
                                    $menu = wp_get_nav_menu_object("Travel information");
                                    echo $menu->name;
                                ?>
                            </div>
                            <?php 
                                wp_nav_menu( 
                                    array(
                                        'menu' => 'Travel information'
                                    )
                                );
                            ?> 
                        </div>
                    </div>
                    <?php 
                        $link = get_field('bookingbtn', 'option');
                        $link_title = $link['title'];
                        $link_url = $link['url'];
                    ?>
                    <?php if( $link ): ?>
                        <a class="hero-button" href="<?= $link_url ?>"><?= $link_title?></a>
                    <?php endif; ?>
                </div>
                <div class="footer-down">
                    <div class="footer-down-left">
                        <?php 
                            wp_nav_menu( 
                                array(
                                    'menu' => 'Footer'
                                )
                            );
                        ?>
                    </div>
                    <div class="footer-down-right">
                        <?php 
                            wp_nav_menu( 
                                array(
                                    'menu' => 'footer logo'
                                    )
                                );
                            ?>
                    </div>
                </div>
            </footer>
        <?php wp_footer(); ?>
    </body>
</html>