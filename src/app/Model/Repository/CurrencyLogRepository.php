<?php
/**
 * Created by PhpStorm.
 * User: alex.gajvoronskij
 * Date: 3/13/21
 * Time: 8:12 PM
 */

namespace App\Model\Repository;


use App\Model\Entity\CurrencyLogEntity;

interface CurrencyLogRepository
{
    public function persist(CurrencyLogEntity $entity);
}