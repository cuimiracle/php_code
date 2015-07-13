<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test extends Model {

    public function getAllUsers()
    {
        $results = DB::select('select * from users where id = :id', ['id' => 1]);
        echo "<pre>";print_r($results);echo "</pre>";

        $results = DB::select('select * from users');
        echo "<pre>";print_r($results);echo "</pre>";
    }

}
