<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sentence
 *
 * @property int $id
 * @property int $project_id
 * @property int|null $user_id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sentence whereValue($value)
 * @mixin \Eloquent
 */
class Sentence extends Model
{
    protected $fillable = ['project_id', 'user_id', 'key', 'value'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
