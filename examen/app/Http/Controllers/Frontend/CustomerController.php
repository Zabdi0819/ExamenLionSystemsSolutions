<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('frontend.viewCustomer', compact('customers'));
    }

    public function insert(Request $request)
    {
        $customer = new Customer();
        $customer -> name = $request -> input('name');
        $customer -> last_name = $request -> input('last_name');
        $customer -> phone = $request -> input('phone');
        $customer -> email = $request -> input('email');
        $customer -> save();
        return redirect('customer') -> with('status', "Cliente agregado exitosamente");
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer = new Customer();
        $customer -> name = $request -> input('name');
        $customer -> last_name = $request -> input('last_name');
        $customer -> phone = $request -> input('phone');
        $customer -> email = $request -> input('email');
        $customer -> update();
        return redirect('customer')->with('status', "Cliente actualizado exitosamente");
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer -> delete();
        return redirect('customer')->with('status', "Cliente eliminado exitosamente");
    }
}
