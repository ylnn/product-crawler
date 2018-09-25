<?php

namespace App\Services;

use App\Image;
use App\Product;
use App\Variant;

class ProductService
{
    public function saveProducts($products)
    {
        $collection = collect($products);

        $collection->each(function ($item) {
            $this->save($item);
        });
    }
    protected function save($product)
    {
        //check is record exists
        $existing = Product::where('product_id', $product->id)->first();

        if ($existing) {
            return null;
        }

        //not exists; create new record
        $savedProduct = Product::create([
            'product_id' => $product->id,
            'title' => $product->title,
            'handle' => $product->handle,
            'body_html' => $product->body_html,
            'vendor' => $product->vendor,
            'product_type' => $product->product_type
        ]);

        //save images
        $this->saveImages($product, $savedProduct);

        //save variants
        $this->saveVariants($product, $savedProduct);
    }

    protected function saveImages($product, $savedProduct)
    {
        $images = collect($product->images);

        $images->each(function ($item) use ($savedProduct) {
            $newImage = Image::make([
                'src' => $item->src,
                'width' => $item->width,
                'height' => $item->height,
            ]);

            $savedProduct->images()->save($newImage);
        });
    }

    protected function saveVariants($product, $savedProduct)
    {
        $variants = collect($product->variants);

        $variants->each(function ($item) use ($savedProduct) {
            $newImage = Variant::make([
                'variant_id' => $item->id,
                'product_id' => $item->product_id,
                'title' => $item->title,
                'option1' => $item->option1,
                'option2' => $item->option2,
                'option3' => $item->option3,
                'sku' => $item->sku,
                'requires_shipping' => $item->requires_shipping,
                'taxable' => $item->taxable,
                'featured_image' => $item->featured_image,
                'available' => $item->available,
                'price' => $item->price,
                'grams' => $item->grams,
                'position' => $item->position
            ]);

            $savedProduct->variants()->save($newImage);
        });
    }
}
