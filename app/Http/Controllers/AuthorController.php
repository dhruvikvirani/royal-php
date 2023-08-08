<?php

namespace App\Http\Controllers;

use App\Repository\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public $authorRepo;

    public function __construct(AuthorRepositoryInterface $authorRepo) 
    {
        $this->authorRepo = $authorRepo;
    }
    public function index(Request $request){
        $authors =  $this->authorRepo->retriveAuthors($request);
        return view('Authors.index')->with(['authors'=>$authors]);
    }
    public function show($id)
    {
        $author =  $this->authorRepo->retriveAuthor($id);
        return view('Authors.show', compact('author'));
    }
    public function destroy($id)
    {
        $author =  $this->authorRepo->retriveAuthor($id);
        if (isset($author['books']) && count($author['books'])) {
            return back()->with('error', 'Author have a Books so can not delete.');
        }
        $this->authorRepo->delete($id);

        return back()->with('success', 'Author Deleted Successfully.');
    }
}
