<?php

namespace App\Http\Controllers;


use App\Models\Company;
use Illuminate\Http\Request;

class ComponyCRUDController extends Controller
{
    //create index
    public function index()
{
    $data['companies'] = Company::orderBy('id', 'desc')->paginate();

    return view('companies.index', $data);
}

    // create resorce
    public function create(){
        return view('companies.create');
    }

}
