<div class="sptul">
	<div class="sptul__wrap-content">
		<div class="sptul__content">
			<div class="sptul__title"><?php _e( 'Оберіть мову сайту', 'sptul_domain' ); ?></div>
			<div class="sptul__languages">
				<?php $translations = pll_the_languages( array( 'raw' => 1 ) ); ?>
				<?php if ( $translations ) { ?>
					<ul class="sptul__list">
						<?php foreach( $translations as $language ) { ?>
							<?php $item_classes = implode( ' ', $language['classes'] ); ?>
							<li class="sptul__list__item <?php echo esc_attr( $item_classes ); ?>">
								<a data-lang-slug="<?php echo esc_attr( $language['slug'] ); ?>" data-lang-locale="<?php echo esc_attr( $language['locale'] ); ?>" href="<?php echo esc_url( $language['url'] ); ?>" class="sptul__list__item__link"><?php echo esc_html( $language['name'] ); ?></a>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
			<div class="sptul__current_lang" data-current-lang="<?php echo pll_current_language( 'slug' ); ?>"></div>
		</div>
	</div>
	<div class="sptul__shadow"></div>
</div>
