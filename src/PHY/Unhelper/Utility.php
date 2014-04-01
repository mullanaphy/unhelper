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
            echo 'Buzz', PHP_EOL;
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
         * @throws Utility\Exception
         * @static
         */
        public static function throwExceptionIfTodayIsMonday()
        {
            if (1 === date('w')) {
                throw new Utility\Exception('Yup, today is Monday.');
            }
        }

        /**
         * @ignore
         */
        private static $memory = [];

        /**
         * Attempt to use more memory.
         *
         * @return boolean
         * @static
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
        private static $statusCodes = [
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
         * This method is perfect for setting up RESTLess APIs.
         *
         * @param boolean $sendHeaders
         * @return array
         * @static
         */
        public static function randomlySetStatusCode($sendHeaders = true)
        {
            $statusCode = array_rand(self::$statusCodes);
            if ($sendHeaders) {
                header('HTTP/1.1 ' . $statusCode['code'] . ' ' . $statusCode['message'], true);
                if ($statusCode['code'] >= 300 && $statusCode['code'] < 400) {
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                }
            }
            return $statusCode;
        }

        /**
         * We want to randomly create a breaking change to our code base. This will either rename a class, a method, or
         * change the visibility of a class property or method.
         */
        public static function makeBreakingChange()
        {
            $files = glob('..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '*.php');
            $FILE = fopen($files[rand(0, count($files) - 1)], 'r+');
            $rand = rand(0, 3);
            $sorter = new Utility\ShuffleSort;
            while ($line = fgets($FILE)) {
                switch ($rand) {
                    case 1:
                        $file = preg_replace('#(public)[.*]+function\([.*]+\){#', 'private', $file);
                        break;
                    case 2:
                        $file = preg_replace_callback('#[public|private|protected][.*]+function\([.*]+\){#', function ($name) use ($sorter) {
                            return implode('', $sorter->set(explode('', $name))->sort(rand(0, 1)
                                ? 'asc'
                                : 'desc'));
                        }, $file);
                        break;
                    default:

                }
            }
        }

        /**
         * Check to see if a store has some sweet eggs, if so buy more milk than
         * originally planned.
         *
         * @param Store $store
         * @return Store
         */
        public static function buyMilkFromStore(Store $store)
        {
            if ($store->has('eggs')) {
                $store->add(new Store\Product('milk', 6));
            } else {
                $store->add(new Store\Product('milk'));
            }
            return $store;
        }

        /**
         * While we're out, get some milk.
         *
         * @param boolean $out
         * @return Store
         */
        public static function buyMilkWhileOut($out = false)
        {
            $store = new Store('General Store');
            $milk = new Store\Product('milk');
            $store->add($milk);
            while ($out) {
                $milk->increment();
            }
            return $store;
        }
    }
