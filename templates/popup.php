<?php
$show = false;
if ( 'uk' != get_locale() ) {
	$show = true;
}
?>

<div class="pstula<?php if ( $show ) { echo ' show'; } ?>">
	<div class="pstula__wrap-content">
		<div class="pstula__content">
			<div class="pstula__title"><?php _e( 'Оберіть мову сайту', 'pstula_domain' ); ?></div>
			<?php pll_the_languages(); ?>
		</div>
	</div>
	<div class="pstula__shadow"></div>
</div>