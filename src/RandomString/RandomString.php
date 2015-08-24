<?php
namespace RandomString;

/**
 * Generates a random string composed of numbers and/or (uppercase and/or lowercase)
 * letters and/or symbols based on ASCII codes.
 *
 * @link https://github.com/galvao/RandomString
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 * @todo See the possibility of improving the exclusion of rejected characters
 */

class RandomString
{
    protected $characters;
    protected $length;
    public $result;

    /**
     * Single method, constructor.
     *
     * @param int $length Desired string's length
     * @param array $allowed Character "classes" to be allowed on the generated string
     * @param array $rejected Characters to be rejected on generated string
     * @throws \Exception If $allowed - $rejected produces a 0 length array
     */

    public function __construct(
        $length,
        array $allowed  = array('upperCase', 'lowerCase', 'numbers', 'symbols'),
        array $rejected = array()
    ) {
        $n = 0;

        $this->length = (int)$length;
        $this->characters = array();
        $this->result = '';

        $upperCase = range(65, 90); // A-Z
        $lowerCase = range(97, 122); // a-z
        $numbers   = range(48, 57); // 0-9
        $symbols   = array_merge(range(32, 47), range(58, 64), range(91, 96), range(123, 126));

        foreach ($allowed as $class) {
            $this->characters = array_merge($this->characters, $$class);
        }

        if ($rejected) {
            foreach ($rejected as &$r) {
                $r = ord($r);
            }

            $characterCount = count($this->characters);
            $rejectedCount  = count($rejected);

            if (count($this->characters) > count($rejected)) {
                $this->characters = array_diff($this->characters, $rejected);
            } elseif ($rejectedCount > $characterCount) {
                $this->characters = array_diff($rejected, $this->characters);
            } else {
                throw new \Exception('No characters left to use.');
            }
        }

        $characterCount = count($this->characters);

        while ($n < $this->length) {
            shuffle($this->characters);
            $rand = mt_rand(0, ($characterCount - 1));

            if ($rejected and in_array(chr($this->characters[$rand]), $rejected)) {
                continue;
            }

            $this->result .= chr($this->characters[$rand]);
            $n++;
        }
    }
}
