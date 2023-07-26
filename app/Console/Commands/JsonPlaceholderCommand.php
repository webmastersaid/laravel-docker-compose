<?php

namespace App\Console\Commands;

use App\Components\ImportDataHttpClient;
use App\Models\Post;
use Illuminate\Console\Command;

class JsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get posts from JSON Placeholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportDataHttpClient();
        $responce = $import->client->request('GET', 'posts');
        $data = json_decode($responce->getBody()->getContents());
        foreach ($data as $value) {
            Post::firstOrCreate(
                ['title' => $value->title],
                [
                    'title' => $value->title,
                    'description' => $value->body
                ]
            );
        }
    }
}
