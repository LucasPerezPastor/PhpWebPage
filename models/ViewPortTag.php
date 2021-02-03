<?php

class ViewPortTag{
    public $width='',$heigth='',$initialScale=0,$minimunScale=0,$maximumScale=0,$userScalable='';

    const DEVICE_WIDTH='device-width';
    const DEVICE_HEIGHT='devide-height';

    public function __construct(string $width='',int $initialScale=0,int $maximumScale=0,string $heigth='',int $minimunScale=0,$userScalable='')
    {
        $this->width=$width;
        $this->heigth=$heigth;
        $this->initialScale=$initialScale;
        $this->maximumScale=$maximumScale;
        $this->minimunScale=$minimunScale;
        $this->userScalable=$userScalable;
    }

    public function __toString()
    {
        $out='';
        $out.=(empty($this->width))?'':"width={$this->width}, ";
        $out.=(empty($this->heigth))?'':"heigth={$this->heigth}, ";
        $out.=($this->userScalable=="YES" || $this->userScalable=="NO")?"user-scalable={$this->userScalable}, ":'';
        $out.=($this->initialScale!=0)?"initial-scale={$this->initialScale}, ":'';
        $out.=($this->maximumScale!=0)?"maximum-scale={$this->maximumScale}, ":'';
        $out.=($this->minimunScale!=0)?"minimum-scale={$this->minimumScale}":'';
        $out=rtrim($out,', ');

        return HtmlTags::meta('viewport',$out,'name');
    }
}

