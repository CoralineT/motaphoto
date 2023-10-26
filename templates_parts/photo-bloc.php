<!-- section photo de la single-photo -->
<div class="page-photo">
    <section class="page-photo_section-bloc">
		<ul class="page-photo_section-bloc_info">
            <li> <h1> <?= the_title() ?> </h1> </li>
			<li>
				<p class="detail-info-photo">RÉFÉRENCE : <span id="reference"><?= get_field('reference'); ?></span></p>
			</li>
			<li>
				<p class="detail-info-photo">CATÉGORIE : <?php the_terms($post->ID, 'categorie') ?></p>
			</li>
			<li>
				<p class="detail-info-photo">FORMAT : <?php the_terms($post->ID, 'format') ?> </p>
			</li>
			<li>
				<p class="detail-info-photo">TYPE : <?= get_field('type'); ?></p>
			</li>
			<li>
				<p class="detail-info-photo">ANNÉE : <?= get_field('date'); ?></p>
			</li>
        </ul>

		<div class="photo-container">
            <div class="photo single-similaire">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>"/>
                <?php endif; ?>
            </div>
            <!-- Div pour le hover -->
            <div class="hover-photo">
                <a href="#"><img id="icone-plein-ecran" class="icone-plein-ecran" src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="Icone plein écran"></a>
            </div>
		</div>
    </section>

    <section class="interaction-photo">
        <div class="interaction-photo__contact">
            <p class="texte">Cette photo vous intéresse ?</p>
            <input id="btn-contact" class="interaction-photo__contact__btn" type="button" value="Contact">
        </div>
        <div class="interaction-photo__navigation">
            <?php
                $prevPost = get_previous_post();
                $nextPost = get_next_post();
            ?>
            <div class="arrows">
                <?php if (!empty($prevPost)) : 
                        $prevThumbnail = get_the_post_thumbnail_url( $prevPost->ID );
                        $prevLink = get_permalink($prevPost); ?>
                        <a id="arrow-left" href="<?= $prevLink; ?>">
                            <img class="arrow arrow-gauche" src="<?= get_template_directory_uri(); ?>/assets/images/arrow-left.png" alt="Flèche pointant vers la gauche" />
                        </a>
                        <?php endif;
                        if (!empty($nextPost)) :
                            $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
                            $nextLink = get_permalink($nextPost); ?>
                            <a href="<?= $nextLink; ?>">
                                <img id="arrow-right" class="arrow arrow-droite" src="<?= get_template_directory_uri(); ?>/assets/images/arrow-right.png" alt="Flèche pointant vers la droite" />
                            </a>
                <?php endif; ?>
            </div>
            
            <div class="div-preview">
            <div class="preview">
                <?php if (!empty($prevPost)) :
                        $prevThumbnail = get_the_post_thumbnail_url( $prevPost->ID );
                        $prevLink = get_permalink($prevPost); ?>
                        <a href="<?= $prevLink; ?>">
                        <img id="previous-image" class="previous-image" src="<?php echo $prevThumbnail; ?>" alt="Prévisualisation image précédente">
                        </a>
                <?php endif; ?>
            </div>

            <div class="preview">
                <?php if (!empty($nextPost)) :
                            $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
                            $nextLink = get_permalink($nextPost); ?>
                            <a href="<?= $nextLink; ?>">
                            <img id="next-image" class="next-image" src="<?php echo $nextThumbnail; ?>" alt="Prévisualisation image suivante">
                            </a>
                <?php endif ?>
            </div>
            </div>
        </div>
  </section>


</div>