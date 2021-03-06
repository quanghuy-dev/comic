<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Comic;
use App\Models\Genres;
use App\Models\Author;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::latest()->paginate(10);
        return view('admin.comics.index', compact('comics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('get')){
            $genres = Genres::all();
            $authors = Author::all();
            return view('admin.comics.create', compact('genres', 'authors'));
        }
        $add_comic = [
            "title" => $request->title,
            "name" => $request->name,
            "content" => strip_tags($request->content),
            "slug" => STR::slug($request->name),
        ];
        if($request->fimage){
            $file = $request->fimage;
            $fileName = $file->getClientOriginalName();
            $pathName =  STR::random(5).'-'.date('his').'-'.STR::random(3).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/comics/', $pathName);
            $add_comic['image'] = $pathName; // check xem có ảnh ko rồi thêm vào biến add comic
        }
        $comic = Comic::create($add_comic);

        foreach ($request->authors as $author): // duyệt ra số tác giả đc thêm từ giao diện
            $authors = Author::create([
                    'name' => $author,
                    'slug' => STR::slug($author) 
            ]);
            $comic->authors()->attach($authors->id);
            // tạo vào bảng trung gian với id của author
        endforeach;

        $comic->genres()->attach($request->genres);
        // tạo vào bảng trung gian với id của genres
        return redirect()->route('admin.comics.index')->with('message', 'Add comic successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug="")
    {
        $comic = Comic::where('slug', $slug)->first();
        if ($comic) {
            $top_comics = Comic::limit(10)->get();
            return view('website.comic.index', compact('comic', 'top_comics'));
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $comic = Comic::findOrFail($id);
            $genres = Genres::all();
            $authors = Author::all();
            $prev = Comic::Where('id', '>', $id)->orderBy('id', 'DESC')->limit(1)->get();
            $next = Comic::Where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();
            return view('admin.comics.detail', compact('comic', 'genres', 'authors', 'next', 'prev'));
        }
        $comic = Comic::findOrFail($id);
        $comic->update(
            [
                'name' => $request->name,
                'title' => $request->title,
                'content' => $request->content,
                'status' => $request->status,
            ]
        );
        if($request->fimage){
            $file = $request->fimage;
            $fileName = $file->getClientOriginalName();
            $pathName =  STR::random(5).'-'.date('his').'-'.STR::random(3).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/comics/', $pathName);
            $comic->image= $pathName;
            $comic->save();
        }
        $comic->authors()->sync($request->authors);
        // cập nhật lại author 
        $comic->genres()->sync($request->genres);
        // cập nhật lại genres
        return redirect()->route('admin.comics.edit', $id)->with('message', 'Update comic successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('admin.comics.index')->with('message', 'Delete comic successfully');
    }
}
