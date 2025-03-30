<?php

namespace App\Extensions;

use Barryvanveen\Lastfm\Lastfm;

class LastFmUser extends Lastfm
{
    public function userLovedTracks(string $username): Lastfm
    {
        $this->query = array_merge($this->query, [
            'method' => 'user.getlovedtracks',
            'user' => $username,
        ]);

        return $this;
    }
}
