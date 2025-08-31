<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criterion;
use App\Models\Question;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $criteriaData = [
            [
                'title' => 'ጥራት (Quality)',
                'points' => 10,
                'questions' => [
                    'Does the company have a quality control system?',
                    'How many defects are found?',
                    'Do they know the root causes of quality problems?',
                    'Is the workplace organized to improve quality?',
                ],
            ],
            [
                'title' => 'ምርታማነት (Productivity)',
                'points' => 10,
                'questions' => [
                    'Planned vs. actual production capacity.',
                    'How efficiently are machines being used?',
                    'Do they use raw materials effectively?',
                ],
            ],
            [
                'title' => 'ደህንነት (Safety)',
                'points' => 10,
                'questions' => [
                    'Is the workplace safe and well-organized?',
                    'Are there risky activities?',
                    'Do workers use safety equipment properly?',
                ],
            ],
            [
                'title' => 'ፍላጎት እና ቁርጠኝነት (Commitment)',
                'points' => 10,
                'questions' => [
                    'Do managers and workers show real interest in Kaizen?',
                    'Do they respond positively in surveys or evaluations?',
                ],
            ],
            [
                'title' => 'ገቢ ምርት (Income-Generating Products)',
                'points' => 10,
                'questions' => [
                    'What kind of products do they make?',
                    'How much income and profit do they generate?',
                ],
            ],
            [
                'title' => 'የሠራተኛ ብዛት (Number of Employees)',
                'points' => 10,
                'questions' => [
                    'Total number of employees.',
                    'Permanent vs. temporary workers.',
                    'Gender balance (male/female).',
                ],
            ],
            [
                'title' => 'የብቃት ሠርተፍኬት (Skills/Training Certificate)',
                'points' => 5,
                'questions' => [
                    'Do they use improvement tools?',
                    'Do they keep records of Kaizen practices?',
                ],
            ],
            [
                'title' => 'የደንበኛ ቅሬታ (Customer Complaints)',
                'points' => 10,
                'questions' => [
                    'Do they have a system to receive complaints?',
                    'Percentage of complaints vs. sales.',
                ],
            ],
            [
                'title' => 'ኤክስፖርት (Export)',
                'points' => 15,
                'questions' => [
                    'What products are exported?',
                    'How much (%) of total production is exported?',
                ],
            ],
            [
                'title' => 'ሌሎች/አማካሪ (Other/Advisory)',
                'points' => 10,
                'questions' => [
                    'General workplace organization.',
                    'Extra criteria set by advisors.',
                ],
            ],
        ];

        foreach ($criteriaData as $c) {
            $criterion = Criterion::create([
                'title' => $c['title'],
                'points' => $c['points'],
            ]);

            foreach ($c['questions'] as $q) {
                Question::create([
                    'criterion_id' => $criterion->id,
                    'question' => $q,
                ]);
            }
        }
    }
}
