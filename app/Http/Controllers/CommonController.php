<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function seed($table){
        $obj = DB::table($table)->get();
        if(!empty($obj)){
            echo "DB::table('$table')->insert([<br>";
            foreach($obj as $x => $ob) {
                echo "[<br>";
                foreach($ob as $key=>$value){
                    $typ = gettype($value);
                    if($key != 'deleted_at' & $key != 'created_at' & $key != 'updated_at'){
                        if($typ == 'string'){
                            echo "'$key' => '$value',<br>";
                        }else{
                            echo "'$key' => $value,<br>";
                        }
                    }
                }
                echo "],<br>";
            }
            echo "]);<br>";
           
        }
    }
}
