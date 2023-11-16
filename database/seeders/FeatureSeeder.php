<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = ['cruise control', 'bluetooth', 'navigator', 'driving assistant', 'autopilot', 'dashcam'];

        foreach ($features as $feature) {

            $new_feature = new Feature();

            $new_feature->name = $feature;
            $new_feature->slug = Str::slug($feature);

            $new_feature->save();
        }
    }
}
