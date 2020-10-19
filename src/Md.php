<?php declare(strict_types=1);
/**
 * H3/Md - Markdown helpers.
 * (c) 2020 resist | https://resist.hu | https://github.com/r3sist/h3
 */

namespace resist\H3;

use Base;
use Markdown;

/** Markdown helpers */
class Md
{
    private Base $f3;
    private Markdown $md;

    private const ONE_LINE_TAGS = 'i,em,b,strong,a,code';
    private const MULTI_LINE_TAGS = 'i,em,b,strong,a,code,ul,li,p,ol,h1,h2,h3,h4,h5,h6,hr,img,blockquote';

    public function __construct(Base $f3, Markdown $md)
    {
        $this->f3 = $f3;
        $this->md = $md;
    }

    public function makeOneLine(string $string): string
    {
        $md = $this->md->convert($this->f3->clean($string));

        return $this->f3->clean($md, self::ONE_LINE_TAGS);
    }

    public function makeWithoutHtml(string $string): string
    {
        $md = $this->md->convert($this->f3->clean($string, 'br'));

        return $this->f3->clean($md, self::MULTI_LINE_TAGS);
    }

    public function makeMd(string $string): string
    {
        return $this->md->convert($string);
    }
}
