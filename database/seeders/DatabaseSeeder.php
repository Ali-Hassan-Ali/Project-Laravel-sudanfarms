<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(CategorysTableSeeder::class);
        $this->call(SubCategorysTableSeeder::class);
        $this->call(CategoryDealerTableSeeder::class);
        $this->call(PromotedDealerTableSeeder::class);
        $this->call(SettingBannersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(VideoSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
