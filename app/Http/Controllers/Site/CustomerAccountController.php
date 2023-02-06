<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\CustomerAccount;
use App\Models\province;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CustomerAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $response['provinces']=province::get();
        return view('site.customerAccount.create.index',$response);
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
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:40',
            'phone_number' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'nif' => 'required|string|max:255|unique:customer_accounts',
            'alvara' => 'required|mimes:jpg,png,jpeg,pdf',
            'password' => ['required', 'confirmed', Rules\Password::min(11)->mixedCase()->symbols()->numbers()],

        ]);

        if ($request->file('photo')) {
            $photo = '/storage/' . $request->file('photo')->store('users/employeers/photos');
        } else {
            $photo = '/dashboard/images/user.png';
        }



        $alvara = $request->file('alvara')->store('alvaras');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'photo' => $photo,
            'status' => "Aguardando Validação",
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

CustomerAccount::create([

    'phone_number' => $request->phone_number,
    'alvara' => $alvara,
    'nif' => $request->nif,
    'phone_number_secund' => $request->phone_number_secund,
    'fk_user_id'=> $user->id
]);


        return redirect()->route('login')->with('create', '1');
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
    public function edit($id)
    {
        //
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
        //
    }

}
