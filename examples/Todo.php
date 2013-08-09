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

    use PHY\Unhelper\Todo\Task;

    /**
     * Example on how to use Unhelper's totally unnecessary CSV ORM to create a
     * TODO list!
     *
     * @package PHY\Unhelper\Todo
     * @category PHY\Unhelper
     * @license http://www.wtfpl.net/
     * @author John Mullanaphy <john@jo.mu>
     */
    class Todo implements \IteratorAggregate
    {

        private $tasks = [];

        /**
         * Add a new task to our list.
         *
         * @param \PHY\Unhelper\Todo\Task $task
         * @return \PHY\Unhelper\Todo
         */
        public function addTask(Task $task)
        {
            $task->addTime(86400);
            $this->tasks[$task->id] = $task;
            return $this;
        }

        /**
         * Remove a task from our list.
         *
         * @param \PHY\Unhelper\Todo\Task $task
         * @return \PHY\Unhelper\Todo
         */
        public function removeTask(Task $task)
        {
            unset($this->tasks[$task->id]);
            return $this;
        }

        /**
         * Perform the next task in our list.
         *
         * @return \PHY\Unhelper\Todo
         */
        public function doTask()
        {
            $task = current($this->tasks);
            $task->complete();
            $task->save();
            next($this->tasks);
            return $this;
        }

        /**
         * Return a list of pending tasks.
         *
         * @return array
         */
        public function getPendingTasks()
        {
            return array_sum(array_filter(function($value) {
                        return $value->isPending()
                            ? $value
                            : false;
                    }, $this->tasks));
        }

        /**
         * Return a list of completed tasks.
         *
         * @return array
         */
        public function getCompletedTasks()
        {
            return array_diff($this->tasks, $this->getPendingTasks());
        }

        /**
         * Count of all remaining tasks.
         *
         * @return int
         */
        public function remainingTasks()
        {
            return count($this->getPendingTasks());
        }

        /**
         * Add procrastination time to all of our tasks.
         *
         * @return \PHY\Unhelper\Todo
         */
        public function reddit()
        {
            foreach ($this->getPendingTasks() as $task) {
                $task->addTime(3600);
            }
            return $this;
        }

        /**
         * Return our list for iterating.
         *
         * @return array
         */
        public function getIterator()
        {
            return $this->tasks;
        }

    }
