<?php

# database/seeds/QuoteTableSeeder.php

use App\Quote;  
use Illuminate\Database\Seeder;

class QuoteTableSeeder extends Seeder  
{
    public function run()
    {
        Quote::create([
            'teks' => 'Success is going from failure to failure without losing your enthusiasm',
            'author' => 'Winston Churchill',
            'background' => '1.jpg'
        ]);

        Quote::create([
            'teks' => 'Dream big and dare to fail',
            'author' => 'Norman Vaughan',
            'background' => '2.jpg'
        ]);

        Quote::create([
            'teks' => 'It does not matter how slowly you go as long as you do not stop',
            'author' => 'Confucius',
            'background' => '3.jpg'
        ]);

        //... add more quotes if you want!
    }
}
