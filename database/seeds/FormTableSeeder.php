<?php

use Illuminate\Database\Seeder;

class FormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $forms = new \App\Form([
            'email'=>'testing@hotmail.com',
            'password'=>'123',
            'description'=>'testing desc'
        ]);
        $forms->save();

        $forms = new \App\Form([
            'email'=>'eqwe@hotmail.com',
            'password'=>'123',
            'description'=>'another desc'
        ]);
        $forms->save();
    }
}
