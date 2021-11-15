<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface BillFile {

    public function generate($id, Request $request);

}