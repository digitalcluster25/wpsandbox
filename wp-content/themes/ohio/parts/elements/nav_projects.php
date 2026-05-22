<?php
	$project = OhioObjectParser::parse_to_project_object( $post );

	if ( !$project['next'] ) return;
?>

<a href="<?php echo esc_url( $project['next']['url'] ); ?>" data-js="sticky-nav" class="sticky-nav -unlink -fade-up">
	<div class="sticky-nav-thumbnail"
		<?php if ( $project['next']['image']):
			echo 'style="background-image: url(\'' . $project['next']['image'] . '\');"';
		endif; ?>
		>
	</div>
	<div class="sticky-nav-holder">
		<div class="heading">
			<div class="subtitle">
				<?php esc_html_e( 'Next Project', 'ohio' ); ?>
			</div>
			<h5 class="title">
				<?php echo wp_kses( $project['next']['title'], 'default' ); ?>
			</h5>
		</div>
	</div>
</a>
