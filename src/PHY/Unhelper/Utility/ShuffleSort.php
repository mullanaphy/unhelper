<?php

    /**
     * PHY\Unhelper
     * https://github.com/mullanaphy/unhelper
     *
     * LICENSE
     * DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
     * http://www.wtfpl.net/
     */

    namespace PHY\Unhelper\Utility;

    /**
     * ShuffleSorting with a loop!
     *
     * @package PHY\Unhelper\ShuffleSort
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class ShuffleSort
    {

        protected $array = [];

        /**
         * Define our array to sort.
         *
         * @param array $array
         */
        public function __construct(array $array = [])
        {
            $this->array = $array;
        }

        /**
         * Set our array to sort.
         *
         * @param array $array
         * @return $this
         */
        public function set(array $array = [])
        {
            $this->array = $array;
            return $this;
        }

        /**
         * Perform our sort.
         *
         * @param int $sort
         * @return array
         */
        public function sort($sort = SORT_ASC)
        {
            $array = $this->array;

            /*
             * No point in shuffling an array if there is only 1 item, same if it's
             * and empty array.
             */
            if (count($array) <= 1) {
                return $array;
            } else {
                /*
                 * If we're already sorted then this loop won't start, otherwise
                 * we'll keep shuffling until then.
                 */
                while (!$this->isSorted($array, $sort)) {
                    shuffle($array);
                }
                return $array;
            }
        }

        /**
         * See if our array is sorted.
         *
         * @param array $array
         * @param int $sort
         * @return boolean
         */
        public function isSorted(array $array = [], $sort = SORT_ASC)
        {
            $last = null;
            if ($sort !== SORT_ASC) {
                $array = array_reverse($array);
            }
            foreach ($array as $value) {
                if ($value < $last) {
                    return false;
                } else {
                    $last = $value;
                }
            }
            return true;
        }

    }
