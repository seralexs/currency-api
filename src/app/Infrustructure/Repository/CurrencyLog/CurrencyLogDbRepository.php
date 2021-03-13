<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 8:14 PM
 */

namespace App\Infrustructure\Repository\CurrencyLog;


use App\Model\Entity\CurrencyLogEntity;
use App\Model\Repository\CurrencyLogRepository;

class CurrencyLogDbRepository implements CurrencyLogRepository
{
    private $tableName;

    private $pdo;

    public function persist(CurrencyLogEntity $entity): void
    {
        $id = $this->saveToDB($entity->getData());
        $entity->setId($id);
    }

    private function saveToDB(array $params)
    {
        return $this->pdo->save($this->tableName, $params);
    }

}