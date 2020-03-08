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

    /** @param string|array $message */
    public function create(string $level, string $subject = '', $message = ''): void
    {
        if (is_array($message)) {
            try {
                $message = json_encode($message, JSON_THROW_ON_ERROR, 512);
            } catch (JsonException $e) {
                $message = 'ORIGINAL LOG MESSAGE LOST! '.$e->getMessage();
            }
        }

        if (!in_array($level, ['info', 'warning', 'danger', 'success'])) {
            $level = 'info';
        }
        $query = 'INSERT INTO '.self::TABLE.' (uname, llevel, lsubject, lbody, lts, lip) VALUES (:uname, :llevel, :lsubject, :lbody, :lts, :lip)';
        $this->db->exec($query, [
            ':uname' => ($this->f3->exists('uname')?$this->f3->get('uname'):''),
            ':llevel' => $level,
            ':ltitle' => $this->f3->clean($subject),
            ':lbody' => $message,
            ':lts' => time(),
            ':lip' => $this->f3->get('IP')
        ]);
    }
}
