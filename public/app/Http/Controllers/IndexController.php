<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Book;

class IndexController extends Controller
{
    public function index()
    {
        $data = [];
        $books = Book::with('author')->get();

        foreach ($books as $book) {

            $data[] = ['id' => $book->id,
                'title' => $book->title,
                'author_name' => $book->author->first . ' ' . $book->author->last];
        }

        $view = view('page', ['books' => $data])->render();
        return (new Response($view));
    }
}
