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
        $this->authorize('viewAny',[Link::class, $user]);

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
        $this->authorize('create',[Link::class, $user]);

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
            $fileData = $this->upload($file,$path,'image/');
        }

        $sort = Link::selectRaw("MAX(sort) as sort")->whereRelation('user', 'users.id', $user->id)->first()->sort + 1 ?? 1;

        $link = $user->links()->create([...$request->validated(),'image' => $fileData['fileName'], "sort" => $sort]);

        return to_route('user.link.index', ['user' => $user])->withSuccess(__('link created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        $this->authorize('view',$link);

        return view('link.show',[
            'link'=> $link
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        $this->authorize('update',$link);

        return view('link.edit',[
            'link'=> $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $fileData['fileName'] = $link->pure_image;

        if($file = $request->file('image')){
            $path = storage_path('public/image/');
            $this->delete($link->image_with_directory);
            $fileData = $this->upload($file,$path,'image/');

        }

        $link->update([...$request->validated(),'image' => $fileData['fileName']]);

        return to_route('user.link.index', ['user' => $link->user])->withSuccess(__('link updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $this->authorize('delete',$link);

        $this->delete($link->image_with_directory);
        $link->delete();

        return to_route('user.link.index', ['user' => $link->user])->withSuccess(__('link deleted successfully.'));
    }
}
