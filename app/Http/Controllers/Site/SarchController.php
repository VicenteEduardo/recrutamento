<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\DealsDay;
use App\Models\product;
use App\Models\publicity;
use Illuminate\Http\Request;

class SarchController extends Controller
{

    public function search(Request $request)
    {
        $validation = $request->validate([
            'nomeProduto' => 'required|min:3|max:255',
            'category' => 'required|min:3|max:255',

        ]);
        return redirect("/bebidas/{$request->nomeProduto}/{$request->category}");
    }



    public function show($drink, $category)
    {
        //
        try {

            if ($category == "all") {


                $response['publicity'] = publicity::orderBy('id', 'desc')->first();
                $response['products'] = product::where('name', 'LIKE', '%' . $drink . '%')->paginate(20);

                $response['latas'] = product::where('category', 'Latas')->count();
                $response['garrafas'] = product::where('category', 'Garrafas')->count();
                $response['cervejas'] = product::where('category', 'Cervejas')->count();
                $response['whisks'] = product::where('category', 'Whisks')->count();

                $response['dealsDays'] = DealsDay::with('products')->get();

                return view('site.search.index', $response);
            } else {

                $response['publicity'] = publicity::orderBy('id', 'desc')->first();
                $response['products'] = product::where('name', 'LIKE', '%' . $drink . '%')->where('category', '=', $category)->paginate(20);

                $response['latas'] = product::where('category', 'Latas')->count();
                $response['garrafas'] = product::where('category', 'Garrafas')->count();
                $response['cervejas'] = product::where('category', 'Cervejas')->count();
                $response['whisks'] = product::where('category', 'Whisks')->count();

                $response['dealsDays'] = DealsDay::with('products')->get();

                return view('site.search.index', $response);
            }
        } catch (\Throwable $th) {
            return redirect()->route('site.home');
        }
    }
}
