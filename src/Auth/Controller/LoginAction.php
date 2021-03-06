<?php

namespace App\Auth\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Framework\Renderer\RendererInterface;

class LoginAction {


/**
 * @var RendererInterface
 */
  private $renderer;

  public function __construct(RendererInterface $renderer)
  {
    $this->renderer = $renderer;
  }
  public function __invoke(ServerRequestInterface $request)
  {
    return $this->renderer->render('@auth/login');

  }

}
