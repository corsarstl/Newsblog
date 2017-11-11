<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

//        $top5commentators =
//
//            dump(DB::table('posts as p')
//        ->select(
//        'p.title',
//        'cat.name as CategoryName',
//        'p.id as PostId',
//        DB::raw('COUNT(c.id) as CommentCoungit t'))
//        ->join('comments as c', 'p.id', '=', 'c.post_id')
//        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
//        ->groupBy('p.title', 'CategoryName', 'PostId')
//        ->orderBy('CommentCount', 'desc')
//        ->take(3)
//            ->toSql());

        $top5commentators = DB::table('users as u')
        ->select('u.name', DB::raw('COUNT(c.id) as CommentCount'))
        ->join('comments as c', 'u.id', '=', 'c.user_id')
        ->groupBy('u.name')
        ->orderBy('CommentCount', 'desc')
        ->take(5)
        ->get();

        $top3posts = DB::table('posts as p')
        ->select(
            'p.title',
            'cat.name as CategoryName',
            'p.id as PostId',
            DB::raw('COUNT(c.id) as CommentCount'))
        ->join('comments as c', 'p.id', '=', 'c.post_id')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->groupBy('p.title', 'CategoryName', 'PostId')
        ->orderBy('CommentCount', 'desc')
        ->take(3)
        ->get();

//        dd($top3posts);



//        SELECT
//P.title,
//  COUNT(C.ID) AS CommentCount
//FROM
//  `posts` AS P
//  INNER JOIN `comments` AS C ON P.id = C.post_id
//GROUP BY
//  P.title
//ORDER BY
//  COUNT(C.id) DESC
//LIMIT 3;
//

//      SELECT
//      U.name,
//          COUNT(C.id) AS CommentCount
//      FROM
//          `users` AS U
//          INNER JOIN `comments` AS C ON U.id = C.user_id
//      GROUP BY
//          U.name
//      ORDER BY
//          COUNT(C.id) DESC
//      LIMIT 5;
//
//        $top3posts = ;


        $latestPosts = Post::latest()
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

//        dd($top5commentators);

        return view('home.index', compact('categories', 'top5commentators', 'top3posts', 'posts', 'latestPosts'));
    }
}
