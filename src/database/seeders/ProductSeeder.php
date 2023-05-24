<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OptionType;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $selectType = DB::table('option_types')->insertGetId([
            'name' => 'selectbox',
            'slug' => 'selectbox'
        ]);

        $radioType = DB::table('option_types')->insertGetId([
            'name' => 'radio',
            'slug' => 'radio'
        ]);
        // Seçenek ve değerler
        $colorOption = DB::table('options')->insertGetId([
            'name' => 'Renk',
            'slug' => 'renk',
            'option_type_id' => $selectType,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $sizeOption = DB::table('options')->insertGetId([
            'name' => 'Beden',
            'slug' => 'beden',
            'option_type_id' => $selectType,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $redValue = DB::table('option_values')->insertGetId([
            'option_id' => $colorOption,
            'value' => 'Kırmızı',
            'slug' => 'kirmizi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $blueValue = DB::table('option_values')->insertGetId([
            'option_id' => $colorOption,
            'value' => 'Mavi',
            'slug' => 'mavi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $sSizeValue = DB::table('option_values')->insertGetId([
            'option_id' => $sizeOption,
            'value' => 'S',
            'slug' => 's',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $mSizeValue = DB::table('option_values')->insertGetId([
            'option_id' => $sizeOption,
            'value' => 'M',
            'slug' => 'M',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $lSizeValue = DB::table('option_values')->insertGetId([
            'option_id' => $sizeOption,
            'value' => 'L',
            'slug' => 'L',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $materialOption = DB::table('options')->insertGetId([
            'name' => 'Material',
            'slug' => 'Material',
            'option_type_id' => $radioType,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $cottonValue = DB::table('option_values')->insertGetId([
            'option_id' => $materialOption,
            'value' => 'Cotton',
            'slug' => 'Cotton',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $polyesterValue = DB::table('option_values')->insertGetId([
            'option_id' => $materialOption,
            'value' => 'Polyester',
            'slug' => 'Polyester',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Marka
        Brand::create(['name' => 'B E T U L S']);

        // Ürünler
        $prod1 = Product::create([
            'name' => 'Kırmızı Basic Tişört',
            'description' => 'Yumuşak ve rahat bir kırmızı tişört',
            'brand_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $prod2 = Product::create([
            'name' => 'Mavi Basic Tişört',
            'description' => 'Yumuşak ve rahat bir mavi tişört',
            'brand_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $prod3 = Product::create([
            'name' => 'Kırmızı Sweatshirt',
            'brand_id' => 1,
            'description' => 'Sıcak ve rahat bir kırmızı sweatshirt',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $prod4 = Product::create([
            'name' => 'Mavi Sweatshirt',
            'brand_id' => 1,
            'description' => 'Sıcak ve rahat bir mavi sweatshirt',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $prod5 = Product::create([
            'name' => 'Kırmızı Polo Yaka Tişört',
            'brand_id' => 1,
            'description' => 'Şık ve rahat bir kırmızı polo yaka tişört',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Ürün varyantları
        DB::table('product_variants')->insert([
            'product_id' => 1,
            'price' => 2999,
            'sku' => 'KRMBSTCOT01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 1,
            'price' => 2999,
            'sku' => 'KRMBSTCOT02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 2,
            'price' => 2999,
            'sku' => 'MVIBSTCOT01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 2,
            'price' => 2999,
            'sku' => 'MVIBSTCOT02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 3,
            'price' => 4999,
            'sku' => 'KRMSWTS01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 4,
            'price' => 4999,
            'sku' => 'MVISWTS01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 5,
            'price' => 3999,
            'sku' => 'KRMPOT01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 5,
            'price' => 3999,
            'sku' => 'KRMPOT02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variants')->insert([
            'product_id' => 5,
            'price' => 3999,
            'sku' => 'KRMPOT03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Varyant seçenekleri

        DB::table('product_options')->insert([
            'product_id' => 1,
            'option_id' => $colorOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_options')->insert([
            'product_id' => 2,
            'option_id' => $colorOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_options')->insert([
            'product_id' => 2,
            'option_id' => $sizeOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_options')->insert([
            'product_id' => 3,
            'option_id' => $sizeOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_options')->insert([
            'product_id' => 4,
            'option_id' => $sizeOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_options')->insert([
            'product_id' => 5,
            'option_id' => $materialOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_options')->insert([
            'product_id' => 5,
            'option_id' => $sizeOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_options')->insert([
            'product_id' => 3,
            'option_id' => $colorOption,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Varyant seçenek değerleri
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 1,
            'option_value_id' => $redValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 2,
            'option_value_id' => $blueValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 3,
            'option_value_id' => $redValue,
            'created_at' => now(),
            'updated_at' => now(), ]);

        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 4,
            'option_value_id' => $blueValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 5,
            'option_value_id' => $mSizeValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 6,
            'option_value_id' => $sSizeValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 7,
            'option_value_id' => $cottonValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 8,
            'option_value_id' => $polyesterValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_variant_option_values')->insert([
            'product_variant_id' => 9,
            'option_value_id' => $lSizeValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $cat1 = Category::create(['name' => 'Kolye']);
        $cat2 = Category::create(['name' => 'Yüzük']);
        $cat3 = Category::create(['name' => 'Bileklik']);
        $cat4 = Category::create(['name' => 'Küpe']);
        $cat5 = Category::create(['name' => 'Su Yolu','category_id' => 1]);
        $cat6 = Category::create(['name' => 'Su Yolu','category_id' => 2]);

        $cat1->products()->attach($prod1);
        $cat1->products()->attach($prod2);
        $cat1->products()->attach($prod3);
        $cat1->products()->attach($prod4);
        $cat1->products()->attach($prod5);

        $cat2->products()->attach($prod1);
        $cat2->products()->attach($prod2);
        $cat2->products()->attach($prod3);

        $cat3->products()->attach($prod1);

    }
}
