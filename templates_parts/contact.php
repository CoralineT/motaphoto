<div id="myModal" class="modal">
    <div class="modal-content">
        <img class="img-contact" src="<?php echo get_template_directory_uri(); ?>'/assets/images/contact.png'" alt="contact">

        <span class="close">&times;</span>
        
        <?php $shortcode_output = do_shortcode('[contact-form-7 id="2ce96c8" title="Formulaire de contact"]');
            echo $shortcode_output ?>
        
    </div>
</div>