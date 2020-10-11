<?php declare(strict_types=1);
/**
 * H3/Logger - Simple log-to-DB solution for Fatfree Framework powered apps.
 * (c) 2020 resist | https://resist.hu | https://github.com/r3sist/h3
 */

namespace resist\H3;

use Base;
use DB\SQL;
use DB\SQL\Mapper;
use resist\H3\Exception\InvalidLogTableNameException;
use JsonException;

/** Simple log-to-DB solution for Fatfree Framework powered apps */
class Logger
{
    private const TABLE = 'log';

    private Base $f3;
    private SQL $db;

    /**
     * @param Base $f3 Fatfree Framework: Base
     * @param SQL $db Fatfree Framework: DB\SQL
     */
    public function __construct(Base $f3, SQL $db)
    {
        $this->f3 = $f3;
        $this->db = $db;
    }

    /**
     * Returns Fatfree Framework mapper object
     * @throws InvalidLogTableNameException
     */
    public function getMap(string $table = self::TABLE): Mapper
    {
        if (!ctype_alnum($table)) {
            throw new InvalidLogTableNameException('Table name: '.$table);
        }

        return new Mapper($this->db, $table);
    }

    /**
     * Creates entry
     * @param string $level Can be "info", "warning", "danger", "success"
     * @param string|array $message Array message is stored in JSON format
     * @throws InvalidLogTableNameException
     */
    public function create(string $level, string $subject = '', $message = '', string $table = self::TABLE): void
    {
        if (!ctype_alnum($table)) {
            throw new InvalidLogTableNameException('Table name: '.$table);
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

    /**
     * @param int $time Timestamp log entries beiing deleted before
     * @throws InvalidLogTableNameException
     */
    public function eraseLog(string $table = self::TABLE, int $time = 0): void
    {
        if (!ctype_alnum($table)) {
            throw new InvalidLogTableNameException('Table name: '.$table);
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
