<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('pages.areaTypeLocale.index', [
            "collection" => $types,
            "title" => "Internship types",
            "create" => "/type/create",
            "show" => "/type/show/",
            "destroy" => "/type/destroy/",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.areaTypeLocale.form', [
            "update" => '/type/update/',
            "store" => '/type/store',
            "title" => "Internship type",
            "voltar" => "/types"
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
        $request->validate([
            "name" => 'required',
        ]);
        Type::create([
            'name' => $request->name,
        ]);

        return redirect('/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::find($id);
        return view('pages.areaTypeLocale.show', [
            'item' => $type,
            'title' => "Internship type",
            'voltar' => "/types",
            'destroy' => "/type/destroy/",
            'edit' => "/type/edit/"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        return view('pages.areaTypeLocale.form', [
            "item" => $type,
            "update" => "/type/update/",
            "store" => "/type/store",
            "title" => "Internship type",
            "voltar" => "/types"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "id" => 'required',
            "name" => 'required',
        ]);
        Type::find($request->id)->update([
            'name' => $request->name,
        ]);
        return redirect('/type/show/' . $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::find($id)->delete();
        return redirect('/types');
    }
}
