<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\DealsDay;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\product;
use App\Models\publicity;
use Illuminate\Http\Request;

class ProdutController extends Controller
{
    public function index()
    {
        $response['produts']= product::paginate(20);
         $response['publicity']=publicity::orderBy('id', 'desc')->first();


          $response['latas']=product::where('category','Latas')->count();
           $response['garrafas']=product::where('category','Garrafas')->count();
           $response['cervejas']=product::where('category','Cervejas')->count();
           $response['whisks']=product::where('category','Whisks')->count();

           $response['dealsDays']=DealsDay::with('products')->get();

         return view('site.produt.all.index',$response);
    }


    public function show($title)
    {
       //

       try {
        $response['product'] = product::where('name', urldecode($title))->first();

        $response['OrderedItem'] = OrderedItem::where('fk_product_id', $response['product']->id)->count();

        $response['lasted'] = product::where('category',$response['product']->category)->orderBy('id', 'desc')->get();
        return view('site.produt.single.index', $response);
    } catch (\Throwable $th) {
        return redirect()->route('site.home');
    }
}

}
