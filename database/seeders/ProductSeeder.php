<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $userId = User::where('email', 'admin@example.com')->value('id');
        $categories = Category::pluck('id', 'name');
        $thumbnails = [
            'Men' => 'product-boy.png',
            'Women' => 'product-girl.png',
            'Unisex' => 'product-boy.png',
        ];

        $products = [
            ['Classic Cotton T-Shirt', 'Men', 24.99, 19.99, 45, 'Black,White,Navy', 'S,M,L,XL'],
            ['Essential Polo Shirt', 'Men', 29.99, 24.99, 32, 'Black,White,Blue', 'S,M,L,XL'],
            ['Relaxed Fit Hoodie', 'Men', 49.99, 39.99, 20, 'Black,Grey,Olive', 'S,M,L,XL'],
            ['Slim Fit Jeans', 'Men', 54.99, 44.99, 28, 'Blue,Black', 'S,M,L,XL'],
            ['Classic Oxford Shirt', 'Men', 39.99, 34.99, 24, 'White,Light Blue', 'S,M,L,XL'],
            ['Crop Hoodie', 'Women', 44.99, 36.99, 26, 'Pink,Cream,Black', 'XS,S,M,L'],
            ['Ribbed Long Sleeve Top', 'Women', 27.99, 22.99, 38, 'White,Black,Brown', 'XS,S,M,L'],
            ['Everyday T-Shirt Dress', 'Women', 34.99, 28.99, 30, 'Black,Beige,Green', 'XS,S,M,L'],
            ['High-Waist Wide Leg Jeans', 'Women', 59.99, 49.99, 22, 'Light Blue,Dark Blue', 'XS,S,M,L'],
            ['Oversized Sweatshirt', 'Women', 42.99, 35.99, 25, 'Grey,Cream,Lilac', 'XS,S,M,L'],
            ['Unisex Oversized Hoodie', 'Unisex', 52.99, 42.99, 35, 'Black,Grey,Beige', 'XS,S,M,L,XL'],
            ['Unisex Graphic T-Shirt', 'Unisex', 26.99, 21.99, 50, 'White,Black,Charcoal', 'XS,S,M,L,XL'],
            ['Unisex Zip-Up Jacket', 'Unisex', 64.99, 54.99, 18, 'Black,Navy,Khaki', 'XS,S,M,L,XL'],
            ['Unisex Fleece Joggers', 'Unisex', 38.99, 31.99, 30, 'Black,Grey,Olive', 'XS,S,M,L,XL'],
            ['Unisex Crewneck Sweatshirt', 'Unisex', 39.99, 32.99, 34, 'Cream,Grey,Blue', 'XS,S,M,L,XL'],
        ];

        foreach ($products as [$proName, $category, $regularPrice, $salePrice, $qty, $color, $size]) {
            Product::updateOrCreate(
                ['proName' => $proName],
                [
                    'user_id' => $userId,
                    'cate_id' => $categories[$category],
                    'regular_price' => $regularPrice,
                    'sale_price' => $salePrice,
                    'qty' => $qty,
                    'color' => $color,
                    'size' => $size,
                    'thumbnail' => $thumbnails[$category],
                    'description' => "{$proName} is a quality {$category} product for everyday use.",
                    'views' => 0,
                ]
            );
        }
    }
}
