<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Requests\PageRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = Page::all();

        return view('pages.index', ['pages' => $page]);
    }


    public function store(PageRequest $request)
    {
        try {
            $data = $request->validated();
            $data['hobbies'] = json_encode($data['hobbies']);
            Page::create($data);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function edit(Page $page)
    {
        return view('pages.form', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        try {
            
            $data = $request->validated();
            $data['hobbies'] = json_encode($data['hobbies']);
            $page->update($data);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Page $page)
    {
        try {
            $page->delete();
            return redirect()->route('home');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
