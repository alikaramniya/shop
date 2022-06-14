<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserResetPasswordRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $role;

    public function __construct(UserRepository $user, RoleRepository $role)
    {
        /* $this->middleware(['auth', 'is.banned']); */
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Index method for get lit user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isHaveSoftDeletedUser = $this->user->haveSoftDeleted();

        $users = $this->user->paginateWith(['profile'])->withQueryString();

        return view('admin.user.list', compact('users', 'isHaveSoftDeletedUser'));
    }

    /**
     * Search user by name or email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Validation for search input field is empty or not
        $request->validate([
            'search' => 'nullable|string|max:20',
        ]);

        $isHaveSoftDeletedUser = $this->user->haveSoftDeleted();

        if ($request->search == null) {
            $users = $this->user->paginateWith(['profile'])->withQueryString();
        } else {
            $users = User::search($request->search)->paginate()->withQueryString();
            $users->load('profile');
            if (!$users->count()) {
                session()->flash('search', 'notfound');
                session()->flash('message', 'برای مقداری که سرچ کردید هیچ موردی یافت نشد');
            }
        }

        return view('admin.user.list', compact('users', 'isHaveSoftDeletedUser'));
    }
    /**
     * Toggle banned user for ban or un ban user
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function toggleBanUser(User $user)
    {
        $data = $user->banned->value == 'no'
            ? $user->banned = 'yes'
            : $user->banned = 'no';

        $user->update(['banned' => $data]);

        return back();
    }

    /**
     * Ban user softDeleted
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function banUserSoftDeleted(int $id)
    {
        $user = User::onlyTrashed()->find($id);
        

        $user->banned->value == 'yes'
            ? User::onlyTrashed()->where('id', $id)->update(['banned' => 'no'])
            : User::onlyTrashed()->where('id', $id)->update(['banned' => 'yes']);

        return back()->with([
            'success' => 'ok',
            'message' => 'وضعیت با موفقیت به روز رسانی شد'
        ]);
    }
    /**
     * List user soft deleted
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserSoftDeleted()
    {
        $users = User::onlyTrashed()->paginate();
        $users->load('profile:user_id,image');

        return match(!!$users->count()) {
           true => view('admin.user.listSoftDeleted', compact('users')), 
           default => to_route('user_list')
        };
    }

    /**
     * Show profile user
     *
     * @param \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('profile');

        return $user->profile
            ? view('admin.user.show_profile', compact('user'))
            : back()->with([
                'success' => 'no',
                'message' => 'برای این کاربر پروفایلی یافت نشد'
            ]);
    }

    /**
     * edit for show details user
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $condition = [
            ['status', 'active']
        ];
        $roles = $this->role->getByMultiColumn($condition, ['id', 'title']);

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update info user
     *
     * @param model  $user
     * @param \App\Http\Requests\UserResetPassword  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserResetPasswordRequest $request, User $user)
    {
        $state = false;

        // If set password
        if ($request->password) {
            $user->password = Hash::make($request->password);

            $user->update(['logout' => true]);
            $state = true;
        }

        // If select role
        if ($request->role_ids) {
            $user->roles()->sync($request->role_ids);
            $state = true;
        }

        return match ($state) {
            true => back()->with([
                'success' => 'ok',
                'message' => 'به روز رسانی با موفقیت انجام شد'
            ]),
            false => back()
        };
    }

    /**
     * Restore method for return record 
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(int $id)
    {
        $this->user->restore($id);

        return back()->with([
            'success' => 'ok',
            'message' => 'کاربر با موفقیت برگشت خورد'
        ]);
    }

    /**
     * Delete the record that has been temporarily deleted
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSoftDeleted(int $id)
    {
        $this->user->deleteSoftDeleted($id);

        return back()->with([
            'success' => 'ok',
            'message' => 'کاربر برای همیشه پاک شد'
        ]);
    }

    /**
     * Soft delete user
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function softDelete(User $user)
    {
        $this->user->delete($user);

        return back()->with([
            'success' => 'ok',
            'message' => 'کاربر به صورت موقت حذف شد'
        ]);
    }

    /**
     * Delete force one user
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(User $user)
    {
        // Delete image profile for this user
        if ($user->profile)
            $this->user->deleteFile($user->profile->image);

        $this->user->deleteForceModel($user);

        return back()->with([
            'success' => 'ok',
            'message' => 'کاربر برای همیشه پاک شد'
        ]);
    }
}
