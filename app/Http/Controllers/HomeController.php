<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;
use App\Models\Category;

class HomeController extends Controller
{    
    public function index()
    {
        $news = News::with(['category'])->latest()->get();

        // // Get categories by name
        // $storiesCategory = Category::where('name', 'stories')->first();
        // $travelingCategory = Category::where('name', 'traveling')->first();
        // $foodsCategory = Category::where('name', 'foodss')->first();

        // // Get news based on the categories
        // $editorChoiceMain = News::where('category_id', $storiesCategory->id)->latest()->first();
        // $editorChoiceNews = News::where('category_id', $storiesCategory->id)->latest()->take(5)->get();

        // $travelingMain = $travelingCategory ? News::where('category_id', $travelingCategory->id)->latest()->first() : null;
        // $travelingNews = $travelingCategory ? News::where('category_id', $travelingCategory->id)->latest()->take(5)->get() : collect();

        // $foodsMain = $foodsCategory ? News::where('category_id', $foodsCategory->id)->latest()->first() : null;
        // $foodsNews = $foodsCategory ? News::where('category_id', $foodsCategory->id)->latest()->take(5)->get() : collect();

        $perPage = 6;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $news->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();

        return view('user.home', compact('news', 'paginatedNews', 'popularNews', 'categories'));
    }

    public function category($category)
    {
        $categoryModel = Category::where('name', $category)->firstOrFail();
        $paginatedNews = News::where('category_id', $categoryModel->id)->latest()->paginate(6);
        
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
    
        return view('user.category', compact('category', 'paginatedNews', 'popularNews', 'categories'));
    }
    
    public function detail($id)
    {
        $newsItem = News::with(['category'])->findOrFail($id);
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
        $relatedNews = News::where('category_id', $newsItem->category_id)->where('id', '!=', $id)->take(3)->get();

        return view('user.detail', compact('newsItem', 'popularNews', 'categories', 'relatedNews'));
    }
}