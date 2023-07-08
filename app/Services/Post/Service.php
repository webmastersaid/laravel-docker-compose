<?

namespace App\Services\Post;

use App\Models\Post;

class Service
{

    public function store(array $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->withTimestamps()->attach($tags);
    }

    public function update(Post $post, array $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->withTimestamps()->sync($tags);
    }

}
