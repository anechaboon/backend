<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\{ 
    OrganizationsSeeder, 
    ServiceLineSeeder,
    VesselsSeeder
};
class DatabaseSeeder extends Seeder
{
    public static function seedersClass(): array
    {
        return [
            OrganizationsSeeder::class,
            ServiceLineSeeder::class,
            VesselsSeeder::class,
        ];
    }

    public function run()
    {
        $this->call($this->seedersClass());
    }
}
?>