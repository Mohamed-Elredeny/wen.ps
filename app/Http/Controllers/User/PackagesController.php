<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Packages;

class PackagesController extends Controller
{
    public function getAllPackages()
    {
        $packages = Packages::all();

        return view('site.packages')->with(['packages' => $packages]);
    }

    public function getPackageDetails($package_id){
          
          $package = Packages::whereId($package_id)->first();
       
          return view('site.package_details')->with(['package' => $package]);

    }

}
