<?php

namespace App\Http\Controllers;

use App\Services\GalleryService;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __construct(
        protected GalleryService $galleryService,
    ) {
    }

    public function index(): View
    {
        $this->galleryService->saveImages();
        $images = $this->galleryService->getImages();

        return view('home', ['images' => $images]);
    }
}
