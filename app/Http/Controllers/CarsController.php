<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::latest()->paginate(10);

        return view('bbs.index', ['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            '제조회사'=>'required',  
            '자동차명'=>'required',
            '제조년도'=>'required',
            '가격'=>'required',
            '차종'=>'required',
            '외형'=>'required',
            '자동차 이미지'=>'required',
        ]);

        $input = $request->all();
        Car::create($input);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        // 그 놈을 상세보기 뷰로 전달한다
        return view('bbs.show', ['car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bbs.edit', ['car'=>Car::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            '제조회사'=>'required',  
            '자동차명'=>'required',
            '제조년도'=>'required',
            '가격'=>'required',
            '차종'=>'required',
            '외형'=>'required',
            // '자동차 이미지'=>'required',
        ]);

        
        $car = Car::find($id);

        $car->제조회사 = $request->제조회사;
        $car->자동차명 = $request->자동차명;
        $car->제조년도 = $request->제조년도;
        $car->가격 = $request->가격;
        $car->차종 = $request->차종;
        $car->외형 = $request->외형;

        $car->save();
        return redirect()->route('cars.show', ['car' => $car->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = car::find($id);
        $car->delete();
        return redirect()->route('cars.index');
    }
}
