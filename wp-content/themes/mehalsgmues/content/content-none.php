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
		esc_html_e('Dazu haben wir noch kein Rezept.', 'portfolio-lite' );
	?></h1>
	
	<p><?php
		esc_html_e( 'Wir haben aber immer Appetit auf Neues.', 'portfolio-lite' );
		echo '<br><a href="/rezepte-einsenden">Schreib uns!</a>';
	?></p>

<!-- END .no-results -->
</div>
