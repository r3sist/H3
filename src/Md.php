<?php
// H3 - Helpers for Fatfree Framework
// Markdown helpers
// (c) resist | https://github.com/r3sist/h3

namespace resist\H3;

use \Base;
use \Markdown;

class Md
{
    public Base $f3;
    private Markdown $md;
    const ONELINETAGS = 'i,em,b,strong,a,code';
    const MULTILINETAGS = 'i,em,b,strong,a,code,ul,li,p,ol,h1,h2,h3,h4,h5,h6,hr,img';

    public function __construct(Base $f3, Markdown $md)
    {
        $this->f3 = $f3;
        $this->md = $md;
    }

    public function makeOneLine(string $string): string
    {
        $md = $this->md->convert($this->f3->clean($string));
        return $this->f3->clean($md, self::ONELINETAGS);
    }

    public function makeWithoutHtml(string $string): string
    {
        $md = $this->md->convert($this->f3->clean($string, 'br'));
        return $this->f3->clean($md, self::MULTILINETAGS);
    }

    public function makeMd(string $string): string
    {
        return $this->md->convert($string);
    }
}
