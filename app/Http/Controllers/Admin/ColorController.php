<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\{
    ColorInsertRequest,
    ColorUpdateRequest
};
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Repositories\ColorRepository;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $color;

    public function __construct(ColorRepository $color)
    {
        $this->color = $color;
    }

    /**
     * Index method for show all record
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = $this->color->all();

        return view('admin.color.list', compact('colors'));
    }

    /**
     * Create method for show form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Insert method for add new color 
     *
     * @param \App\Http\Requests\ColorInsertRequest $request
     * @return \Illuminate\Http\Response
     */
    public function insert(ColorInsertRequest $request)
    {
        $hasRecord = Color::whereTitle($request->title)->doesntExist();

        if ($hasRecord) $this->color->insert($request->toArray());

        return match ($hasRecord) {
            true => back()->with([
                'success' => 'no',
                'message' => 'این رنگ قبلا اضافه شده است'
            ]),
            default => back()->with([
                'success' => 'ok',
                'message' => 'رنگ با موفقیت اضافه شد'
            ])
        };
    }

    /**
     * Edit method for show details one record
     *
     * @param \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update method for update one record
     *
     * @param \App\Models\Color  $color
     * @param \App\Http\Requests\ColorUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Color $color, ColorUpdateRequest $request)
    {
        $hasRecord = Color::whereTitle($request->title)->doesntExist();

        $this->color->update($color, $request->toArray());

        return back()->with([
            'success' => 'Ok'
        ]);
    }

    /**
     * Delete method for remove one record
     *
     * @param \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function delete(Color $color)
    {
        $this->color->delete($color);
        return back()->with([
            'success' => 'Ok',
            'message' => 'رنگ با موفقیت حذف شد'
        ]);
    }
}
