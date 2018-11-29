<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Response;
use App\Book;

class IndexController extends Controller
{
    public function index()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $key = 'books-page-' . $currentPage;
        $books = Cache::remember($key, 60, function () {

            return  Book::with('author')->paginate(25);
        });

        $view = view('index', ['items' => $books, 'header' => 'Все книги'])->render();

        return (new Response($view));
    }
}
