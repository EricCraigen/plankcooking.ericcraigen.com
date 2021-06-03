<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use App\Product;
use App\OrderCart;
use App\OrderItem;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getShopHomePage() {
        return view("shop.shop", ['title' => 'Shop | Plankcooking.com']);
    }
    public function getSpiceRubsPage() {
        $sessionId = Session::getId();
        $category = Category::where("categoryId", 1)->first();
        $products = Product::all()->where("categoryId", 1)->sortBy('sortOrder');
        $sortOrder = 0;
        $qtyInputs = [];

        foreach ($products as $product) {
            $qtyInputs[] = "qty_input".$product['sortOrder'];
        }

        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();

        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", $orderCartId);

        if ($orderCart['status'] == 1) {
            Session::regenerate();
        }

        return view("shop.spicerubs", compact("category", "products", "sessionId", "orderItems", "sortOrder", "qtyInputs"), ['title' => 'Shop | Plankcooking.com']);
    }

    public function getCookbooksPage() {
        $sessionId = Session::getId();
        $category = Category::where("categoryId", 2)->first();
        $products = Product::all()->where("categoryId", 2)->sortBy('sortOrder');
        $sortOrder = 0;
        $qtyInputs = [];

        foreach ($products as $product) {
            $qtyInputs[] = "qty_input".$product['sortOrder'];
        }

        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();

        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", $orderCartId);

        if ($orderCart['status'] == 1) {
            Session::regenerate();
        }

        return view("shop.cookbooks", compact("category", "products", "sessionId", "orderItems", "sortOrder", "qtyInputs"), ['title' => 'Shop | Plankcooking.com']);
    }

    public function getBakingPlanksPage() {
        $sessionId = Session::getId();
        $category = Category::where("categoryId", 3)->first();
        $products = Product::all()->where("categoryId", 3)->sortBy('sortOrder');
        $sortOrder = 0;
        $qtyInputs = [];
        $resultsArray = [];
        $smallPlanksArray = [];
        $largePlanksArray = [];
        $alderPlanksArray = [];
        $plankCategoriesCtr = 2;

        foreach ($products as $product) {
            if ($product['sortOrder'] === 1) {
                array_push($smallPlanksArray, $product);
            }
            if ($product['sortOrder'] === 2) {
                array_push($smallPlanksArray, $product);
            }
            if ($product['sortOrder'] === 3) {
                array_push($largePlanksArray, $product);
            }
            if ($product['sortOrder'] === 4) {
                array_push($largePlanksArray, $product);
            }
            if ($product['sortOrder'] === 5) {
                array_push($alderPlanksArray, $product);
            }
            if ($product['sortOrder'] === 6) {
                array_push($alderPlanksArray, $product);
            }
        }

        array_push($resultsArray, $smallPlanksArray);
        array_push($resultsArray, $largePlanksArray);
        array_push($resultsArray, $alderPlanksArray);

        foreach ($products as $product) {
            $qtyInputs[] = "qty_input".$product['sortOrder'];
        }

        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();

        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", $orderCartId);

        if ($orderCart['status'] == 1) {
            Session::regenerate();
        }

        return view("shop.bakingplanks", compact("category", "products", "sessionId", "orderItems", "qtyInputs", "resultsArray"), ['title' => 'Shop | Plankcooking.com']);
    }

    public function getBBQPlanksPage() {
        $sessionId = Session::getId();
        $category = Category::where("categoryId", 4)->first();
        $products = Product::all()->where("categoryId", 4)->sortBy('sortOrder');
        $sortOrder = 0;
        $qtyInputs = [];

        foreach ($products as $product) {
            $qtyInputs[] = "qty_input".$product['sortOrder'];
        }

        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();

        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", $orderCartId);

        if ($orderCart['status'] == 1) {
            Session::regenerate();
        }

        return view("shop.bbqplanks", compact("category", "products", "sessionId", "orderItems", "sortOrder", "qtyInputs"), ['title' => 'Shop | Plankcooking.com']);
    }

    public function getNutDriverPage() {
        $sessionId = Session::getId();
        $category = Category::where("categoryId", 5)->first();
        $products = Product::all()->where("categoryId", 5)->sortBy('sortOrder');
        $sortOrder = 0;
        $qtyInputs = [];

        foreach ($products as $product) {
            $qtyInputs[] = "qty_input".$product['sortOrder'];
        }

        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();

        $orderCartId = $orderCart["orderCartId"];
        $orderItems = OrderItem::all()->where("orderCartId", $orderCartId);

        if ($orderCart['status'] == 1) {
            Session::regenerate();
        }

        return view("shop.nutdriver", compact("category", "products", "sessionId", "orderItems", "sortOrder", "qtyInputs"), ['title' => 'Shop | Plankcooking.com']);
    }

    public function postAddToCart(Request $request) {
        $orderCart = OrderCart::where("uniqueIdentifier", Session::getId())->first();
        $orderCartId = $orderCart["orderCartId"];
        $productId = $request->input("productId");
        $categoryId = $request->input("categoryId");
        $sortOrder = $request->input("sortOrder");
    
        $products = Product::all()->where("categoryId", $categoryId)->sortBy('sortOrder');
        $qtyInputs = [];

        foreach ($products as $product) {
            $qtyInputs[] = "qty_input".$product['sortOrder'];
        }

        $qty_input = $request->input($qtyInputs[$sortOrder - 1]);
        $request->session()->put("_sortOrder", strval($qtyInputs[$sortOrder - 1]));

        $orderItems = OrderItem::all()->where("orderCartId", $orderCartId);
        $orderItem = OrderItem::all()->where("productId", $productId)->where("orderCartId", $orderCartId)->first();

        $this->validate($request, [
            strval($qtyInputs[$sortOrder - 1]) => "required|numeric|min:0|not_in:0|between:0,99"
        ],
        [
            "required" => "Please enter a Qty",
            "numeric" => "Please enter a number",
            "min" => "",
            "not_in" => "Please enter a Qty",
            "between" => "Qty between 1-99",
        ]);
        
        if ($orderCart) {
            if ($orderCart['status'] != 1) {
                if ($orderItem) {
                    $orderItem->qty = $qty_input;
                    $orderItem->save();
                } else {
                    $orderItem = new OrderItem([
                        "productId" => $productId,
                        "orderCartId" => $orderCart["orderCartId"],
                        "qty" => $qty_input
                    ]);
                    $orderItem->save();
                }
            } 
            else {
                Session::regenerate();
                $orderCart = new OrderCart([
                "status" => 0, 
                "notes" => null, 
                "purchaseDate" => null, 
                "history" => null, 
                "taxes" => null, 
                "orderTotal" => null, 
                "shippingFirstName" => null, 
                "shippingLastName" => null, 
                "shippingAddress1" => null, 
                "shippingAddress2" => null, 
                "shippingCity" => null, 
                "shippingState" => null, 
                "shippingPostalCode" => null, 
                "shippingPhone" => null, 
                "shippingEmail" => null, 
                "billingAddress1" => null, 
                "billingAddress2" => null, 
                "billingCity" => null, 
                "billingState" => null, 
                "billingPostalCode" => null, 
                "uniqueIdentifier" => Session::getId(), 
                "websiteId" => 1, 
                "dateCreated" => now(), 
                "billingFirstName" => null,
                "billingLastName" => null, 
                "billingPhone" => null, 
                "billingEmail" => null, 
                "shippingCountry" => null, 
                "billingCountry" => null,
                "authorizationCode" => null, 
                "transactionId" => null, 
                "shippingValidation" => null, 
                "shippingCost" => null, 
                "shippingType" => null, 
                "creditCardType" => null
                ]);
                $orderCart->save();
                $orderItem = new OrderItem([
                    "productId" => $productId,
                    "orderCartId" => $orderCart["orderCartId"],
                    "qty" => $qty_input
                ]);
                $orderItem->save();
            }

            $orderItems = OrderItem::all()->where("orderCartId", $orderCartId)->where("productId", $productId);
            foreach ($orderItems as $orderItem) {
                $qtyInputs[] = $orderItem['qty'];
            }
        } else {
            Session::regenerate();
            $orderCart = new OrderCart([
            "status" => 0, 
            "notes" => null, 
            "purchaseDate" => null, 
            "history" => null, 
            "taxes" => null, 
            "orderTotal" => null, 
            "shippingFirstName" => null, 
            "shippingLastName" => null, 
            "shippingAddress1" => null, 
            "shippingAddress2" => null, 
            "shippingCity" => null, 
            "shippingState" => null, 
            "shippingPostalCode" => null, 
            "shippingPhone" => null, 
            "shippingEmail" => null, 
            "billingAddress1" => null, 
            "billingAddress2" => null, 
            "billingCity" => null, 
            "billingState" => null, 
            "billingPostalCode" => null, 
            "uniqueIdentifier" => Session::getId(), 
            "websiteId" => 1, 
            "dateCreated" => now(), 
            "billingFirstName" => null,
            "billingLastName" => null, 
            "billingPhone" => null, 
            "billingEmail" => null, 
            "shippingCountry" => null, 
            "billingCountry" => null,
            "authorizationCode" => null, 
            "transactionId" => null, 
            "shippingValidation" => null, 
            "shippingCost" => null, 
            "shippingType" => null, 
            "creditCardType" => null
            ]);
            $orderCart->save();
            $orderItem = new OrderItem([
                "productId" => $productId,
                "orderCartId" => $orderCart["orderCartId"],
                "qty" => $qty_input
            ]);
            $orderItem->save();
        }
        $request->session()->flash('_showAddedToCart', true);
        $request->flash();

        return redirect()->back()->with(compact("sortOrder"));
    }
}
