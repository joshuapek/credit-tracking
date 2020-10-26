<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('edit', ['companies' => Company::all()]);
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
    public function store()
    {
        //
        //dd(request());
        if(Auth::check()){
            $attributes = request()->validate(['companyName'=>'required',
                                                'salesPerson'=>'required']);
            Company::create(['companyName'=>$attributes['companyName'],
                                'salesPerson'=>$attributes['salesPerson'],
                                'creditTerm'=>request()->creditTerm,
                                'creditLimit'=>request()->creditLimit,
                                'status'=>request()->status]);
            return back()->with('success', 'Company created successfully');
        }
        else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Company::findOrFail($id);
        $companies = Company::all();
        return view('edit')->with('companies', $companies)->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $company = Company::findOrFail($id);
        $company->salesPerson = $request->get('salesPerson');
        $company->creditTerm = $request->get('creditTerm');
        $company->creditLimit = $request->get('creditLimit');
        $company->status = $request->get('status');
        $company->save();

        return back()->with('success', 'Company updated successfully');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('company.index')
            ->with('success', 'Company deleted successfully');

    }
}
