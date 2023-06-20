<?php

namespace App\Models;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Entity extends Model
{
    use HasFactory;
    protected $fillable = ['country', 'city', 'population', 'owner'];
    public $timestamps = false;
    public static function add_rec($input)
    {
        $model = new Entity($input);
        $model->owner = Auth::user()->id;
        $model->save();
    }
    public static function update_rec($input)
    {
        if (Auth::user()->mode == 'admin') // admin handle
        {
            $model = Entity::where('id', $input['id'])->first();
        }
        else
        {
            $model = Entity::where('id', $input['id'])->where('owner', Auth::user()->id)->first();
        }
        if ($model)
        {
            $model->country = $input['country'];
            $model->city = $input['city'];
            $model->population = $input['population'];
            $model->save();
        }
    }
    public static function drop_rec($input)
    {
        if (Auth::user()->mode == 'admin') // admin handle
        {
            $model = Entity::where('id', $input['id'])->first();
        }
        else
        {
            $model = Entity::where('id', $input['id'])->where('owner', Auth::user()->id)->first();
        }
        if ($model)
        {
            $model->delete();
        }
    }
}
