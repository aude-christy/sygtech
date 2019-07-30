<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * undocumented class
 */
class IndexController 
{
    /**
    * Creates the application.
    *
    * @return Response
    */
    public function luckyNumber()
    {
      
        $number = random_int(0, 100);
        return new Response($number); 
    }
}
