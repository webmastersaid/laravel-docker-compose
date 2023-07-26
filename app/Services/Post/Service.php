<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{

    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);
            $tagIds = $this->getTagsIdsStore($tags);
            $data['category_id'] = $this->getCategoryIdStore($category);
            $post = Post::create($data);
            $post->tags()->withTimestamps()->attach($tagIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return $post;
    }

    public function update(Post $post, array $data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);
            $tagIds = $this->getTagsIdsUpdate($tags);
            $data['category_id'] = $this->getCategoryIdUpdate($category);
            $post->update($data);
            $post->tags()->withTimestamps()->sync($tagIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return $post->fresh();
    }

    private function getCategoryIdStore($category)
    {
        $category = !isset($category['id']) ? Category::create($category) : Category::find($category['id']);
        return $category->id;
    }

    private function getTagsIdsStore($tags)
    {
        $tagsIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagsIds[] = $tag->id;
        }
        return $tagsIds;
    }

    private function getCategoryIdUpdate($category)
    {
        if (!isset($category['id'])) {
            $category = Category::create($category);
        } else {
            $curCat = Category::find($category['id']);
            $curCat->update($category);
            $category = $curCat->fresh();
        }
        return $category->id;
    }

    private function getTagsIdsUpdate($tags)
    {
        $tagsIds = [];
        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $curTag = Tag::find($tag['id']);
                $curTag->update($tag);
                $tag = $curTag->fresh();
            }
            $tagsIds[] = $tag->id;
        }
        return $tagsIds;
    }
}
