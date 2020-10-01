<?php

namespace App\Http\Controllers;

use App\Locale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = Locale::all();
        return view('pages.areaTypeLocale.index', [
            "collection" => $locales,
            "title" => "Locales",
            "create" => "/locale/create",
            "show" => "/locale/show/",
            "destroy" => "/locale/destroy/",
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
            "update" => '/locale/update/',
            "store" => '/locale/store',
            "title" => "Locale",
            "voltar" => "/locales"
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
        Locale::create([
            'name' => $request->name,
        ]);

        return redirect('/locales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locale = Locale::find($id);
        return view('pages.areaTypeLocale.show', [
            'item' => $locale,
            'title' => "Locale",
            'voltar' => "/locales",
            'destroy' => "/locale/destroy/",
            'edit' => "/locale/edit/"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $locale = Locale::find($id);
        return view('pages.areaTypeLocale.form', [
            "item" => $locale,
            "update" => "/locale/update/",
            "store" => "/locale/store",
            "title" => "Locale",
            "voltar" => "/locales"
        ]);
        //  return view('pages.locale.create', ["locale" => $locale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "id" => 'required',
            "name" => 'required',
        ]);
        Locale::find($request->id)->update([
            'name' => $request->name,
        ]);
        return redirect('/locale/show/' . $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Locale::find($id)->delete();
        return redirect('/locales');
    }
}
