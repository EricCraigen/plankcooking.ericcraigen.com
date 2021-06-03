<?php

namespace App\Http\Controllers;

use Session;
use App\OrderCart;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function getCartHomePage() {
        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();
        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", "=", $orderCartId);
        $products = Product::all();

        if ($orderCart['status'] == 1) {
            Session::regenerate();
        }

        return view("cart.cart", compact("orderItems", "products"), ["title" => "Shopping Cart | Plankcooking.com"]);
    }

    public function getCartCheckoutPage() {
        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();
        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", "=", $orderCartId);
        $products = Product::all();
        if ($orderCart['status'] == 1) {
            Session::regenerate();
        }

        return view("cart.cartcheckout", compact("orderItems", "products", "orderCart"), ["title" => "Shopping Cart | Plankcooking.com"]);
    }

    public function postRemoveFromCart(Request $request) {
        $orderItemIdRemove = $request->input("orderItemIdRemove");
        OrderItem::where("orderItemId", $orderItemIdRemove)->delete();

        $orderItemIdUpdate = $request->input("orderItemIdUpdate");
        $qty_input = $request->input("qty_input");
        if ($qty_input != null) {
            $this->validate($request, [
                "qty_input" => "required|numeric|min:0|not_in:0|between:0,99"
            ],
            [
                "qty_input.not_in" => "Please enter a Qty",
                "qty_input.required" => "Please enter a Qty",
                "qty_input.between" => "Qty between 1-99",
                "qty_input.numeric" => "Please enter a number"
            ]);
            
            $orderItem = OrderItem::all()->where("orderItemId", $orderItemIdUpdate)->first();

            $orderItem->qty = $qty_input;
            $orderItem->save();
        } 
        return redirect()->back();
    }

    public function postCheckout(Request $request) {
        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();
        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", "=", $orderCartId);
        $products = Product::all();

        if ($orderCart['status'] == 1) {
            Session::regenerate();
            return view("cart.cartpreview", compact("orderItems", "products", "orderCart"), ["title" => "Shopping Cart | Plankcooking.com"]);
        }

        $billingFirstName = $request->input("billingFirstName");
        $billingLastName = $request->input("billingLastName");
        $billingAddress1 = $request->input("billingAddress1");
        $billingAddress2 = $request->input("billingAddress2");
        $billingCity = $request->input("billingCity");
        $billingState = $request->input("billingState");
        $billingPostalCode = $request->input("billingPostalCode");
        $billingPhone = $request->input("billingPhone");
        $billingEmail = $request->input("billingEmail");
        $shippingFirstName = $request->input("shippingFirstName");
        $shippingLastName = $request->input("shippingLastName");
        $shippingAddress1 = $request->input("shippingAddress1");
        $shippingAddress2 = $request->input("shippingAddress2");
        $shippingCity = $request->input("shippingCity");
        $shippingState = $request->input("shippingState");
        $shippingPostalCode = $request->input("shippingPostalCode");
        $shippingPhone = $request->input("shippingPhone");
        $shippingEmail = $request->input("shippingEmail");
        $notes = $request->input("notes");

        $this->validate($request, [
            "billingFirstName" => "required",
            "billingLastName" => "required",
            "billingAddress1" => "required",
            "billingCity" => "required",
            "billingState" => "required",
            "billingPostalCode" => "required",
            "billingPhone" => "required",
            "billingEmail" => "required",
            "shippingFirstName" => "required",
            "shippingLastName" => "required",
            "shippingAddress1" => "required",
            "shippingCity" => "required",
            "shippingState" => "required",
            "shippingPostalCode" => "required",
            "shippingPhone" => "required",
            "shippingEmail" => "required",
        ],
        [
            "required" => "Please fill out this feild.",
        ]);

        $orderCart["billingFirstName"] = $billingFirstName;
        $orderCart["billingLastName"] = $billingLastName;
        $orderCart["billingAddress1"] = $billingAddress1;
        $orderCart["billingAddress2"] = $billingAddress2;
        $orderCart["billingCity"] = $billingCity;
        $orderCart["billingState"] = $billingState;
        $orderCart["billingPostalCode"] = $billingPostalCode;
        $orderCart["billingPhone"] = $billingPhone;
        $orderCart["billingEmail"] = $billingEmail;
        $orderCart["shippingFirstName"] = $shippingFirstName;
        $orderCart["shippingLastName"] = $shippingLastName;
        $orderCart["shippingAddress1"] = $shippingAddress1;
        $orderCart["shippingAddress2"] = $shippingAddress2;
        $orderCart["shippingCity"] = $shippingCity;
        $orderCart["shippingState"] = $shippingState;
        $orderCart["shippingPostalCode"] = $shippingPostalCode;
        $orderCart["shippingPhone"] = $shippingPhone;
        $orderCart["shippingEmail"] = $shippingEmail;
        $orderCart["notes"] = $notes;
        $orderCart->save();

        return view("cart.cartpreview", compact("orderItems", "products", "orderCart"), ["title" => "Shopping Cart | Plankcooking.com"]);
    }

    public function postCartReceiptPage(Request $request) {
        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();
        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", "=", $orderCartId);
        $products = Product::all();

        $orderTotal = $request->input("orderTotalInput");
        $taxes = $request->input("taxes");
        $shippingCostType = $request->input("shippingType");
        $shippingCostParcel = $request->input("shippingHandlingCostParcel");
        $shippingCostPriority = $request->input("shippingHandlingCostPriority");
        $cardType = $request->input("cardTypeSelect");
        $cardNumber = $request->input("creditCardNumber");
        $cardExpYear = $request->input("cardExpYear");
        $cardExpMonth = $request->input("cardExpMonth");
        $creditCardNumber = $request->input("creditCardNumber");
        $creditCardLastFour = substr($creditCardNumber, -4);

        $validator = Validator::make($request->all(),[
            "shippingType" => "required",
            "cardTypeSelect" => "required",
            "creditCardNumber" => "required",
            "cardExpMonth" => "required",
            "cardExpYear" => "required"
        ],
        [
            "shippingType.required" => "Please select a shipping type.",
            "cardTypeSelect.required" => "Please provide a credit card type.",
            "creditCardNumber.required" => "Please provide a valid credit card number.",
            "cardExpMonth.required" => "Please provide an expiration Month.",
            "cardExpYear.required" => "Please provide an expiration Year."
        ]);
        
        if ($validator->fails()) {
            return view("cart.cartpreview", compact("orderItems", "products", "orderCart"), ["title" => "Shopping Cart | Plankcooking.com"])->withErrors($validator);
        }

        $authorizationCode = base64_encode(random_bytes(10));
        $authorizationCode = substr($authorizationCode, 0, -2);
        $transactionId = $orderCart['shippingLastName'] . $orderCartId;
        $shippingValidation = 1;

        if ($shippingCostType == 1 ) {
            $orderCart["shippingCost"] = $shippingCostParcel;
        } else if ($shippingCostType == 2) {
            $orderCart["shippingCost"] = $shippingCostPriority;
        }

        $orderCart["orderTotal"] = $orderTotal;
        $orderCart["creditCardType"] = $cardType;
        $orderCart["shippingType"] = $shippingCostType;
        $orderCart["status"] = 1;
        $orderCart["purchaseDate"] = now();
        $orderCart["taxes"] = $taxes;
        $orderCart["shippingCountry"] = "US";
        $orderCart["billingCountry"] = "US";
        $orderCart["authorizationCode"] = $authorizationCode;
        $orderCart["transactionId"] = $transactionId;
        $orderCart["shippingValidation"] = $shippingValidation;

        $orderCart->save();

        return view("cart.cartreceipt", compact("orderItems", "products", "orderCart", "authorizationCode", "creditCardLastFour"), ["title" => "Shopping Cart | Plankcooking.com"]);
    }

}
