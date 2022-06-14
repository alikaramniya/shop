<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileInsertRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use App\Repositories\ProfileRepository;

class ProfileController extends Controller
{
    private $profile;

    public function __construct(ProfileRepository $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Edit profile
     *
     * @param \App\Models\Profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user->profile
            ? view('admin.profile.edit', ['user' => $user->load('profile')])
            : to_route('profile_create', compact('user'));
    }

    /**
     * Create method for show form
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('admin.profile.create', compact('user'));
    }

    /**
     * Insert method for add new profile for one user
     *
     * @param \App\Http\Requests\ProfileInsertRequest  $request
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function insert(ProfileInsertRequest $request)
    {
        // Uploader for upload image for profile
        if ($request->hasFile('image')) {
            $image = $this->profile->uploader('profile', $request->file('image'));
        }

        // replace new image uploaded url to data and remove _token from them
        $data = collect($request->all())
            ->forget(['image', '_token'])
            ->merge([
                'image' => isset($image) ? $image : null,
                'user_id' => auth()->user()->id,
            ])->toArray();

        $this->profile->insert($data);
        
        return to_route('profile_edit')->with([
            'success' => true,
            'message' => 'پروفایل با موفقیت برای شما ساخته شد'
        ]);
    }

    /**
     * Update method for insert new profile
     *
     * @param \App\Models\User  $user
     * @param \App\Http\Requests\ProfileUpdateRequest  $request
     */
    public function update(ProfileUpdateRequest $request, User $user)
    {
        // Check image selected or no and upload them
        if ($request->hasFile('image')) {
            // Delete old file and folder
            $this->profile->deleteFileDirectory($user->profile->image);

            $image = $this->profile->uploader('profile', $request->image);
        } else {
            $image = $user->profile->image;
        }

        // remove image key from the request and replace new image url and remove _method with _token
        $data = collect($request->all())
            ->forget(['image', '_method', '_token'])
            ->prepend($image, 'image')
            ->toArray();

        $user->profile()->update($data);

        return back()->with([
            'success' => 'ok',
            'message' => "پروفایل {$user->name} با موفقیت به روز رسانی شد"
        ]);
    }

    /**
     * Create method for show form for insert new profile
     *
     * @return \Illuminate\Http\Response
     */
    public function createProfile()
    {
        return view('admin.profile.create');
    }

    /**
     * Proifle edit method for show form for edit profile for one user and update it
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (is_null(auth()->user()->profile)) {
            return to_route('profile_create');
        }

        return view('admin.profile.edit', ['user' => auth()->user()->load('profile')]);
    }
}
