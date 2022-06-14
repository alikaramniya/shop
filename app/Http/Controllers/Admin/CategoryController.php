<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\{
    CategoryInsertRequest, 
    CategoryUpdateRequest
};
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CategoryController extends Controller
{
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->middleware('auth');

        $this->category = $category;
    }

    /**
     * Create method for show form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditions = [
            ['cat_id', 0],
            ['status', 'active']
        ];

        $mainCategory = $this->category->getByMultiColumn($conditions, ['id', 'title']);

        return view('admin.category.create', compact('mainCategory'));
    }

    /**
     * Insert method for add new category
     *
     * @param \App\Http\Requests\CategoryInsertRequest $request
     * @return \Illuminate\Http\Response
     */
    public function insert(CategoryInsertRequest $request)
    {
        $requestCollect = $request->collect();
        $requestCollect->shift();

        $data = $requestCollect->toArray();

        $check = $this->category->getBy('title', $request->title);

        if (!$check->count()) $this->category->insert($data);

        return back()->with([
            'success' => $check->count() ? 'No' : 'Ok',
            'message' => $check->count() ? 'این دسته بندی قبلا اضافه شده است' : 'دسته بندی با موفقیت اضافه شد'
        ]);
    }

    /**
     * List of category
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();
        $categoryIds = Category::pluck('id');

        return view('admin.category.list', compact('categories', 'categoryIds'));
    }

    /**
     * Search category by title
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Validation for search input field is empty or not
        $request->validate([
            'search' => 'nullable|string|max:20'
        ]);

        if ($request->search == null) {
            $categories = $this->category->paginate()->withQueryString();
        } else {
            $categories = Category::search($request->search)->paginate()->withQueryString();
            if (!$categories->count()) {
                session()->flash('search', 'notfound');
                session()->flash('message', 'برای مقداری که سرچ کردید هیچ موردی یافت نشد');
            }
        }
        return view('admin.category.list', compact('categories'));
    }

    /**
     * Delete category and all list subcategory
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        $category->cats()->delete();

        $this->category->delete($category);

        return back()->with([
            'success' => true,
            'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    /**
     * Edit method for show detail one category
     *
     * @param \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $mainCategory = Category::whereCatId(0)
            ->where('status', 'active')
            ->select('id', 'title')
            ->get();

        return view('admin.category.edit', compact('mainCategory', 'category'));
    }

    /**
     * Update method or edit one category according id
     *
     * @param \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->category->update($category, $request->toArray());

        return back()->with([
            'success' => true,
            'message' => 'دسته بندی با موفقیت به روز رسانی شد'
        ]);
    }

    /**
     * Delete All category
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll($catIds)
    {
        $categoryIds = json_decode($catIds);
        Category::destroy($categoryIds);

        return back()->with([
            'success' => true,
           'message' => 'همه دسته بندی ها با موفقیت حذف شد'
        ]);
    }
}
