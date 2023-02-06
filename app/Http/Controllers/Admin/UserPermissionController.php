<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPermisson;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;

    }
    public function destroy($id)
    {

            //Logger
            $this->Logger->log('info', 'Eliminou uma permissão do  com o identificador ' . $id);

            UserPermisson::find($id)->delete();
            return redirect()->route('admin.user.index')->with('destroy', '1');
        }
}
