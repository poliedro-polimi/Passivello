<?php
/**
 * The front page for our theme.
 *
 * Displays static front page
 *
 * @package passivello
 */

// Directory above root
$json = file_get_contents(__DIR__."/../../../../fb_events.json");
$obj = json_decode($json, true);
show_admin_bar(false);
?><!doctype html>
    <!--[if !IE]>
    <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 7 ]>
    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 8 ]>
    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 9 ]>
    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
    <!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="PoliEdro" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://poliedro-polimi.it" />
    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/header-bg.jpg" />
    <meta property="og:description" content="PoliEdro è l'associazione del Politecnico di Milano che si occupa delle tematiche LGBTI+. Visita il nostro sito per scoprire tutti i nostri eventi!" />

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- <meta name="description" content="L'associazione che si occupa delle tematiche LGBTI* al Politecnico di Milano">
    <meta name="author" content="Davide Depau"> -->

    <!-- Custom Fonts -->
    <!-- <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"> -->
<!--     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> -->
    
    <?php wp_head(); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    <style>
        html {
            margin-top: 0!important;
        }

        * html body {
            margin-top: 0!important;
        }

        @media screen and ( max-width: 782px ) {
            html {
                margin-top: 0!important;
            }

            * html body {
                margin-top: 0!important;
            }
        }
    </style>
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Commuta navigazione</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <?php get_template_part("poliedro_logo_svg"); ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#chisiamo" id="navitemred">Chi siamo</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#eventi" id="navitemora">Eventi</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#storia" id="navitemyel">Storia</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#articoli" id="navitemgre" onclick="window.location.href = '<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>'">Articoli</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#social" id="navitemblu">Social</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contatti" id="navitempur">Contatti</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <!-- <div class="intro-heading"></div>
                <div class="intro-lead-in"></div> -->
                <div><img class="biglogo" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/logos/poliedro_portr_bianco_ombra.svg" alt="<?php echo get_bloginfo( 'name' ); ?> &bullet; <?php echo get_bloginfo( 'description' ); ?>"></div>
                <a href="#chisiamo" class="page-scroll btn btn-xl" id="scopridipiubtn">Scopri di più</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="chisiamo">
        <div class="container container-wpabout">
            <div class="section-heading-passivello row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Chi siamo</h2>
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
    </section>

    <!-- Portfolio Grid Section -->
    <?php
        $newcount = $obj["newcount"];
        $events = $obj["events"];
    ?>
    <section id="eventi" class="bg-light-gray">
        <div class="container">
            <div class="section-heading-passivello row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Eventi <span class="badge badge-danger"><?php echo ($newcount>0?$newcount:"");?></span></h2>
                </div>
            </div>
           <div class="row text-center flex-box">
            <?php
            $count = 0;
            foreach ($events as $event) :
                if ( $count >= 3 ) break;
                $start_time = passivello_get_datetime($event["start_time"]);
            ?>
                <div class="col-md-4 col-sm-12">
                    <div class="home-event-item <?php echo passivello_get_event_class($start_time); ?>">
                        <h4 class="service-heading event-title">
                            <a href="https://facebook.com/events/<?php echo $event['id'] ?>/" target="_blank">
                                <?php echo esc_html($event['name']) ?>
                            </a>
                            <?php if ($start_time >= new DateTime()): ?>
                                <span class="label label-danger">Nuovo</span>
                            <?php else: ?>
                                <span class="label label-default">Passato</span>
                            <?php endif; ?>
                        </h4>
                        <p class="text-muted">
                            <p class="event-date">
                                <i class="fa fa-clock-o"></i>&nbsp;
                                <?php
                                    echo passivello_get_hr_event_datetime($start_time);
                                ?> &emsp;
                            <!-- </p>
                            <p class="event-location"> -->
                                <i class="fa fa-map-marker"></i>&nbsp;
                                <?php echo esc_html($event['place_name']); ?>
                            </p>
                            <p class="event-description">
                                <?php echo wp_trim_words(esc_html($event['description']), 55, " [...]") ?>
                            </p>
                        </p>
                    </div>
                </div>
                <?php
                $count++;
            endforeach;
            ?>
            </div>
        </div>
        <br/>
        <div class="fbpagelink"><a href="https://facebook.com/poliedro.polimi/" target="_blank" class="btn btn-default btn-scopri"><i class="fa fa-external-link"></i> Scopri tutti i gli eventi su Facebook</a> &nbsp; <a class="btn btn-default btn-scopri" href="webcal://www.facebook.com/ical/u.php?uid=100000067321453&key=AQDkp3yBO_amMi56"><i class="fa fa-calendar-plus-o"></i> Aggiungi al calendario</a></div>
    </section>

    <!-- About Section -->
    <section id="storia">
        <div class="container">
            <div class="section-heading-passivello row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">La nostra storia</h2>
                    <h3 class="section-subheading text-muted">Ecco come da tante facce &egrave; nato un grande PoliEdro</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2012-2013</h4>
                                    <h4 class="subheading">Gli inizi</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">PoliEdro nasce per occuparsi di ogni tipo di discriminazione: di genere, di sessualit&agrave;, di etnia, di religione ecc. Nel 2013 partecipa per la prima volta al Milano Pride, e organizza il primo grande evento, "La condizione della donna". Come presidenti si susseguono Eugenio Semeraro, Stefano Grandis e Sebastiano Musumeci.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2014</h4>
                                    <h4 class="subheading">PoliEdro si fa conoscere</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Nel 2014 PoliEdro entra a far parte del Coordinamento Arcobaleno, un'unione di associazioni che, tra le altre cose, si occupa di organizzare insieme ad Arcigay il Pride. Contribuisce cos&igrave; alla realizzazione del Milano Pride, decorando una delle car2go che aprivano la parata.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2015</h4>
                                    <h4 class="subheading">Un anno d'oro</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">In collaborazione con il Comune di Milano e Agedo, PoliEdro presenta per la prima volta in Italia il documentario "Invano mi odiano: racconto sui cristiani LGBT in Russia" di Yulia Matsiy. Partecipa anche ad EXPO con la mostra "Parole Prigioniere" in Cascina Triulza.
                                    Collaboriamo anche con il Padiglione USA per gli eventi organizzati a favore della comunit&agrave; LGBT, lanciando assieme alle altre associazioni la campagna #Hungry4HumanRights: il nostro presidente Sebastiano Musumeci si occupa della realizzazione dei piatti simbolo della campagna che vengono offerti alle personaggi che la sostengono: incontriamo così Monica Cirinn&agrave; e Conchita Wurst.
                                    Al Pride non si può mancare: oltre a quello di Milano, PoliEdro supporta il primo Pride di Pavia.
                                    Ad ottobre, Sebastiano si dimette e Ruggero Limberti viene eletto presidente.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2016</h4>
                                    <h4 class="subheading">Il "tour" per l'Italia</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">&Egrave; l'anno delle Unioni Civili. PoliEdro prende parte a tutti eventi a favore di esse, come #SvegliatiItalia del 23 Gennaio in Piazza della Scala a Milano e #OraDirittiAllaMeta del 5 Marzo a Roma. Le Unioni Civili arrivano, e si festeggia partecipando a ben quattro Pride: nuovamente a Pavia, al primo Varese Pride, naturalmente a Milano e a Torino.
                                    Ci mettiamo anche in contatto con le altre associazioni LGBT italiane di universitari, prendendo parte a un primo grande incontro a Bologna.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/about/5.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2017</h4>
                                    <h4 class="subheading">Si torna al PoliMi</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Dopo tante collaborazioni che ci hanno portato a conoscere altre realtà e ingrandire la nostra associazione, riportiamo il focus al Politecnico, dove da sempre si svolgono le nostre attivit&agrave;.
                                    Collaboriamo all'introduzione di un corso online (Polimi Open Knoweledge) sulla diversity.
                                    Conosciamo Momusso e prepariamo assieme la mostra "Liberamarsi #vocabolariosentimentale".
                                    Il Pride si avvicina, e abbiamo pronte tante nuove sorprese!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4 style="text-align: center;">
                                    <a href="/ammissione/" target="_blank">
                                    Be part
                                    <br>of our
                                    <br>story!
                                    </a>
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="articoli" class="bg-light-gray">
        <div class="container">
            <div class="section-heading-passivello row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Ultimi articoli</h2>
                </div>
            </div>
               <div class="row text-center flex-box">
                    <?php
                        $latest_posts = get_posts( array("numberposts" => 3) );

                        foreach ($latest_posts as $post) :
                            setup_postdata( $post );
                    ?>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="home-post-item">
                            <a href="<?php the_permalink(); ?>">
                                <h4 class="service-heading event-title"><?php the_title(); ?></h4>
                            </a>
                            <div class="row">
                                <p class="event-date">
                                <?php if ( get_the_date() != "" ): ?>
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
                            <?php edit_post_link( esc_html__( 'Edit', 'activello' ), '<div class="entry-footer"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></div>' ); ?>
                            
                            <div class="post-bg-image"  <?php
                            if ( $thumbnail_id = get_post_thumbnail_id() ) {
                                if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'normal-bg' ) )
                                    printf( 'style="background-image: url(%s);"', $image_src[0] );     
                            } ?>>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br/>
        <div class="fbpagelink"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-default btn-scopri"><i class="fa fa-external-link"></i> Visualizza tutti i post</a></div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <a href="https://polimi.it">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/logos/polimi.jpg" class="img-responsive img-centered" alt="Associazione del Politecnico di Milano">
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <a href="http://milanopride.it/">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/logos/milanopride.jpg" class="img-responsive img-centered" alt="Partecipa al Milano Pride">
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <a href="https://facebook.com/coordinamento.arcobaleno.9/">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/logos/coord_arc.jpg" class="img-responsive img-centered" alt="Socio del Coordinamento Arcobaleno di Milano">
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Portfolio Grid Section -->
    <section id="social" class="bg-light-gray">
        <div class="container">
            <div class="section-heading-passivello row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Social</h2>
                    <h3 class="section-subheading text-muted">Scopri come rimanere aggiornato sui nostri eventi.</h3>
                </div>
            </div>
           <div class="row text-center">
                <div class="col-md-4 social-item">
                    <a href="https://facebook.com/poliedro.polimi/" target="_blank">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary color-fb"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="service-heading">Facebook</h4>
                    <p class="text-muted">Metti "Mi piace" alla nostra pagina Facebook per conoscere tutto su di noi.</p>
                    <p>
                        <a href="https://facebook.com/poliedro.polimi/" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i>&nbsp; PoliEdro</a>
                    </p>
                </div>
                <div class="col-md-4 social-item">
                    <a href="https://t.me/PoliEdro" target="_blank">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary color-telegram"></i>
                        <i class="fa fa-telegram fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="service-heading">Telegram</h4>
                    <p class="text-muted">Aggiungiti al nostro gruppo e fatti una chiacchierata con noi.</p>
                    <p>
                        <a href="https://t.me/PoliEdro" target="_blank" class="btn btn-telegram"><i class="fa fa-telegram"></i>&nbsp; @PoliEdro</a>
                    </p>
                </div>
                <div class="col-md-4 social-item">
                    <a href="https://instagram.com/poliedro.polimi/" target="_blank">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary color-instagram"></i>
                        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <h4 class="service-heading">Instagram</h4>
                    <p class="text-muted">Seguici su Instagram per non perdere le foto dei nostri eventi e le live.</p>
                    <p>
                        <a href="https://instagram.com/poliedro.polimi/" target="_blank" class="btn btn-instagram"><i class="fa fa-instagram"></i>&nbsp; @poliedro.polimi</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contatti">
        <div class="container">
            <div class="section-heading-3 row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contatti</h2>
                    <h3 class="section-subheading text-muted">Inviaci una email</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome *" id="name" required data-validation-required-message="Hai dimenticato il nome.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Indirizzo Email *" id="email" required data-validation-required-message="Hai dimenticato l'indirizzo email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Telefono" id="phone">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Messaggio (no HTML) *" id="message" required data-validation-required-message="Non hai scritto il messaggio."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-12">
<!--                                 <div class="checkbox">
                                    <label><input type="checkbox" value=""><strong>Invia allo Sportello Accoglienza,</strong> per ricevere un'attenzione speciale se vuoi parlare di argomenti delicati.</label>
                                </div> -->
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="checkbox" id="accoglienza">
                                  </span>
                                  <label class="form-control">Invia allo Sportello Accoglienza</label>
                                  <a class="btn btn-default input-group-addon" data-toggle="popover" data-container="body" data-placement="auto left" title="Sportello Accoglienza" data-content="PoliEdro fornisce uno sportello di supporto e ascolto per chiunque possa avere bisogno di confronto riguardo la sfera della sessualità e l'identità di genere. Puoi scriverci per parlare direttamente via email o se vuoi incontrarci dal vivo. La tua privacy sarà comunque sempre rispettata, dato che tutti noi sappiamo (spesso essendoci passati noi stessi) quando questi argomenti possano toccare profondamente una persona."><i class="fa fa-question"></i></a>
                                </div><!-- /input-group -->
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                     <div id='recaptcha' class="g-recaptcha"
                                      data-sitekey="6LflPxsUAAAAACrKHbZBfzm1ZbnVgThCe2kY1CwE"
                                      data-callback="sendMail"
                                      data-size="invisible"></div>
                                <br>
                                <button type="submit" class="btn btn-xl" title="Protetto con reCaptcha"><i class="fa fa-paper-plane"></i>&nbsp; Invia messaggio</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <?php get_template_part("common", "footer"); ?>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>
