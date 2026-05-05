<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user if not exists
        if (!User::where('email', 'super@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'super@gmail.com',
                'password' => bcrypt('2580'), // Change this in production
            ]);
        }

        // Seed Blog Module
        $this->call([
            BlogCategorySeeder::class,
            BlogTagSeeder::class,
            BlogSeeder::class,
            IconSeeder::class,
            ToolCategorySeeder::class,
            ToolTagSeeder::class,
            ToolSeeder::class,
            LegalPagesSeeder::class,
            FaqSeeder::class,
            GameGenresSeeder::class,
            BuiltInToolsSeeder::class,
        ]);

        $this->command->info('');
        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('');
        $this->command->info('📧 Admin Email: super@gmail.com');
        $this->command->info('🔑 Admin Password: 2580');
        $this->command->info('');
    }
}
