<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Book;
use App\Author;

class SearchController extends Controller
{

    public function getSearch(Request $request)
    {

        $data = $request->all();

        if($data['table'] == 'books') {

            $match = [
                'query' => [
                    'match' => [
                        'title' => $data['query']
                    ]
                ]
            ];

            $ids = $this->getSearchResult($data['table'], $match);

            if($ids) {
                $items = $this->getBooks($ids);
            } else {

                return $this->notFoundView($data['query']);
            }
        }

        if($data['table'] == 'authors') {

            $match = [
                'query' => [
                    'multi_match' => [
                        'query' => $data['query'],
                        'fields' => ['first', 'last']
                    ]
                ]
            ];

            $ids = $this->getSearchResult($data['table'], $match);

            $items = $this->getAuthors($ids);
        }

        $view = view($data['table'], ['items' => $items,
            'header' => 'Результаты поиска: ' . $data['query']])->render();

        return (new Response($view));
    }

    public function notFoundView($query)
    {
        $view = view('notfound', ['header' => 'Результаты поиска: ' . $query])->render();

        return (new Response($view));
    }

    public function getSearchResult($table, $match)
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => $table,
            'type' => 'all',
            'body' => $match
        ];

        $response = $client->search($params);

        return $response['hits']['hits'];
    }

    public function getBooks($items)
    {
        foreach ($items as $item){
            $ids[] = $item['_source']['id'];
        }

        return Book::whereIn('id', $ids)->with('author')->paginate(25);
    }

    public function getAuthors($items)
    {
        foreach ($items as $item){
            $ids[] = $item['_source']['id'];
        }

        return Author::whereIn('id', $ids)->paginate(25);
    }
}
