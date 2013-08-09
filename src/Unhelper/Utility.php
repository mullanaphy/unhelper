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

    /**
     * Utility class with many very unhelpful functions. Super duper fast fizz
     * buzz though!
     *
     * @package PHY\Unhelper\Utility
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Utility
    {

        /**
         * Dies if today is Friday, after 5:00pm local time. It's because it's time
         * to go home sucka!
         *
         * @static
         */
        public static function dieIfTodayIsFridayAfter5PM()
        {
            if (date('w') === 5 && date('H') > 17) {
                die('Time to go.');
            }
        }

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
         * Have an interview and they ask you to write a FizzBuzz solution in
         * PHP? Well look no further as this blazing fast rendition takes care
         * of it. Simply install Unhelper via composer and then run this simple
         * command:
         *
         * <code>
         * <?php
         *     \PHY\Unhelper\Utility::fizzBuzz();
         * </code>
         *
         * @static
         */
        public static function fizzBuzz()
        {
            for ($i = 1; $i < 100; ++$i) {
                switch ($i) {
                    case 3:
                    case 6:
                    case 9:
                    case 12:
                    case 18:
                    case 21:
                    case 24:
                    case 27:
                    case 33:
                    case 36:
                    case 39:
                    case 42:
                    case 48:
                    case 51:
                    case 54:
                    case 57:
                    case 63:
                    case 66:
                    case 69:
                    case 72:
                    case 78:
                    case 81:
                    case 84:
                    case 87:
                    case 90:
                    case 93:
                    case 96:
                    case 99:
                        echo 'Fizz';
                        break;
                    case 5:
                    case 10:
                    case 20:
                    case 25:
                    case 35:
                    case 40:
                    case 50:
                    case 55:
                    case 65:
                    case 70:
                    case 80:
                    case 85:
                    case 95:
                        echo 'Buzz';
                        break;
                    case 15:
                    case 30:
                    case 45:
                    case 60:
                    case 75:
                    case 90:
                        echo 'FizzBuzz';
                        break;
                    default:
                        echo $i;
                }
                echo PHP_EOL;
            }
        }

        /**
         * Randomly generate a number 4. Sometimes it's 44.
         *
         * @return int
         * @static
         */
        public static function getRandomNumber4()
        {
            if (rand(0, 100) < 95) {
                return 4;
            } else {
                return 44;
            }
        }

        /**
         * See if a scalar is equal to one.
         *
         * @param scalar $number
         * @return boolean
         * @throws \PHY\Unhelper\Utility\Exception
         * @static
         */
        public static function isNumberOne($number)
        {
            if (!is_scalar($number)) {
                throw new \PHY\Unhelper\Utility\Exception('isNumberOne was expecting a scalar, which was not provided... thanks...');
            }
            return 'one' === strtolower($number) || 1 === $number || 1.0 === $number;
        }

        /**
         * Kill a page by hitting nested recursive. More fan than exit.
         *
         * @static
         */
        public static function recursivelyDie()
        {
            self::recursivelyDie();
        }

        /**
         * Throws an exception if today is Monday.
         * "Sounds like someone has the case of the Mondays"
         *
         * @throws \PHY\Unhelper\Utility\Exception
         * @static
         */
        public static function throwExceptionIfTodayIsMonday()
        {
            if (1 === date('w')) {
                throw new \PHY\Unhelper\Utility\Exception('Yup, today is Monday.');
            }
        }

        /**
         * @ignore
         */
        static private $memory = [];

        /**
         * Attempt to use more memory.
         *
         * @return boolean
         */
        public static function useMoreMemory()
        {
            $start = memory_get_usage(true);
            self::$memory[] = $start;
            return memory_get_usage(true) > $start;
        }

    }

