<?php
/**
 * @author pihterev
 */

class Code extends EntityAbstract
{
    /**
     * @return string
     */
    function getPattern(): string
    {
        return '/(\d{1,4})/';
    }
}