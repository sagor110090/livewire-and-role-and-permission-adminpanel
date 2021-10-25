<?php

namespace Database\Factories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiteSettingFactory extends Factory
{
    protected $model = SiteSetting::class;

    public function definition()
    {
        return [
			'website_name' => $this->faker->name,
			'website_logo' => $this->faker->name,
        ];
    }
}
