## Usage

> Public methods of *\H3*

### render()

> 

```php
public static function render(string $layout): void
```

| tag | code |
| --- | --- |
| param | ```php
string $layout
```
 |
---
### gen()

> 

```php
public static function gen(int $length): string
```

| tag | code |
| --- | --- |
| param | ```php
int $length
```
 || return | ```php
string
```
 |
---
### clean()

> 

```php
public static function clean($string, $pattern = '', $replacement = ''): string
```

| tag | code |
| --- | --- |
| param | ```php
$string
```
 || param | ```php
string $pattern
```
 || param | ```php
string $replacement
```
 || return | ```php
string
```
 |
---
### dump()

> 

```php
public static function dump($var)
```

| tag | code |
| --- | --- |
| param | ```php
$var
```
 |
---
### shorten()

> 

```php
public static function shorten(string $string, int $length): string
```

| tag | code |
| --- | --- |
| param | ```php
string $string
```
 || param | ```php
int $length
```
 || return | ```php
string
```
 |
---
### keyDown()

> 

```php
public static function keyDown($a, $x) {
```

| tag | code |
| --- | --- |
| param | ```php
$a
```
 || param | ```php
$x
```
 || return | ```php
array
```
 |
---
### keyUp()

> 

```php
public static function keyUp($a, $x) {
```

| tag | code |
| --- | --- |
| param | ```php
$a
```
 || param | ```php
$x
```
 || return | ```php
array
```
 |
---
### getJson()

> 

```php
public static function getJson(string $url): array
```

| tag | code |
| --- | --- |
| param | ```php
string $url
```
 || return | ```php
array
```
 || throws | ```php
Exception
```
 |
---
### n0()

> 

```php
public static function n0(float $number): int
```

| tag | code |
| --- | --- |
| param | ```php
float $number
```
 || return | ```php
int
```
 |
---
### n1()

> 

```php
public static function n1(float $number): float
```

| tag | code |
| --- | --- |
| param | ```php
float $number
```
 || return | ```php
float
```
 |
---
### n2()

> 

```php
public static function n2(float $number): float
```

| tag | code |
| --- | --- |
| param | ```php
float $number
```
 || return | ```php
float
```
 |
---
### n3()

> 

```php
public static function n3(float $number): float
```

| tag | code |
| --- | --- |
| param | ```php
float $number
```
 || return | ```php
float
```
 |
---
### n4()

> 

```php
public static function n4(float $number): float
```

| tag | code |
| --- | --- |
| param | ```php
float $number
```
 || return | ```php
float
```
 |
---
### makeMdStrict()

> 

```php
public static function makeMdStrict(string $string, string $allowedTags = 'i,em,b,strong,a,code'): string
```

| tag | code |
| --- | --- |
| param | ```php
string $string Input
```
 || param | ```php
string $allowedTags // Comma separated list of allowed tags
```
 || return | ```php
string // Cleaned and converted output string
```
 |
---
### makeMdLight()

> 

```php
public static function makeMdLight(string $string): string
```

| tag | code |
| --- | --- |
| param | ```php
string $string
```
 || return | ```php
string
```
 |
---
### makeMd()

> 

```php
public static function makeMd(string $string): string
```

| tag | code |
| --- | --- |
| param | ```php
string $string
```
 || return | ```php
string
```
 |
---
### test()

> Renders Fatfree Framework test object

```php
public static function test($testObject, string $title = ''): void
```

| tag | code |
| --- | --- |
| var | ```php
$testObject \Test
```
 || param | ```php
string $title // Title of test
```
 || return | ```php
void
```
 |
---
### testMissing()

> 

```php
public static function testMissing(string $text): void
```

| tag | code |
| --- | --- |
| param | ```php
string $text
```
 |
---
### documentClass()

> Generates markdown documentation of specific class based on dockblocks

```php
public static function documentClass($className, $title = 'Usage')
```

| tag | code |
| --- | --- |
| param | ```php
string $className // Generate documentation for
```
 || throws | ```php
ReflectionException
```
 |
---
