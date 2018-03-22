<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders'; // Define the table name
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "orderid";
    protected $fillable = ['regno', 'regstate', 'custname',
    'custphone', 'vehbrand', 'vehmodel', 'vehyear', 'createddate',
    'orderstatus', 'serialno'];
}
