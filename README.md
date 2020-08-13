# H3

Helper classes for [Fatfree Framework](https://fatfreeframework.com) powered apps.

https://github.com/r3sist/h3

resist 2020 | https://resist.hu | https://github.com/r3sist/h3

This repository is for personal use. 

## Installation

Via composer: `"resist/h3": "dev-master"`

## Run "tests"

https://tester.nette.org/en/guide 

Windows:  
`.\vendor\bin\tester tests`

## License

GNU GPLv3

---

# Atom

Simple atom feed parser.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Atom)**

---

# Cache

Simple key-value DB storage for Fatfree Framework powered apps.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Cache)**

Scheme of `cache` table:

```SQL
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

# Dirtydoc

Quick markdown documentation of class public methods.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Dirtydoc)**

Usage: see *[dd.php](https://github.com/r3sist/h3/blob/master/dd.php)* in this repository.

---

# H3

Static helpers for Fatfree Framework.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#H3)**

---

---

# Json

Json helpers.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Json)**

---

# Logger

Simple log-to-DB solution for Fatfree Framework powered apps.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Logger)**

Default `log` table scheme:

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

# Md

Markdown helpers.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Md)**

---

# Tester

DEPRECATED Fatfree Framework Test helper.

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Tester)**

---

# Validator

**[API Documentation](https://github.com/r3sist/h3/blob/master/API.md#Validator)**
