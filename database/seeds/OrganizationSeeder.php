<?php

use Illuminate\Database\Seeder;
use App\Models\Organisation;
class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

            // create organisation
            $organisation = new Organisation();

            $organisation->name = 'My School';
            
            $organisation->save();
         

        DB::commit();

    }
}
