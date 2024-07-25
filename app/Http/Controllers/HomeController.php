<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;
use App\Models\Category;
use App\Models\Region;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::with(['category'])->latest()->get();

        // Get categories by name
        $featureCategory = Category::where('name', 'Stories')->first();
        $komunitasCategory = Category::where('name', 'komunitas')->first();
        $opiniCategory = Category::where('name', 'opini')->first();

        // Add checks to ensure categories are not null
        $editorChoiceMain = $featureCategory ? News::where('category_id', $featureCategory->id)->latest()->first() : null;
        $editorChoiceNews = $featureCategory ? News::where('category_id', $featureCategory->id)->latest()->take(5)->get() : collect();

        $komunitasMain = $komunitasCategory ? News::where('category_id', $komunitasCategory->id)->latest()->first() : null;
        $komunitasNews = $komunitasCategory ? News::where('category_id', $komunitasCategory->id)->latest()->take(5)->get() : collect();

        $opiniMain = $opiniCategory ? News::where('category_id', $opiniCategory->id)->latest()->first() : null;
        $opiniNews = $opiniCategory ? News::where('category_id', $opiniCategory->id)->latest()->take(5)->get() : collect();

        // // Get news based on the categories
        // $editorChoiceMain = News::where('category_id', $featureCategory->id)->latest()->first();
        // $editorChoiceNews = News::where('category_id', $featureCategory->id)->latest()->take(5)->get();

        // $komunitasMain = News::where('category_id', $komunitasCategory->id)->latest()->first();
        // $komunitasNews = News::where('category_id', $komunitasCategory->id)->latest()->take(5)->get();

        // $opiniMain = News::where('category_id', $opiniCategory->id)->latest()->first();
        // $opiniNews = News::where('category_id', $opiniCategory->id)->latest()->take(5)->get();

        $perPage = 6;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $news->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();

        return view('user.home', compact('news', 'paginatedNews', 'popularNews', 'categories', 'editorChoiceMain', 'editorChoiceNews', 'komunitasMain', 'komunitasNews', 'opiniMain', 'opiniNews'));
    }

    public function category($category)
    {
        $categoryModel = Category::where('name', $category)->firstOrFail();
        $paginatedNews = News::where('category_id', $categoryModel->id)->latest()->paginate(6);
        
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
    
        return view('user.category', compact('category', 'paginatedNews', 'popularNews', 'categories'));
    }
}
