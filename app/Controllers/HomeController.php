<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 10:20
 */

namespace App\Controllers;

use App\Services\UserService;
use App\Services\UploadService;
use Base\Http\Controller;
use Base\Http\RequestInterface;
use Base\Http\Response;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{
    /**
     * @var UploadService
     */
    private $uploadService;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * HomeController constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        parent::__construct($request);
        $this->uploadService = new UploadService();
        $this->userService = new UserService();

    }

    /**
     * Index action
     * @return Response
     * @throws \Throwable
     */
    public function index(): Response
    {
        if ($this->request->getFiles()) {
            $this->uploadService->upload($this->request->getFiles());
            $this->userService->save($this->uploadService->getParseData());
            $_SESSION['flash'] = $this->userService->getStatistic();
            return $this->redirect();
        }

        $users = $this->userService->findAll();
        return new Response($this->template->render('home', ['users' => $users]));
    }
}