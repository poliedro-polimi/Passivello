<?php
// Directory above root
$json = file_get_contents(__DIR__."/../../../../fb_events.json");
$obj = json_decode($json, true);
$newcount = $obj["newcount"];
$events = $obj["events"];
?>

<section id="eventi">
    <div class="container">
        <div class="section-heading-passivello row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"><?php _e("Eventi", "passivello");?> <span class="badge badge-danger"><?php echo ($newcount>0?$newcount:"");?></span></h2>
            </div>
        </div>
        <div class="row text-center flex-box">
            <?php
            $count = 0;
            foreach ($events as $event) :
                if ( $count >= 3 ) break;
                $start_time = passivello_get_datetime($event["start_time"]);
                ?>
                <div class="col-md-4 col-sm-12" itemscope itemtype="http://schema.org/Event">
                    <div class="home-event-item <?php echo passivello_get_event_class($start_time); ?>">
                        <h4 class="service-heading event-title">
                            <a itemprop="url" href="https://facebook.com/events/<?php echo $event['id'] ?>/" target="_blank"><span itemprop="name">
                                <?php echo esc_html($event['name']) ?>
                                </span>
                            </a>
                            <?php if ($start_time >= new DateTime()): ?>
                                <span class="label label-danger"><?php _e("New", "passivello");?></span>
                            <?php else: ?>
                                <span class="label label-default"><?php _e("Past", "passivello");?></span>
                            <?php endif; ?>
                        </h4>
                        <p class="text-muted">
                        <p class="event-date">
                            <i class="fa fa-clock-o"></i>&nbsp;
                            <span itemprop="startDate" content="<?php echo $start_time->format("Y-m-d")."T".$start_time->format("H:i"); ?>">
                                <?php
                                echo passivello_get_hr_event_datetime($start_time);
                                ?> &emsp;
                                </span>
                            <!-- </p>
                            <p class="event-location"> -->
                            <i class="fa fa-map-marker"></i>&nbsp
                            <span itemprop="location" itemprop="location" itemscope itemtype="http://schema.org/Place">
                                    <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="streetAddress">
                                <?php echo esc_html($event['place_name']); ?>
                                    </span></span>
                                </span>
                        </p>
                        <p class="event-description" itemprop="description">
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
    <div class="fbpagelink"><a href="<?php _link("paginafb"); ?>" target="_blank" class="btn btn-default btn-scopri"><i class="fa fa-external-link"></i> <?php _e("Find all of our events on Facebook", "passivello");?></a> &nbsp; <a class="btn btn-default btn-scopri" href="<?php _link("webcalfb"); ?>"><i class="fa fa-calendar-plus-o"></i> <?php _e("Add to Calendar", "passivello");?></a></div>
</section>