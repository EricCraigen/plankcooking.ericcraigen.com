<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model
{
    protected $fillable = [
        'orderCartId', 'status', 'notes', 'purchaseDate', 'history', 'taxes', 'orderTotal', 
        'shippingFirstName', 'shippingLastName', 'shippingAddress1', 'shippingAddress2', 'shippingCity', 'shippingState', 
        'shippingPostalCode', 'shippingPhone', 'shippingEmail', 'billingAddress1', 'billingAddress2', 'billingCity', 
        'billingState', 'billingPostalCode', 'uniqueIdentifier', 'websiteId', 'dateCreated', 'billingFirstName',
        'billingLastName', 'billingPhone', 'billingEmail', 'shippingCountry', 'billingCountry',
        'authorizationCode', 'transactionId', 'shippingValidation', 'shippingCost', 'shippingType', 'creditCardType'
    ];

    public $primaryKey = 'orderCartId';
    public $timestamps = false;
}
