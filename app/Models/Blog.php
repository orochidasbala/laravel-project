<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{

    public $title, $slug, $body, $intro, $date;

    public function __construct($title, $slug, $body, $intro, $date)
    {
        $this->title = $title;
        $this->body = $body;
        $this->intro = $intro;
        $this->date = $date;
        $this->slug = $slug;
    }

    public static function all()
    {
        return collect(File::files(resource_path("blogs")))
            ->map(function ($file) {
                $obj = YamlFrontMatter::parseFile($file);
                return new Blog($obj->title, $obj->slug, $obj->body(), $obj->intro, $obj->date);
            })
            ->sortBy('date');
    }
    public static function find($slug)
    {
        $blogs = static::all();
        return $blogs->firstWhere("slug", $slug);
        // $path = resource_path("blogs/$slug.html");
        // if (!file_exists($path)) {
        //     return redirect("/");
        // }
        // return cache()->remember("posts.$slug", 120, function () use ($path) {
        //     return file_get_contents($path);
        // });
    }
    public static function findOrFail($slug)
    {
        $blog = static::find($slug);
        if(!$blog) {
            // abort(404);
            throw new ModelNotFoundException(); //forword to 404 page
        }
        return $blog;
    }
}
