<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Plan;
use Illuminate\Support\Str;



class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Template::truncate();
        Template::create([
            'name' => 'Copyright Template',
            'price' => 999,
            'pdf_doc' =>'/template_docs/Copyright-Page-Template.docx',
            'image' => '/img/copyright-template.jpg',
            'description' => Str::random(500),
            'plan_id' => 1
        ]);

        Template::create([
            'name' => 'Excel Song Split Sheet',
            'price' => 999,
            'pdf_doc' =>'/template_docs/Excel-Split-Sheet-Template.xlsx',
            'image' => '/img/excel-split-sheet-template.jpg',
            'description' => Str::random(500),
            'plan_id' => 1
        ]);

        Template::create([
            'name' => 'Song Split Sheet',
            'price' => 999,
            'pdf_doc' =>'/template_docs/Split-Sheet-Template.xlsx',
            'image' => '/img/split-sheet-template.jpg',
            'description' => Str::random(500),
            'plan_id' => 1
        ]);

        Template::create([
            'name' => 'Music Licencse Agreement Template',
            'price' => 999,
            'pdf_doc' =>'/template_docs/Music-License-Agreement-Template.xlsx',
            'image' => '/img/music-licence.jpg',
            'description' => Str::random(500),
            'plan_id' => 1
        ]);

        $this->createDummyTemplates();
        $this->assignForeignKey();
    }


    private function createDummyTemplates()
    {
        $names = [
            'The Matrix of the Industry Template', 
            'Song Release Checklist Template',
            'Music Expenses and Income Template',
            'Sample Licencing Template',
            'Sync License Template'
        ];

        foreach($names as $name)
            Template::create([
                'name' => $name,
                'price' => 999,
                'image' => 'https://picsum.photos/600/400?random=1',
                'pdf_doc' => 'http://picsum.photos//600/400?random=1',
                'description' => Str::random(500),
                'plan_id' => $this->assignForeignKey()
            ]);
    }

    private function assignForeignKey()
    {   
        $plans = Plan::all();
        $plan_id = $plans->random()->id;
        return $plan_id;
       
    }
}
