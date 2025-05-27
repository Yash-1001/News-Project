<?php




namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        $categories = Category::all();

        return view('index', compact('articles', 'categories'));
    }

    public function byCategory($id)
    {
        $articles = Article::where('category_id', $id)->latest()->paginate(10);
        $categories = Category::all();

        return view('index', compact('articles', 'categories'));
    }
}
