# Atom



Auto generated public API documentation of class ***resist\H3\Atom*** at 2020.08.12.

## Public methods 

### __construct()

**__construct(** *Web* $web **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Web* | **$web** |  |  |
### getFeedAsArray()

**getFeedAsArray(** `string`  $url **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |


---

# Cache



Auto generated public API documentation of class ***resist\H3\Cache*** at 2020.08.12.

## Public properties 

| Type | Property name |
| --- | --- |
| *DB\SQL\Mapper* | **$map** |
## Public methods 

### __construct()

**__construct(** *DB\SQL* $db **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *DB\SQL* | **$db** |  |  |
### cache()

**cache(** `string`  $cacheName, `string`  $data **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
| `string`  | **$data** |  |  |
### getData()

**getData(** `string`  $cacheName **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
### getModified()

**getModified(** `string`  $cacheName **):** `int` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$cacheName** |  |  |
### instance()

> Return class instance  


**instance(**  **):** 

Returns:  



---

# Dirtydoc



Auto generated public API documentation of class ***resist\H3\Dirtydoc*** at 2020.08.12.

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



---

# H3



Auto generated public API documentation of class ***\H3*** at 2020.08.12.

## Public methods 

### dump()

**dump(**  $var **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @mixed  | **$var** |  |  |
### gen()

**gen(** `int`  $length **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `int`  | **$length** |  |  |
### getJson()

**DEPRECATED** Use Json class instead

**getJson(** `string`  $url **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |
### keyDown()

**DEPRECATED** Probably dead code

**keyDown(** `array`  $array,  $keyNumber **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `array`  | **$array** |  |  |
|  | **$keyNumber** |  |  |
### keyUp()

**DEPRECATED** Probably dead code

**keyUp(** `array`  $array,  $keyNumber **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `array`  | **$array** |  |  |
|  | **$keyNumber** |  |  |
### makeMd()

**DEPRECATED** Use Md class instead

**makeMd(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
Returns: `string`  

### makeMdLight()

**DEPRECATED** Use Md class instead

> Returns converted md; HTML in input is cleaned  


**makeMdLight(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
Returns: `string`  

### makeMdStrict()

**DEPRECATED** Use Md class instead

> Returns converted md; HTML in input is cleaned; output is filtered by allowed tags  


**makeMdStrict(** `string`  $string, [`string`  $allowedTags] **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  | Input |
| `string`  | **$allowedTags** | `empty string` | // Comma separated list of allowed tags |
Returns: `string`  // Cleaned and converted output string

### n0()

**n0(** `float`  $number **):** `int` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### n1()

**n1(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### n2()

**n2(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### n3()

**n3(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### n4()

**n4(** `float`  $number **):** `float` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `float`  | **$number** |  |  |
### render()

**render(** `string`  $template **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$template** |  |  |
### shorten()

**shorten(** `string`  $string, `int`  $length, [`string`  $extend] **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
| `int`  | **$length** |  |  |
| `string`  | **$extend** | "&hellip;" |  |
### slug()

**slug(**  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| @int,float,string  | **$string** |  |  |


---

# Json



Auto generated public API documentation of class ***resist\H3\Json*** at 2020.08.12.

## Public methods 

### __construct()

**__construct(** *Web* $web, *Audit* $audit **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Web* | **$web** |  |  |
| *Audit* | **$audit** |  |  |
### getJsonFromUrlAsArray()

**getJsonFromUrlAsArray(** `string`  $url **):** `array` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$url** |  |  |


---

# Logger

> Class Logger  


Auto generated public API documentation of class ***resist\H3\Logger*** at 2020.08.12.

## Public methods 

### __construct()

**__construct(** *Base* $f3, *DB\SQL* $db **):** 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Base* | **$f3** |  |  |
| *DB\SQL* | **$db** |  |  |
### create()

**create(** `string`  $level, [`string`  $subject], [ $message], [`string`  $table] **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$level** |  |  |
| `string`  | **$subject** | `empty string` |  |
| @string,array  | **$message** | `empty string` |  |
| `string`  | **$table** | "log" |  |
### eraseLog()

**eraseLog(** [`string`  $table], [`int`  $time] **):** `void` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$table** | "log" |  |
| `int`  | **$time** | 0 |  |
### getMap()

**getMap(** [`string`  $table] **):** *DB\SQL\Mapper*

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$table** | "log" |  |


---

# Md



Auto generated public API documentation of class ***resist\H3\Md*** at 2020.08.12.

## Public properties 

| Type | Property name |
| --- | --- |
| *Base* | **$f3** |
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


---

# Tester



Auto generated public API documentation of class ***resist\H3\Tester*** at 2020.08.12.

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

**show(**  **):** 



---

# Validator



Auto generated public API documentation of class ***resist\H3\Validator*** at 2020.08.12.

## Public methods 

### filterSlug()

> Copyright Fatfree Framework: Web()  


**filterSlug(** `string`  $string **):** `string` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$string** |  |  |
### isAlphanumericList()

> May be empty string or contain: a-zA-Z0-9 space , ; .  


**isAlphanumericList(**  $value **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$value** |  |  |
### isColor()

**isColor(**  $value **):** `bool` 

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$value** |  |  |
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
|  | **$mathExpression** |  |  |
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


---

