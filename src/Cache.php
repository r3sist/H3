<?php declare(strict_types=1);
/**
 * H3/Cache - Simple key-value DB storage for Fatfree Framework powered apps
 * (c) 2020 resist | https://resist.hu | https://github.com/r3sist/h3
 */

namespace resist\H3;

use DB\SQL;
use DB\SQL\Mapper;
use resist\H3\Exception\InvalidCacheNameException;

/** H3/Cache - Simple key-value DB storage for Fatfree Framework powered apps */
class Cache
{
    private const CACHE_DEFAULT_TABLE = 'cache';

    private Mapper $map;

    /** @param SQL $db Fatfree Framework: DB\SQL */
    public function __construct(SQL $db)
    {
        $this->map = new Mapper($db, self::CACHE_DEFAULT_TABLE);
    }

    /**
     * Stores string data to given cache-name
     * @throws InvalidCacheNameException
     */
    public function cache(string $cacheName, string $data): void
    {
        if (ctype_alnum($cacheName) !== true) {
            throw new InvalidCacheNameException('Cache name should be alpha-numeric. Given: '.$cacheName);
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

    /** Returns data as string for given cache-name */
    public function getData(string $cacheName): string
    {
        $this->map->load(['name=?', $cacheName]);

        if (!$this->map->dry()) {
            return $this->map->data;
        }

        return '';
    }

    /** Returns last modified timestamp for given cache-name */
    public function getModified(string $cacheName): int
    {
        $this->map->load(['name=?', $cacheName]);

        if (!$this->map->dry()) {
            return (int)$this->map->modified;
        }

        return 0;
    }
}
