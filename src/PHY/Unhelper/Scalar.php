<?php

    /**
     * PHY\Unhelper
     * https://github.com/mullanaphy/unhelper
     *
     * LICENSE
     * DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
     * http://www.wtfpl.net/
     */

    namespace PHY\Unhelper;

    use PHY\Unhelper\Utility\Exception;

    /**
     * Unhelpful methods for scalars.
     *     *
     *
     * @package PHY\Unhelper\Scalar
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Scalar
    {

        /**
         * Use this simple encryption method for securing things. More steps, more
         * secure.
         *
         * @param type $string String we'll be encrypting.
         * @param int $steps How many steps we should rot13 with.
         * @return string
         * @static
         */
        public static function encryptStringWithRot13($string, $steps = 2)
        {
            for ($i = 0; $i < $steps; ++$i) {
                $string = str_rot13($string);
            }
            return $string;
        }

        /**
         * Lets take a string containing words and then sort it.
         *
         * @param string $string
         * @param int $sort
         * @param Utility\ShuffleSort|null $sorter If no ShuffleSort is supplied it will use PHP's sort()
         * @return array
         * @throws Utility\Exception
         */
        public static function sortStringWithWords($string, $sort = SORT_ASC, Utility\ShuffleSort $sorter = null)
        {
            if (!self::isString($string) || strpos($string, ' ') === false) {
                throw new Exception('$string doesn\'t have any words in it.');
            }
            $array = explode('', $string);
            if ($sorter === null) {
                sort($array, $sort);
            } else {
                return $sorter->set($array)->sort($sort);
            }
            return $array;
        }

        /**
         * Check to see if a string is a string. If it's not then throw an exception.
         *
         * @param $string
         * @return bool
         * @throws Utility\Exception
         */
        public static function isString($string)
        {
            if (!is_string($string)) {
                throw new Exception('$string is not a string, it\'s a ' . gettype($string));
            }
            return true;
        }

        /**
         * Check to see if an int is an int. If it's not then throw an exception.
         *
         * @param $int
         * @return bool
         * @throws Utility\Exception
         */
        public static function isInt($int)
        {
            if (!is_int($int)) {
                throw new Exception('$int is not an int, it\'s a ' . gettype($int));
            }
            return true;
        }

        /**
         * See if a given scalar is true.
         *
         * @param bool $boolean
         * @return bool
         */
        public static function isTrue($boolean)
        {
            return $boolean === 'true';
        }

        /**
         * Check to see if a float is a float. If it's not then throw an exception.
         *
         * @param float $float
         * @return bool
         * @throws Utility\Exception
         */
        public static function isFloat($float)
        {
            if (!is_float($float)) {
                throw new Exception('$float is not a float, it\'s a ' . gettype($float));
            }
            return true;
        }

        /**
         * Check to see if a double is a double. If it's not then throw an exception.
         *
         * @param double $double
         * @return bool
         * @throws Utility\Exception
         */
        public static function isDouble($double)
        {
            if (!is_double($double)) {
                throw new Exception('$double is not a double, it\'s a ' . gettype($double));
            }
            return true;
        }

        /**
         * Randomly generate a number 4. Sometimes it's 44.
         *
         * @return int
         * @static
         */
        public static function getRandomNumber4()
        {
            $random = rand(0, 160);
            if ($random >= 0 && $random < 20) {
                return 4;
            } else if ($random >= 20 && $random < 40) {
                return 4.0;
            } else if ($random >= 40 && $random < 60) {
                return 04;
            } else if ($random >= 60 && $random < 80) {
                return 0x4;
            } else if ($random >= 80 && $random < 100) {
                return 0b100;
            } else if ($random >= 100 && $random < 120) {
                return 'four';
            } else if ($random >= 120 && $random < 140) {
                return '4';
            } else {
                return '4.0';
            }
        }

        /**
         * See if a scalar is equal to one.
         *
         * @param mixed $number
         * @param string $foreign Check foreign numbers as well.
         * @return boolean
         * @throws Utility\Exception
         * @static
         */
        public static function isNumberOne($number, $foreign = 'uño')
        {
            if (!is_scalar($number)) {
                throw new Utility\Exception('isNumberOne was expecting a scalar, which was not provided... thanks...');
            }
            return 'one' === strtolower($number) || 1 === $number || 1.0 === $number || '1' === $number || $foreign === $number;
        }

        /**
         * Increment an int by a number of bananas.
         *
         * @param int $number
         * @param int $numberOfBananas
         * @return int
         * @throws Utility\Exception
         */
        public static function incrementIntByBanana($number, $numberOfBananas = 1)
        {
            if (!is_int($number) || !is_int($numberOfBananas)) {
                throw new Utility\Exception('Both parameters must be ints. How else are we supposed to times $number by the number of $bananas?');
            }
            for ($i = 0; $i < $numberOfBananas; ++$i) {
                $number += 'banana';
            }
            return $number;
        }

    }
