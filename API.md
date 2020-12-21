# Atom

***resist\H3\Atom*** 

H3/Atom - Simple atom feed parser  


## Public methods 

### __construct()

```php
public function __construct(Web $web)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Web* | **$web** |  | Fatfree Framework: Web |
### getFeedAsArray()

Returns feed as array  
Forked from Fatfree Framework's \Web\rss() method  


```php
public function getFeedAsArray(string $url): array
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |


---

# Cache

***resist\H3\Cache*** 

H3/Cache - Simple key-value DB storage for Fatfree Framework powered apps  


## Public methods 

### __construct()

```php
public function __construct(DB\SQL $db)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *DB\SQL* | **$db** |  | Fatfree Framework: DB\SQL |
### cache()

Stores string data to given cache-name  


```php
public function cache(string $cacheName, string $data): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
| `string`  | **$data** |  |  |
### getData()

Returns data as string for given cache-name  


```php
public function getData(string $cacheName): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
### getModified()

Returns last modified timestamp for given cache-name  


```php
public function getModified(string $cacheName): int
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |


---

# H3

***\H3*** 

Static helpers for Fatfree Framework  


## Public methods 

### ::dump()

Variable dumper with pre tags  


```php
public static function dump(@mixed  $var): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$var** |  |  |
### ::gen()

Generates alpha-numeric random string  


```php
public static function gen(int $length): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `int`  | **$length** |  | Length of string |
### ::getJson()

**DEPRECATED** Use Json class instead

```php
public static function getJson(string $url): array
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
### ::keyDown()

**DEPRECATED** Probably dead code

```php
public static function keyDown(array $array, int $keyNumber): array
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `array`  | **$array** |  |  |
| `int`  | **$keyNumber** |  |  |
### ::keyUp()

**DEPRECATED** Probably dead code

```php
public static function keyUp(array $array, int $keyNumber): array
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `array`  | **$array** |  |  |
| `int`  | **$keyNumber** |  |  |
### ::makeMd()

**DEPRECATED** Use Md class instead

Return converted, multi-line markdown without HTML cleaning  


```php
public static function makeMd(string $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### ::makeMdLight()

**DEPRECATED** Use Md class instead

Returns converted multi-line markdown; HTML in input is cleaned  


```php
public static function makeMdLight(string $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  | Input |
Returns: `string` Cleaned and converted output string

### ::makeMdStrict()

**DEPRECATED** Use Md class instead

Returns converted one-line markdown; HTML in input is cleaned; output is filtered by allowed tags  


```php
public static function makeMdStrict(string $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  | Input |
Returns: `string` Cleaned and converted output string

### ::n0()

Number formatter - 0 decimal  


```php
public static function n0(float $number): int
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n1()

Number formatter - 1 decimal  


```php
public static function n1(float $number): float
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n2()

Number formatter - 2 decimals  


```php
public static function n2(float $number): float
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n3()

Number formatter - 3 decimals  


```php
public static function n3(float $number): float
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n4()

Number formatter - 4 decimals  


```php
public static function n4(float $number): float
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::render()

Renders template file via Fatfree Framework: Template  


```php
public static function render(string $templateName): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$templateName** |  |  |
### ::shorten()

Shortens string and extends with mark if original string is longer than given limit  


```php
public static function shorten(string $string, int $length, string $extend = "&hellip;"): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
| `int`  | **$length** |  |  |
| `string`  | **$extend** | "&hellip;" |  |
### ::slug()

Converts string to slug (url-safe string)  


```php
public static function slug(@float|string  $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @float,string  | **$string** |  |  |


---

# Json

***resist\H3\Json*** 

Json helpers  


## Public methods 

### __construct()

```php
public function __construct(Web $web, Audit $audit)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Web* | **$web** |  | Fatfree Framework: Web |
| *Audit* | **$audit** |  | Fatfree Framework: Audit |
### getJsonFromUrlAsArray()

API helper  


```php
public function getJsonFromUrlAsArray(string $url): array
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
Returns: `array` Empty if null returned from API request



---

# Logger

***resist\H3\Logger*** 

Simple log-to-DB solution for Fatfree Framework powered apps  


## Public methods 

### __construct()

```php
public function __construct(Base $f3, DB\SQL $db)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Base* | **$f3** |  | Fatfree Framework: Base |
| *DB\SQL* | **$db** |  | Fatfree Framework: DB\SQL |
### create()

Creates entry  


```php
public function create(string $level, string $subject = `empty string`, @string|array  $message = `empty string`, string $table = "log"): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$level** |  | Can be "info", "warning", "danger", "success" |
| `string`  | **$subject** | `empty string` |  |
| @string,array  | **$message** | `empty string` | Array message is stored in JSON format |
| `string`  | **$table** | "log" |  |
### eraseLog()

```php
public function eraseLog(string $table = "log", int $time): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$table** | "log" |  |
| `int`  | **$time** | 0 | Timestamp log entries beiing deleted before |
### getMap()

Returns Fatfree Framework mapper object  


```php
public function getMap(string $table = "log"): DB\SQL\Mapper
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$table** | "log" |  |


---

# Md

***resist\H3\Md*** 

Markdown helpers  


## Public methods 

### __construct()

```php
public function __construct(Base $f3, Markdown $md)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Base* | **$f3** |  |  |
| *Markdown* | **$md** |  |  |
### makeMd()

```php
public function makeMd(string $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### makeOneLine()

```php
public function makeOneLine(string $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### makeWithoutHtml()

```php
public function makeWithoutHtml(string $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |


---

# Tester

***resist\H3\Tester*** extends ***Test***

Fatfree Framework Test helper  


## Public methods 

### missing()

```php
public function missing(string $text): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$text** |  |  |
### show()

```php
public function show(): void
```

### Parent class *(Test)* public methods

+ __construct()
+ expect()
+ message()
+ passed()
+ results()


---

# Validator

***resist\H3\Validator*** 

Simple true/false validator  


## Public methods 

### filterSlug()

Returns slug  
Copyright Fatfree Framework: Web()  


```php
public function filterSlug(string $string): string
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### isAlphanumericList()

```php
public function isAlphanumericList(@mixed  $value): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$value** |  | Can be empty string or contain: a-zA-Z0-9 space , ; . |
### isColor()

```php
public function isColor(@mixed  $value): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$value** |  | Can be HTML named color or #hexa |
### isIMDbId()

```php
public function isIMDbId(string $id): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$id** |  |  |
### isJson()

```php
public function isJson(string $json): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$json** |  |  |
### isMath()

```php
public function isMath(@mixed  $mathExpression): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$mathExpression** |  | Can be empty string or contain: a-zA-Z0-9 space asterisk .,;<>+()=%^-/ |
### isSlug()

```php
public function isSlug(string $slug): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$slug** |  |  |
### isUrl200()

```php
public function isUrl200(string $url): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
### isVariableName()

```php
public function isVariableName(string $string): bool
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |


---

