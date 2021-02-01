<?php
class Basic{

    
  

    //  pone el HEAD de la página HTML
    public static function head(string $title='',string $author='',string $description='',string $charset="utf-8",$facebookOpenGraph=NULL, $twitterCard=NULL,string $stilo='',string $escript=''){
        echo HtmlTags::meta('charset',$charset);
        if (!empty($title)){
            ?>
            <title><?php echo $title?></title>
        <?php
        };
        echo HtmlTags::meta('author',$author,'name');
        echo HtmlTags::meta('description',$description,'name');
        if ($facebookOpenGraph!=NULL){
            echo ($facebookOpenGraph);
        };
        if ($twitterCard!=NULL){
            echo ($twitterCard);
        };
    }

}