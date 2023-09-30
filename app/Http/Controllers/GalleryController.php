<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\GetImagesRequest;
use App\Services\GalleryService;

class GalleryController extends Controller
{
    public function __construct(
        protected GalleryService $galleryService,
    ) {
    }

    public function index(): View
    {
        $images = $this->galleryService->getImages();

        return view('home', ['images' => $images]);
    }

    public function getImages(GetImagesRequest $request): RedirectResponse
    {
        $this->galleryService->saveImages($request->number);

        return redirect()->route('index');
    }
}
