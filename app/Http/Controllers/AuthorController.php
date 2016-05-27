<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

use App\Http\Requests;

class AuthorController extends Controller
{
    /**
     * function for fetching all author
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $authors = Author::all();
        if(is_null($authors)) {
            return response()->json(['message' => 'Not found']);
        }
        foreach($authors as $key=>$author) {
            $books = $author->books;
            foreach($books as $bookKeys => $book) {
                $book->publisher;
                $books[$bookKeys] = $book;
            }
            $authors[$key] = $author;
        }
        return response()->json($authors);
    }

    /**
     * function for getting author by an Id
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function get($id) {
        $author = Author::find($id);
        if(is_null($author)) {
            return response()->json(['message' => 'Not found']);
        }
        $books = $author->books;
        foreach($books as $bookKeys => $book) {
            $book->publisher;
            $books[$bookKeys] = $book;
        }
        return response()->json($author);
    }

    /**
     * function for updating author first and last name
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) {
        $author = Author::find($id);
        if(is_null($author)) {
            return response()->json(['message' => 'invalid request']);
        }
        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');
        $author->save();
        $books = $author->books;
        foreach($books as $bookKeys => $book) {
            $book->publisher;
            $books[$bookKeys] = $book;
        }
        return response()->json(['message' => 'update successful', 'upated_data' => $author]);
    }

    /**
     * function for inserting new author
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request) {
        $author = new Author();
        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');
        $author->save();
        return response()->json($author);
    }

    /**
     * function for deleting an author
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id) {
        $author = Author::find($id);
        if(is_null($author)) {
            return response()->json(['message' => 'invalid request']);
        }
        $author->delete();
        return response()->json(['message' => 'delete successful']);
    }
}
