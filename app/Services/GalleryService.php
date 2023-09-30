<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleryService
{
    /**
     * Pobiera tablice image_id z api
     */
    private function getImagesIdsFromApi(int $number): array
    {
        $images = Http::get('https://api.artic.edu/api/v1/artworks?fields=image_id&limit='.$number);

        $imageIds = array_column(array_filter($images->json()['data'], function ($item) {
            return $item["image_id"] !== null;
        }), "image_id");

        return $imageIds;
    }

    /**
     * Konwertuje do sepii
     */
    private function convertToSepia(string $image): void
    {
        $imageContent = Storage::disk('public')->get('tmp/' . $image);

        $img = Image::make($imageContent);
        $img->greyscale()->colorize(60, 40, 20)->brightness(-40);

        Storage::disk('public')->put('tmp/' . $image, (string)$img->encode());

        $img->destroy();
    }

    /**
     * Zapisuje zdjęcia do tmp
     */
    public function saveImages(int $quantity): void
    {
        $imageIds = $this->getImagesIdsFromApi($quantity);

        if(count($imageIds) > 0){
            foreach($imageIds as $image){
                $img = Http::get('https://www.artic.edu/iiif/2/' . $image . '/full/843,/0/default.jpg');
                $fileName = 'tmp_' . $image . '_' . time() . '.jpg';
                $image = Storage::disk('public')->put('tmp/' . $fileName, $img->body());
                $this->convertToSepia($fileName);
            }
        }
    }

    /**
     * Pobiera tablice z plikami z folderu tmp
     */
    public function getImages(): array
    {
        $files = Storage::disk('public')->files('tmp');

        return $files;
    }
}
