<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $options = [
            [
                'name' => 'Renk'
            ],
            [
                'name' => 'Uzunluk'
            ],
            [
                'name' => 'Genişlik'
            ],
            [
                'name' => 'Malzeme'
            ],
        ];

        foreach ($options as $option) {
            $newOption = Option::create($option);

            switch ($option['name']) {
                case 'Renk':
                    $values = [
                        [
                            'value' => 'Kırmızı',
                            'option_id' => $newOption->id,
                        ],
                        [
                            'value' => 'Mavi',
                            'option_id' => $newOption->id,
                        ],
                    ];
                    break;
                case 'Uzunluk':
                    $values = [];
                    $length = rand(10, 30);
                    for ($i = 1; $i <= 4; $i++) {
                        $values[] = [
                            'value' => $length . ' cm',
                            'option_id' => $newOption->id,
                        ];
                        $length += 5;
                    }
                    break;
                case 'Genişlik':
                    $values = [];
                    $width = rand(5, 15);
                    for ($i = 1; $i <= 3; $i++) {
                        $values[] = [
                            'value' => $width . ' cm',
                            'option_id' => $newOption->id,
                        ];
                        $width += 5;
                    }
                    break;
                case 'Malzeme':
                    $values = [
                        [
                            'value' => 'Elmas',
                            'option_id' => $newOption->id,
                        ],
                        [
                            'value' => 'Zümrüt',
                            'option_id' => $newOption->id,
                        ],
                    ];
                    break;
            }

            foreach ($values as $value) {
                OptionValue::create($value);
            }
        }
    }
}
