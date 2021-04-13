<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


//使うClassを宣言:自分で追加
use App\Book;   //Bookモデルを使えるようにする
use Validator;  //バリデーションを使えるようにする
use Auth;       //認証モデルを使用する

class BooksController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $authUserId = Auth::user()->id;
        $books = Book::where('user_id', $authUserId)
            ->orderBy('created_at', 'asc')
            ->paginate(3);
        return view('books', compact('books'));
    }

    public function booksedit($book_id) {
        $book = Book::where('user_id', Auth::user()->id)->find($book_id);
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        return view('booksedit', compact('book'));
    }

    public function update(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'published' => 'required',
        ]); 
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        // データ更新
        $books = Book::where('user_id', Auth::user()->id)->find($request->id);
        $books->item_name   = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published   = $request->published;
        $books->save();
        return redirect('/');
    }

    public function delete(Book $book) {
        $book->delete();
        return redirect('/');
    }

    public function store(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
                'item_name' => 'required|min:3|max:255',
                'item_number' => 'required|min:1|max:3',
                'item_amount' => 'required|max:6',
                'published' => 'required',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
        }
        $file = $request->file('item_img');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();
            $move = $file->move('./upload/', $filename);
        }else{
            $filename = '';
        }
        // Eloquentモデル（登録処理）
        $books = new Book;
        $books->user_id = Auth::user()->id;
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->item_img = $filename;
        $books->published = $request->published;
        $books->save();
        return redirect('/')->with('message', '本登録が完了しました');
    }
}
