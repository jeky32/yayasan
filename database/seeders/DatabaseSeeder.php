<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan seeding sangat penting karena ada foreign key constraints
        $this->call([
            // 1. Seed data dasar (tidak ada dependency)
            LocationSeeder::class,
            StatisticSeeder::class,
            
            // 2. Seed staff (bergantung pada locations)
            StaffSeeder::class,
            
            // 3. Seed users (bergantung pada staff)
            UserSeeder::class,
            
            // 4. Seed beneficiaries (bergantung pada locations)
            BeneficiarySeeder::class,
            
            // 5. Seed programs (bergantung pada locations dan staff)
            ProgramSeeder::class,
            
            // 6. Seed news
            NewsSeeder::class,
            
            // 7. Seed gallery (bergantung pada locations)
            GallerySeeder::class,
            
            // 8. Seed activities (bergantung pada locations dan staff)
            ActivitySeeder::class,
            
            // 9. Seed donations (bergantung pada programs)
            DonationSeeder::class,
        ]);

        $this->command->info('✅ Database seeding completed successfully!');
    }
}
