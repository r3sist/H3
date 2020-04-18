# H3

https://github.com/r3sist/h3

This repository is for personal use only. 

## Installation

Via composer: `"resist/h3": "dev-master"`

---

# Cache

Simple key-value DB storage for Fatfree Framework powered apps.

## Usage

```php
new \resist\H3\Cache(\DB\SQL $db)
```

###### Store data

```php
cache(string $cacheName, string $data): void
```

###### Retrieve data

```php
getData(string $cacheName): string
```

###### Get last modified timestamp

```php
getModified(string $cacheName): int
```

## Scheme

Uses `cache` table.

```mysql
CREATE TABLE IF NOT EXISTS `cache` (
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` int(11) DEFAULT 0,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;
```

---

# Logger

Simple log-to-DB solution for Fatfree Framework powered apps.

## Usage

```php
new \resist\H3\Logger(\Base $f3, \DB\SQL $db)
```

###### Create entry
 
```php
create(string $level, string $subject = '', string|array $message = '', string $table = 'log'): void
```

If `$level` not in `['info', 'warning', 'danger', 'success']`, *warning* used.

`uname` field is `$f3->uname` if exists - which is global variable by [Auth3](https://github.com/r3sist/Auth3).

Array `$message` converted to JSON.

###### Get F3 mapper object

```php
getMap(string $table = 'log'): Mapper
```

##### Erase all

```php
eraseLog(string $table = 'log'): void
```

## Scheme

Default table: `log`

```SQL
CREATE TABLE IF NOT EXISTS `log` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `llevel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'info',
  `lsubject` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `lbody` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lts` int(11) NOT NULL,
  `lip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`lid`),
  KEY `uname` (`uname`,`llevel`,`lsubject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;
```

---

# Developer notes

## Testing

https://tester.nette.org/en/guide 

Windows:  
`.\vendor\bin\tester tests`

### Code coverage generation setup

Windows:  
`.\vendor\bin\tester -c tests/php.ini --coverage coverage.html`

PCOV (*php_pcov.dll*) is required in PHP *ext* folder.  
Also *tests\php.ini* contains:

```ini
extension=php_pcov.dll
```

## License

GNU GPLv3
