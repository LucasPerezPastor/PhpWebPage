<!DOCTYPE html>
<?php

?>

<HTML lang="<?php echo $language?>">
	<head>
		<?php
		(TEMPLATE)::head($headContent,$favicons,$linksHead,$externalJavaScript,$faceBookOpenGraph,$twitterCard);
		?>
  
	</head>
	<body>
	<?php
	
    (TEMPLATE)::nav($navBar,$navBarClass,$definitions->navBar->title,"#",$logo,$languages,);//$searchForm);

	

    (TEMPLATE)::carousel($carousel);
	
	(TEMPLATE)::sectionTitle(['title'=>'About us','content'=>'Lore ipsum']);
	
	(TEMPLATE)::card($cardPresent);
	
	(TEMPLATE)::card($cardPresent,false,true);
	(TEMPLATE)::sectionTitle('Our Jobs ','LoreIpsum');
	(TEMPLATE)::cardGroup($cardGroup,2);
	(TEMPLATE)::cardGroup($cardGroup,3);
	(TEMPLATE)::cardGroup($cardGroup,4);

	(TEMPLATE)::footer($footer);

	(TEMPLATE)::makeModal($infoCookies);
	(TEMPLATE)::makeModal($warningCookies);
	//echo (TEMPLATE)::linkModal('warningCookies',['type'=>HtmlTags::BUTTON,'title'=>'warning']);
	
	$but=['id'=>'resetCookies','title'=>'RESET COOKIES'];
	echo HtmlTags::button($but);
    ?>
	
	  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoCookies">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
  </body>
	
</HTML>
