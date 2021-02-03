<!DOCTYPE html>
<HTML lang="<?php echo $GLOBALS['language']?>">
	<head>
		<?php
		(TEMPLATE)::head($GLOBALS['contentHead'],$GLOBALS['listIcons'],
						$GLOBALS['links'],$GLOBALS['externalJavaScripts'],CHARSET,$GLOBALS['viewPort'],
						$GLOBALS['faceBookOpenGraph'],$GLOBALS['twitterCard']);
		?>
	</head>
	<body>
      <?php

      $lista=new Lista(Lista::UNORDERED,'milista','titulo','www.sss');
      $lista->addArticle(New Article('articulo1',"titulo1","www.sccc"));
      $lista->addArticle(New Article('articulo2',"titulo2","www.sccc",'class="MyClass"'));
      $lista2=new Lista(Lista::UNORDERED,'milista2','titulo','www.sss');
      $lista2->addArticle(New Article('articulo21',"titulo1","www.sccc"));
      $lista2->addArticle(New Article('articulo22',"titulo2","www.sccc",'class="MyClass"'));
      $lista3=new Lista(Lista::UNORDERED,'milista3','titulo','www.sss');
      $lista3->addArticle(New Article('articulo31',"titulo1","www.sccc"));
      $lista3->addArticle(New Article('articulo32',"titulo2","www.sccc",'class="MyClass"'));
      $lista2->addArticle($lista3);
      $lista->addArticle($lista2);
     
      echo $lista;
      $lista->removeAllTags();  
      echo $lista;
      $lista->addAllTags('class="Hola"');
      echo $lista;
      $lista->updateAllTags('type="noType"');
      echo $lista;
      $lista->removeTagsById('articulo1');
      echo $lista;
      $lista->addTagsById('articulo2','class="adios"');
      echo $lista;
      $lista->updateTagsById('milista','img="adios"');
      echo $lista;
      $lista->addAllTags('class="sublista"',true,true);
      echo $lista;
      $lista->updateAllTags('asto="blala"',true,true);
      echo $lista;
      $lista->updateAllTags('data-to="blala"',true);
      echo $lista;

      ?>
  </body>
	
</HTML>
