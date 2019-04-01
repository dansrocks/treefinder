<?php

namespace TreeFinder\Interfaces;

/**
 * Interface IMatchMethod
 *
 * @package TreeFinder
 */
interface IMatchMethod
{
    public function coincidence(ITreeLeaf $left, ITreeLeaf $right): int;
}