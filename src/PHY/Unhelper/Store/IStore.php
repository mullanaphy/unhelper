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
     * The store's contract and rights to operate.
     *
     * @package PHY\Unhelper\Store\IStore
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    interface IStore
    {

        /**
         * Open up a store and give it a name.
         *
         * @param mixed $name
         */
        public function __construct($name);

        /**
         * Add a product to the store.
         *
         * @param IProduct $product
         * @return $this
         */
        public function add(IProduct $product);

        /**
         * Remove a product from a store.
         *
         * @param IProduct $product
         * @return $this
         */
        public function remove(IProduct $product);

        /**
         * Set the store's name.
         *
         * @param mixed $name
         * @return $this
         */
        public function setName($name);

        /**
         * Get the store's name.
         *
         * @return mixed
         */
        public function getName();

    }
