<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProdRequest;
use App\Traits\UploadTrait;

class ProdController extends Controller
{

    use UploadTrait;

    private  $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;
        $products= $userStore->products()->paginate(3);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE cria formulários de registro (INSERIR REGISTROS)

        $categories = \App\Category::all(['id','name']);

        return  view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdRequest $request)
    {




        // STORE grava informações recebidas por requests
        // STORE   salva informações do formulário CREATE

         $data = $request->all();
         $categories =$request->get('categories',null);

        // $store = \App\Store::find($data['store']);
         $store = auth()->user()->store;
         $product=$store->products()->create($data);
         $product->categories()->sync($categories);

         if ($request->hasFile('photos')){
            // dd($request);
            $imagens = $this->imageUpload($request->file('photos'),'image');

            //inserção destas imagens na base / referências
             $product->photos()->createMany($imagens);
         }

         flash('produto criado com sucesso')->success();
         return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // SHOW apresenta informações
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        //EDITE materializa o formulário

        $categories = \App\Category::all(['id','name']);


        $product = $this->product->find($product);

        return view('admin.products.edit',compact('product','categories'))
;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdRequest $request, $product)
    {
        // UPDATE  atualiza o formulário
        // UPDATE  salvar request recebida do formulário EDIT.
        $data = $request->all();
        $categories =$request->get('categories',null);

                $product = $this->product->find($product);
                $product->update($data);

         if (!is_null($categories))
         $product->categories()->sync($categories);


        if ($request->hasFile('photos')){
            $imagens = $this->imageUpload($request->file('photos'),'image');
            //inserção destas imagens na base / referências
            $product->photos()->createMany($imagens);
        }




        flash('Atualizado com sucesso')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        //DESTROY   deleta dados através do filtro recebido.

        $product = $this->product->find($product);
        $product->delete();

        flash('REMOVIDO')->warning();
        return redirect()->route('admin.products.index');
    }
//
//    public function imageUpload(Request $request,$imageColumn)
//    {
//
//        $uploadImagens =[];
//
//        $imagens=$request->file('photos');
//        foreach ($imagens as $image){
//          $uploadImagens[]= [$imageColumn=>$image->store('products','public')];
//        }
//        return $uploadImagens;
//    }
}
