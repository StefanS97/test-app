<?php

namespace App\Services;

use App\Models\Tag;
use PDOException;

class TagService
{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function storeTag($data)
    {
        $tag = Tag::create([
            'name' => $data['tagName'],
        ]);

        return $tag;
    }

    public function updateTag(Tag $tag, $data)
    {
        $tag->name = $data['tagName'];
        $tag->save();

        return $tag;
    }

    public function deleteTag(Tag $tag)
    {
        try {
            $tag->delete();
            return true;
        } catch (PDOException $e) {
            report($e);
            return false;
        }
    }
}