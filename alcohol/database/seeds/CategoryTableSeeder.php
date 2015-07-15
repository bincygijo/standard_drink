<?php

use Illuminate\Database\Seeder;
use \App\Category;
use \App\SubCategory;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('sub_categories')->delete();
        DB::table('categories')->delete();
	    Category::create(['name' => 'Sprits', 'description' => "It's important to be able to recognise how much a standard drink is - 30mls for this bourbon.", 'standard' => '30']);
	    Category::create(['name' => 'Beer', 'description' => "If you usually drink beer from a bottle you can check the label to see how many standards are inside. So, that’s what a standard drink of 330ml beer (4%) looks like in a glass.", 'standard' => '330']);
	    Category::create(['name' => 'Wine', 'description' => "Wine is often poured in large glasses, which makes it really easy to over pour and unwittingly end up having more standard drinks than you planned. It's good to know what 100mls actually looks like in a glass.", 'standard' => '100']);
    }
}
