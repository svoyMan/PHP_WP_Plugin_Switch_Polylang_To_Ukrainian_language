<?php
// $show = false;
// if ( UKRAINE_CODE != get_locale() ) {
// 	$show = true;
// }
?>

<div class="pstula">
	<div class="pstula__wrap-content">
		<div class="pstula__content">
			<div class="pstula__title"><?php _e( 'Оберіть мову сайту', 'pstula_domain' ); ?></div>
			<div class="pstula__languages">
				<?php $translations = pll_the_languages( array( 'raw' => 1 ) ); ?>
				<?php if ( $translations ) { ?>
					<ul class="pstula__list">
						<?php foreach( $translations as $language ) { ?>
							<?php $item_classes = implode( ' ', $language['classes'] ); ?>
							<li class="pstula__list__item <?php echo esc_attr( $item_classes ); ?>">
								<a data-lang-slug="<?php echo esc_attr( $language['slug'] ); ?>" data-lang-locale="<?php echo esc_attr( $language['locale'] ); ?>" href="<?php echo esc_url( $language['url'] ); ?>" class="pstula__list__item__link"><?php echo esc_html( $language['name'] ); ?></a>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
			<div class="pstula__current_lang" data-current-lang="<?php echo pll_current_language( 'slug' ); ?>"></div>
		</div>
	</div>
	<div class="pstula__shadow"></div>
</div>
