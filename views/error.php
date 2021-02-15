<!DOCTYPE html>
<HTML lang="<?php echo $GLOBALS['language']?>">
	<head>
		<?php
		(TEMPLATE)::head(HEAD_CONTENT,FAVICONS,LINKS_HEAD,EXTERNAL_JAVA_SCRIPTS,FACEBOOKOPENGRAPH,TWITTER_CARD);
		?>
	</head>
	<body>
      <?php

    (TEMPLATE)::nav(NAVBAR,"Enterprise","#",LOGO,SEARCH_FORM);

	(TEMPLATE)::footer(FOOTER);

      ?>
  </body>
	
</HTML>
