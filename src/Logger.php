<?php declare(strict_types=1);

namespace resist\H3;

use \Base;
use \DB\SQL;
use \DB\SQL\Mapper;
use JsonException;

class Logger
{
    private const TABLE = 'log';

    public Base $f3;
    private SQL $db;

    public function __construct(Base $f3, SQL $db)
    {
        $this->f3 = $f3;
        $this->db = $db;
    }

    public function getMap()
    {
        return new Mapper($this->db, self::TABLE);
    }

    /** @param string|array $body */
    public function create(string $group, string $title = '', $body = ''): void
    {
        if (is_array($body)) {
            try {
                $body = json_encode($body, JSON_THROW_ON_ERROR, 512);
            } catch (JsonException $e) {
                $body = 'ORIGINAL LOG MESSAGE LOST! '.$e->getMessage();
            }
        }
        $query = 'INSERT INTO '.self::TABLE.' (uname, lgroup, ltitle, lbody, lts, lip) VALUES (:uname, :lgroup, :ltitle, :lbody, :lts, :lip)';
        $this->db->exec($query, [
            ':uname' => ($this->f3->exists('uname')?$this->f3->get('uname'):''),
            ':lgroup' => $this->f3->clean($group),
            ':ltitle' => $this->f3->clean($title),
            ':lbody' => $body,
            ':lts' => time(),
            ':lip' => $this->f3->get('IP')
        ]);
    }
}
