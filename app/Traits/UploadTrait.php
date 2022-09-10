<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait
{

    public function imageUpload($imagens,$imageColumn=null)
    {

        $uploadImagens =[];

        if (is_array($imagens)){
            foreach ($imagens as $image){

                    $uploadImagens[] = [$imageColumn => $image->store('products', 'public')];

                }
            }else{

            $uploadImagens = $imagens->store('logo','public');

        }



        return $uploadImagens;
    }

}
