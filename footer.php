    </main><!-- #primary -->

    <footer class="footer">
        <div class="footer__container">
            <div class="footer__content">
                <!-- Column 1 - About -->
                <div class="footer__column">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <h3 class="footer__column-title"><?php bloginfo('name'); ?></h3>
                        <p class="footer__description">
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) :
                                echo esc_html($description);
                            else :
                                esc_html_e('Le réseau des anciens étudiants de l\'IUT de Laval. Connectez-vous, partagez et évoluez ensemble.', 'alumni-iut-laval');
                            endif;
                            ?>
                        </p>
                        <div class="footer__social">
                            <?php
                            $social_networks = array(
                                'facebook'  => array('label' => 'Facebook', 'icon' => 'f'),
                                'twitter'   => array('label' => 'Twitter', 'icon' => '𝕏'),
                                'linkedin'  => array('label' => 'LinkedIn', 'icon' => 'in'),
                                'instagram' => array('label' => 'Instagram', 'icon' => '📷'),
                            );
                            
                            foreach ($social_networks as $network => $data) {
                                $url = get_theme_mod('alumni_iut_social_' . $network, '');
                                if ($url) :
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" class="footer__social-link" aria-label="<?php echo esc_attr($data['label']); ?>" target="_blank" rel="noopener noreferrer">
                                        <span><?php echo esc_html($data['icon']); ?></span>
                                    </a>
                                    <?php
                                endif;
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Column 2 - Quick Links -->
                <div class="footer__column">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h3 class="footer__column-title"><?php esc_html_e('Liens rapides', 'alumni-iut-laval'); ?></h3>
                        <nav class="footer__links">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => '',
                                'container'      => false,
                                'depth'          => 1,
                                'items_wrap'     => '%3$s',
                                'fallback_cb'    => false,
                                'link_before'    => '<span class="footer__link">',
                                'link_after'     => '</span>',
                            ));
                            ?>
                        </nav>
                    <?php endif; ?>
                </div>
                
                <!-- Column 3 - Departments -->
                <div class="footer__column">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <h3 class="footer__column-title"><?php esc_html_e('Réseaux Départements', 'alumni-iut-laval'); ?></h3>
                        <nav class="footer__links">
                            <?php
                            $departments = get_terms(array(
                                'taxonomy'   => 'departement',
                                'hide_empty' => false,
                            ));
                            
                            if (!is_wp_error($departments) && !empty($departments)) :
                                foreach ($departments as $dept) :
                                    ?>
                                    <a href="<?php echo esc_url(get_term_link($dept)); ?>" class="footer__link">
                                        <?php echo esc_html($dept->description ? $dept->description . ' (' . $dept->name . ')' : $dept->name); ?>
                                    </a>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </nav>
                    <?php endif; ?>
                </div>
                
                <!-- Column 4 - Contact -->
                <div class="footer__column">
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php else : ?>
                        <h3 class="footer__column-title"><?php esc_html_e('Contact', 'alumni-iut-laval'); ?></h3>
                        <nav class="footer__links">
                            <a href="mailto:contact@alumni-iut-laval.fr" class="footer__link">contact@alumni-iut-laval.fr</a>
                            <a href="tel:+33299999999" class="footer__link">+33 2 99 99 99 99</a>
                            <a href="#" class="footer__link">52 Rue des Docteurs Calmette et Guérin<br>53000 Laval</a>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer__bottom">
                <p>
                    <?php
                    $footer_text = get_theme_mod('alumni_iut_footer_text', '');
                    if ($footer_text) {
                        echo esc_html($footer_text);
                    } else {
                        printf(
                            esc_html__('&copy; %1$s %2$s. Tous droits réservés.', 'alumni-iut-laval'),
                            date('Y'),
                            get_bloginfo('name')
                        );
                    }
                    ?>
                </p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
