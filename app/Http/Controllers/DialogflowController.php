<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class DialogflowController extends Controller
{
    public function handleRequest(Request $request)
    {
        $intent = $request->input('queryResult.intent.displayName');
        switch ($intent) {
            case 'GetProductInfo':
                return $this->getProductInfo($request);
            case 'GetCategoryInfo':
                return $this->getCategoryInfo($request);
            default:
                return response()->json(['fulfillmentText' => 'Sorry, I didn\'t understand that.']);
        }
    }

    private function getProductInfo($request)
    {
        $productName = $request->input('queryResult.parameters.product');
        $product = Product::where('name', 'LIKE', "%{$productName}%")->first();

        if ($product) {
            return response()->json([
                'fulfillmentText' => "The {$product->name} is available. Description: {$product->description}. Quantity: {$product->quantity}."
            ]);
        } else {
            return response()->json(['fulfillmentText' => "Sorry, we don't have that product."]);
        }
    }

    private function getCategoryInfo($request)
    {
        $categoryName = $request->input('queryResult.parameters.category');
        $category = Category::where('name', 'LIKE', "%{$categoryName}%")->first();

        if ($category) {
            return response()->json([
                'fulfillmentText' => "The category {$category->name} includes: {$category->description}."
            ]);
        } else {
            return response()->json(['fulfillmentText' => "Sorry, we don't have that category."]);
        }
    }
}
