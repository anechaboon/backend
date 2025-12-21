<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\{ 
    OrganizationsSeeder, 
    ServiceLineSeeder,
    VesselsSeeder,
    CategorySeeder,
    UserSeeder,
    TicketsSeeder
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
            TicketsSeeder::class
        ];
    }

    public function run()
    {
        $this->call($this->seedersClass());
    }
}
?>