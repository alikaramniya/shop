<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * List product for home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $listNewProducts = Product::whereHas('category', function (Builder $query) {
            $query->where('status', 'active')
                ->whereHas('subCat', function (Builder $query2) {
                    $query2->where('status', 'active');
                });
        })->orderBy('id')
            ->take(5)
            ->get();

        $listBestProducts = Product::whereHas('category', function (Builder $query) {
            $query->where('status', 'active')
                ->whereHas('subCat', function (Builder $query2) {
                    $query2->where('status', 'active');
                });
        })->orderByDesc('id')->take(5)->get();

        return view('welcome', compact('listNewProducts', 'listBestProducts'));
    }

    /**
     * Detail method for show details product
     *
     * @param \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function detail(Product $product)
    {
        $relatedProduct = $product->category->load('products')->products;
        $product->load('colors');

        $listCategory = Category::with('cats')->where([
            ['status', 'active'],
            ['cat_id', 0]
        ])->get();

        return view(
            'public.product.detail',
            compact('relatedProduct', 'product', 'listCategory')
        );
    }
}
