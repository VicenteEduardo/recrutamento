<?php

namespace App\Http\Controllers\Site;

use App\Classes\Random;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

use App\Classes\Logger;

class CatController extends Controller
{




    private $random;

    private $Logger;



    public function __construct()
    {
        $this->random = new Random;
        $this->Logger = new Logger;
    }

    public function addCat($id, request $request)
    {

        /**buscar produt */
        $product =  product::find($id);
        if ($product) {
            /**buscar da sessº */

            $carrinho = session('cat', []);

            array_push($carrinho, $product);
            session(['cat' => $carrinho]);


            return redirect()->back();
        } else {

            return redirect()->route('site.home');
        }
    }

    public function show()
    {
        $carrinho = session('cat', []);
        $data = ['cat' => $carrinho];
        return view('site.cat.show.index', $data);
    }


    public function delete($id)
    {

        $carrinho = session('cat', []);
        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
        }

        session(['cat' => $carrinho]);
        $data = ['cat' => $carrinho];
        return view('site.cat.show.index', $data);
    }

    public function checkout(request $request)
    {

if(Auth()->user()->status=="Validado"){

        try {
            $contar = count(session('cat', []));
            if ($contar == 0) {
                return redirect()->route('site.home')->with('error_cat', '1');
            } else {

                $carrinho = session('cat', []);

                $response['code'] = $this->random->AlphaNumeric(6);


                //pegar id do pedido da compra
                $Order = Order::create([
                    'name' => "Encomenda" .  $response['code'],
                    'status' => 'aguardando-checkout',
                    'price' => $request->price,
                    'fk_user_id' => Auth()->user()->id,

                ]);

                //colocar dados do pedidos no item
                foreach ($carrinho as  $indice => $item) {
                    $OrderedItem = OrderedItem::create([
                        'fk_order_id' => $Order->id,
                        'fk_product_id' => $item->id,
                        'quantiy' => $request->quantify[$indice],
                        'price' => $item->price,

                    ]);
                }


                $response['orders'] = Order::where('fk_user_id', Auth()->user()->id)->orderBy('id', 'desc')->first();
                $response['OrderedItems'] = OrderedItem::with('products', 'orders')->where('fk_order_id', $response['orders']->id)->get();

                return view('site.cat.checkout.index', $response);
            }



        } catch (\Throwable $th) {
                //apagar sessão do carrinho
                session()->forget('cat');
            return redirect()->back()->with('error',1);
        }
    }
    else
    return redirect()->back()->with('errorValidade',1);

    }



    public function finalizePurchase(Request $request)
    {

        $contar = count(session('cat', []));
        if ($contar == 0) {
            return redirect()->route('site.home')->with('error_cat', '1');
        } else {

            $carrinho = session('cat', []);

            if ($file = $request->file('anexo')) {
                $status = "Em Validação";
                $file = $file->store('Orders');
            } else {

                $status = "Aguardando Pagamento";
                $file = null;
            }

            $response['code'] = $this->random->AlphaNumeric(6);

            //Cadastrar o status do pedido
            $order = Order::where('fk_user_id', Auth()->user()->id)->orderBy('id', 'desc')->first();
            Order::find($order->id)->update([
                'status' => $status,
                'location' => $request->location,
            ]);

            //apagar sessão do carrinho
            session()->forget('cat');
            $this->Logger->log('info', 'Solicitou um pedido da encomenda ' . $order->name);
            return redirect()->route('admin.oder.index')->with('create_order', '1');
        }
    }
}
