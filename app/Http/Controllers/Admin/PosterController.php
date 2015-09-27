<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\PosterFormFields;
use App\Http\Requests\PosterCreateRequest;
use App\Http\Requests\PosterUpdateRequest;
use App\Poster;

class PosterController extends Controller
{
    /**
     * Display a listing of the posters.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.poster.index')
            ->withPosters(Poster::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->dispatch(new PosterFormFields());

        return view('admin.poster.create', $data);
    }

    /**
     * Store a newly created Poster
     *
     * @param PosterCreateRequest $request
     */
    public function store(PosterCreateRequest $request)
    {
        $poster = Poster::create($request->posterFillData());
        $poster->syncTags($request->get('tags', []));

        return redirect()
            ->route('admin.poster.index')
            ->withSuccess('New Poster Successfully Created.');
    }

    /**
     * Show the poster edit form
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->dispatch(new PosterFormFields($id));

        return view('admin.poster.edit', $data);
    }

    /**
     * Update the Poster
     *
     * @param PosterUpdateRequest $request
     * @param int  $id
     */
    public function update(PosterUpdateRequest $request, $id)
    {
        $poster = Poster::findOrFail($id);
        $poster->fill($request->posterFillData());
        $poster->save();
        $poster->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Poster saved.');
        }

        return redirect()
            ->route('admin.poster.index')
            ->withSuccess('Poster saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $poster = Poster::findOrFail($id);
        $poster->tags()->detach();
        $poster->delete();

        return redirect()
            ->route('admin.poster.index')
            ->withSuccess('Poster deleted.');
    }
}
