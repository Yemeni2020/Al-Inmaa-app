<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        // Define an array to hold the URLs
        $urls = [
            [
                'loc' => url('/'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'loc' => url('/about'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => url('/contact'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
        ];

        // You can also add dynamic URLs, e.g., from the database
        // $brands = Brand::all();
        // foreach ($brands as $brand) {
        //     $urls[] = [
        //         'loc' => url('/brands/' . $brand->id),
        //         'lastmod' => $brand->updated_at->format('Y-m-d'),
        //         'changefreq' => 'monthly',
        //         'priority' => '0.5',
        //     ];
        // }

        return response()->view('sitemap.index', ['urls' => $urls])
                         ->header('Content-Type', 'text/xml');
    }
}
