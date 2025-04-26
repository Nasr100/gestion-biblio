<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\BooksCategories;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    function getBooksView(){
        $books=Book::with('categories')->orderBy('id','desc')->paginate(7);
        return view('pages.books.books',compact('books'));
    }
    function storeBook(Request $request){
        $request->validate([
            'title'=>'required|string',
            'edition'=>'required|integer',
            'isbn'=>'required|min:10|max:13',
            'author'=>'required|string',
            'pubYear'=>'required|max:4',
        ]);
        $tags=explode(',',$request->tags);
        // dd($tags);
            $book=new Book;
            $bookcat=new BooksCategories;;
            $book->Book_Name=$request->title;
            $book->Isbn=$request->isbn;
            $book->Author=$request->author;
            $book->Pub_Date=$request->pubYear;
            $book->Edition=$request->edition;
            $book->save();
            $book_id = Book::where('Book_Name', '=', $book->Book_Name)->value('id');

            foreach($tags as $tag){
                $categoryID=Category::where('Category_Name', '=', $tag)->value('id');
                $bookcat->book_id=$book_id;
                $bookcat->category_id=$categoryID;
                // dd($bookcat->category_id);
                DB::insert('insert into bookscategories (book_id, category_id) values (?, ?)', [$book_id, $categoryID]);
                // $bookcat->save();
            }
            return response()->json([
                'status'=>'success',
            ]);
     
    }

    function searchCategory(Request $request){
        $data=Category::where('Category_Name', 'like', '%'.$request->searchString.'%')->get();
        $output="";
        foreach($data as $row){
            $output .='
            <li><a class="dropdown-item searchli" href="#">'.$row->Category_Name.'</a></li>
            '; 
        }
        echo $output;
     }

     function updateBook(Request $request){
        $book=Book::find($request->id);
            $book->Book_Name=$request->title;
            $book->Isbn=$request->isbn;
            $book->Author=$request->author;
            $book->Pub_Date=$request->pubyear;
            $book->Edition=$request->edition;
            $book->save();
            
            return response()->json([
                'status'=>'success',
            ]);
     
     }

     function searchBook(Request $request){
        if($request->searchString==null){
            $books=Book::orderBy('id','desc')->paginate(7);
            return view('pages.books.searchPage',compact('books'))->render();
        }
        $books=Book::where('Book_Name','like','%'.$request->searchString.'%')
        ->orWhere('Author','like','%'.$request->searchString.'%')
        ->orWhere('Isbn','like','%'.$request->searchString.'%')
        ->orderBy('id','desc')->paginate(7);
        if($books->count() >=1){
            return view('pages.books.searchPage',compact('books'))->render();
        }else{
            return response()->json([
                'status'=>'nothing found'
            ]);
        }
     }
     
     function deleteBook(Request $request){
        Book::find($request->up_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
     }

     function pagination(){
        $books=Book::latest()->paginate(7);
        return view('pages.books.searchPage',compact('books'))->render();
     }
}
