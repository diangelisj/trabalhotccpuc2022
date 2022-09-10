<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductPhoto;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {

        $photoName = $request->get('photoName');
        //buscar a foto no banco pelo nome unico

        //remover dos arquivos
        // remover a imagem do banco de dados

        if (Storage::disk('public')->exists($photoName)){
            Storage::disk('public')->delete($photoName);
        }
        $removePhoto = ProductPhoto::where('image',$photoName);
        $productId = $removePhoto->first()->product_id;

        $removePhoto->delete();

        flash('Removido com sucesso')->success();
        return redirect()->route('admin.products.edit',['product'=>$productId]);
    }
}
