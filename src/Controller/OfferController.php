<?php

namespace App\Controller;

use App\Manager\OfferManager;
use Plugo\Controller\AbstractController;

class OfferController extends AbstractController
{

    public function test()
    {
        $offerManager = new OfferManager();
        return $this->renderView('offer/index.php', [
//          'offers' => $offerManager->find(1)
            'offers' => $offerManager->findAll()
        ]);
    }
}