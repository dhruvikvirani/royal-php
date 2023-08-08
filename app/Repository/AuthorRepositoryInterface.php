<?php 

namespace App\Repository;

interface AuthorRepositoryInterface
{
    public function retriveAuthors($request);
    public function retriveAuthor($id);
    public function delete($id);
}
