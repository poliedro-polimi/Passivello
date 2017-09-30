<section id="chisiamo">
    <div class="container container-wpabout">
        <div class="section-heading-passivello row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"><?php _e("LGBTI+ Students of PoliMi", "passivello");?></h2>
                <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
            </div>
        </div>

        <?php
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-inner-content">
                        <div class="entry-content">
                            <!-- <div class="row"> -->
                            <!-- <div class="col-sm-10 col-sm-offset-1"> -->
                            <?php the_content() ?>
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </article>
            <?php   endwhile;
        endif; ?>
    </div>
    <?php edit_post_link( esc_html__( 'Edit', 'activello' ), '<div class="entry-footer" style="text-align: center;"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></div>' ); ?>
    <div class="fbpagelink">
        <a href="<?php _link("statuto"); ?>" target="_blank" class="btn btn-default btn-scopri">
            <i class="fa fa-file-text-o"></i> <?php _e("Statute", "passivello");?>
        </a> &nbsp;
        <a class="btn btn-default btn-scopri" href="<?php _link("ammissione"); ?>">
            <i class="fa fa-sign-in"></i> <?php _e("Admission", "passivello");?>
        </a>
    </div>
</section>