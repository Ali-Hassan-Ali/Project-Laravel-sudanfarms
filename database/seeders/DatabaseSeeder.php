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
        $this->call(GallerySeederTableSeeder::class);
        $this->call(VideoSeederTableSeeder::class);
        $this->call(BolgSeederTableSeeder::class);
        $this->call(FileTableSeeder::class);
        $this->call(CommonQuestionTableSeeder::class);
        $this->call(OfferSeederTableSeeder::class);
        $this->call(RequestCustmersTableSeeder::class);
        $this->call(PolicyTableSeeder::class);
        $this->call(AdvertisementTableSeeder::class);
        $this->call(AboutCustomerTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
