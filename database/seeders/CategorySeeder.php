<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sembako = Category::firstOrCreate(
            ['nama_kategori' => 'Sembako'],
            ['deskripsi' => 'Kebutuhan bahan pokok dan pangan']
        );

        Category::firstOrCreate(
            ['nama_kategori' => 'Elektronik'],
            ['deskripsi' => 'Perangkat dan komponen elektronik']
        );

        Category::firstOrCreate(
            ['nama_kategori' => 'Peralatan'],
            ['deskripsi' => 'Alat dan perkakas operasional gudang']
        );

        Category::firstOrCreate(
            ['nama_kategori' => 'Pembersih'],
            ['deskripsi' => 'Perlengkapan sanitasi dan kebersihan']
        );

        // Update items that don't have category_id yet
        Item::whereNull('category_id')->update(['category_id' => $sembako->id]);
    }
}
