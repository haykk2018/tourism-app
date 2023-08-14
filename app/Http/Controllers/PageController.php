<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_pages= Page::all();
        return view('page.show_all', ['pages' => $all_pages]);
    }

    public function dashboard()
    {
        $all_pages= Page::all();
        return view('dashboard', ['pages' => $all_pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $page = new Page();
        $page->fill($request->validated());
        $page->save();
        return redirect('/view/'.$page->id);
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
        return view('page.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request)
    {
        $page = Page::find($request->id)->fill($request->validated());
        $page->fill($request->validated());
        $page->save();
        return redirect('/view/'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Page::find($request->id)->delete();
        return redirect('/');
    }
}
