<?php
namespace App\EventEntityListener;

use App\Entity\Lodging;
use Symfony\Component\String\Slugger\SluggerInterface;

class LodgingPersistListener{
    private $slugger;

    public function __construct(SluggerInterface $sluggerInterface){
        $this->slugger = $sluggerInterface;
    }

    public function prePersist(Lodging $lodging){
        $lodging->setSlugLod($this->slugger->slug(strtolower($lodging->getTitleLod())));
    }
}

