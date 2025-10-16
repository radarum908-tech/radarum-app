<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function index() {
        $news = News::latest()->paginate(10);
        return view('admin.tambah-berita', compact('news'));
    }

    public function create() {
        return view('admin.tambah-berita');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string|max:500',
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $news = new News();
        $news->title = $data['title'];
        $news->summary = $data['summary'] ?? '';
        $news->content = $data['content'];
        $news->status = 'published';
        $news->published_at = now();

        if ($request->hasFile('cover')) {
            $news->cover_path = $request->file('cover')->store('news-covers', 'public');
        }

        $news->save();

        return redirect()->route('admin')->with('success', 'Berita berhasil ditambahkan!');
    }
}
