<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Test;

// 隐式控制器
class TestController extends Controller {

    // Url:http://localhost/union_website/public/test/debug-output
	public function anyDebugOutput()
	{
        $test = new Test;
        echo $test->getAllUsers();
	}


}
