<?php

namespace TreeFinder\Methods;


use TreeFinder\IMatchMethod;
use TreeFinder\ITreeLeaf;

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
        $minChars = min(mb_strlen($leftValue), mb_strlen($rightValue));
        $changes = levenshtein($leftValue, $rightValue);
        $percent = (($minChars - $changes) / $minChars) * 100;

        return intval($percent);
    }

}