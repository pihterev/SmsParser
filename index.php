<?php

require_once __DIR__ . '/Services/Parser.php';
require_once __DIR__ . '/Services/Factory.php';
require_once __DIR__ . '/Entities/EntityAbstract.php';
require_once __DIR__ . '/Entities/Account.php';
require_once __DIR__ . '/Entities/Money.php';
require_once __DIR__ . '/Entities/Code.php';

$string = 'Пароль: 5381
Спишется 2345,73р.
Перевод на счет 410019802496503';

/**
 * @param $string
 *
 * @return array
 */
function getEntities($string): array
{
    try {
        $parser = new Parser($string);

        return [
            $parser->getEntity(Factory::CODE),
            $parser->getEntity(Factory::MONEY),
            $parser->getEntity(Factory::ACCOUNT),
        ];
    } catch (Exception $exception) {
        return [];
    }
}

list($code, $money, $account) = getEntities($string);
var_dump($code);
var_dump($money);
var_dump($account);
