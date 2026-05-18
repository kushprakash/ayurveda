<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\District;
use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;
use App\Models\Post;
use App\Models\Vacancy;
use App\Models\PostRequiredDocument;

class CommunityHiringSeeder extends Seeder
{
    public function run()
    {
        // Define Posts
        $posts = [
            [
                'name' => 'Zonal Doctor',
                'code' => 'ZD-2026',
                'description' => 'District-level medical supervisors focused on community health awareness.',
                'salary' => 45000,
                'fee' => 1000,
                'level' => 'district'
            ],
            [
                'name' => 'Regional Doctor',
                'code' => 'RD-2026',
                'description' => 'Block-level practitioners supporting preventive healthcare initiatives.',
                'salary' => 35000,
                'fee' => 750,
                'level' => 'block'
            ],
            [
                'name' => 'Rural Doctor',
                'code' => 'RUD-2026',
                'description' => 'Panchayat-level wellness guides and first-point of contact for Ayurveda care.',
                'salary' => 25000,
                'fee' => 500,
                'level' => 'panchayat'
            ],
            [
                'name' => 'Suraksha Didi',
                'code' => 'SD-2026',
                'description' => 'Village-level community healthcare workers focused on mother and child wellness.',
                'salary' => 12000,
                'fee' => 200,
                'level' => 'village'
            ],
        ];

        $postModels = [];
        foreach ($posts as $p) {
            $post = Post::create([
                'name' => $p['name'],
                'code' => $p['code'],
                'description' => $p['description'],
                'salary' => $p['salary'],
                'application_fee' => $p['fee'],
                'gst_percentage' => 18,
            ]);
            $postModels[$p['level']] = $post;

            // Required Docs
            PostRequiredDocument::create(['post_id' => $post->id, 'document_name' => 'Aadhaar Card', 'is_mandatory' => true]);
            PostRequiredDocument::create(['post_id' => $post->id, 'document_name' => 'Qualification Certificate', 'is_mandatory' => true]);
            if ($p['level'] != 'village') {
                PostRequiredDocument::create(['post_id' => $post->id, 'document_name' => 'Medical Registration', 'is_mandatory' => true]);
            }
        }

        // Define States
        $statesData = [
            'Bihar' => ['Patna', 'Gaya', 'Muzaffarpur', 'Bhagalpur', 'Purnia', 'Darbhanga', 'Arrah', 'Begusarai', 'Katihar', 'Munger'],
            'Uttar Pradesh' => ['Lucknow', 'Kanpur', 'Varanasi', 'Agra', 'Meerut', 'Prayagraj', 'Ghaziabad', 'Bareilly', 'Aligarh', 'Moradabad'],
            'Jharkhand' => ['Ranchi', 'Jamshedpur', 'Dhanbad', 'Bokaro', 'Deoghar', 'Hazaribagh', 'Giridih', 'Ramgarh', 'Dumka', 'Palamu'],
            'Madhya Pradesh' => ['Bhopal', 'Indore', 'Jabalpur', 'Gwalior', 'Ujjain', 'Sagar', 'Rewa', 'Satna', 'Ratlam', 'Chhindwara'],
            'West Bengal' => ['Kolkata', 'Howrah', 'Asansol', 'Siliguri', 'Durgapur', 'Bardhaman', 'Malda', 'Baharampur', 'Habra', 'Kharagpur'],
            'Uttarakhand' => ['Dehradun', 'Haridwar', 'Roorkee', 'Haldwani', 'Rudrapur', 'Kashipur', 'Rishikesh', 'Pithoragarh', 'Ramnagar', 'Manglaur'],
            'Haryana' => ['Gurugram', 'Faridabad', 'Panipat', 'Ambala', 'Yamunanagar', 'Rohtak', 'Hisar', 'Karnal', 'Sonipat', 'Panchkula'],
            'Rajasthan' => ['Jaipur', 'Jodhpur', 'Kota', 'Bikaner', 'Ajmer', 'Udaipur', 'Bhilwara', 'Alwar', 'Sikar', 'Pali'],
            'Punjab' => ['Ludhiana', 'Amritsar', 'Jalandhar', 'Patiala', 'Bathinda', 'Mohali', 'Hoshiarpur', 'Pathankot', 'Moga', 'Abohar'],
            'Himachal Pradesh' => ['Shimla', 'Dharamshala', 'Solan', 'Mandi', 'Palampur', 'Baddi', 'Nahan', 'Paonta Sahib', 'Sundernagar', 'Chamba']
        ];

        foreach ($statesData as $stateName => $districts) {
            $state = State::create(['name' => $stateName, 'code' => strtoupper(substr($stateName, 0, 2))]);
            
            foreach ($districts as $distName) {
                $district = District::create(['state_id' => $state->id, 'name' => $distName]);
                
                // Create 2 Blocks per District
                for ($i = 1; $i <= 2; $i++) {
                    $block = Block::create(['district_id' => $district->id, 'name' => $distName . ' Block ' . $i]);
                    
                    // Create 2 Panchayats per Block
                    for ($j = 1; $j <= 2; $j++) {
                        $panchayat = Panchayat::create(['block_id' => $block->id, 'name' => $block->name . ' Panchayat ' . $j]);
                        
                        // Create 2 Villages per Panchayat
                        for ($k = 1; $k <= 2; $k++) {
                            Village::create(['panchayat_id' => $panchayat->id, 'name' => $panchayat->name . ' Village ' . $k]);
                        }
                    }
                }
            }

            // Create Vacancies for this State
            foreach ($postModels as $level => $post) {
                // Calculate total seats based on level
                $count = 0;
                if ($level == 'district') $count = $state->districts()->count();
                elseif ($level == 'block') $count = Block::whereIn('district_id', $state->districts()->pluck('id'))->count();
                elseif ($level == 'panchayat') $count = Panchayat::whereIn('block_id', Block::whereIn('district_id', $state->districts()->pluck('id'))->pluck('id'))->count();
                elseif ($level == 'village') $count = Village::whereIn('panchayat_id', Panchayat::whereIn('block_id', Block::whereIn('district_id', $state->districts()->pluck('id'))->pluck('id'))->pluck('id'))->count();

                Vacancy::create([
                    'post_id' => $post->id,
                    'state_id' => $state->id,
                    'level' => $level,
                    'total_seats' => $count,
                    'start_date' => now(),
                    'end_date' => now()->addMonths(3),
                    'department' => 'Community Healthcare',
                    'employment_type' => 'Full-time / Community Service',
                    'qualification' => ($level == 'village' ? '12th Pass / Local Resident' : ($level == 'panchayat' ? 'Ayurvedic Knowledge / BAMS student' : 'BAMS / MD Ayurveda')),
                    'experience' => 'Fresher / Experienced',
                    'age_limit' => '18-50 Years',
                ]);
            }
        }
    }
}
