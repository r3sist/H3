# H3

**Simple helper methods for Fatfree Framework powered apps**  

https://github.com/r3sist/h3

It's not recommended to use in production, this repository is for personal use only. 

[![Build Status](https://travis-ci.org/r3sist/h3.svg?branch=master)](https://travis-ci.org/r3sist/h3)

---

## Installation

Via composer: `"resist/H3": "dev-master"`

## License

GNU GPLv3

## Developer notes

### Code coverage generation setup
Run:  
`.\vendor\bin\tester -c tests/php.ini --coverage coverage.html`

PCOV (*php_pcov.dll*) is required in PHP *ext* folder.  
Also *tests\php.ini* contains:

```ini
extension=php_pcov.dll
```