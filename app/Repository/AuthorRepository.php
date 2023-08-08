<?php 

namespace App\Repository;

use App\Helpers\Helper;
use App\Repository\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function retriveAuthors($request){
        $path = 'authors';
        $params = [
            'orderBy' => 'id',
            'direction' => 'ASC',
            'limit' => '10',
            'page' => $request->page ?? 1,
        ];
        return Helper::royalApi('GET',$path,$params);
    }
    public function retriveAuthor($id){
        $path = 'authors/'.$id;
        return Helper::royalApi('GET',$path);
    }

    public function delete($id){
        $path = 'authors/'.$id;
        return Helper::royalApi('DELETE',$path);
    }
}