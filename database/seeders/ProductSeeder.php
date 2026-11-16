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
            'Fashion' => 'product-girl.png',
            'Beauty' => 'product-girl.png',
            'Electronics' => 'product-boy.png',
            'Home & Living' => 'product-boy.png',
            'Sports' => 'product-boy.png',
        ];

        $products = [
            ['Wireless Headphones', 'Electronics', 79.99, 59.99, 18, 'Black,White', 'One Size'],
            ['Bluetooth Speaker', 'Electronics', 49.99, 39.99, 24, 'Black,Blue', 'One Size'],
            ['USB-C Charging Cable', 'Electronics', 14.99, 9.99, 60, 'White,Black', '1m,2m'],
            ['Smart LED Bulb', 'Electronics', 19.99, 15.99, 35, 'White', 'One Size'],
            ['Wireless Mouse', 'Electronics', 29.99, 22.99, 30, 'Black,Grey', 'One Size'],
            ['Classic Cotton T-Shirt', 'Fashion', 24.99, 19.99, 45, 'Black,White,Navy', 'S,M,L,XL'],
            ['Slim Fit Jeans', 'Fashion', 49.99, 39.99, 28, 'Blue,Black', 'S,M,L,XL'],
            ['Canvas Sneakers', 'Fashion', 54.99, 44.99, 22, 'White,Black', '38,39,40,41,42'],
            ['Everyday Backpack', 'Fashion', 39.99, 31.99, 20, 'Black,Grey', 'One Size'],
            ['Summer Cap', 'Fashion', 18.99, 14.99, 40, 'Beige,Black,Blue', 'One Size'],
            ['Ceramic Coffee Mug', 'Home & Living', 12.99, 9.99, 50, 'White,Grey', '350ml'],
            ['Soft Throw Pillow', 'Home & Living', 22.99, 17.99, 32, 'Beige,Grey,Green', '45x45cm'],
            ['Bamboo Cutting Board', 'Home & Living', 27.99, 21.99, 25, 'Natural', 'Medium,Large'],
            ['Desk Organizer', 'Home & Living', 19.99, 15.99, 30, 'White,Black', 'One Size'],
            ['Scented Candle', 'Home & Living', 16.99, 12.99, 36, 'Cream', '200g'],
            ['Daily Face Cleanser', 'Beauty', 15.99, 12.99, 42, 'Clear', '150ml'],
            ['Hydrating Body Lotion', 'Beauty', 18.99, 14.99, 38, 'White', '250ml'],
            ['Matte Lipstick', 'Beauty', 13.99, 10.99, 55, 'Red,Nude,Pink', 'One Size'],
            ['Yoga Mat', 'Sports', 34.99, 27.99, 26, 'Purple,Blue,Black', '6mm'],
            ['Stainless Water Bottle', 'Sports', 21.99, 16.99, 48, 'Silver,Black,Blue', '750ml'],
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
