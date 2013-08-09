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

    use PHY\Unhelper\Database\Table;

    /**
     * A Database that just uses CSV on the backend.
     *
     * @package PHY\Unhelper\Database
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Database
    {

        private $query = [];
        private $tables = [];

        /**
         * Disconnect from all of our tables when it's time to close our
         * database connection.
         */
        public function __destruct()
        {
            foreach ($this->tables as $table) {
                $table->disconnect();
            }
        }

        /**
         * Start our query over from the beginning.
         *
         * @return \PHY\Unhelper\Database
         */
        public function reset()
        {
            $this->query = [];
            return $this;
        }

        /**
         * Query against a table.
         *
         * @param string $table
         * @return \PHY\Unhelper\Database
         */
        public function table($table)
        {
            $this->query['table'] = $table;
            return $this;
        }

        /**
         * Limit the amount of results in our query.
         *
         * @param int $start
         * @param int $end
         * @return \PHY\Unhelper\Database
         */
        public function limit($start, $end = null)
        {
            if (is_numeric($start)) {
                if (null === $end) {
                    $this->query['limit'] = [0, $start];
                } else {
                    $this->query['limit'] = [$start, $end];
                }
            } else {
                $this->query['limit'] = false;
            }
            return $this;
        }

        /**
         * Add an orderBy clause.
         *
         * @param string $key
         * @param string $direction
         * @return \PHY\Unhelper\Database
         */
        public function orderBy($key, $direction = 'ASC')
        {
            $this->query['orderBy'] = [$key, $direction];
            return $this;
        }

        /**
         * Run a find query.
         *
         * @param array $query
         * @return \PHY\Unhelper\Database
         * @throws \PHY\Unhelper\Database\Exception
         */
        public function find($query)
        {
            if (!is_array($query)) {
                $query = ['id' => $query];
            }
            $limit = array_key_exists('limit', $this->query)
                ? $this->query['limit']
                : false;

            $table = $this->source(array_key_exists('table', $this->query)
                    ? $this->query['table']
                    : '');
            $columns = [];
            $results = [];
            $foundCount = 0;
            while (false !== ($row = $table->fetch())) {
                if (!$columns) {
                    $columns = $row;
                    foreach ($query as $key => $value) {
                        if (!array_key_exists($key, $query)) {
                            throw new \PHY\Unhelper\Database\Exception('Unknown column '.$key);
                        }
                    }
                    continue;
                }
                $row = array_combine($columns, $row);
                $noMatch = false;
                foreach ($query as $key => $value) {
                    if ($value != $row[$key]) {
                        $noMatch = true;
                    }
                }
                if ($noMatch) {
                    continue;
                }
                if ($limit) {
                    if ($limit[0] >= $foundCount) {
                        continue;
                    }
                    $results[] = $row;
                    if ($foundCount >= $limit[1]) {
                        break;
                    }
                } else {
                    $results[] = $row;
                }
                ++$foundCount;
            }
            $this->results = $results;
            return $this;
        }

        /**
         * Connect to a new table if it doesn't already exist.
         *
         * @param string $table
         * @return \PHY\Unhelper\Database
         */
        public function source($table)
        {
            if (!array_key_exists($table, $this->tables)) {
                $this->tables[$table] = new Table($table);
            }
            return $this;
        }

        /**
         * Fetch our query results.
         *
         * @return array
         */
        public function fetch()
        {
            if (array_key_exists('orderBy', $this->query)) {
                if (!array_key_exists('ordered', $this->query)) {
                    $heap = new SplHeap($this->results);
                    $this->query['ordered'] = true;
                    $this->results = $heap;
                }
            }
            return $this->results;
        }

        /**
         * Return a count of results.
         *
         * @return int
         */
        public function count()
        {
            return count($this->results);
        }

        /**
         * Perform an update query.
         *
         * @param array $query
         */
        public function update($query)
        {

        }

        /**
         * Perform an delete query.
         *
         * @param array $query
         */
        public function delete($query)
        {

        }

        /**
         * Perform an insert query.
         *
         * @param array $query
         */
        public function insert($query)
        {
            $this->connect();
        }

    }
