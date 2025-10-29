<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of news.
     */
    public function index(Request $request): View
    {
        $query = DB::table('news')
            ->where('status', 'Published')
            ->orderBy('publish_date', 'desc');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%');
            });
        }

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $items = $query->paginate(12);

        // Get categories for filter
        $categories = DB::table('news')
            ->where('status', 'Published')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort();

        return view('news.index', compact('items', 'categories'));
    }

    /**
     * Display the specified news article.
     */
    public function show($id): View
    {
        $item = DB::table('news')
            ->where('news_id', $id)
            ->where('status', 'Published')
            ->first();

        if (!$item) {
            abort(404);
        }

        // Increment view count
        DB::table('news')
            ->where('news_id', $id)
            ->increment('views');

        // Get related news (same category, exclude current)
        $relatedNews = DB::table('news')
            ->where('status', 'Published')
            ->where('category', $item->category)
            ->where('news_id', '!=', $id)
            ->orderBy('publish_date', 'desc')
            ->limit(4)
            ->get();

        // Get latest news for sidebar
        $latestNews = DB::table('news')
            ->where('status', 'Published')
            ->where('news_id', '!=', $id)
            ->orderBy('publish_date', 'desc')
            ->limit(5)
            ->get();

        return view('news.show', compact('item', 'relatedNews', 'latestNews'));
    }

    /**
     * Display news by category.
     */
    public function category(Request $request, string $category): View
    {
        $items = DB::table('news')
            ->where('status', 'Published')
            ->where('category', $category)
            ->orderBy('publish_date', 'desc')
            ->paginate(12);

        $categoryName = ucfirst($category);

        return view('news.category', compact('items', 'category', 'categoryName'));
    }
}
