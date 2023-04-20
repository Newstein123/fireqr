<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'name' => 'logo',
            'value' => 'logo.png',
            'type' => 'file',
        ]);
        GeneralSetting::create([
            'name' => 'title',
            'value' => 'မီးသတ်ဦးစီးဌာန QR စနစ်',
            'type' => 'string',
        ]);
        GeneralSetting::create([
            'name' => 'Website Name',
            'value' => 'မီးသတ်ဦးစီးဌာန',
            'type' => 'string',
        ]);
        GeneralSetting::create([
            'name' => 'qr-logo',
            'value' => 'မီးသတ်ဦးစီးဌာန',
            'type' => 'string',
        ]);
    }
}
