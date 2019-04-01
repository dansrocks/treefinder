<?php

namespace TreeFinder\Methods;

use TreeFinder\IMatchMethod;
use TreeFinder\ITreeLeaf;

/**
 * Class NumberMatches
 *
 * @package TreeFinder\Methods
 */
class NumberMatches implements IMatchMethod
{
    /**
     * @param ITreeLeaf $left
     * @param ITreeLeaf $right
     *
     * @return int
     */
    public function coincidence(ITreeLeaf $left, ITreeLeaf $right): int
    {
        $leftValue = $left->getTreeLeafValue();
        $rightValue = $right->getTreeLeafValue();

        return ($leftValue == $rightValue) ? 100 : 0;
    }
}