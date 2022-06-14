<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Http\Requests\Admin\PermissionInsertRequest;
use App\Http\Requests\Admin\PermissionUpdateRequest;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->middleware('auth');

        $this->permission = $permission;
    }

    /**
     * Index method for get list permissions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permission->paginate();

        return view('admin.permission.list', compact('permissions'));
    }

    /**
     * Create methdo for show form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Insert method for add new record in table
     *
     * @param \App\Models\Permission  $permission
     * @param \App\Http\Requests\PermissionInsertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(PermissionInsertRequest $request)
    {
        $this->permission->insert($request->toArray());

        return back()->with([
            'success' => true ,
            'message' => 'دسترسی با موفقیت اضافه شد'
        ]);
    }

    /**
     * Delete method for remove one record
     *
     * @param \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function delete(Permission $permission)
    {
        $this->permission->delete($permission); 

        return back()->with([
            'success' => true,
            'message' => 'دسترسی با موفقیت حذف شد'
        ]);
    }

    /**
     * Edit method for get one permission
     *
     * @param \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update method for update one record
     *
     * @param \App\Models\Permission  $permission
     * @param \App\Http\Requests\PermissionUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        $this->permission->update($permission, $request->toArray());

        return back()->with([
            'success' => 'Ok',
            'message' => 'دسترسی با موفقیت به روز رسانی شد'
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
        $permission = Permission::find($id);

        $this->permission->update($permission, ['status' => $status]);

        return back()->with([
            'success' => 'ok',
            'message' => 'وضعیت با موفقیت به روز رسانی شد'
        ]);
    }
}
