<!-- section photo de la single-photo -->
<div class="page-photo">
    <section class="page-photo_section-bloc">
		<ul class="page-photo_section-bloc_info">
            <li> <h1> <?php echo the_title() ?> </h1> </li>
			<li>
				<p class="detail-info-photo">RÉFÉRENCE :<?php echo get_field('reference'); ?></p>
			</li>
			<li>
				<p class="detail-info-photo">CATÉGORIE :<?php the_terms($post->ID, 'categorie') ?></p>
			</li>
			<li>
				<p class="detail-info-photo">FORMAT :<?php the_terms($post->ID, 'format') ?> </p>
			</li>
			<li>
				<p class="detail-info-photo">TYPE :<?php echo get_field('type'); ?></p>
			</li>
			<li>
				<p class="detail-info-photo">ANNÉE : <?php echo get_field('date'); ?></p>
			</li>
        </ul>

		<div class="photo-container">
			<?php if (has_post_thumbnail()) : ?>
				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail"/>
			<?php endif; ?>
		</div>
    </section>

    <section class="interaction-photo">
        <div>
            <p class="texte">Cette photo vous intéresse ?</p>
            <input id="btn-contact" class="interaction-photo__btn" type="button" value="Contact">
        </div>
        <div class="interaction-photo__navigation">
            <?php
                $prevPost = get_previous_post();
                $nextPost = get_next_post();
            ?>
            <div class="arrows">
                <?php if (!empty($prevPost)) {
                        $prevThumbnail = get_the_post_thumbnail_url( $prevPost->ID );
                        $prevLink = get_permalink($prevPost); ?>
                        <a href="<?php echo $prevLink; ?>">
                            <img class="arrow arrow-gauche" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="Flèche pointant vers la gauche" />
                        </a>
                <?php } else { ?>
                        <img class="arrow " src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.png" />
                <?php } 
                        if (!empty($nextPost)) {
                            $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
                            $nextLink = get_permalink($nextPost); ?>
                            <a href="<?php echo $nextLink; ?>">
                                <img class="arrow arrow-droite" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.png" alt="Flèche pointant vers la droite" />
                            </a>
                <?php } ?>
            </div>
            <div class="preview">
                <img class="previous-image" src="<?php echo $prevThumbnail; ?>" alt="Prévisualisation image précédente">
            </div>
            <div class="preview">
                <img class="next-image" src="<?php echo $nextThumbnail; ?>" alt="Prévisualisation image suivante">
            </div>
        </div>
  </section>
        
</div>