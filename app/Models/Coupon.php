<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {
    use HasFactory;

    public static function findByCode($code) {
        return self::where('coupon_code', $code)->first();
    }
    public function discount($total) {
        if ($this->type == 'fixed') {
            return $this->amount;
        } elseif ($this->type == 'percent') {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }

    protected $fillable = [
        'coupon_code', 'amount', 'type', 'percent_off',
    ];
}
