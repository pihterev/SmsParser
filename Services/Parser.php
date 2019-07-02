<?php
/**
 * @author pihterev
 */

class Parser
{
    /**
     * @var array
     */
    private $_rows;

    /**
     * @var string
     */
    const DELIMITER = "\r\n";

    /**
     * Parser constructor.
     *
     * @param string $string
     * @param string $delimiter
     */
    public function __construct(string $string, $delimiter = self::DELIMITER)
    {
        $this->_rows = explode($delimiter, $string);
    }

    /**
     * @param int $entityId
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function getEntity(int $entityId)
    {
        return $this->search($entityId);
    }

    /**
     * @param int $entityId
     *
     * @return mixed
     * @throws Exception
     */
    public function search(int $entityId)
    {
        $entity = Factory::get($entityId);

        foreach ($this->_rows as $row) {
            if (preg_match($entity->getPattern(), $row, $matches)) {
                $entity->setValueByPattern($matches);
                return $entity->cast();
            }
        }

        throw new Exception(sprintf('entity with id %d is not found', $entityId));
    }
}