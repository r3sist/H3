# H3

**Simple helper methods for Fatfree Framework powered apps**  
https://github.com/r3sist/h3

(c) 2018 ![bV](https://structure.hu/img/bV.png)  
https://resist.hu

## Installation

Via composer: `"resist/H3": "dev-master"`

## Usage

Public methods of ***H3***

> Class H3


### render()

> 

```php
public static function render(string $layout): void
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `string` **$layout** |  |

### gen()

> 

```php
public static function gen(int $length): string
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `int` **$length** |  |
| *return* | string |  |

### clean()

> 

```php
public static function clean($string, $pattern = '', $replacement = ''): string
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | **$string** |  |
| *param* | `string` **$pattern** |  |
| *param* | `string` **$replacement** |  |
| *return* | string |  |

### dump()

> 

```php
public static function dump($var)
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | **$var** |  |

### shorten()

> 

```php
public static function shorten(string $string, int $length): string
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `string` **$string** |  |
| *param* | `int` **$length** |  |
| *return* | string |  |

### keyDown()

> 

```php
public static function keyDown($a, $x) {
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | **$a** |  |
| *param* | **$x** |  |
| *return* | array |  |

### keyUp()

> 

```php
public static function keyUp($a, $x) {
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | **$a** |  |
| *param* | **$x** |  |
| *return* | array |  |

### getJson()

> 

```php
public static function getJson(string $url): array
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `string` **$url** |  |
| *return* | array |  |
| *throws* | Exception |  |

### n0()

> 

```php
public static function n0(float $number): int
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `float` **$number** |  |
| *return* | int |  |

### n1()

> 

```php
public static function n1(float $number): float
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `float` **$number** |  |
| *return* | float |  |

### n2()

> 

```php
public static function n2(float $number): float
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `float` **$number** |  |
| *return* | float |  |

### n3()

> 

```php
public static function n3(float $number): float
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `float` **$number** |  |
| *return* | float |  |

### n4()

> 

```php
public static function n4(float $number): float
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `float` **$number** |  |
| *return* | float |  |

### makeMdStrict()

> 

```php
public static function makeMdStrict(string $string, string $allowedTags = 'i,em,b,strong,a,code'): string
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `string` **$string** |  Input |
| *param* | `string` **$allowedTags** |  // Comma separated list of allowed tags |
| *return* | `string` // Cleaned and converted output string |  |

### makeMdLight()

> 

```php
public static function makeMdLight(string $string): string
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `string` **$string** |  |
| *return* | string |  |

### makeMd()

> 

```php
public static function makeMd(string $string): string
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `string` **$string** |  |
| *return* | string |  |

### test()

> Renders Fatfree Framework test object


```php
public static function test($testObject, string $title = ''): void
```

| tag | value | comment |
| :---: | :---: | ---: |
| *var* | **$testObject** |  \Test |
| *param* | `string` **$title** |  // Title of test |
| *return* | void |  |

### testMissing()

> 

```php
public static function testMissing(string $text): void
```

| tag | value | comment |
| :---: | :---: | ---: |
| *param* | `string` **$text** |  |

