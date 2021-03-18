<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 8:14 PM
 */

namespace App\Infrastructure\Repository\CurrencyLog;


use App\Model\Entity\CurrencyLogEntity;
use App\Model\Repository\CurrencyLogRepository;

class CurrencyLogInMemoryRepository implements CurrencyLogRepository
{
    private $rows = [];

    public function persist(CurrencyLogEntity $entity)
    {
        $this->rows[$entity->getId()] = $entity->getData();
    }

    public function getById(int $id): CurrencyLogEntity
    {
        return $this->rows[$id];
    }
}