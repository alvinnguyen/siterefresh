<?php

class SitesTableSeeder extends Seeder {

	public function run()
	{
        Site::create([
            'title' => 'Jack London License Page',
            'url'   => 'http://alvin.jacklondon.com.au/LICENSE.txt'
        ]);
	}

}