<?php

namespace App\Models;

use App\Http\Requests\FileRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public static function uploadFiles($request, $task)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('files', $fileName, 'public');
                $task->files()->create(['name' => $fileName]);
            }
        }
    }
}
