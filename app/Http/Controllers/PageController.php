<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('backend.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('backend.pages.create');
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('backend.pages.edit', compact('page'));
    }

    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('/backend/pages');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'text' => 'required',
        ]);

        $data = request()->all();
        $pages = new Page();
        $pages->title = $data['title'];
        $pages->slug = $data['slug'];
        $pages->text = $data['text'];
        $pages->save();
        return redirect('/backend/pages');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'text' => 'required',
        ]);

        $data = request()->all();
        $page = Page::find($data['id']);
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->text = $data['text'];
        $page->save();
        return redirect('/backend/pages');
    }
}
