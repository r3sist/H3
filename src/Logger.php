<?php
// L3 - Simple and dirty logging platform for Fatfree Framework powered apps
// Log writer
// (c) resist | https://github.com/r3sist/l3

namespace resist\H3;

use \Base;
use \DB\SQL;
use \DB\SQL\Mapper;

class Logger
{
    const TABLE = 'log';
    public Base $f3;
    private SQL $db;
    public Mapper $map;

    public function __construct(Base $f3, SQL $db)
    {
        $this->f3 = $f3;
        $this->db = $db;
        $this->map = new Mapper($this->db, self::TABLE);
    }

    public function create(string $group, string $title = '', string $body = ''): void
    {
        $this->map->reset();
        $this->map->uname = $this->f3->uname;
        $this->map->lgroup = $group;
        $this->map->ltitle = $title;
        $this->map->lbody = $body;
        $this->map->lts = time();
        $this->map->lip = $this->f3->IP;
        $this->map->save();
        $this->map->reset();
    }
}
