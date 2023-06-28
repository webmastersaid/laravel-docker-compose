<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $download = Download::find(1);
        dump($download->name);
        dump($download->description);
        dump($download->url);
    }
}
