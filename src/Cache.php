<?php declare(strict_types=1);

namespace resist\H3;

use DB\SQL;
use DB\SQL\Mapper;
use Prefab;

/** @deprecated Try not to use this class */
class Cache extends Prefab
{
    const TABLE = 'cache';

    private SQL $db;
    public Mapper $map;
    
    public function __construct(SQL $db)
    {
        $this->db = $db;
        $this->map = new Mapper($this->db, self::TABLE);
    }

    /** @param mixed $data */
    public function create(string $cacheName, $data, int $cacheCol = 1): void
    {
        if (!in_array($cacheCol, [1, 2, 3, 4])) {
            throw new \Exception('Invalid cache col id');
        }

        if (ctype_alnum($cacheName) !== true) {
            throw new \Exception('Invalid cache name');
        }
        
        $this->map->load(['chid=?', $cacheName]);
        if (!$this->map->dry()) {
            switch ($cacheCol) {
                case 1:
                    $this->map->chd1 = $data;
                    break;
                case 2:
                    $this->map->chd2 = $data;
                    break;
                case 3:
                    $this->map->chd3 = $data;
                    break;
                case 4:
                    $this->map->chd4 = $data;
                    break;
            }
            $this->map->chmod = time();
            $this->map->update();
            $this->map->reset();
        } else {
            $this->map->reset();
            switch ($cacheCol) {
                case 1:
                    $this->map->chd1 = $data;
                    break;
                case 2:
                    $this->map->chd2 = $data;
                    break;
                case 3:
                    $this->map->chd3 = $data;
                    break;
                case 4:
                    $this->map->chd4 = $data;
                    break;
            }
            $this->map->chmod = time();
            $this->map->chid = $cacheName;
            $this->map->save();
        }
    }

    public function read(string $cacheName): array
    {
        $this->map->load(['chid=?', $cacheName]);
        if (!$this->map->dry()) {
            return [
                1 => $this->map->chd1,
                2 => $this->map->chd2,
                3 => $this->map->chd3,
                4 => $this->map->chd4,
                5 => $this->map->chmod
            ];
        }

        return [];
    }    
}
