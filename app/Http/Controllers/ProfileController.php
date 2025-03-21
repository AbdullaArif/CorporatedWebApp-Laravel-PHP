<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\user;

class ProfileController extends Controller
{
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
        $request->user()->fill($request->validated());





        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

//image upload
        $id = Auth::user()->id;
        $info =User::find($id); 
        if($request->file('image')){
            $image = $request->file('image');
            $imageUrl= date('YmdHi').$image->getClientOriginalName();
            $image->Move(public_path('upload/admin'),$imageUrl);
            $info['image'] = $imageUrl;
        } 
        $info->save();

        $alertMessage =array(
            'bildirim'=>'Update Success.',
            'alert-type'=> 'success'
        );


        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated')->
        with($alertMessage);
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
               $alertMessage =array(
            'bildirim'=>'Delete Success!!',
            'alert-type'=> 'error'
        );
        return Redirect::to('/login')->with($alertMessage);
    }
}
