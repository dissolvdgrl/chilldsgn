<?php

namespace App\Tags;

use Statamic\Tags\Tags;
use GuzzleHttp\Client;
use App\Extensions\LastFmUser;

class LastFmTag extends Tags
{
    private LastFmUser $last_fm;
    protected static $handle = 'last_fm';
    private array $random_banger;

    public function __construct()
    {
        $this->last_fm = new LastFmUser(new Client(), config('services.lastfm.api_key'));

        $bangers = $this->last_fm->userLovedTracks('dissolvdgirl')->get();
        $key = array_rand($bangers['lovedtracks']['track']);

        $this->random_banger = $bangers['lovedtracks']['track'][$key];
    }

    /**
     * Pass the random banger data to the front end.
     * This is intended to be used as a tag pair.
     *
     * @return array
     */
    public function randomBanger(): array
    {
        return [
            "name" =>  $this->random_banger['name'],
            "artist" =>  $this->random_banger['artist']['name'],
            "url" =>  $this->random_banger['url'],
        ];
    }
}
