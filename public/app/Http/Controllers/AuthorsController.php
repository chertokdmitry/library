<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Author;


class AuthorsController extends Controller
{
    public function index()
    {
        $items = Author::paginate(25);

        $view = view('allauthors', ['items' => $items, 'header' => 'Все авторы'])->render();
        return (new Response($view));
    }
}
