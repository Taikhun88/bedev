<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BatmanIAController extends AbstractController
{
    #[Route('/batman/ia', name: 'app_batman_ia')]
    public function index(): Response
    {
        $ennemis = ['x:16 pv:124', 'x:13 pv:118', 'x:18 pv:17', 'x:31 pv:12', 'x:27 pv:33', 'x:3 pv:94', 'x:38 pv:43', 'x:8 pv:71', 'x:15 pv:40', 'x:24 pv:30', 'x:9 pv:106'];        

        $dataToEliminate = "";
        $newTab = [];
        for ($i = 0; $i <= array_key_last($ennemis) ; $i++) { 
            $scanEnnemi = explode(' ', $ennemis[$i]);
            $newTab[$i] = [];
            foreach ($scanEnnemi as $key => $value) {
                $explodedValue = explode(':', $value);
                $newTab[$i][$explodedValue[0]] = $explodedValue[1];
            }
        }        
        sort($newTab);
        dump($newTab);

        $result = "";
        $currentX = 0;
        
        foreach ($newTab as $keyNewTab => $valueNewTab) {

            $oldX = $this->updateCurrentX($newTab, $keyNewTab);

            $currentX = $valueNewTab['x'] - $oldX;
            for ($iX = 0; $iX < $currentX; $iX++) {
                $result .= "D";                
            }

            $moduloPvAttack = $valueNewTab['pv'] / 10;
            $ceilModuloAtk = ceil($moduloPvAttack);

            for ($iPV = 0; $iPV < $ceilModuloAtk; $iPV++) {
                $result .= "F";                
            }
        }
        dump($result);

        return $this->render('batman_ia/index.html.twig', [
            'dataToEliminate' => $dataToEliminate,
        ]);
    }

    public function updateCurrentX($newTab, $keyNewTab) 
    {
        $currentXEnnemi = $newTab[$keyNewTab]['x'];
        if ($keyNewTab == 0) {
            $oldX = 0;
        } else 
        {
            $oldX = $newTab[$keyNewTab - 1]['x'];
        }
        return $oldX;

        // dd($keyNewTab);
    }
}
