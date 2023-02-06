<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Classes\UserPermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeepBrandController extends Controller
{

    private $Logger;
    private $Permission;
    public function __construct()
    {
        $this->Logger = new Logger;
        $this->Permission = new UserPermission;
    }

    public function index()
    {


        $response['userPermissons']=$this->Permission->permission();
        $this->Logger->log('info', 'visualizou Lista de Marcas');
        return view('admin.keepBrand.list.index',$response);
    }


}
