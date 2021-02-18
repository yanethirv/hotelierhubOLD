<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'mobile', 'country', 'avatar', 'hostname', 'password', 'status', 'type', 'position_id', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function coursesPurchased() {
        $orders = $this
            ->orders()
            ->where("status", Order::SUCCESS)
            ->with("orderLines")
            ->get();
        $productIds = [];
        if ($orders->count()) {
            foreach ($orders as $order) {
                foreach ($order->orderLines as $orderLine) {
                    array_push($productIds, $orderLine->product_id);
                }
            }
        }
        return $productIds;
    }

    public function activationServices() {
        $activations = $this
            ->activations()
            ->where("status", "wait")
            ->orWhere("status", "review")
            ->orWhere("status", "process")
            ->orWhere("status", "active")
            ->orWhere("status", "inactive")
            ->get();
        $activationsIds = [];
        if ($activations->count()) {
            foreach ($activations as $activation) {
                array_push($activationsIds, $activation->product_id);
            }
        }
        return $activationsIds;
    }

    public function gcCaptures(){
        return $this->hasMany('App\Capturegc');
    }

    public static function userCount(){
        return User::count();
    }

    public function position(){
        return $this->hasOne(Position::class);
    }

    public function hotel(){
        return $this->hasOne(Hotel::class);
    }

    public function activations() {
        return $this->hasMany(Activation::class);
    }
}
