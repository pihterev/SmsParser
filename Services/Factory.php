<?php
/**
 * @author pihterev
 */

class Factory
{
    /**
     * @var int
     */
    const MONEY   = 1,
          CODE    = 2,
          ACCOUNT = 3
    ;

    /**
     * @return array
     */
    public static function getConfigs()
    {
        return [
            self::MONEY => [
                'class' => Money::class,
            ],
            self::CODE => [
                'class' => Code::class,
            ],
            self::ACCOUNT => [
                'class' => Account::class,
            ],
        ];
    }

    /**
     * @param int $entityId
     *
     * @return EntityAbstract
     *
     * @throws Exception
     */
    public static function get(int $entityId): EntityAbstract
    {
        $config = self::getConfigs()[$entityId];

        if (empty($config['class'])) {
            throw new Exception(sprintf('class for id %d is not found', $entityId));
        }

        return new $config['class'];
    }
}