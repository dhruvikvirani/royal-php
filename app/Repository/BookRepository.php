<?php
namespace App\Repository;

use App\Helpers\Helper;
use App\Repository\BookRepositoryInterface;

Class BookRepository implements BookRepositoryInterface
{
    public function delete($id){
        $path = 'books/'.$id;
        return Helper::royalApi('DELETE',$path);
    }
    public function retriveAuthors(){
        $path = 'authors';
        return Helper::royalApi('GET',$path);
    }
    public function storeBook($book){
        $path = 'books';
        $params = [
            'author' => [
                'id' => $book['author'],
            ],
            'title' => $book['title'],
            'release_date' => $book['release_date'],
            'description' => $book['description'],
            'isbn' => $book['isbn'],
            'format' => $book['format'],
            'number_of_pages' => intval($book['no_of_pages']),
        ];
        return Helper::royalApi('POST',$path,$params);
    }
}