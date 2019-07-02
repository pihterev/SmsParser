<?php
/**
 * @author pihterev
 */

class Account extends EntityAbstract
{
    /**
     * @return string
     */
    function getPattern(): string
    {
        return '/(\d{10,})/';
    }
}