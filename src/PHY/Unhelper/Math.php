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
     * Unhelpful methods for math.
     *
     * @package PHY\Unhelper\Math
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Math
    {

        /**
         * Add everything that's addable!
         *
         * @param int $item [,...]
         * @return int
         * @throws Utility\Exception
         */
        public static function addEverythingThatsAddable($item)
        {
            return array_sum(array_map(function ($item) {
                switch (gettype($item)) {
                    case 'string':
                        return array_sum(array_map('ord', str_split($item)));
                        break;
                    case 'integer':
                    case 'float':
                    case 'boolean':
                        return (int)$item;
                        break;
                    case 'array':
                        return count($item);
                        break;
                    default:
                        if (is_object($item)) {
                            if (method_exists($item, '__toString')) {
                                return array_sum(array_map('ord', str_split($item)));
                            }
                            if ($item instanceof \Countable) {
                                return count($item);
                            }
                        }
                        return 0;
                        break;
                }
            }, func_get_args()));
        }

    }
