<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use Illuminate\Support\Arr;

class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => Arr::random(['علی', 'امیر', 'عماد', 'زهرا', 'ابوالفضل']),
            'last_name' => Arr::random(['صالحی', 'امیری', 'رنجبر', 'صادقی', 'توکلی']),
            'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
            'status' => $this->faker->numberBetween(0, 4),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'location_id' => Location::inRandomOrder()->first()->id,
            'work_plans' => [
                0 => $this->faker->time('H:i') . " " . $this->faker->time('H:i'),
                1 => $this->faker->time('H:i') . " " . $this->faker->time('H:i'),
                2 => $this->faker->time('H:i') . " " . $this->faker->time('H:i'),
                3 => $this->faker->time('H:i') . " " . $this->faker->time('H:i'),
                4 => $this->faker->time('H:i') . " " . $this->faker->time('H:i'),
                5 => $this->faker->time('H:i') . " " . $this->faker->time('H:i'),
                6 => "-",
            ],
            'addresses' => ['خیابان جانبازان وکوچه 13'],
            'phone_numbers' => [$this->faker->phoneNumber(), $this->faker->phoneNumber(), $this->faker->phoneNumber()],
            'doctor_avatar' => 'https://www.shutterstock.com/image-vector/young-smiling-man-avatar-brown-600nw-2261401207.jpg'
        ];
    }
}
