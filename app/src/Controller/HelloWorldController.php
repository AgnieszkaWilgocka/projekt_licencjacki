<?php
/**
 * HelloWorld Controller
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HelloWorldController
 * @Route(
 *     "/hello-world"
 * )
 */
class HelloWorldController extends AbstractController {

    /**
     * Index action.
     * @param string $name
     *
     * @return Response
     *
     * @Route(
     *     "/{name}",
     *     methods={"GET"},
     *     name="hello_world_index",
     *     defaults={"name": "World"},
     *     requirements={"name" : "[a-zA-Z]+"},
     *
     * )
     */
    public function index(string $name):Response
    {
        return $this->render(
            'hello-world/index.html.twig',
            ['name' => $name]
        );
    }
}

?>