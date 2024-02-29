<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'execution_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public static function mergeRequestData($request)
    {
        $validatedData = $request->validated();

        if ($request->has('execution_status')) {
            return array_merge($validatedData, ['execution_status' => $request->execution_status]);
        }

        return $validatedData;
    }
}
