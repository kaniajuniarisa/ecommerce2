<?php

namespace App\Http\Controllers;

use App\Models\Customer; 
use Illuminate\Http\Request;

class CustomerController extends Controller



{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(100);
        return response()->json([
            'data' => $customers
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category' => 'required',
        ]);
    
        // Proses upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    
        // Simpan ke database
        $customer = Customer::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'category' => $request->category,
        ]);
    
        return redirect('/admin/produk')->with('success', 'Produk berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $customer = Customer::findOrFail($id);
    return view('produk.show', compact('customer'));
}



   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $customer = Customer::findOrFail($id);

    // Validasi input
    $request->validate([
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Cek apakah user upload gambar baru
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $customer->image = $imageName;
    }

    // Update field lain
    $customer->name = $request->name;
    $customer->slug = $request->slug;
    $customer->description = $request->description;
    $customer->price = $request->price;
    $customer->category = $request->category;

    $customer->save();

    return redirect('/admin/produk')->with('success', 'Produk berhasil diupdate.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
    
        return redirect('/admin/produk')->with('success', 'Produk berhasil dihapus.');
    }
    

    public function adminIndex(Request $request)
    {
        $query = Customer::query();
    
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        $customers = $query->orderBy('created_at', 'desc')->paginate(10);
    
        return view('admin.index', compact('customers'));
    }
    
    public function create()
{
    return view('admin.create');
}

public function edit($id)
{
    $customer = Customer::findOrFail($id);
    return view('admin.edit', compact('customer'));
}


    

}
