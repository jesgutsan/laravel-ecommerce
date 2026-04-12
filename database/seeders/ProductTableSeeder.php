<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;



class ProductTableSeeder extends Seeder {
	/**
	 * Run the Categories table seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = array(
			[
				'name' 			=> 'Bici Carretera 1',
				'slug' 			=> 'carretera-1',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 1372.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141418_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Bici Carretera 2',
				'slug' 			=> 'carretera-2',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 3154.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod148153_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Bici Carretera 3',
				'slug' 			=> 'carretera-3',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 1999.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141430_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Bici Muntanya 1',
				'slug' 			=> 'mtb-1',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 1249.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod146561_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Bici Muntanya 2',
				'slug' 			=> 'mtb-2',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 590.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod154507_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Bici Muntanya 3',
				'slug' 			=> 'mtb-3',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 772.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141169_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 2
			],
			[
				'name' 			=> 'Bici Carretera 4',
				'slug' 			=> 'carretera-4',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 999.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141493_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 1
			],
			[
				'name' 			=> 'Bici Muntanya 4',
				'slug' 			=> 'mtb-4',
				'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.',
				'extract' 		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'price' 		=> 1787.00,
				'image' 		=> 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod135669_IMGSET?wid=500&hei=505',
				'visible' 		=> 1,
				'created_at' 	=> Carbon::now(),
				'updated_at' 	=> Carbon::now(),
				'category_id' 	=> 2
			],

		);
		Product::insert($data);
	}
}
