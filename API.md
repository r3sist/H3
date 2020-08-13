# Atom

**resist\H3\Atom** 

> H3/Atom - Simple atom feed parser  


## Public methods 

### __construct()

**__construct(** *Web* $web **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Web* | **$web** |  | Fatfree Framework: Web |
### getFeedAsArray()

> Returns feed as array  
Forked from Fatfree Framework's \Web\rss() method  


**getFeedAsArray(** `string`  $url **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
Auto generated public API documentation at 2020.08.13.



---

# Cache

**resist\H3\Cache** 

> H3/Cache - Simple key-value DB storage for Fatfree Framework powered apps  


## Public methods 

### __construct()

**__construct(** *DB\SQL* $db **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *DB\SQL* | **$db** |  | Fatfree Framework: DB\SQL |
### cache()

> Stores string data to given cache-name  


**cache(** `string`  $cacheName, `string`  $data **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
| `string`  | **$data** |  |  |
### getData()

> Returns data as string for given cache-name  


**getData(** `string`  $cacheName **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
### getModified()

> Returns last modified timestamp for given cache-name  


**getModified(** `string`  $cacheName **):** `int` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
Auto generated public API documentation at 2020.08.13.



---

# Dirtydoc

**resist\H3\Dirtydoc** 

> H3/Dirtydoc - Quick markdown documentation of class public methods  


## Public methods 

### __construct()

**__construct(** `string`  $classNameWithNamespace **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$classNameWithNamespace** |  |  |
### generateMarkdownFile()

**generateMarkdownFile(** `string`  $fileName **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$fileName** |  |  |
### getClassMatrix()

**getClassMatrix(**  **):** `array` 

### getClassName()

**getClassName(**  **):** `string` 

### getMarkdownDocumentation()

**getMarkdownDocumentation(**  **):** `string` 

### getMethodParameterMatrix()

**getMethodParameterMatrix(** `string`  $methodName **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$methodName** |  |  |
### getMethodParsedDocblock()

**getMethodParsedDocblock(** `string`  $methodName **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$methodName** |  |  |
### getMethodReturnType()

**getMethodReturnType(** `string`  $methodName **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$methodName** |  |  |
### getNamespace()

**getNamespace(**  **):** `string` 

### getPropertyType()

**getPropertyType(** `string`  $propertyName **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$propertyName** |  |  |
### getPublicMethodList()

**getPublicMethodList(**  **):** `array` 

### getPublicPropertyList()

**getPublicPropertyList(**  **):** `array` 

Auto generated public API documentation at 2020.08.13.



---

# H3

**\H3** 

> Static helpers for Fatfree Framework  


## Public methods 

### ::dump()

> Variable dumper with pre tags  


**dump(**  $var **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$var** |  |  |
### ::gen()

> Generates alpha-numeric random string  


**gen(** `int`  $length **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `int`  | **$length** |  | Length of string |
### ::getJson()

**DEPRECATED** Use Json class instead

**getJson(** `string`  $url **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
### ::keyDown()

**DEPRECATED** Probably dead code

**keyDown(** `array`  $array, `int`  $keyNumber **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `array`  | **$array** |  |  |
| `int`  | **$keyNumber** |  |  |
### ::keyUp()

**DEPRECATED** Probably dead code

**keyUp(** `array`  $array, `int`  $keyNumber **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `array`  | **$array** |  |  |
| `int`  | **$keyNumber** |  |  |
### ::makeMd()

**DEPRECATED** Use Md class instead

> Return converted, multi-line markdown without HTML cleaning  


**makeMd(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### ::makeMdLight()

**DEPRECATED** Use Md class instead

> Returns converted multi-line markdown; HTML in input is cleaned  


**makeMdLight(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  | Input |
Returns: `string`  Cleaned and converted output string

### ::makeMdStrict()

**DEPRECATED** Use Md class instead

> Returns converted one-line markdown; HTML in input is cleaned; output is filtered by allowed tags  


**makeMdStrict(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  | Input |
Returns: `string`  Cleaned and converted output string

### ::n0()

> Number formatter - 0 decimal  


**n0(** `float`  $number **):** `int` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n1()

> Number formatter - 1 decimal  


**n1(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n2()

> Number formatter - 2 decimals  


**n2(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n3()

> Number formatter - 3 decimals  


**n3(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::n4()

> Number formatter - 4 decimals  


**n4(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### ::render()

> Renders template file via Fatfree Framework: Template  


**render(** `string`  $template **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$template** |  | Template file name without '.html'. E.g.: 'layout' or 'subdir/layout' |
### ::shorten()

> Shortens string and extends with mark if original string is longer than given limit  


**shorten(** `string`  $string, `int`  $length, [`string`  $extend] **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
| `int`  | **$length** |  |  |
| `string`  | **$extend** | "&hellip;" |  |
### ::slug()

> Converts string to slug (url-safe string)  


**slug(**  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @float,string  | **$string** |  |  |
Auto generated public API documentation at 2020.08.13.



---

# Json

**resist\H3\Json** 

> Json helpers  


## Public methods 

### __construct()

**__construct(** *Web* $web, *Audit* $audit **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Web* | **$web** |  | Fatfree Framework: Web |
| *Audit* | **$audit** |  | Fatfree Framework: Audit |
### getJsonFromUrlAsArray()

> API helper  


**getJsonFromUrlAsArray(** `string`  $url **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
Returns: `array`  Empty if null returned from API request

Auto generated public API documentation at 2020.08.13.



---

# Logger

**resist\H3\Logger** 

> Simple log-to-DB solution for Fatfree Framework powered apps  


## Public methods 

### __construct()

**__construct(** *Base* $f3, *DB\SQL* $db **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Base* | **$f3** |  | Fatfree Framework: Base |
| *DB\SQL* | **$db** |  | Fatfree Framework: DB\SQL |
### create()

> Creates entry  


**create(** `string`  $level, [`string`  $subject], [ $message], [`string`  $table] **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$level** |  | Can be "info", "warning", "danger", "success" |
| `string`  | **$subject** | `empty string` |  |
| @string,array  | **$message** | `empty string` | Array message is stored in JSON format |
| `string`  | **$table** | "log" |  |
### eraseLog()

**eraseLog(** [`string`  $table], [`int`  $time] **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$table** | "log" |  |
| `int`  | **$time** | 0 | Timestamp log entries beiing deleted before |
### getMap()

> Returns Fatfree Framework mapper object  


**getMap(** [`string`  $table] **):** *DB\SQL\Mapper*

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$table** | "log" |  |
Auto generated public API documentation at 2020.08.13.



---

# Md

**resist\H3\Md** 

> Markdown helpers  


## Public methods 

### __construct()

**__construct(** *Base* $f3, *Markdown* $md **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Base* | **$f3** |  |  |
| *Markdown* | **$md** |  |  |
### makeMd()

**makeMd(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### makeOneLine()

**makeOneLine(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### makeWithoutHtml()

**makeWithoutHtml(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
Auto generated public API documentation at 2020.08.13.



---

# Tester

**resist\H3\Tester** extends **Test**

> Fatfree Framework Test helper  


## Public methods 

### __construct()

> Class constructor  


**__construct(** [ $level] **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @ | **$level** | 2 | int |
Returns:  

### expect()

> Evaluate condition and save test result  


**expect(**  $cond, [ $text] **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @ | **$cond** |  | bool |
| @ | **$text** | "" | string |
Returns:  object

### message()

> Append message to test results  


**message(**  $text **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @ | **$text** |  | string |
Returns:  

### missing()

**missing(** `string`  $text **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$text** |  |  |
### passed()

> Return FALSE if at least one test case fails  


**passed(**  **):** 

Returns:  

### results()

> Return test results  


**results(**  **):** 

Returns:  array

### show()

**show(**  **):** `void` 

Auto generated public API documentation at 2020.08.13.



---

# Validator

**resist\H3\Validator** 

> Simple true/false validator  


## Public methods 

### filterSlug()

> Returns slug  
Copyright Fatfree Framework: Web()  


**filterSlug(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### isAlphanumericList()

**isAlphanumericList(**  $value **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$value** |  | Can be empty string or contain: a-zA-Z0-9 space , ; . |
### isColor()

**isColor(**  $value **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$value** |  | Can be HTML named color or #hexa |
### isIMDbId()

**isIMDbId(** `string`  $id **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$id** |  |  |
### isJson()

**isJson(** `string`  $json **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$json** |  |  |
### isMath()

**isMath(**  $mathExpression **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$mathExpression** |  | Can be empty string or contain: a-zA-Z0-9 space asterisk .,;<>+()=%^-/ |
### isSlug()

**isSlug(** `string`  $slug **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$slug** |  |  |
### isUrl200()

**isUrl200(** `string`  $url **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
### isVariableName()

**isVariableName(** `string`  $string **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
Auto generated public API documentation at 2020.08.13.



---

