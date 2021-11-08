<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.plates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plate = new Plate();
        $categories = Category::all();
        return view('admin.plates.create', compact('plate', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data validation
        $request->validate([
            'name' => 'required|unique:plates|max:255',
            'image' => 'image|nullable',
            'price' => 'min:2|max:6'
        ]);

        // catch the request value
        $data = $request->all();

        // creation of a new plate instance
        $new_plate = new Plate();

        // fill the new instance with the request data
        $new_plate->fill($data);

        // saving the new instance
        $new_plate->save();

        // attach categories to plate
        if (array_key_exists('categories', $data)) $new_plate->categories()->attach($data['categories']);

        // showing the result
        return redirect()->route('admin.plates.show', $new_plate->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        // taking categories
        $categories = Category::all();

        // taking plate category Ids to verify who is checked
        $categoriesIds = $plate->categories->pluck('id')->toArray();

        return view('admin.plate.edit', compact('categoriesIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        // data validation
        $request->validate([
            //? AGGIUNGERE L'IGNORE DEL NOME
            // 'name' => 'required|unique:plates|max:255',
            'image' => 'image|nullable',
            'price' => 'min:2|max:6'
        ]);

        // catch all the data from the request
        $data = $request->all();

        // verifyng the checked categories
        if (!array_key_exists('categories', $data)) $plate->tags()->detach();
        else $plate->tags()->sync($data['tags']);

        // update 
        $plate->update($data);

        // result
        return view('admin.plates.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        // deleting plate method
        $plate->delete();

        // result
        return redirect()->route('admin.posts.index')->with('type', 'success')->with('msg', "$plate->title eliminato con successo");
    }
}
