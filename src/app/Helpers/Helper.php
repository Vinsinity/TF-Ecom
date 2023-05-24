<?php
namespace App\Helpers;

use App\Models\Order;
use Illuminate\Support\Str;

class Helper
{
    /**
     * @return int
     */
    public static function OrderNumberGenerate(): int
    {
        $data = Order::orderBy('order_number','desc')->first();
        if(!$data){
            return 1;
        }else{
            return $data->order_number + 1;
        }
    }

    /**
     * @param $price
     * @return int
     */
    public static function calculatePriceWithTaxForDatabase($price): int
    {
        $price = (int) Str::replace('.','',Str::replace(',','',$price));
        return number_format($price / (100 + config('app.tax')),2,'','');
//        return (($price * config('app.tax')) / 100) + $price;
    }

    public static function calculatePriceForDatabase($price): int
    {
        return Str::replace('.','',Str::replace(',','',$price));
    }

    public static function createSkuFromVariant($variant): string
    {
        $sku = "";
        foreach ($variant['options'] as $option) {
            $optionValue = Str::upper($option['value']);
            if (strlen($optionValue) > 3) {
                $optionValue = Str::limit($optionValue, 3, '');
            }
            $sku .= $optionValue;
        }
//        dd($sku);
        return $sku;
    }

    public static function calculatePrice($price): string
    {
        return number_format((int)($price) / 100,2,',','.');
    }

    public static function generateOrderNumber()
    {
        // Rastgele 6 haneli bir sayı oluştur
        $randomNumber = rand(100000, 999999);

        // Sipariş numarasını oluştur
        $orderNumber = 'ORDER-' . $randomNumber . '-' . time();

        return $orderNumber;
    }

    /**
     * @return string
     */
    public static function generateSliderImageName(): string
    {
        return 'slider-'.time();
    }
}
