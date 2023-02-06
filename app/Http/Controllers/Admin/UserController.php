<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Classes\UserPermission;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use App\Models\UserPermisson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    private $Permission;
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
        $this->Permission = new UserPermission;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response['users'] =  User::get();;

        //Logger
        $this->Logger->log('info', 'Listou Utilizadores');
        $response['userPermissons'] = $this->Permission->permission();
        return view('admin.user.list.index', $response);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (Auth::user()->level != 'Administrador' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['logs'] = Log::where('USER_ID', $id)->orderBy('id', 'desc')->get();
            $response['user'] = User::find($id);

            //search permission user
            if (Auth::user()->level != 'Administrador') {
                $response['permisson'] = UserPermisson::where('fk_user', $id)->get();
            }


            //Logger
            $this->Logger->log('info', 'Visualizou um Utilizador com o identificador ' . $id);
            $response['userPermissons'] = $this->Permission->permission();
            return view('admin.user.details.index', $response);
        }
    }



  //search permission user
     public function permition($id){
        $response['permisson'] = UserPermisson::where('fk_user', $id)->get();
        $response['user'] = User::find($id);

          //Logger
          $this->Logger->log('info', 'Visualizou permissão do  Utilizador com o identificador ' . $id);
          $response['userPermissons'] = $this->Permission->permission();
          return view('admin.user.permiton.index', $response);
     }
    public function activity($id)
    {

        if (Auth::user()->level != 'Administrador' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['logs'] = Log::where('USER_ID', $id)->orderBy('id', 'desc')->get();

            //Logger
            $this->Logger->log('info', 'Visualizou as suas próprias actividades');
            $response['userPermissons'] = $this->Permission->permission();
            return view('admin.user.activity.index', $response);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['users'] =  User::where('level', '!=', 'Formador')->get();

        if (Auth::user()->level != 'Administrador' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['user'] = User::find($id);

            //Logger
            $this->Logger->log('info', 'Entrou em editar um Utilizador com o identificador ' . $id);
            $response['userPermissons'] = $this->Permission->permission();

            //search permission user
            if (Auth::user()->level != 'Administrador') {
                $response['maintainProduct'] = UserPermisson::where('namePermission', '=', 'Manter Produto')->where('fk_user', $id)->get();
                $response['keepBrand'] = UserPermisson::where('namePermission', '=', 'Manter Marcas')->where('fk_user', $id)->get();
                $response['maintainCategory'] = UserPermisson::where('namePermission', '=', 'Manter Categorias')->where('fk_user', $id)->get();
            }
            return view('admin.user.edit.index', $response);
        }
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
        if (Auth::user()->level != 'Administrador' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'level' => 'required|string|max:40',
                'email' => 'required|string|email|max:255',
                'password' => ['required', 'confirmed',  Rules\Password::min(11)->mixedCase()->symbols()->numbers()],
                'photo' => 'mimes:jpg,png,jpeg',
            ]);


            if ($request->file('photo')) {
                $photo = '/storage/' . $request->file('photo')->store('users/employeers/photos');
            } else {
                $photo = User::find($id)->photo;
            }

            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'password' => Hash::make($request->password),
                'photo' => $photo,

            ]);

            //Logger
            $this->Logger->log('info', 'Editou um Utilizador com o identificador ' . $id);
            $response['userPermissons'] = $this->Permission->permission();
            return redirect()->route('admin.user.index')->with('edit', '1');
        }
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
        $count = User::count();

        if ($count > 1) {
            //Logger
            $this->Logger->log('info', 'Eliminou um Utilizador com o identificador ' . $id);

            User::find($id)->delete();
            return redirect()->back()->with('destroy', '1');
        } else {
            return redirect()->back();
        }
    }
}
