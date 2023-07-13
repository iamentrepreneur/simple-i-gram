<?php

namespace App\Services\Posts;

use App\Application\Alerts\Alert;
use App\Application\Auth\Auth;
use App\Application\Router\Redirect;
use App\Application\Upload\Upload;
use App\Models\Post;

class PostService implements PostServiceInterface
{

    public function store(array $images, string $description): void
    {
        if ($image = Upload::file($images, 'images')) {
            Alert::storeMessage('Пост опубликован', Alert::SUCCESS);
            $post = new Post();
            $post->setImage($image);
            $post->setDescription($description);
            $post->setUserId(Auth::id());
            $post->store();
            Redirect::to('/profile');
        } else {
            Alert::storeMessage('Ошибка при загрузке изображения.', Alert::DANGER);
            Redirect::to('/profile');
        }
    }

    public function destroy(int $id): void
    {
        // TODO: Implement destroy() method.
    }
}