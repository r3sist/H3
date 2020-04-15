<?php declare(strict_types=1);

namespace resist\H3;

use DB\SQL;
use DB\SQL\Mapper;
use Prefab;

class Cache extends Prefab
{
    const CACHE_DEAFULT_TABLE = 'cache';

    public Mapper $map;
    
    public function __construct(SQL $db)
    {
        $this->map = new Mapper($db, self::CACHE_DEAFULT_TABLE);
    }

    public function cache(string $cacheName, string $data): void
    {
        if (ctype_alnum($cacheName) !== true) {
            throw new \Exception('Invalid cache name');
        }
        
        $this->map->load(['name=?', $cacheName]);

        if (!$this->map->dry()) {
            $this->map->data = $data;
            $this->map->modified = time();
            $this->map->update();
            $this->map->reset();
        } else {
            $this->map->reset();
            $this->map->name = $cacheName;
            $this->map->data = $data;
            $this->map->modified = time();
            $this->map->save();
        }
    }

    public function getData(string $cacheName): string
    {
        $this->map->load(['name=?', $cacheName]);

        if (!$this->map->dry()) {
            return $this->map->data;
        }

        return '';
    }

    public function getModified(string $cacheName): int
    {
        $this->map->load(['name=?', $cacheName]);

        if (!$this->map->dry()) {
            return (int)$this->map->modified;
        }

        return 0;
    }
}
