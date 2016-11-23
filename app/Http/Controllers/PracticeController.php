<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon;

use App\Book;

class PracticeController extends Controller
{
    
    public function example1() {
        return 'This is example 1';
    }

    public function example3() {
        echo \App::environment();
        echo 'App debug: '.config('app.debug');
    }

    public function example4() {
        # Use the QueryBuilder to get all the books
        $books = DB::table('books')->get();

        # Output the results
        foreach ($books as $book) {
            echo $book->title;
        }
    }

    public function example5() {
        # Use the QueryBuilder to insert a new row into the books table
        # i.e. create a new book
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'published' => 1925,
            'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
            'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
        ]);
    }

    public function example6() {

        # Instantiate a new Book Model object
        $book = new Book();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $book->title = 'Harry Potter';
        $book->author = 'J.K. Rowling';
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

        # Invoke the Eloquent save() method
        # This will generate a new row in the `books` table, with the above data
        $book->save();

        echo 'Added: '.$book->title;
    }

    public function example7(){
      $books = Book::all();

      # Make sure we have results before trying to print them...
      if(!$books->isEmpty()) {

          # Output the books
          foreach($books as $book) {
              echo $book->title.'<br>';
          }
      }
      else {
          echo 'No books found';
      }
    }


    public function example8(){
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        if($book) {
            return $book->title;
        }
        else {
            return 'Book not found.';
        }
    }
}
