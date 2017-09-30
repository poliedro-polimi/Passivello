<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"><?php _e("Toggle navigation", "passivello");?></span> <?php _e("Menu", "passivello");?> <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <?php get_template_part("poliedro_logo_svg"); ?>
            </a>
            <div class="navbar-lang">
                <p>
                    <?php if (get_locale() != "it_IT"): ?>
                    <a href="/it/">IT</a>
                    <?php else: ?>
                    IT
                    <?php endif; ?>
                </p>
                <p>
                    <?php if (get_locale() != "en_US"): ?>
                        <a href="/en/">EN</a>
                    <?php else: ?>
                        EN
                    <?php endif; ?>
                </p>
            </div>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#chisiamo" id="navitemred"><?php _e("Who are we", "passivello");?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#social" id="navitemora"><?php _e("Where to find us", "passivello");?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#eventi" id="navitemyel"><?php _e("Events", "passivello");?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#articoli" id="navitemgre" <?php /*onclick="window.location.href='<?php echo get_permalink(get_option('page_for_posts')); ?>'"*/?>><?php _e("Articles", "passivello");?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#storia" id="navitemblu"><?php _e("Story", "passivello");?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#contatti" id="navitempur"><?php _e("Contacts", "passivello");?></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>