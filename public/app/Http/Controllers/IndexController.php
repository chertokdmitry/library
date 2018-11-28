<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Book;

class IndexController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(25);

        $view = view('index', ['items' => $books, 'header' => 'Все книги'])->render();
        return (new Response($view));
    }
}
