<?php

class GalleryControl extends Controller
{
    public $galleryModel;
    public function __construct()
    {
        $this->galleryModel = $this->model('Gallery');
    }
    public function showGallery()

    {
        $galleryarray = $this->galleryModel->getAll();

        // creation array's items data:
        $data=
        [
            'galleryrow'    => $galleryarray
        ];
        
        // affichage sur le views, avec galleryrow:
        $this->view('gallery',$data);

    }

}