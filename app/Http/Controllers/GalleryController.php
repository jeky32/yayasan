<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery items.
     */
    public function index(Request $request): View
    {
        $query = DB::table('gallery')
            ->leftJoin('locations', 'gallery.location_id', '=', 'locations.location_id')
            ->select(
                'gallery.*',
                'locations.location_name'
            )
            ->orderBy('gallery.upload_date', 'desc');

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('gallery.category', $request->category);
        }

        $items = $query->paginate(12);

        // Get categories for filter
        $categories = DB::table('gallery')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort();

        // Get featured galleries
        $featured = DB::table('gallery')
            ->where('is_featured', true)
            ->orderBy('display_order', 'asc')
            ->orderBy('upload_date', 'desc')
            ->limit(6)
            ->get();

        return view('gallery', compact('items', 'categories', 'featured'));
    }

    /**
     * Display gallery by category.
     */
    public function category(string $category): View
    {
        $items = DB::table('gallery')
            ->leftJoin('locations', 'gallery.location_id', '=', 'locations.location_id')
            ->select(
                'gallery.*',
                'locations.location_name'
            )
            ->where('gallery.category', $category)
            ->orderBy('gallery.upload_date', 'desc')
            ->paginate(12);

        $categoryName = ucfirst($category);

        return view('gallery.category', compact('items', 'category', 'categoryName'));
    }

    /**
     * Display single gallery item with all images.
     */
    public function show($id): View
    {
        $item = DB::table('gallery')
            ->leftJoin('locations', 'gallery.location_id', '=', 'locations.location_id')
            ->select(
                'gallery.*',
                'locations.location_name'
            )
            ->where('gallery.gallery_id', $id)
            ->first();

        if (!$item) {
            abort(404);
        }

        // Get related gallery items (same category)
        $related = DB::table('gallery')
            ->where('category', $item->category)
            ->where('gallery_id', '!=', $id)
            ->orderBy('upload_date', 'desc')
            ->limit(6)
            ->get();

        return view('gallery.show', compact('item', 'related'));
    }
}
