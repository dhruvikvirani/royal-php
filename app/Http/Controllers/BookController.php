<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Repository\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepo) 
    {
        $this->bookRepo = $bookRepo;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors =  $this->bookRepo->retriveAuthors();
        return view('Books.create')->with(['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book  = $request->validated();
        $response = $this->bookRepo->storeBook($book);
        if (isset($response['id'])) {
            return redirect()->route('authors.show', ['author' => $request->author])->with(['success' => 'Book Created Successfully.']);
        }
        return redirect()->back()->with(['error' => 'Something Went Wrong']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookRepo->delete($id);
        return back()->with(['success' => 'Book Deleted Successfully.']);
    }
}
