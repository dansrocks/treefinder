<?php

namespace TreeFinder;

/**
 * Class TreeFinder
 *
 * @package dansrocks\TreeFinder
 */
class TreeFinder
{
    /** @var \Closure */
    private $closure = null;

    /** @var int */
    private $threshold = null;

    /**
     * @var array
     */
    private $coincidences = [];

    /**
     * TreeFinder constructor.
     *
     * @param \Closure $closure
     * @param int $threshold
     */
    public function __construct(\Closure $closure, int $threshold)
    {
        $this->closure = $closure;
        $this->threshold = $threshold;
    }

    /**
     * @param array $left
     * @param array $right
     *
     * @return array
     */
    public function findCoincidences(array $left, array $right)
    {
        $threshold = $this->getThreshold();
        foreach ($left as $leftKey => $leftItem) {
            foreach ($right as $rightKey => $rightItem) {
                $coincidence = $this->coincidence($leftItem, $rightItem);
                if ($coincidence >= $threshold) {
                    $this->appendCoincidence($leftKey, $rightKey, $coincidence, $leftItem, $rightItem);
                }
            }
        }
        return $this->coincidences;
    }

    /**
     * @param $left
     * @param $right
     *
     * @return mixed
     */
    private function coincidence($left, $right)
    {
        return call_user_func($this->closure, $left, $right);
    }

    /**
     * @param $leftKey
     * @param $rightKey
     * @param $coincidence
     */
    private function appendCoincidence($leftKey, $rightKey, $coincidence, $leftItem, $rightItem)
    {
        $this->coincidences[] = [
            'left-pos' => $leftKey,
            'right-pos' => $rightKey,
            'left' => $leftItem,
            'right' => $rightItem,
            'coincidence' => $coincidence,
        ];
    }

    /**
     * @return\Closure|int
     */
    private function getThreshold()
    {
        return $this->threshold;
    }
}