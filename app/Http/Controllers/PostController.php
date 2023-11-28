<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Breeds;
use App\Models\TypeOfPets;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\NotEqual;

class PostController extends Controller {
    // Post management view
    public function postManagementView() {
        return view('pages.postmanagement');
    }
}