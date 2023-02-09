<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $rules = [
        'name' => 'required|unique:items|string|max:255',
        'itemIconUrl' => 'required|string|max:255',
        'gameId' => 'required|exists:games,id|integer'
    ];

    /**
     * Get the validation rules that apply to the model.
     *
     * @return array
     */
    // public function rules()
    // {
    //     return [
    //         'name' => 'required|unique:items|string|max:255',
    //         'itemIconUrl' => 'required|string|max:255',
    //         'gameId' => 'required|exists:games,id|integer'
    //     ];
    // }
}
