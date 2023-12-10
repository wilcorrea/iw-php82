<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
//    #[Route('/lucky/number')]
    public function __invoke()
    {
        $number = random_int(0, 100);

        return new Response("<html>
                <body>
                    <h3>Your lucky number is: {$number}</h1>
                </body>
            </html>");
    }
}