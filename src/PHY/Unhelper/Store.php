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
     * Our lovely store that has unfortunate programmers coming to and probably
     * never leaving due to no breaks added to loops.
     *
     * @package PHY\Unhelper\Store
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Store implements Store\IStore
    {

        private $name = 'Food & Stuff';
        private $products = [];

        /**
         * {@inheritDoc}
         */
        public function __construct($name)
        {
            $this->setName($name);
        }

        /**
         * {@inheritDoc}
         */
        public function add(Store\IProduct $product)
        {
            if (!array_key_exists($product->getId(), $this->products)) {
                $this->products[$product->getId()] = $product;
            } else {
                $this->products[$product->getId()]->add($product->getQuantity());
            }
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function remove(Store\IProduct $product)
        {
            if (array_key_exists($product->getId(), $this->products)) {
                unset($this->products[$product->getId()]);
            }
            return $this;
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

    }
