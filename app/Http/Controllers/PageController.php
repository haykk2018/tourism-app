<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['lang'])) App::setLocale($_GET['lang']);
        $all_pages = Page::all();
        return view('page.show_all', ['pages' => $all_pages]);
    }

    public function dashboard()
    {
        $all_pages = Page::paginate(15);
        return view('dashboard', ['pages' => $all_pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('page.new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $page = new Page();
        $page->fill($request->validated());
        if ($request->hasFile('file')) {
            $stored_path = $request->file('file')->store('page-photos');
            $page->img_src = $stored_path;
        }
        $page->save();
        if ($request->category) {
            $page->refresh();
            $page->categories()->attach($request->category);
            $page->save();
        }
        return redirect('/view/' . $page->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $page = Page::findOrFail($id);
        return view('page.show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {

        $page = Page::findOrFail($id);
        $categories = Category::all();
        return view('page.edit', ['page' => $page, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request)
    {
        $page = Page::find($request->id);
        $page->fill($request->validated());
        if ($request->hasFile('file')) {
            $img_src = $request->file('file')->store('page-photos');
            $page->img_src = $img_src;
        }
        if ($request->category) {
            $page->categories()->detach();
            $page->categories()->attach($request->category);
        }
        $page->save();
        return redirect('/view/' . $request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Page::find($request->id)->delete();
        return redirect('/');
    }

    /**
     * Search
     */
    public function search(Request $request)
    {
        $search = trim($request->input('search'));

        $pages = $search != "" ?
            Page::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get() : null;

        return view('page.search', compact('pages'));
    }
}
