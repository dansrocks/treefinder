<?php

namespace TreeFinder;

/**
 * Class TreeFinder
 *
 * @package dansrocks\TreeFinder
 */
class TreeFinder
{
    /** @var IMatchMethod */
    private $matchMethod = null;

    /** @var int */
    private $threshold = null;

    /**
     * @var array
     */
    private $coincidences = [];

    /**
     * TreeFinder constructor.
     *
     * @param IMatchMethod $method
     * @param int $threshold
     */
    public function __construct(IMatchMethod $method, int $threshold)
    {
        $this->matchMethod = $method;
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
                $coincidence = $this->matchMethod->coincidence($leftItem, $rightItem);
                if ($coincidence >= $threshold) {
                    $this->appendCoincidence($leftKey, $rightKey, $coincidence, $leftItem, $rightItem);
                }
            }
        }
        return $this->coincidences;
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