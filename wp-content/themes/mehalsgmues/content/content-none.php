<?php
/**
 * This template is used when no content is present.
 *
 * @package Portfolio
 * @since Portfolio Lite 1.0
 */

?>

<!-- BEGIN .no-results -->
<div class="no-results">

	<h1 class="headline"><?php
		echo '"';
		esc_html_e($_GET['s']);
		echo '"?<br>';
		esc_html_e('Dazu haben wir noch keinen Inhalt.', 'portfolio-lite' );
	?></h1>

<!-- END .no-results -->
</div>
