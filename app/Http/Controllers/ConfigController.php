<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Requests\ConfigForm;
use Carbon\Carbon;
use App\Models\Products_type;
use App\Models\Product;
use App\Models\Person;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    public function config()
    {
        $ar_pida = Products_type::select('id')->get();
        foreach($ar_pida as $product_id) {
            break;
        };

        $people = Auth::user()->people()
        ->where('people.delflag', '0')
        ->get();

        return view('config/index', [
            'people' => $people,
            'product_id' => $product_id,
        ]);
    }

    public function config_edit(ConfigForm $request)
    {
        if(PostRequest::input('person_change')) {
            //担当者名変更
            $personData = Person::where('people.id', $request->change_person)->first();

            $personData->person_name = $request->change_personname;
            $personData->modified = Carbon::now();
            $personData->timestamps = false;
            $personData->save();

            return redirect()->route('config.index');

        }else if(PostRequest::input('person_delete')) {
            //担当者削除
            $personData = Person::where('people.id', $request->change_person)->first();

            $personData->delflag = '1';
            $personData->modified = Carbon::now();
            $personData->timestamps = false;
            $personData->save();

            return redirect()->route('config.index');

        }else if(PostRequest::input('person_new')) {
            //担当者の追加
            $person = new Person;
            $person->person_name = $request->newperson;
            $person->store_id = Auth::user()->id;
            $person->created = Carbon::now();
            $person->modified = Carbon::now();
            $person->delflag = '0';
            $person->timestamps = false;
            $person->save();

            return redirect()->route('config.index');
    
        };
    }
}
