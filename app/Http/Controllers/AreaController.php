<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = Area::all();
        return view('pages.areaTypeLocale.index', [
            "collection" => $area,
            "title" => "Knowledge areas",
            "create" => "/area/create",
            "show" => "/area/show/",
            "destroy" => "/area/destroy/",
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
            "update" => '/area/update/',
            "store" => '/area/store',
            "title" => "Knowledge area",
            "voltar" => "/areas"
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
        Area::create([
            'name' => $request->name,
        ]);

        return redirect('/areas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::find($id);
        return view('pages.areaTypeLocale.show', [
            'item' => $area,
            'title' => "Knowledge area",
            'voltar' => "/areas",
            'destroy' => "/area/destroy/",
            'edit' => "/area/edit/"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view('pages.areaTypeLocale.form', [
            "item" => $area,
            "update" => "/area/update/",
            "store" => "/area/store",
            "title" => "Knowledge area",
            "voltar" => "/areas"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "id" => 'required',
            "name" => 'required',
        ]);
        Area::find($request->id)->update([
            'name' => $request->name,
        ]);
        return redirect('/area/show/' . $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::find($id)->delete();
        return redirect('/areas');
    }
}
