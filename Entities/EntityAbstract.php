<?php
/**
 * @author pihterev
 */

abstract class EntityAbstract
{
    /**
     * @return string
     */
    abstract function getPattern(): string;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param array $matches
     *
     * @return mixed|string
     */
    public function setValueByPattern(array $matches)
    {
        return $this->value = $matches[0] ?? '';
    }

    /**
     * @return int
     */
    public function cast()
    {
        return (int) $this->value;
    }
}