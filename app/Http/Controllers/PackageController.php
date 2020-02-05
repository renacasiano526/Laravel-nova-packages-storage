<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Support\Str;
use App\Http\Resources\PackageDetailResource;

class PackageController extends Controller
{
    public function index()
    {
        return view('packages.index');
    }

    public function show($namespace, $name)
    {
        $query = Package::where('composer_name', $namespace.'/'.$name);

        if (auth()->user() && auth()->user()->isAdmin()) {
            $query = Package::withoutGlobalScopes()->where('composer_name', $namespace.'/'.$name);
        }

        $package = $query->firstOrFail();

        return view('packages.show')
            ->with('package', PackageDetailResource::from($package))
            ->with('screenshots', $package->screenshots);
    }

    public function showId(Package $package)
    {
        return redirect()->route('packages.show', [
            'namespace' => Str::before($package->composer_name, '/'),
            'name' => Str::after($package->composer_name, '/'),
        ]);
    }
}
