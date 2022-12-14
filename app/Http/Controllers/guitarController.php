<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitars;

class guitarController extends Controller
{

    private static function getData(){
        return [
            ['id'=> 1, 'name' => 'American Standard', 'brand' => 'Fender'],
            ['id'=> 2, 'name' => 'Starla S2', 'brand' => 'PRS'],
            ['id'=> 3, 'name' => 'Explorer', 'brand' => 'Gibson'],
            ['id'=> 4, 'name' => 'Talman' ,'brand' => 'Ibanez'],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        return view ('guitars.index', [
            'guitars' => Guitars::all(),
            'usersInput' => '<script>alert"Hello"</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view ('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'guitar-name' => 'required',
            'brand' => 'required',
            'year' => ['required', 'integer'],
        ]);


        //POST
        $guitar = new Guitars();

        $guitar->name = strip_tags($request->input('guitar-name'));
        $guitar->brand = strip_tags($request->input('brand'));
        $guitar->year_made = strip_tags( $request->input('year'));

        $guitar->save();

        return redirect()->route('guitars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($guitar)
    {
        //GET
        return view ('guitars.show', [
          'guitar' => Guitars::findorfail($guitar)
        ]);
        


    //     $guitars = self::getData();

    //     $index = array_search($guitar, array_column($guitars, 'id'));

    //     if ($index===false) {
    //         abort(404);

    //     }
    //        return view ('guitars.show', [
    //         'guitar' => $guitars[$index]

    //        ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($guitar)
    {
        return view ('guitars.edit', [
            'guitar' => Guitars::findorfail($guitar)
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guitar)
    {
        //POST
        $request-> validate([
            'guitar-name' => 'required',
            'brand' => 'required',
            'year' => ['required', 'integer'],
        ]);


        //POST
        $record = Guitars::findorfail($guitar);

        $record->name = strip_tags($request->input('guitar-name'));
        $record->brand = strip_tags($request->input('brand'));
        $record->year_made = strip_tags( $request->input('year'));

        $record->save();

        return redirect()->route('guitars.show', $guitar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
