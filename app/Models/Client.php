<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Client extends Authenticatable implements HasMedia,MustVerifyEmail {

    use HasFactory, Notifiable, InteractsWithMedia,HasRoles;

    // $table->foreignId('industry_id')->constrained('industries')->onDelete('cascade');

    /**
     * Guard for the model
     *
     * @var string
    */
    protected $guard = 'clients';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'country',
        'zip',
        'company_size',
        'website',
        'facebook',
        'linkedin',
        'instagram',
        'youtube',
        'map',
        'industry_id',
        'is_company',
        'is_active',
        'is_decision_maker',
        'is_verified',
        'last_seen',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_seen' => 'datetime',
    ];

    // industry
    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    // services
    public function services(){
        return $this->hasMany(Service::class);
    }

    // subcategories
    public function subcategories(){
        return $this->belongsToMany(Subcategory::class, 'client_subcategory');
    }

    // batches
    public function batches(){
        return $this->hasMany(Batch::class);
    }

    // seats
    public function seats(){
        return $this->hasMany(Seat  ::class);
    }

    // portfolios
    public function portfolios(){
        return $this->hasMany(Portfolio::class);
    }

    // complains
    public function from_complains(){
        return $this->hasMany(Complain::class)->where('from_client_id', $this->id);
    }

    public function to_complains(){
        return $this->hasMany(Complain::class)->where('to_client_id', $this->id);
    }

    // demands
    public function from_demands(){
        return $this->hasMany(Demand::class,'from_client_id','id')->where('from_client_id', $this->id);
    }

    public function to_demands(){
        return $this->hasMany(Demand::class,'to_client_id','id')->where('to_client_id', $this->id);
    }

    // subscriptions
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    /**
     * Check if the client has an active subscription
     * Subscription must be active, paid, and not expired
     *
     * @return bool
     */
    public function hasActiveSubscription(){
        $subscription = $this->subscriptions()->where('is_active', true)->where('is_paid', true)->where('ends_at', '>', now())->exists();
        if($subscription){
            return 1;
        }else{
            return 0;
        }
    }
    /**
     * Register media collections for the client
     */
    public function registerMediaCollections(): void{
        $this->addMediaCollection('profile')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('company_documents')
            ->acceptsMimeTypes(['application/pdf', 'image/jpeg', 'image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
    }

}
