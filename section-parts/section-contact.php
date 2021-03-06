<?php
$coletivo_contact_id            = get_theme_mod( 'coletivo_contact_id', esc_html__('contact', 'coletivo') );
$coletivo_contact_disable       = get_theme_mod( 'coletivo_contact_disable' ) == 1 ?  true : false;
$coletivo_contact_title         = get_theme_mod( 'coletivo_contact_title', esc_html__('Get in touch', 'coletivo' ));
$coletivo_contact_subtitle      = get_theme_mod( 'coletivo_contact_subtitle', esc_html__('Section subtitle', 'coletivo' ));
$coletivo_contact_cf7           = get_theme_mod( 'coletivo_contact_cf7' );
$coletivo_contact_cf7_disable   = get_theme_mod( 'coletivo_contact_cf7_disable' );
$coletivo_contact_address_title = get_theme_mod( 'coletivo_contact_address_title' );
$coletivo_contact_text          = get_theme_mod( 'coletivo_contact_text' );
$coletivo_contact_address_title2= get_theme_mod( 'coletivo_contact_address_title2' );
$coletivo_contact_text2         = get_theme_mod( 'coletivo_contact_text2' );
$coletivo_contact_address       = get_theme_mod( 'coletivo_contact_address' );
$coletivo_contact_phone         = get_theme_mod( 'coletivo_contact_phone' );
$coletivo_contact_email         = get_theme_mod( 'coletivo_contact_email' );
$coletivo_contact_fax           = get_theme_mod( 'coletivo_contact_fax' );

if ( coletivo_is_selective_refresh() ) {
    $coletivo_contact_disable = false;
}

if ( $coletivo_contact_cf7 || $coletivo_contact_text || $coletivo_contact_address_title || $coletivo_contact_phone || $coletivo_contact_email || $coletivo_contact_fax ) {
    $desc = get_theme_mod( 'coletivo_contact_desc' );
    ?>
    <?php if (!$coletivo_contact_disable) : ?>
        <?php if ( ! coletivo_is_selective_refresh() ){ ?>
        <section id="<?php if ($coletivo_contact_id != '') echo $coletivo_contact_id; ?>" <?php do_action('coletivo_section_atts', 'counter'); ?>
                 class="<?php echo esc_attr(apply_filters('coletivo_section_class', 'section-contact section-padding  section-meta onepage-section', 'contact')); ?>">
        <?php } ?>
            <?php do_action('coletivo_section_before_inner', 'contact'); ?>
            <div class="container">
                <?php if ( $coletivo_contact_title || $coletivo_contact_subtitle || $desc ){ ?>
                <div class="section-title-area">
                    <?php if ($coletivo_contact_subtitle != '') echo '<h5 class="section-subtitle">' . esc_html($coletivo_contact_subtitle) . '</h5>'; ?>
                    <?php if ($coletivo_contact_title != '') echo '<h2 class="section-title">' . esc_html($coletivo_contact_title) . '</h2>'; ?>
                    <?php if ( $desc ) {
                        echo '<div class="section-desc">' . apply_filters( 'the_content', wp_kses_post( $desc ) ) . '</div>';
                    } ?>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-sm-6 wow slideInUp">
                            <h3><?php if ($coletivo_contact_address_title != '') echo wp_kses_post($coletivo_contact_address_title); ?></h3>
                        <?php if ($coletivo_contact_text != '') echo wp_kses_post($coletivo_contact_text); ?>
                            <br/ ><br/ >
                        <div class="address-box mobile-margin-bottom">

                            <?php if ($coletivo_contact_address != ''): ?>
                                <div class="address-contact">
                                    <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-map-marker fa-stack-1x fa-inverse"></i></span>

                                    <div class="address-content"><?php echo wp_kses_post($coletivo_contact_address); ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if ($coletivo_contact_phone != ''): ?>
                                <div class="address-contact">
                                    <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span>

                                    <div class="address-content"><?php echo wp_kses_post($coletivo_contact_phone); ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if ($coletivo_contact_email != ''): ?>
                                <div class="address-contact">
                                    <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span>

                                    <div class="address-content"><a href="mailto:<?php echo antispambot($coletivo_contact_email); ?>"><?php echo antispambot($coletivo_contact_email); ?></a></div>
                                </div>
                            <?php endif; ?>

                            <?php if ($coletivo_contact_fax != ''): ?>
                                <div class="address-contact">
                                    <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-fax fa-stack-1x fa-inverse"></i></span>

                                    <div class="address-content"><?php echo wp_kses_post($coletivo_contact_fax); ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ($coletivo_contact_cf7_disable != '1') : ?>
                        <?php if (isset($coletivo_contact_cf7) && $coletivo_contact_cf7 != '') { ?>
                            <div class="contact-form col-sm-6 wow slideInUp">
                                <?php 
								echo apply_filters( 'the_content', wp_kses_post( $coletivo_contact_cf7  ) );
                                ?>
                            </div>
                        <?php } else { ?>
                            <div class="contact-form col-sm-6 wow slideInUp">
                            <h3><?php if ($coletivo_contact_address_title2 != '') echo wp_kses_post($coletivo_contact_address_title2); ?></h3>
                                <?php if ($coletivo_contact_text2 != '') echo wp_kses_post($coletivo_contact_text2); ?>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php do_action('coletivo_section_after_inner', 'contact'); ?>
        <?php if ( ! coletivo_is_selective_refresh() ){ ?>
        </section>
        <?php } ?>
    <?php endif;
}
