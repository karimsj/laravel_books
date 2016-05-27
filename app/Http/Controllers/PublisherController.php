<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;

use App\Http\Requests;

class PublisherController extends Controller
{
    /**
     * function for fetching all publishers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $publishers = Publisher::all();
        if(is_null($publishers)) {
            return response()->json(['message' => 'Not found']);
        }
        foreach($publishers as $key=>$publisher) {
            $books = $publisher->books;
            foreach($books as $bookKeys => $book) {
                $book->authors;
                $books[$bookKeys] = $book;
            }
            $publishers[$key] = $publisher;
        }
        return response()->json($publishers);
    }

    /**
     * function for getting publisher by an Id
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function get($id) {
        $publisher = Publisher::find($id);
        if(is_null($publisher)) {
            return response()->json(['message' => 'Not found']);
        }
        $books = $publisher->books;
        foreach($books as $bookKeys => $book) {
            $book->authors;
            $books[$bookKeys] = $book;
        }
        return response()->json($publisher);
    }

    /**
     * function for updating publisher name
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) {
        $publisher = Publisher::find($id);
        if(is_null($publisher)) {
            return response()->json(['message' => 'invalid request']);
        }
        $publisher->publisher_name = $request->input('publisher_name');
        $publisher->save();
        $books = $publisher->books;
        foreach($books as $bookKeys => $book) {
            $book->authors;
            $books[$bookKeys] = $book;
        }
        return response()->json(['message' => 'update successful', 'upated_data' => $publisher]);
    }

    /**
     * function for inserting new publisher
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request) {
        $publisher = new Publisher();
        $publisher->publisher_name = $request->input('publisher_name');
        $publisher->save();
        return response()->json($publisher);
    }

    /**
     * function for deleting a publisher
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id) {
        $publisher = Publisher::find($id);
        if(is_null($publisher)) {
            return response()->json(['message' => 'invalid request']);
        }
        $publisher->delete();
        return response()->json(['message' => 'delete successful']);
    }
}
