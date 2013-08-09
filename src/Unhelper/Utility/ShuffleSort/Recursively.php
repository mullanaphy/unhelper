<?php

    /**
     * PHY\Unhelper
     * https://github.com/mullanaphy/unhelper
     *
     * LICENSE
     * DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
     * http://www.wtfpl.net/
     */

    namespace PHY\Unhelper\Utility\ShuffleSort;

    use \PHY\Unhelper\Utility\ShuffleSort;

    /**
     * ShuffleSort it recursively.
     *
     * @package PHY\Unhelper\ShuffleSort\Recursively
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Recursively extends ShuffleSort
    {

        /**
         * Perform our sort.
         *
         * @return array
         */
        public function sort()
        {
            return $this->recursive($this->array);
        }

        /**
         * Recursively sort our array.
         * 
         * @param array $array
         * @return array
         * @ignore
         */
        private function recursive(array $array = [])
        {
            /*
             * In case we want to change the name of this function later.
             */
            $method = __FUNCTION__;

            /*
             * No point in shuffling an array if there is only 1 item, same if it's
             * and empty array.
             */
            if (count($array) <= 1) {
                return $array;
            } else if ($this->isSorted($array)) {
                /*
                 * Let's not waste our time sorting an array that's already sorted.
                 */
                return $array;
            } else {
                /*
                 * Let's shuffle the array.
                 */
                shuffle($array);

                /*
                 * See if we're sorted, if so, return our array otherwise let's
                 * reshuffle.
                 */
                if ($this->isSorted($array)) {
                    return $array;
                } else {
                    return $method($array);
                }
            }
        }

    }
