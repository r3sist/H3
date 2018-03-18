# H3

**Simple helper methods for Fatfree Framework powered apps**

(c) 2018 ![bV](https://structure.hu/img/bV.png)  
https://resist.hu | https://structure.hu

codacy badge here

## Usage

`\H3::render($layout)` renders *layout* .html by F3 Template
 
`\H3::gen($length)` returns random generated key
 
`\H3::clean($string, $postProcess = 'strict')` returns *slug*, prostProcess: 'strict', 'light', 'dangerous', 'none'
 
`\H3::dump($var)` echos $var in <pre>

`\H3::shorten($string, $length)` returns shortened string 

`\H3::keyUp($array, $key)` move selected element up in array by key 

`\H3::keyDown($array, $key)` move selected element down in array by key 

## Installation

Via composer: `"resist/H3": "dev-master"`
