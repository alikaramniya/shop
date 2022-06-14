<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        switch (request()->path()) {
            case 'dashboard' or Str::startsWith('admin/'):
                $this->sendLatestContactForAdminMaster();
                break;
        }
    }

    /**
     * Send $latestContact variable for master page in panel
     */
    private function sendLatestContactForAdminMaster()
    {
        View::composer('layouts.admin.master', function ($view) {
            $latestContact = Contact::where('state', 'unread')->oldest()->take(4)->get(['id', 'name']);

            $view->with([
                'latestContact' => $latestContact
            ]);
        });
    }

    /**
     * Send $listProduct variable for home page
     */
    public function sendListProductForWebsite()
    {
        /*
            View::composer('layout.master', function($view) {
                $listNewProducts = Product::oldest()->take(10)->get();

                $listBestProducts = Product::latest()->take(10)->get();

                $view->with([
                    'listNewProducts' => $listNewProducts,
                    'listBestProducts' => $listBestProducts,
                ]);
            });
        */
    }
}
