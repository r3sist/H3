# H3

https://github.com/r3sist/h3

This repository is for personal use only. 

[![Build Status](https://travis-ci.org/r3sist/h3.svg?branch=master)](https://travis-ci.org/r3sist/h3)

---

## Installation

Via composer: `"resist/h3": "dev-master"`

## Developer notes

### Testing

https://tester.nette.org/en/guide 

Windows:  
`.\vendor\bin\tester tests`

#### Code coverage generation setup

Windows:  
`.\vendor\bin\tester -c tests/php.ini --coverage coverage.html`

PCOV (*php_pcov.dll*) is required in PHP *ext* folder.  
Also *tests\php.ini* contains:

```ini
extension=php_pcov.dll
```

## License

GNU GPLv3