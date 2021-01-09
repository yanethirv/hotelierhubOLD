<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Product;
use App\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::where('status','active')->paginate(25);
        $coursesPurchased = [];
        if (auth()->check()) {
            $coursesPurchased = auth()->user()->coursesPurchased();
        }
        return view("shop.index", compact("products", "coursesPurchased"));
    }

    public function addToCart(int $id) {
        try {
            $product = Product::findOrFail($id);
            $cart = new Cart;
            $cart->addProduct($product);

            $status = 'success';
            $content = __("Service added to the cart correctly");
            return back()->with('process_result',['status' => $status, 'content' => $content]);
        } catch (\Exception $exception) {

        }
    }

    public function deleteFromCart(int $id){
        try {
            $product = Product::findOrFail($id);
            $cart = new Cart;
            $cart->removeProduct($product->id);

            $status = 'success';
            $content = __("Service correctly removed from cart");
            return back()->with('process_result',['status' => $status, 'content' => $content]);
        } catch (\Exception $exception) {

        }
    }

    public function create()
    {
        $types = Type::all();

        return view('livewire.admin.products.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'type_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'document' => 'required|file|max:5000|mimes:pdf'
        ]);

        $status = 'success';
        $content = 'Product Created!';

        $input = $request->all();

        $file = $request->file('document');
        $ruta = public_path() . '/upload';
        //$fileName = uniqid() . $file->getClientOriginalName();
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->move($ruta, $fileName);
        
        //$product = Product::create($input);

        $valor = $request->get('type_id');
        $typeName = Type::select('name')
                        ->where('id', '=', $valor)
                        ->get();


        $product = new Product([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'cost' => $request->get('cost'),
            'type_id' => $request->get('type_id'),
            'type_name' =>  $typeName,
            'status' => $request->get('status'),
            'description' => $request->get('description'),
            'document' => $fileName
        ]);
        $product->save();

        return redirect('products')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $types = Type::all();

        return view('livewire.admin.products.edit', compact('product', 'types'));
    }

    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Product");

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'type_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'document' => 'file|max:5000|mimes:pdf'
        ]);


        $product = Product::findOrFail($id);
        //$product->update($input);

        $valor = $request->type_id;
        $typeName = Type::select('name')
                        ->where('id', '=', $valor)
                        ->get();

        $product->name  = $request->name;
        $product->price  = $request->price;
        $product->cost  = $request->cost;
        $product->type_id  = $request->type_id;
        $product->type_name  = $typeName;
        $product->status  = $request->status;
        $product->description  = $request->description;
        if($request->file('document')){
            $file = $request->file('document');
            $ruta = public_path() . '/upload';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($ruta, $fileName);
            $product->document  = $fileName;
        }
        
        $product->save();
        
        return redirect('products')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function viewDocument($id)
    {
        $data = Product::find($id);

        return view('livewire.admin.products.details', compact('data'));

    }

    public function downloadDocument($document)
    {

        return response()->download('upload/'.$document);

    }
}
