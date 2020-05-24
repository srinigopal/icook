<?php

namespace App\Traits\Client;

//vendor
use \Carbon\Carbon;

trait Parser
{

    private function parseClientNames($client = null)
    {
        if (! $client) {
            return null;
        }

        if (! $client['first_name'] and ! $client['last_name']) {
            return null;
        }

        return [
            'first' => $client['first_name'] ? $client['first_name'] : null,
            'other' => $client['other_names'] ? $client['other_names'] : null,
            'last' => $client['last_name'] ? $client['last_name'] : null,
            'aka' => $client['also_known_as'] ? $client['also_known_as'] : null,
            'display' => [
                'informal' => ($client['first_name'] ? $client['first_name'] . ' ' : '') . ($client['also_known_as'] ? '"' . $client['also_known_as'] . '" ' : '') . ($client['last_name'] ? $client['last_name'] : ''), 
                'formal' => ($client->honorific ? $client->honorific['name'] . ' ' : '') . ($client['first_name'] ? $client['first_name'] . ' ' : '') . ($client['middle_names'] ? $client['middle_names'] . ' ' : '') . ($client['last_name'] ? $client['last_name'] : '') //t + f + m + l 
            ]
        ];

    }

    private function parseClientDates($client = null)
    {
        if (! $client) {
            return null;
        }

        if (! $client['dob'] and ! $client['dod']) {
            return null;
        }

        if ($client['dob']) {
            $dob = Carbon::createFromFormat('Y-m-d', $client['dob']);
        } else {
            $dob = null;
        }

        if ($client['dod']) {
            $dod = Carbon::createFromFormat('Y-m-d', $client['dod']);
        } else {
            $dod = null;
        }

        return [
            'dob' => [
                'date' => $dob ? $dob->format('d/m/Y') : null,
                'display' => $dob ? $dob->toFormattedDateString() : null
            ],
            'dod' => [
                'date' => $dod ? $dod->format('d/m/Y') : null,
                'display' => $dod ? $dod->toFormattedDateString() : null
            ],
            'range' => [
                'full' => ($client['dob'] and $client['dod']) ? $dob->format('d/m/Y') . ' - ' .  $dod->format('d/m/Y') : null,
                'short' => ($client['dob'] and $client['dod']) ? $dob->format('Y') . ' - ' .  $dod->format('Y') : null
            ],
            'age' => [
                'years' => ($client['dob'] and $client['dod']) ? Carbon::createFromFormat('Y-m-d', $client['dob'])->diff(Carbon::now())->format('%y years') : null,
                'full' => ($client['dob'] and $client['dod']) ? Carbon::createFromFormat('Y-m-d', $client['dob'])->diff(Carbon::now())->format('%y years, %m months and %d days') : null
            ]
        ];

    }

}