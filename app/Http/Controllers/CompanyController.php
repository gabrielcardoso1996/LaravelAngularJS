<?php

namespace App\Http\Controllers;

use App\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        if ($request->has('title')) {
            return response()->json($users = DB::table('company')->where([['title', '=', $request->title],])->get());
        }        
    }

    public function category(Request $request)
    {       
        return response()->json($users = DB::table('category')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new CompanyModel;
        $company->title = $request->title;
        $company->phone = $request->phone;
        $company->adress = $request->adress;
        $company->cep = $request->cep;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->description = $request->description;                                             
        $company->category_id = $request->category_id;
        $company->save();
        return response()->json($company, 201)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyModel $companyModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyModel $companyModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyModel $companyModel, $id)
    {
        $company = CompanyModel::findOrFail($id);
        if(!$company) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }           
        $company->title = $request->title;
        $company->phone = $request->phone;
        $company->adress = $request->adress;
        $company->cep = $request->cep;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->description = $request->description;
        $company->save();
        return response()->json($company)->header('Content-Type', 'application/json');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyModel  $companyModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyModel $companyModel, $id)
    {
        $company = CompanyModel::findOrFail($id);
        if(!$company) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }   
        $company->delete();
    }

    public function __construct(){
      //  $this->middleware('auth', ['except' => ['index']]);
    }

}
