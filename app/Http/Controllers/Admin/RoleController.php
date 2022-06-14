<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleInsertRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Models\Role;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Get model role
     *
     * @var $role
     */
    private $role;

    /**
     * Get model Permission
     *
     * @var $permission
     */
    private $permission;

    public function __construct(RoleRepository $role, PermissionRepository $permission)
    {
        $this->middleware('auth');

        $this->role = $role;
        $this->permission = $permission;
    }
    /**
     * Index method for get list roles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount('permissions')->paginate();

        return view('admin.role.list', compact('roles'));
    }

    /**
     * Create method for show form add new role
     *
     * @return \Illuminate\Httpp\Response
     */
    public function create()
    {
        $condition = [['status', 'active']];
        $permissions = $this->permission
            ->getByMultiColumn($condition, ['id', 'title']);

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Insert method for add new role
     *
     * @param \App\Requests\RoleInsertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(RoleInsertRequest $request)
    {
        $role = $this->role->insert($request->toArray());

        is_null($request->permission_ids)
            ? $role->permissions()->detach([])
            : $role->permissions()->attach($request->permission_ids);

        return back()->with([
            'success' => 'Ok',
            'message' => 'نقش با موفقیت اضافه شد'
        ]);
    }

    /**
     * Delete method for remove one record
     *
     * @param \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete(Role $role)
    {
        $this->role->delete($role);

        return back()->with([
            'success' => 'Ok',
            'message' => 'نقش با موفقیت حذف شد'
        ]);
    }

    /**
     * Edit method for show detail one record
     *
     * @param \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $condition = [['status', 'active']];
        $permissions = $this->permission
            ->getByMultiColumn($condition, ['id', 'title']);

        $listPermissionRole = $role->permissions;

        return view('admin.role.edit', compact('role', 'permissions', 'listPermissionRole'));
    }

    /**
     * Update method for update one record
     *
     * @param \App\Models\Role $role
     * @param \App\Requests\RoleUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, RoleUpdateRequest $request)
    {
        $this->role->update($role, $request->toArray());

        $role->permissions()->sync($request->permission_ids);

        return back()->with([
            'success' => 'Ok',
            'message' => 'نقش با موفقیت به روز رسانی شد'
        ]);
    }

    /**
     * Update status
     *
     * @param int  $id
     * @param string  $status
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(int $id, string $status)
    {
        $role = Role::find($id);

        $this->role->update($role, ['status' => $status]);

        return back()->with([
            'success' => 'ok',
            'message' => 'وضعیت با موفقیت به روز رسانی شد'
        ]);
    }
}
