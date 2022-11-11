<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CodeCesarController extends AbstractController
{
    #[Route('/code/cesar', name: 'app_code_cesar')]
    public function index(): Response
    {
        $decalage = -5;
        if ($decalage < 0) {
            $decalage = $decalage * (-1);
            // dump($decalage);
        } 
        else
        {
            $decalage = $decalage * (-1);
            // dump($decalage . " decalage positif");
        }
        $mot_crypte = 'xvgzojin';

        $alphabet = str_split('abcdefghijklmnopqrstuvwxyz');
        
        $mot_decrypte = "";
        for ($iMotCrypte = 0; $iMotCrypte < strlen($mot_crypte); $iMotCrypte++) { 
            $arrayMotCrypte = str_split($mot_crypte);

            $searchLetter = array_search($arrayMotCrypte[$iMotCrypte], $alphabet);
            $lettreDecalee = $searchLetter + $decalage;
            // dump($lettreDecalee);
            
            if ($lettreDecalee < count($alphabet) && $lettreDecalee >= 0) {
                $mot_decrypte .= $alphabet[$lettreDecalee];
                // dump($alphabet[$lettreDecalee]);
            } else
            {
                if ($lettreDecalee < 0) {
                    $floatLetterDecaleeToInt = fmod( $lettreDecalee, count($alphabet));
                    $lettreDecalee = array_key_last($alphabet) + $floatLetterDecaleeToInt;
                    
                    $mot_decrypte .= $alphabet[count($alphabet) + $floatLetterDecaleeToInt];
                } else 
                {
                    $leftLettreDecalee = fmod($lettreDecalee, count($alphabet));
                    // dump(fmod($lettreDecalee, count($alphabet)));

                    $mot_decrypte .= $alphabet[$leftLettreDecalee];
                }
            }
        }
        

        return $this->render('code_cesar/index.html.twig', [
            'decalage' => $decalage,
            'mot_crypte' => $mot_crypte,
            'mot_decrypte' => $mot_decrypte,

        ]);
    }
}
