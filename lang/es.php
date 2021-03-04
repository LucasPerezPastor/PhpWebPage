<?php

$textAccept='aceptar';
$textClose='cerrar';
$data=[HtmlTags::META_CHARSET=>'utf-8','author'=>'author',
        'description'=>['principal'=>'LoreIpsum'],
        'title'=>['principal'=>'LoreIpsum'],
        'facebookOG'=>
        [
            'title'=>['principal'=>'Lore'],
            'description'=>['principal'=>'Ipsum'],
            'author'=>['principal'=>'Color'],
            'imageAlt'=>['principal'=>'Image']
        ],
        'twitterCard'=>
        [
            'title'=>['principal'=>'Lore'],
            'description'=>['principal'=>'Ipsum'],
            'author'=>['principal'=>'Color'],
            'imageAlt'=>['principal'=>'Image']
        ],
        'navBar'=>
        [
            'logo'=>'','title'=>'','searchForm'=>['name'=>'','placeHolder'=>'']/* claves de los nombre de items y subitems*/
        ],
        'footer'=>
        [
            'contentFooter'=>['title'=>'','content'=>''],
            'listlink'=>['title'=>'','titleLink1'=>'','titleLink2'=>''/* etc ...*/]
        ],
        'carousel1'=>['title'=>'','content'=>'','imgAlt'=>''],/* Lineas de carousel*/
        'card1'=>['imgAlt'=>'','firstTitle'=>'','text'=>'','secondTitle'=>'','link1'=>'','link2'=>''
        /* Las cards pueden incluir titulos, textos , links , o buttons aquí hay que ir poniendo los títulos de cada uno de ellos*/],
        'sectionTitle'=>['section1'=>['title'=>'','content'=>'']
        /* Titulos de seccion con su contenido*/],

        'warningCookies'=>//Modal Warning Cookies
        [
            'acceptCookies'=>strtoupper($textAccept),
            'moreInfoCookies'=>'+INFO',
            'close'=>strtoupper($textClose)
        ],
        'infoCookies'=>
        [
            'acceptCookies'=>strtoupper($textAccept),
            'close'=>strtoupper($textClose)
        ],
        'cookiesPolicy'=>
        [
            /* Dentro de content las keys irán envueltas emtre {}*/
            'keys'=>
            [

            ],
            'content'=>''],
        'legalAdvice'=>
        [
            'keys'=>
            [

            ],
            'content'=>''],
        'privacyPolicy'=>
        [
            'keys'=>
            [

            ],
            'content'=>''],
        'language'=>
        [
            ES_LANG=>'español',CAT_LANG=>'catalán',ENG_LANG=>'inglés'
        ]       


    ];