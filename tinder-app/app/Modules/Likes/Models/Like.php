<?php

namespace App\Modules\Likes\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  int $id
 * @property string name
 * @property string bio
 * @property array badges
 * @property array jobs
 * @property Carbon birthdayDate
 * @property int gender
 * @property array photos
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Like extends Model
{
    protected array $guarded = ['id'];
    protected array $casts = [
        'photos' => 'array',
        'birthdayDate' => 'date'
    ];
}
