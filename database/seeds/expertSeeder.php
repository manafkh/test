<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;

class expertSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = new Countries(new Config([
            'hydrate' => [
                'elements' => [
                    'currencies' => true,
                    'flag' => true,
                    'timezones' => true,
                ],
            ],
        ]));

        $d = $countries->where('name.common', 'New Zealand')->first()->cca2;
        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $d);

        $timezone = new DateTimeZone(end($timezones));
        $datetime = new DateTime('now', $timezone);

        \App\Expert::create([
            'name'=>' Ahmad Ali',
            'expert'=>'Doctor',
            'country'=>'New Zealand',
            'TimeZone'=> end($timezones). ' GMT ' . $datetime->format('P'),
            'start_time'=>'08:00:00',
            'end_time'=>'18:00:00',
        ]);

        $d = $countries->where('name.common', 'Syria')->first()->cca2;
        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $d);

        $timezone = new DateTimeZone(end($timezones));
        $datetime = new DateTime('now', $timezone);
        \App\Expert::create([
            'name'=>'Nezar Ahmad',
            'expert'=>'Civil engineer',
            'country'=>'Syria',
            'TimeZone'=>end($timezones). ' GMT ' . $datetime->format('P'),
            'start_time'=>'05:00:00',
            'end_time'=>'12:00:00',
        ]);


        $d = $countries->where('name.common', 'Egypt')->first()->cca2;
        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $d);
        $timezone = new DateTimeZone(end($timezones));
        $datetime = new DateTime('now', $timezone);
        \App\Expert::create([
            'name'=>'hoda ahmad',
            'expert'=>'Computer Engineer',
            'country'=>'Egypt',
            'TimeZone'=>end($timezones). ' GMT ' . $datetime->format('P'),
            'start_time'=>'15:00:00',
            'end_time'=>'16:00:00',
        ]);
    }
}
