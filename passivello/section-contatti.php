
<section id="contatti">
    <div class="container">
        <div class="section-heading-3 row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"><?php _e("Contacts", "passivello");?></h2>
                <h3 class="section-subheading text-muted"><?php _e("Send us an e-mail", "passivello");?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?php _e("Name", "passivello");?> *" id="name" required data-validation-required-message="<?php _e("You didn't type your name.", "passivello");?>">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="<?php _e("Email Address", "passivello");?> *" id="email" required data-validation-required-message="<?php _e("You didn't type your email address.", "passivello");?>">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="<?php _e("Phone Number", "passivello");?>" id="phone">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="<?php _e("Messagge (no HTML)", "passivello");?> *" id="message" required data-validation-required-message="<?php _e("You didn't write a message.", "passivello");?>"></textarea>
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
                                <label class="form-control"><?php _e("Send to Welcoming Mailbox", "passivello");?></label>
                                <a class="btn btn-default input-group-addon" data-toggle="popover" data-container="body" data-placement="auto left" title="<?php _e("Welcoming Mailbox", "passivello");?>" data-content="<?php esc_html_e("PoliEdro provides a \"welcoming\" mailbox for anybody who needs to talk privately about their sexuality and their gender identity. You can stay in touch with us via e-mail or ask for a personal meeting. Your privacy always comes first: we've all been there and we know how these topics can easily hurt our feelings.", "passivello");?>"><i class="fa fa-question";></i></a>
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
                            <button type="submit" class="btn btn-xl" title="<?php _e("Protected by reCaptcha", "passivello"); ?>"><i class="fa fa-paper-plane"></i>&nbsp; <?php _e("Send message", "passivello");?></button>
                            <br>
                            <a class="email-privacy" href="<?php _link("privacy"); ?>" target="_blank"><i class="fa fa-info-circle"></i> <?php _e("Privacy Policy", "passivello");?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>