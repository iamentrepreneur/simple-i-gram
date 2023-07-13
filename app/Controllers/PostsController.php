<?php

namespace App\Controllers;

use App\Application\Alerts\Alert;
use App\Application\Auth\Auth;
use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Application\Upload\Upload;
use App\Models\Post;
use App\Services\Posts\PostService;

class PostsController
{
    private PostService $service;

    public function __construct()
    {
        $this->service = new PostService();
    }

    public function publish(Request $request)
    {
        $this->service->store($request->file('image'),$request->post('description') );
    }
}