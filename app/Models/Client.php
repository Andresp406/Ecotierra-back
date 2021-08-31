<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Client extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'dni',
        'birth_date',
        'email',
//        'register_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'years',
        'full_name'
    ];

    protected $hidden = [
        'birth_date',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    //TODO Mutators models Client
    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function getYearsAttribute()
    {
        $birth_date = Carbon::createFromFormat('Y-m-d', $this->birth_date);
        return $birth_date->diffInYears(now());
    }
    //TODO Relations models Client

    public function r_sales()
    {
        return $this->hasMany(Sales::class, 'client_id', 'id');
    }
    //TODO Scopes models Client

    public function scopeSearch($query, $termino)
    {
        if($termino === '' || $termino === null) {
            return;
        }
        $query->where('first_name', 'like', "%{$termino}%")
            ->orWhere('last_name', 'like', "%{$termino}%");
    }
}
