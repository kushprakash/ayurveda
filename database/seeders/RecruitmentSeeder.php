<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\District;
use App\Models\Post;
use App\Models\Vacancy;
use App\Models\PostRequiredDocument;


class RecruitmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Posts
        $doctorPost = Post::create([
            'name' => 'Ayurvedic Treatment Doctor',
            'code' => 'ATD-2026',
            'description' => 'Dedicated Ayurvedic professionals for block level healthcare.',
            'salary' => 15000,
            'application_fee' => 500,
            'gst_percentage' => 18,
        ]);

        PostRequiredDocument::create(['post_id' => $doctorPost->id, 'document_name' => '10th Marksheet', 'is_mandatory' => true]);
        PostRequiredDocument::create(['post_id' => $doctorPost->id, 'document_name' => '12th Marksheet', 'is_mandatory' => true]);
        PostRequiredDocument::create(['post_id' => $doctorPost->id, 'document_name' => 'BAMS Degree', 'is_mandatory' => true]);
        PostRequiredDocument::create(['post_id' => $doctorPost->id, 'document_name' => 'Experience Certificate', 'is_mandatory' => false]);


        $nursePost = Post::create([
            'name' => 'Ayurvedic Nurse',
            'code' => 'AN-2026',
            'description' => 'Nursing staff with knowledge of Ayurvedic treatments.',
            'salary' => 12000,
            'application_fee' => 300,
            'gst_percentage' => 18,
        ]);

        // States & Districts
        $bihar = State::create(['name' => 'Bihar', 'code' => 'BR']);
        District::create(['state_id' => $bihar->id, 'name' => 'Patna']);
        District::create(['state_id' => $bihar->id, 'name' => 'Gaya']);

        $up = State::create(['name' => 'Uttar Pradesh', 'code' => 'UP']);
        District::create(['state_id' => $up->id, 'name' => 'Lucknow']);
        District::create(['state_id' => $up->id, 'name' => 'Varanasi']);

        // Vacancies
        Vacancy::create([
            'post_id' => $doctorPost->id,
            'state_id' => $bihar->id,
            'total_seats' => 50,
            'start_date' => now(),
            'end_date' => now()->addMonths(2),
            'department' => 'Healthcare',
            'employment_type' => 'Full-time',
            'qualification' => 'BAMS',
            'experience' => 'Fresher/Experienced',
            'age_limit' => '21-45 Years',
        ]);

        Vacancy::create([
            'post_id' => $nursePost->id,
            'state_id' => $up->id,
            'total_seats' => 30,
            'start_date' => now(),
            'end_date' => now()->addMonths(2),
            'department' => 'Healthcare',
            'employment_type' => 'Full-time',
            'qualification' => 'Ayurvedic Nursing Diploma',
            'experience' => '1+ Year preferred',
            'age_limit' => '18-40 Years',
        ]);
    }
}
