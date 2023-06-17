<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $links = $user->links;

        view('user.link.index', [
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('user.link.create',[
            'user'=> $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request, User $user)
    {
        $user->links()->create($request->validated());

        return to_route('user.link.index', ['user' => $user])->withSuccess(__('link created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        return view('user.link.show',[
            'link'=> $link
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('user.link.edit',[
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
