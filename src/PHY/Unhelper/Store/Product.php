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
     * A product class to handle default behaviors
     *
     * @package PHY\Unhelper\Store\Product
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Product implements IProduct
    {

        private $name = 'item';
        private $quantity = 0;

        /**
         * {@inheritDoc}
         */
        public function __construct($name, $quantity = 0)
        {
            $this->setName($name);
            $this->setQuantity($quantity);
        }

        /**
         * {@inheritDoc}
         */
        public function add($quantity = 1)
        {
            $this->quantity += $quantity;
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function remove($quantity = 1)
        {
            $this->quantity -= $quantity;
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function setQuantity($quantity = 0)
        {
            $this->quantity = (int)$quantity;
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function getQuantity()
        {
            return $this->quantity;
        }

        /**
         * {@inheritDoc}
         */
        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * {@inheritDoc}
         */
        public function getId()
        {
            return md5($this->getName());
        }
    }
