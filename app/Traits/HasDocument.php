<?php

namespace App\Traits;
use App\Models\Document;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasDocument
{
//-------------------------DOCUMENTOS CRUD----------------------------------------
    public function storeDocument(UploadedFile $new_document, string $directory = 'contratos'){
        $document =new Document(['path' => $new_document -> store($directory, 'dropbox')]);
        $this -> document() -> save($document);
    }

    public function updateDocument(UploadedFile $new_document, string $directory = 'contratos')
    {
        $previous_document = $this->document;

        if($previous_document){

            $previous_document_path = $previous_document -> path;
            $previous_document -> path = $new_document -> store($directory, 'dropbox');
            $previous_document -> save();

            Storage::disk('dropbox') -> delete($previous_document_path);
        }
        else{
            $this->storeDocument($new_document, $directory);
        }
    }    

    private function deletePreviousDocument(string $previous_document)
    {
        Storage::disk('dropbox') -> delete($previous_document);
    }


//-----------------RELACION CON EL MODELO DOCUMENTABLE
    public function document(): MorphOne
    {
        return $this->morphOne(Document::class,'documentable');
    }  
}