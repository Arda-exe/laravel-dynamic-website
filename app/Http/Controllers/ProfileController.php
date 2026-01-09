<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a user's public profile.
     */
    public function show(User $user): View
    {
        return view('profile.show', compact('user'));
    }

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
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    /**
     * Update the user's profile photo.
     */
    public function updatePhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'preset_photo' => 'nullable|string',
        ]);

        $user = $request->user();

        // If a preset photo is selected
        if ($request->filled('preset_photo')) {
            // Delete old custom photo if exists (don't delete presets)
            if ($user->photo && !str_starts_with($user->photo, 'images/')) {
                Storage::disk('public')->delete($user->photo);
            }
            
            $user->update(['photo' => $request->preset_photo]);
            return Redirect::route('profile.edit')->with('success', 'Profile photo updated successfully.');
        }

        // If a custom photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo if exists and it's not a preset
            if ($user->photo && !str_starts_with($user->photo, 'avatars/')) {
                Storage::disk('public')->delete($user->photo);
            }

            // Store new photo
            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->update(['photo' => $path]);
            
            return Redirect::route('profile.edit')->with('success', 'Profile photo updated successfully.');
        }

        return Redirect::route('profile.edit')->with('error', 'Please select a photo.');
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
