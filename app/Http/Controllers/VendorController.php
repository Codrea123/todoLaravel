<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(){
        $vendors = Vendor::all(); //IAU TOTI VENDORII
        return view('vendors.index')->with([ //RETURNEZ PAGINA DE BLADE SI TRIMIT VARIABILA VENDORS PAGINII
            'vendors'=>$vendors
        ]);
    }

    public function create(){
        return view('vendors.create');
    }

    public function store(VendorRequest $request){
        $vendor = new Vendor();
        $vendor->name  = $request->get('name');
        $vendor->email = $request->get('email');
        $vendor->save();

        return redirect()->route('vendors.index');
    }

    public function edit(Vendor $vendor){
        return view('vendors.edit')->with([
            'vendor' => $vendor,
        ]);
    }

    public function update(VendorRequest $request, Vendor $vendor) {
        $vendor->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        return redirect()->back();
    }

    public function destroy(Vendor $vendor){
        $vendor->delete();
        return redirect()->back();
    }

//    user intra pe <url>/vendors/store
//        -> se creeaza un request http de tip POST cu mai multe informatii stocate in el (relevante sunt payload mostly [adica datele pe care le trimite din frontend])
//          -> captezi requestul din VendorRequest in metoda de store
//           -> accessezi datele din request cu $request->get('numecamp')


}
