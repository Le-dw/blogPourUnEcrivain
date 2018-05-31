<?php
namespace App\Blog\Actions;


use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Framework\Renderer\TwigRendererFactory;
use Framework\Router;
use GuzzleHttp\Psr7\Response;
use Framework\Actions\RouterAwareAction;
use \Framework\Actions\CrudAction;
use App\Blog\Table\CategoryTable;
use \Framework\Session\FlashService;




class CategoryCrudAction extends CrudAction {

  /**
   * @var string
   */
  protected $viewPath = "@blog/admin/categories";

  /**
   * @var string
   */
  protected $routePrefix = "blog.category.admin";


  public function __construct(
    RendererInterface $renderer,
    Router $router,
    CategoryTable $table,
    FlashService $flash

     ){
       parent::__construct( $renderer,$router,$table,$flash);

  }


  protected function getParams (Request $request){
    return array_filter($request->getParsedBody(), function ($key) {
      return in_array($key, ['latitude','longitude','name_locality']);
    }, ARRAY_FILTER_USE_KEY);
  }


  protected function getValidators(Request $request){

    return parent::getValidators($request)
      ->required('latitude','longitude','name_locality')
      ->length('name_locality',2,250);
  }



}
