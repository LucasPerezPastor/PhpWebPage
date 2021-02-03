<?php 

class Link{
    const STYLESHEET="stylesheet";
    const CANONICAL="canonical";
    const AMPHTML=" amphtml";
    const MANIFEST="manifest";
    const AUTHOR="author";
    const LICENSE="license";
    const ALTERNATE="alternate";
    const ME="me";
    const ARCHIVES="archives";
    const INDEX="index";
    const SELF_REL="self";
    const FIRST="first";
    const LAST="last";
    const PREV="prev";
    const NEXT="next";
    const EDITURI="EditURI";
    const PINGBACK="pingback";
    const WEBMENTION="webmention";
    const MICROPUB="micropub";
    const SEARCH="search";
    const DNS_PREFETCH="dns-prefetch";
    const PRECONNECT="preconnect";
    const PREFETCH="prefetch";
    const PRERENDER="prerender";
    const PRELOAD="preload";

    public $rel='',$src='',$asTo='',$type='',$title='';

    public function __construct($rel='',$src='',$type='',$title='',$asTo='')
    {
        $this->rel=$rel;
        $this->src=$src;
        $this->type=$type;
        $this->asTo=$asTo;
        $this->title=$title;
    }
}