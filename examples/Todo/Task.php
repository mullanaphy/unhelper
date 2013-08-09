<?php

    /**
     * PHY\Unhelper
     * https://github.com/mullanaphy/unhelper
     *
     * LICENSE
     * DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
     * http://www.wtfpl.net/
     */

    namespace PHY\Unhelper\Todo;

    /**
     * Example on how to use Unhelper's totally unnecessary CSV ORM to create a
     * TODO list!
     *
     * @package PHY\Unhelper\Todo\Task
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Task
    {

        const DATE_FORMAT = 'Y-m-d H:i:s';

        private $id = null;
        private $data = [
            'name' => '',
            'description' => '',
            'time' => 0,
            'created' => null,
            'updated' => null,
            'completed' => null
        ];

        /**
         * Provide our initial data if it exists.
         *
         * @param array $data
         */
        public function __construct(array $data = [])
        {
            if (!array_key_exists('created', $data)) {
                $data['created'] = date(static::DATE_FORMAT);
            }
            foreach ($data as $key => $value) {
                if (array_key_exists($key, $this->data)) {
                    $this->data[$key] = $value;
                }
            }
            if (array_key_exists('id', $data)) {
                $this->id = $data['id'];
            }
        }

        /**
         * Return any defined values if they exist.
         * 
         * @param string $key
         * @return mixed
         */
        public function __get($key)
        {
            if ('id' === $key) {
                return $this->id;
            } else if (array_key_exists($key)) {
                return $this->data[$key];
            }
        }

        /**
         * Mark a task as complete.
         */
        public function complete()
        {
            $this->data['completed'] = date(static::DATE_FORMAT);
        }

        /**
         * Save our task. Returns an ID if it's a new row.
         *
         * @return mixed
         */
        public function save()
        {
            $database = $this->getDatabase();
            if ($this->id) {
                $database
                    ->table('task')
                    ->update($this->id, $this->data)
                    ->save();
            } else {
                $this->id = $database
                    ->table('task')
                    ->create($this->data)
                    ->save();
                return $this->id;
            }
        }

        /**
         * See if our task is pending.
         *
         * @return boolean
         */
        public function isPending()
        {
            return null !== $this->data['completed'];
        }

        /**
         * See if our task is complete.
         *
         * @return boolean
         */
        public function isCompleted()
        {
            return !$this->isPending();
        }

        /**
         * Return our task's data.
         *
         * @return array
         */
        public function toArray()
        {
            return array_merge(['id' => $this->id], $this->data);
        }

        /**
         * Get a JSON encoded version of our task's data.
         *
         * @return string
         */
        public function toJson()
        {
            return json_ecode($this->toArray());
        }

    }
