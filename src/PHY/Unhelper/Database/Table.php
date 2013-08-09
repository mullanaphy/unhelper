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
     * An object representation of a stored Table.
     *
     * @package PHY\Unhelper\Database\Table
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Table
    {

        private $FILE;

        /**
         * Provide the name of our table and connect to it.
         *
         * @param string $table
         */
        public function __construct($table = false)
        {
            if ($table) {
                $this->connect($table);
            }
        }

        /**
         * Close our connection on destruct to free up memory.
         */
        public function __destruct()
        {
            if ($this->FILE) {
                $this->disconnect();
            }
        }

        /**
         * Connect to a table.
         *
         * @param string $table
         * @return \PHY\Unhelper\Table
         * @throws \PHY\Unhelper\Database\Table\Exception
         */
        public function connect($table)
        {
            if (!$table) {
                throw new \PHY\Unhelper\Database\Table\Exception('No table was set.');
            }
            $this->FILE = fopen($table, 'rw');
            if (!$this->FILE) {
                throw new \PHY\Unhelper\Database\Table\Exception('Table '.$table.' was not found,');
            }
            return $this;
        }

        /**
         * Disconnect from a table.
         *
         * @return \PHY\Unhelper\Table
         */
        public function disconnect()
        {
            fclose($this->FILE);
            return $this;
        }

        /**
         * Fetch a row from our table.
         *
         * @return array
         */
        public function fetch()
        {
            return fgetcsv($this->FILE);
        }

    }
