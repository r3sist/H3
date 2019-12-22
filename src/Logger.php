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
    }

    public function registerMap()
    {
        $this->map = new Mapper($this->db, self::TABLE);
    }

    public function create(string $group, string $title = '', string $body = ''): void
    {
        $query = 'INSERT INTO '.self::TABLE.' (uname, lgroup, ltitle, lbody, lts, lip) VALUES (:uname, :lgroup, :ltitle, :lbody, :lts, :lip)';
        $this->db->exec($query, [
            ':uname' => $this->f3->get('uname'),
            ':lgroup' => $this->f3->clean($group),
            ':ltitle' => $this->f3->clean($title),
            ':lbody' => $body,
            ':lts' => time(),
            ':lip' => $this->f3->get('IP')
        ]);
    }
}
