<?php
namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\Offer;
Class OfferManager extends AbstractManager {
    public function find(int $id) {
        return $this->readOne(Offer::class, $id);
    }

    public function findAll() {
        return $this->readMany(Offer::class);
    }
}