<?php

    /**
     * PHY\Unhelper
     * https://github.com/mullanaphy/unhelper
     *
     * LICENSE
     * DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
     * http://www.wtfpl.net/
     */

    namespace PHY\Unhelper\Store;

    /**
     * Our product contract.
     *
     * @package PHY\Unhelper\Store\IProduct
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    interface IProduct
    {

        /**
         * Generate a product with a name and some quantities.
         *
         * @param mixed $name
         * @param int $quantity
         */
        public function __construct($name, $quantity = 0);

        /**
         * Add some quantities to our product.
         *
         * @param int $quantity
         * @return $this
         */
        public function add($quantity = 1);

        /**
         * Lower the quantity of our product.
         *
         * @param int $quantity
         * @return $this
         */
        public function remove($quantity = 1);

        /**
         * Do a hard set on our product.
         *
         * @param int $quantity
         * @return $this
         */
        public function setQuantity($quantity = 0);

        /**
         * Get the quantity of our product.
         *
         * @return int
         */
        public function getQuantity();

        /**
         * Set the name of our product.
         *
         * @param $name
         * @return $this
         */
        public function setName($name);

        /**
         * Get the name of our product.
         *
         * @return mixed
         */
        public function getName();

        /**
         * Get a 32bit string ID for our product.
         *
         * @return string
         */
        public function getId();
    }
