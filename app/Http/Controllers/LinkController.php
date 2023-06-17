<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Helper\ImageManager;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

class LinkController extends Controller
{
    use ImageManager;
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $links = $user->links;

        return view('link.index', [
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('link.create',[
            'user'=> $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request, User $user)
    {
        $path = storage_path('public/image/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        if($file = $request->file('image')) {
            $fileData = $this->uploads($file,$path,'image/');
        }

        $order = Link::selectRaw("MAX(sort) as `order`")->whereRelation('user', 'users.id', $user->id)->first()->order + 1 ?? 1;
        
        $user->links()->create([...$request->validated(),'image' => $fileData['fileName'], "sort" => $order]);

        return to_route('user.link.index', ['user' => $user])->withSuccess(__('link created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        return view('link.show',[
            'link'=> $link
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('link.edit',[
            'link'=> $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update($request->validated());

        return to_route('user.link.index', ['user' => $link->user])->withSuccess(__('link updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('user.link.index', ['user' => $link->user])->withSuccess(__('link deleted successfully.'));
    }
}
