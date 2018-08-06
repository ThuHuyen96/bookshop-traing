<?php
/**
 * Created by PhpStorm.
 * User: THU_HUYEN
 * Date: 8/6/2018
 * Time: 3:31 PM
 */

namespace App\Controller;




use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('my first page');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'page show: %s',
            $slug
        ));
    }
}