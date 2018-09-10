<?php

namespace App\Shop\Products\Transformations;

use App\Shop\Products\Product;
use Illuminate\Support\Facades\Storage;

trait ProductTransformable
{
    /**
     * Transform the product
     *
     * @param Product $product
     * @return Product
     */
    protected function transformProduct(Product $product)
    {
        $prod = new Product;
        $prod->id = (int) $product->id;
        $prod->sku = $product->sku;
        $prod->name = $product->name;
        $prod->slug = $product->slug;
        $prod->description = $product->description;
        $prod->image = asset("storage/$product->image");
        $prod->quantity = $product->quantity;
        $prod->price = $product->price;
        $prod->sale_price = $product->sale_price;
        $prod->category_id = (int) $product->category_id;
        $prod->brand_id = (int) $product->brand_id;
        $prod->status = $product->status;

        return $prod;
    }
}
