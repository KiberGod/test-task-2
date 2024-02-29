<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public static function getTasks($request)
    {
        $type = $request->type ?? 'created_at';
        $growth = $request->growth ?? 'desc';
        return Auth::user()->tasks()->orderBy($type, $growth)->paginate(10);
    }

    public static function getFilterParams($request) {
        return [
            'sortingType' => $request->filled('type') ? $request->type : 'created_at',
            'sortingGrowth' => $request->filled('growth') ? $request->growth : 'desc',
        ];
    }
}
