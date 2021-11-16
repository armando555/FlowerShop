<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\BillFile;

use App\Util\BillPdfFile;

class BillFileServiceProvider extends ServiceProvider

{

    /**

     * Register any application services.

     *

     * @return void

     */

    public function register()

    {

        $this->app->bind(BillFile::class, function () {

            return new BillPdfFile();
            //return new BillXlsxFile();
        });
    }
}
