##Usage

> Public methods of *\H3*

### render()

> 

```php
public static function render(string $layout): void
```

+ **param**: `string $layout`

### gen()

> 

```php
public static function gen(int $length): string
```

+ **param**: `int $length`
+ **return**: `string`

### clean()

> 

```php
public static function clean($string, $pattern = '', $replacement = ''): string
```

+ **param**: `$string ****`
+ **param**: `string **$pattern**`
+ **param**: `string **$replacement**`
+ **return**: `string`

### dump()

> 

```php
public static function dump($var)
```

+ **param**: `$var`

### shorten()

> 

```php
public static function shorten(string $string, int $length): string
```

+ **param**: `string **$string**`
+ **param**: `int **$length**`
+ **return**: `string`

### keyDown()

> 

```php
public static function keyDown($a, $x) {
```

+ **param**: `$a ****`
+ **param**: `$x ****`
+ **return**: `array`

### keyUp()

> 

```php
public static function keyUp($a, $x) {
```

+ **param**: `$a ****`
+ **param**: `$x ****`
+ **return**: `array`

### getJson()

> 

```php
public static function getJson(string $url): array
```

+ **param**: `string $url`
+ **return**: `array`
+ **throws**: `Exception`

### n0()

> 

```php
public static function n0(float $number): int
```

+ **param**: `float $number`
+ **return**: `int`

### n1()

> 

```php
public static function n1(float $number): float
```

+ **param**: `float $number`
+ **return**: `float`

### n2()

> 

```php
public static function n2(float $number): float
```

+ **param**: `float $number`
+ **return**: `float`

### n3()

> 

```php
public static function n3(float $number): float
```

+ **param**: `float $number`
+ **return**: `float`

### n4()

> 

```php
public static function n4(float $number): float
```

+ **param**: `float $number`
+ **return**: `float`

### makeMdStrict()

> 

```php
public static function makeMdStrict(string $string, string $allowedTags = 'i,em,b,strong,a,code'): string
```

+ **param**: `string **$string**`
+ **param**: `string **$allowedTags**`
+ **return**: `string Cleaned and converted output string`

### makeMdLight()

> 

```php
public static function makeMdLight(string $string): string
```

+ **param**: `string $string`
+ **return**: `string`

### makeMd()

> 

```php
public static function makeMd(string $string): string
```

+ **param**: `string $string`
+ **return**: `string`

### test()

> Renders Fatfree Framework test object

```php
public static function test($testObject, string $title = ''): void
```

+ **var**: `$testObject \Test`
+ **param**: `string $title Title of test`
+ **return**: `void`

### testMissing()

> 

```php
public static function testMissing(string $text): void
```

+ **param**: `string $text`

### documentClass()

> Generates markdown documentation of specific class based on dockblocks

```php
public static function documentClass($className, $title = 'Usage')
```

+ **param**: `string $className Generate documentation for`
+ **throws**: `ReflectionException`

