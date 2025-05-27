<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class SourceController extends Controller
{
    public function bySource($id)
    {
        $articles = Article::where('source_id', $id)->latest()->paginate(10);
        $categories = Category::all();

        return view('index', compact('articles', 'categories'));
    }
}
