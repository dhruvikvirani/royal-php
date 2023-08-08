<?php 

namespace App\Repository;

interface BookRepositoryInterface
{
    public function delete($id);
    public function retriveAuthors();
    public function storeBook($request);
}