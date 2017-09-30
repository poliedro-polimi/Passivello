<section id="articoli" class="bg-light-gray">
    <div class="container">
        <div class="section-heading-passivello row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"><?php _e("Latest articles", "passivello"); ?></h2>
            </div>
        </div>
        <div class="row text-center flex-box">
            <?php
            $latest_posts = get_posts(array("numberposts" => 3));

            foreach ($latest_posts

            as $post) :
            setup_postdata($post);
            ?>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="home-post-item">
                    <a href="<?php the_permalink(); ?>">
                        <h4 class="service-heading event-title"><?php the_title(); ?></h4>
                    </a>
                    <div class="row">
                        <p class="event-date">
                            <?php if (get_the_date() != ""): ?>
                                <i class="fa fa-clock-o"></i>&nbsp;
                                <?php the_date(); ?>&emsp;
                            <?php endif; ?>
                            <i class="fa fa-user"></i>&nbsp;
                            <?php the_author(); ?>
                        </p>
                        <p class="text-muted">
                        <p class="event-description">
                            <?php the_excerpt(); ?>
                        </p>
                        </p>
                    </div>
                    <?php edit_post_link(esc_html__('Edit', 'activello'), '<div class="entry-footer"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></div>'); ?>

                    <div class="post-bg-image" <?php
                    if ($thumbnail_id = get_post_thumbnail_id()) {
                        if ($image_src = wp_get_attachment_image_src($thumbnail_id, 'normal-bg'))
                            printf('style="background-image: url(%s);"', $image_src[0]);
                    } ?>>
                    </div>

                </div>
            </div>

            <?php endforeach; ?>
        </div>
        <?php
        if (count($latest_posts) == 0) {
            echo "<div style='text-align: center'>";
            _e("No article was found in this language.", "passivello");
            echo "</div>";
        }
        ?>
    </div>
    <br/>
    <div class="fbpagelink"><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                               class="btn btn-default btn-scopri"><i
                    class="fa fa-external-link"></i> <?php _e("View all articles", "passivello"); ?></a></div>
</section>