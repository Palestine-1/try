<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $names = [
            'أحمد محمد', 'محمود علي', 'سارة خالد', 'منى إبراهيم', 'يوسف مصطفى',
            'نجلاء حسن', 'فاطمة عبد الله', 'خالد ياسين', 'نهى عبد الرحمن', 'طارق سامي',
            'هدى عبد المجيد', 'عمرو حسين', 'بسمة سعيد', 'حسن محمد', 'رحمة السيد'
        ];

        $addresses = [
            '15 شارع التحرير، الدقي، الجيزة',
            '22 شارع النيل، المعادي، القاهرة',
            '5 شارع الثورة، مصر الجديدة، القاهرة',
            '8 شارع 9، المقطم، القاهرة',
            '10 شارع الجامعة، المنصورة، الدقهلية',
            '25 شارع البحر، طنطا، الغربية',
            '14 شارع الجمهورية، أسيوط',
            '9 شارع الكورنيش، دمياط',
            '33 شارع السوق، الزقازيق، الشرقية',
            '18 شارع القومية، شبرا، القاهرة'
        ];

        foreach (range(1, 100) as $i) {
            User::create([
                'name' => $names[array_rand($names)],
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('123456789'),
                'phone_number' => '010' . rand(10000000, 99999999),
                'address' => $addresses[array_rand($addresses)],
                'file' => null,
                'gender' => ['male', 'female'][rand(0, 1)],
                'national_id' => $this->generateNationalId(),
                'email_verified_at' => now(),
                'birth_date' => now()->subYears(rand(18, 40))->subDays(rand(0, 365)),
                'remember_token' => Str::random(10),
            ]);
        }
    }

    private function generateNationalId()
    {
        $century = '2';
        $year = rand(0, 9) . rand(0, 9); // مثال: 00 - 99
        $month = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
        $day = str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT);
        $governate = str_pad(rand(1, 29), 2, '0', STR_PAD_LEFT); // مثال من 01 لـ 29
        $sequence = str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT);

        return (int) ($century . $year . $month . $day . $governate . $sequence);
    }
}
