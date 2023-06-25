<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Helper\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    use ImageManager;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $path = storage_path('public/profiles/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        if($file = $request->file('image')) {
            $request->user()->image_with_directory && $this->delete($request->user()->image_with_directory);
            $fileData = $this->upload($file,$path,'profiles/');
            $fill =[...$request->validated(),'image' => $fileData['fileName']];
        }else{
            $fill = $request->validated();
        }

        $request->user()->fill($fill);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
