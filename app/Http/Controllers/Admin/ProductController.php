<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\{
    ProductInsertRequest,
    ProductUpdateRequest
};
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\{
    CategoryRepository,
    ProductRepository,
    ColorRepository
};
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * model Product
     *
     * @var $product
     */
    private $product;

    /**
     * model Color
     *
     * @var $color
     */
    private $color;

    /**
     * model Category
     *
     * @var $category
     */
    private $category;

    public function __construct(ProductRepository $product, ColorRepository $color, CategoryRepository $category)
    {
        $this->middleware('auth');

        $this->product = $product;
        $this->color = $color;
        $this->category = $category;

        if (true) {} else {}
    }

    /**
     * Index method for get list products
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            'id', 'category_id', 'title',
            'price', 'image', 'count'
        ];
        $products = $this->product->getByColumn($columns);
        $products->load('category:id,title');

        $listSoftDeletedProduct = $this->product->haveSoftDeleted();

        return view('admin.product.list', compact('products', 'listSoftDeletedProduct'));
    }

    /**
     * List soft deleted product
     *
     * @param \Illuminate\Http\Response
     */
    public function listSoftDeletedProduct()
    {
        $products = $this->product->listSoftDeleted(true);

        // Redirect to list product if don't have softDeleted product
        if (!$products->count()) return to_route('product_list');

        return view('admin.product.listSoftDeleted', compact('products'));
    }

    /**
     * Search product by title or price
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

        $listSoftDeletedProduct = $this->product->haveSoftDeleted();

        if ($request->search == null) {
            $columns = [
                'id', 'category_id', 'title',
                'price', 'image', 'count'
            ];

            $products = $this->product->getByColumn($columns)->withQueryString();
        } else {
            $products = Product::search($request->search)->paginate()->withQueryString();

            if (!$products->count()) {
                session()->flash('search', 'notfound');
                session()->flash('message', 'برای مقداری که سرچ کردید هیچ موردی یافت نشد');
            }
        }

        return view('admin.product.list', compact('products', 'listSoftDeletedProduct'));
    }

    /**
     * Show form for create new product
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = $this->color->all();

        $conditions = [
            ['status', 'active'],
            ['cat_id', '!=', 0]
        ];
        $subCategory = $this->category
                            ->getByMultiColumn($conditions, ['id', 'title']);

        return view(
            'admin.product.create',
            compact('colors', 'subCategory')
        );
    }

    /**
     * Update method for update new product
     *
     * @param \App\Http\Requests\ProductUpdateRequest  $request
     * @param \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->toArray();

        if ($request->hasFile('image')) {
            // Delete file and folder for this product
            $this->product->deleteFileDirectory($product->image);

            $data['image'] = $this->product->uploader('product', $request->image);
        }

        $this->product->update($product, $data);

        return back()->with([
            'success' => true,
            'message' => 'پروفایل با موفقیت  به روز رسانی شد',
        ]);
    }

    /**
     * Soft delete method for remove one record by id
     *
     * @param \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteSoft(Product $product)
    {
        $this->product->delete($product);

        return back()->with([
            'success' => true,
            'message' => 'محصول به صورت موقت حذف شد'
        ]);
    }

    /**
     * Return the deleted product to the product list
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(int $id)
    {
        $this->product->restore($id);

        return back()->with([
            'success' => true,
            'message' => 'محصول با موفقیت برگشت خورد'
        ]);
    }
    /**
     * Force delete method for remove one record by id
     *
     * @param \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteForce(Product $product)
    {
        // Delete file and folder for this product
        $this->product->deleteFileDirectory($product->image);

        $this->product->deleteForceModel($product);

        return back()->with([
            'success' => true,
            'message' => 'محصول به صورت کامل حذف شد'
        ]);
    }
    /**
     * Delete method for remove one record by id force delete
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSoftDeleted(int $id)
    {
        $this->product->deleteSoftDeleted($id);

        return back()->with([
            'success' => true,
            'message' => 'محصول برای همیشه حذف شد'
        ]);
    }

    /**
     * Insert method for add new record
     *
     * @param \App\Http\Requests\ProductInsertRequest  $request
     * @param \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function insert(ProductInsertRequest $request, Product $product)
    {
        $data = $request->collect()
                        ->filter(function ($item, $key) {
                            return $key != 'colors';
                        })->toArray();

        $data['image'] = $this->uploadImage($request);

        $product = $this->product->insert($data);

        $product->colors()->attach($request->colors);

        return back()->with([
            'success' => 'Ok',
            'message' => 'محصول با موفقیت اضافه شد'
        ]);
    }

    /**
     * Edit method for show details
     *
     * @param \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // check product
        $colors = $this->color->all();

        $conditions = [
            ['status', 'active'],
            ['cat_id', '!=', 0]
        ];
        $subCategory = $this->category->getByMultiColumn($conditions, ['id', 'title']);

        if (true) {
        }

        return view(
            'admin.product.edit',
            compact('colors', 'product', 'subCategory')
        );
    }

    /**
     * UploadImage for upload image
     *
     * @param  $image
     * @return \Illuminate\Http\Response
     */
    private function uploadImage($request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid())
            return $this->product->uploader('product', $request->file('image'));
    }
}
