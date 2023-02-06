<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\DealsDay;
use App\Models\FeatureProduct;
use App\Models\News;
use App\Models\product;
use App\Models\publicity;
use App\Models\Service;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['services']=Service::get();

            $response['slideshows'] = SlideShow::orderBy('id', 'desc')->get();

            $response['products']=product::get();

             $response['publicity']=publicity::orderBy('id', 'desc')->limit(3)->get();

             $response['publicit']=publicity::orderBy('id', 'asc')->limit(2)->get();

             $response['dealsDays']=DealsDay::with('products')->get();

             $response['FeatureProduct_first']=FeatureProduct::orderBy('id', 'asc')->with('products')->first();
             $response['FeatureProducts']=FeatureProduct::with('products')->orderBy('id', 'desc')->limit(4)->get();
             $response['news'] = News::where([['state', 'Autorizada']])->orderBy('id', 'desc')->limit(3)->get();

           /**categorias bebidas */

           $response['latas']=product::where('category','Latas')->get();

           $response['garrafas']=product::where('category','Garrafas')->get();
           $response['cervejas']=product::where('category','Cervejas')->get();


             return view('site.home.index',$response);
    }

}
