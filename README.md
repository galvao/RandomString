# RandomString
A Random String generator based on character classes, with the possibility of excluding specific characters.

## Usage

```php
<?php
use RandomString\RandomString;

// Generates a 12 character string with lowercase letters and symbols, excluding the backslash and pipe chracters.
$str = new RandomString(12, array('lowerCase', 'symbols'), array('\\', '|'));
echo $str->result;
```
