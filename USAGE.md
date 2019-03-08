## Usage

> Public methods of *\H3*

### render()

> 

```php
<?php
public static function render(string $layout): void
```

**param**:  
```php
string $layout
```

---
### gen()

> 

```php
<?php
public static function gen(int $length): string
```

**param**:  
```php
int $length
```
**return**:  
```php
string
```

---
### clean()

> 

```php
<?php
public static function clean($string, $pattern = '', $replacement = ''): string
```

**param**:  
```php
$string
```
**param**:  
```php
string $pattern
```
**param**:  
```php
string $replacement
```
**return**:  
```php
string
```

---
### dump()

> 

```php
<?php
public static function dump($var)
```

**param**:  
```php
$var
```

---
### shorten()

> 

```php
<?php
public static function shorten(string $string, int $length): string
```

**param**:  
```php
string $string
```
**param**:  
```php
int $length
```
**return**:  
```php
string
```

---
### keyDown()

> 

```php
<?php
public static function keyDown($a, $x) {
```

**param**:  
```php
$a
```
**param**:  
```php
$x
```
**return**:  
```php
array
```

---
### keyUp()

> 

```php
<?php
public static function keyUp($a, $x) {
```

**param**:  
```php
$a
```
**param**:  
```php
$x
```
**return**:  
```php
array
```

---
### getJson()

> 

```php
<?php
public static function getJson(string $url): array
```

**param**:  
```php
string $url
```
**return**:  
```php
array
```
**throws**:  
```php
Exception
```

---
### n0()

> 

```php
<?php
public static function n0(float $number): int
```

**param**:  
```php
float $number
```
**return**:  
```php
int
```

---
### n1()

> 

```php
<?php
public static function n1(float $number): float
```

**param**:  
```php
float $number
```
**return**:  
```php
float
```

---
### n2()

> 

```php
<?php
public static function n2(float $number): float
```

**param**:  
```php
float $number
```
**return**:  
```php
float
```

---
### n3()

> 

```php
<?php
public static function n3(float $number): float
```

**param**:  
```php
float $number
```
**return**:  
```php
float
```

---
### n4()

> 

```php
<?php
public static function n4(float $number): float
```

**param**:  
```php
float $number
```
**return**:  
```php
float
```

---
### makeMdStrict()

> 

```php
<?php
public static function makeMdStrict(string $string, string $allowedTags = 'i,em,b,strong,a,code'): string
```

**param**:  
```php
string $string Input
```
**param**:  
```php
string $allowedTags // Comma separated list of allowed tags
```
**return**:  
```php
string // Cleaned and converted output string
```

---
### makeMdLight()

> 

```php
<?php
public static function makeMdLight(string $string): string
```

**param**:  
```php
string $string
```
**return**:  
```php
string
```

---
### makeMd()

> 

```php
<?php
public static function makeMd(string $string): string
```

**param**:  
```php
string $string
```
**return**:  
```php
string
```

---
### test()

> Renders Fatfree Framework test object

```php
<?php
public static function test($testObject, string $title = ''): void
```

**var**:  
```php
$testObject \Test
```
**param**:  
```php
string $title // Title of test
```
**return**:  
```php
void
```

---
### testMissing()

> 

```php
<?php
public static function testMissing(string $text): void
```

**param**:  
```php
string $text
```

---
### documentClass()

> Generates markdown documentation of specific class based on dockblocks

```php
<?php
public static function documentClass($className, $title = 'Usage')
```

**param**:  
```php
string $className // Generate documentation for
```
**throws**:  
```php
ReflectionException
```

---
