<div class="span9">
    <div id="content">
		<?php
			if (file_exists($url))
				require_once($url);
			else
				require_once('404.html');
		?>
	</div>
</div>