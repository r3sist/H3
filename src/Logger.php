<?php declare(strict_types=1);

namespace resist\H3;

use Base;
use DB\SQL;
use DB\SQL\Mapper;
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

    public function getMap(string $table = self::TABLE): Mapper
    {
        if (!ctype_alnum($table)) {
            throw new \Exception('Invalid log table name.');
        }

        return new Mapper($this->db, $table);
    }

    /** @param string|array $message */
    public function create(string $level, string $subject = '', $message = '', string $table = self::TABLE): void
    {
        if (!ctype_alnum($table)) {
            throw new \Exception('Invalid log table name.');
        }

        if (is_array($message)) {
            try {
                $message = json_encode($message, JSON_THROW_ON_ERROR|JSON_UNESCAPED_UNICODE, 512);
            } catch (JsonException $e) {
                $message = 'ORIGINAL LOG MESSAGE LOST! '.$e->getMessage();
            }
        }

        if (!in_array($level, ['info', 'warning', 'danger', 'success'])) {
            $level = 'danger';
        }

        $query = 'INSERT INTO '.$table.' (uname, llevel, lsubject, lbody, lts, lip) VALUES (:uname, :llevel, :lsubject, :lbody, :lts, :lip)';
        $this->db->exec($query, [
            ':uname' => ($this->f3->exists('uname')?$this->f3->get('uname'):''),
            ':llevel' => $level,
            ':lsubject' => $this->f3->clean($subject),
            ':lbody' => $message,
            ':lts' => time(),
            ':lip' => $this->f3->get('IP')
        ]);
    }

    public function eraseLog(string $table = self::TABLE, int $time = 0): void
    {
        if (!ctype_alnum($table)) {
            throw new \Exception('Invalid log table name.');
        }

        $where = '1';
        $log = '(all)';

        if ($time > 0) {
            $where = 'lts < '.$time;
            $log = '( < '.date('Y.m.d', $time).')';
        }

        $query = 'DELETE FROM '.$table.' WHERE '.$where;
        $this->db->exec($query);
        $this->create('success', 'Log ('.$table.') erased. '.$log);
    }
}
