<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Locale;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('pages.company.index', [
            "collection" => $companies,
            "title" => "Companies",
            "create" => "/company/create",
            "show" => "/company/show/",
            "searchName" => "/companies"

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Locale::all();
        return view('pages.company.form', [
            "update" => '/company/update/',
            "store" => '/company/store',
            "title" => "Company",
            "voltar" => "/companies",
            "locales" => $locales
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "locale_id" => 'required',
            "address" => 'required',
            "email" => 'required',
            "site" => 'required',
            "linkedin" => 'required'
        ]);
        Company::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'description' => $request->description,
            'address' => $request->address,
            'locale_id' => $request->locale_id,
            'contact' => $request->contact,
            'email' => $request->email,
            'site' => $request->site,
            'linkedin' => $request->linkedin
        ]);
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('pages.company.show', [
            'item' => $company,
            'voltar' => "/companies",
            'destroy' => "/company/destroy/",
            'edit' => "/company/edit/",
            "title" => "Company",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locales = Locale::all();
        $company = Company::find($id);
        return view('pages.company.form', [
            "item" => $company,
            "update" => "/company/update/",
            "store" => "/company/store",
            "title" => "Company",
            "voltar" => "/companies",
            "locales" => $locales
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "id" => 'required',
            "name" => 'required',
            "description" => 'required',
            "city" => 'required',
            "email" => 'required',
            "site" => 'required',
            "linkedin" => 'required'
        ]);
        Company::find($request->id)->update($request);
        return redirect('/company/show/' . $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect('/companies');
    }

    public function searchByName(Request $request)
    {
        if (!empty($request->name)) {
            $companies = Company::where('name', 'LIKE', "%" . $request->name . "%")->get();
            //dd($companies);
            return view('pages.company.index', [
                "collection" => $companies,
                "title" => "Companies",
                "create" => "/company/create",
                "show" => "/company/show/",
                "searchName" => "/companies"
            ]);
        } else {
            $companies = Company::all();
            return view('pages.company.index', [
                "collection" => $companies,
                "title" => "Companies",
                "create" => "/company/create",
                "show" => "/company/show/",
                "searchName" => "/companies"

            ]);
        }
    }
}
