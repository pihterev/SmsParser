<?php
/**
 * @author pihterev
 */

class Money extends EntityAbstract
{
    /**
     * @return float
     */
    public function cast(): float
    {
        return round(str_replace(',', '.', $this->value), 2);
    }

    /**
     * @return string
     */
    function getPattern(): string
    {
        return '/([0-9|,]+р)/';
    }
}