<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            Post::firstOrCreate(
                ["title" => $item['title']],
                [
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'image' => $item['image'],
                    'category_id' => $item['category'],
                ]
            );
        }
    }
}
