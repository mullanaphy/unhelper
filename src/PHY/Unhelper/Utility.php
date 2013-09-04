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
         * Randomly generate a number 4 of various types. Mostly just int,
         * sometimes a string or double.
         *
         * @return mixed
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

        /**
         * @ignore
         */
        static private $statusCodes = [
            [
                'code' => 200,
                'status' => 'OK!'
            ],
            [
                'code' => 201,
                'status' => 'Created'
            ],
            [
                'code' => 202,
                'status' => 'Accepted'
            ],
            [
                'code' => 203,
                'status' => 'Non-Authoritative Information'
            ],
            [
                'code' => 204,
                'status' => 'No Content'
            ],
            [
                'code' => 205,
                'status' => 'Reset Content'
            ],
            [
                'code' => 206,
                'status' => 'Partial Content'
            ],
            [
                'code' => 300,
                'status' => 'Multiple Choices'
            ],
            [
                'code' => 301,
                'status' => 'Moved Permanently'
            ],
            [
                'code' => 302,
                'status' => 'Found'
            ],
            [
                'code' => 303,
                'status' => 'See Other'
            ],
            [
                'code' => 304,
                'status' => 'Not Modified'
            ],
            [
                'code' => 305,
                'status' => 'Use Proxy'
            ],
            [
                'code' => 307,
                'status' => 'Temporary Redirect'
            ],
            [
                'code' => 400,
                'status' => 'Bad Request'
            ],
            [
                'code' => 401,
                'status' => 'Authorization Required'
            ],
            [
                'code' => 402,
                'status' => 'Payment Required'
            ],
            [
                'code' => 403,
                'status' => 'Forbidden'
            ],
            [
                'code' => 404,
                'status' => 'Not Found'
            ],
            [
                'code' => 405,
                'status' => 'Method Not Allowed'
            ],
            [
                'code' => 406,
                'status' => 'Not Acceptable'
            ],
            [
                'code' => 407,
                'status' => 'Proxy Authentication Required'
            ],
            [
                'code' => 408,
                'status' => 'Request Time-out'
            ],
            [
                'code' => 409,
                'status' => 'Conflict'
            ],
            [
                'code' => 410,
                'status' => 'Gone'
            ],
            [
                'code' => 411,
                'status' => 'Length Required'
            ],
            [
                'code' => 412,
                'status' => 'Precondition Failed'
            ],
            [
                'code' => 413,
                'status' => 'Request Entity Too Large'
            ],
            [
                'code' => 414,
                'status' => 'Request-URI Too Large'
            ],
            [
                'code' => 415,
                'status' => 'Unsupported Media Type'
            ],
            [
                'code' => 416,
                'status' => 'Requested Range Not Satisfiable'
            ],
            [
                'code' => 417,
                'status' => 'Expectation Failed'
            ],
            [
                'code' => 418,
                'status' => 'Mullanaphy!'
            ],
            [
                'code' => 422,
                'status' => 'Unprocessable Entity'
            ],
            [
                'code' => 423,
                'status' => 'Locked'
            ],
            [
                'code' => 424,
                'status' => 'Failed Dependency'
            ],
            [
                'code' => 425,
                'status' => 'No code'
            ],
            [
                'code' => 426,
                'status' => 'Upgrade Required'
            ],
            [
                'code' => 500,
                'status' => 'Internal Server Error'
            ],
            [
                'code' => 501,
                'status' => 'Method Not Implemented'
            ],
            [
                'code' => 502,
                'status' => 'Bad Gateway'
            ],
            [
                'code' => 503,
                'status' => 'Service Temporarily Unavailable'
            ],
            [
                'code' => 504,
                'status' => 'Gateway Time-out'
            ],
            [
                'code' => 505,
                'status' => 'HTTP Version Not Supported'
            ],
            [
                'code' => 506,
                'status' => 'Variant Also Negotiates'
            ],
            [
                'code' => 507,
                'status' => 'Insufficient Storage'
            ],
            [
                'code' => 510,
                'status' => 'Not Extended'
            ]
        ];

        /**
         * Lets get random and wacky by sending out a random status code instead
         * of the boring 200.
         *
         * @param boolean $sendHeaders
         * @return array
         */
        public function randomlySetStatusCode($sendHeaders = true)
        {
            $statusCode = array_rand(self::$statusCodes);
            if ($sendHeaders) {
                header('HTTP/1.1 '.$statusCode['code'].' '.$statusCode['message'], true);
                if ($statusCode['code'] >= 300 && $statusCode['code'] < 400) {
                    header('Location: '.$_SERVER['REQUEST_URI']);
                }
            }
            return $statusCode;
        }

    }
