<?php
/**
 * Created by PhpStorm.
 * User: mat
 * Date: 11/05/16
 * Time: 8:45 PM
 */

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class NewGet extends BaseAction {

    private $view;
    private $logger;
    private $project_id;

    public function __construct(Twig $view, LoggerInterface $logger, $project_id)
    {
        $this->view       = $view;
        $this->logger     = $logger;
        $this->project_id = $project_id;

        parent::__construct();
    }

    public function __invoke(Request $request, Response $response, $args)
    {

        $this->data['project'] = $this->project_id;

        $this->view->render($response, 'form.twig', $this->data);

        return $response;
    }
}