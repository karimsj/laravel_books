<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * function for fetching all books
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $books = Book::all();
        if(is_null($books)) {
            return response()->json(['message' => 'Not found']);
        }
        foreach($books as $key=>$book) {
            $book->publisher;
            $book->authors;
            $books[$key] = $book;
        }
        return response()->json($books);
    }

    /**
     * function for fetching book with an id
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id) {
        $book = Book::find($id);
        if(is_null($book)) {
            return response()->json(['message' => 'Not found']);
        }
        $book->publisher;
        $book->authors;
        return response()->json($book);
    }

    /**
     * function for updating book name
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) {
        $book = Book::find($id);
        if(is_null($book)) {
            return response()->json(['message' => 'invalid request']);
        }
        $book->name = $request->input('name');
        $book->save();
        $book->publisher;
        $book->authors;
        return response()->json(['message' => 'update successful', 'upated_data' => $book]);
    }

    /**
     * function for inserting new book
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request) {
        $book = new Book();
        $book->name = $request->input('name');
        $book->publish_date = $request->input('publish_date');
        $book->edition = $request->input('edition');
        $book->isbn_10 = $request->input('isbn_10');
        $book->isbn_13 = $request->input('isbn_13');
        $book->publisher_id = $request->input('publisher_id');
        $book->save();
        $book->authors()->attach($request->input('author_id'));
        $book->authors;
        $book->publisher;
        return response()->json($book);
    }

    /**
     * function for deleting a book
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id) {
        $book = Book::find($id);
        if(is_null($book)) {
            return response()->json(['message' => 'invalid request']);
        }
        $book->delete();
        return response()->json(['message' => 'delete successful']);
    }
}
