<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\{ 
    OrganizationsSeeder, 
    ServiceLineSeeder,
    VesselsSeeder,
    CategorySeeder,
    UserSeeder
};
class DatabaseSeeder extends Seeder
{
    public static function seedersClass(): array
    {
        return [
            OrganizationsSeeder::class,
            ServiceLineSeeder::class,
            VesselsSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
        ];
    }

    public function run()
    {
        $this->call($this->seedersClass());
    }
}
?>