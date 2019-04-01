<?php

namespace TreeFinder\Methods;

use TreeFinder\Interfaces\IMatchMethod;
use TreeFinder\Interfaces\ITreeLeaf;

/**
 * Class StringMatches
 *
 * @package TreeFinder\Methods
 */
class StringMatches implements IMatchMethod
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
        if ($leftValue == $rightValue) {
            $percent = 100;
        } else {
            $minChars = min(mb_strlen($leftValue), mb_strlen($rightValue));
            $changes = levenshtein($leftValue, $rightValue);
            $percent = intval((($minChars - $changes) / $minChars) * 100);
        }

        return $percent;
    }
}