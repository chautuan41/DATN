<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function listComment(){
        $account = Account::all();
        $product = Product::all();
        $lsComment = Comment::all();
        $lsComment = DB::table('comments')->where('status','=','1')->get(); 
        return view('dashboard.comment.comment',compact('lsComment','account','product'));
    }

    public function listConfirmComment(){
        $account = Account::all();
        $product = Product::all();
        $lsComment = Comment::all();
        $lsComment = DB::table('comments')->where('status','=','0')->get(); 
        return view('dashboard.comment.confirm',compact('lsComment','account','product'));
    }

    public function confirmComment($id_comment){
        $comment = Comment::find($id_comment);
        $comment->status = 1;
        $comment->save();
        $lsComment = Comment::all();
        return redirect()->route('admin.listConfirmComment');
    }

    public function cancelComment($id_comment){
        $comment = Comment::find($id_comment);
        $comment->status = 0;
        $comment->save();
        $lsComment = Comment::all();
        return redirect()->route('admin.listComment');
    }

    public function hardDeleteCmt($id_comment){
        $comment = Comment::find($id_comment)->forceDelete();
        $lsComment = Comment::all();
        return redirect()->route('admin.listConfirmComment');
    }
    
    // public function searchComment(){
    //     $search_text=$_GET['query'];
    //     // $lsComment = Comment::where('comment','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
    //     $lsComment = Comment::where('comment','LIKE','%'.$search_text.'%')->get();
    //     if($lsComment == true){
    //         return view('dashboard.comment.comment',compact('lsComment'));
    //     }if($lsComment == false){
    //         return view('dashboard.comment.confirm',compact('lsComment'));
    //     }
    // }
}
