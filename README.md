# RandomString
A Random String generator based on character classes, with the possibility of excluding specific characters.

## END OF LIFE
As of PHP7 there are far better (and native!) ways of generating random data. Please check http://php.net/manual/en/ref.csprng.php

This repo will remain as example material.

## Usage

```php
<?php
use RandomString\RandomString;

// Generates a 12 character string with lowercase letters and symbols, excluding the backslash and pipe chracters.
$str = new RandomString(12, array('lowerCase', 'symbols'), array('\\', '|'));
echo $str->result;
```
