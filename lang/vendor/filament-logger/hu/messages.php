<?php

return [
    "title" => "Aktivitási Napló",
    "group" => "Naplózás",
    "single" => "Aktivitás",
    "columns" => [
        "model" => "Model",
        "response_time" => "Válaszidő",
        "status" => "Státusz",
        "method" => "Metódus",
        "url" => "URL",
        "referer" => "Hivatkozó",
        "query" => "Lekérdezés",
        "remote_address" => "Távoli Cím",
        "user_agent" => "Felhasználói Ügynök",
        "response" => "Válasz",
        "level" => "Szint",
        "user" => "Felhasználó",
        "log" => "Naplóbejegyzés",
        "created_at" => "Létrehozva",
        "updated_at" => "Módosítva"
    ],
    "actions" => [
        "clear" => [
            "label" => "Aktivitási Napló kiürítése",
            "success" => [
                "title" => "Aktivitási Napló kiürítve",
                "body" => "Minden naplóbejegyzés törölve."
            ],
        ],
        "poll" => [
            "label" => "Valós Idejű Figyelés",
            "enabled" => [
                "title" => "Figyelés engedélyezve",
                "body" => "A tevékenységek 2 másodpercenként frissülnek."
            ],
            "disabled" => [
                "title" => "Figyelés letiltva",
                "body" => "A tevékenységek többé nem frissülnek automatikusan."
            ]
        ]
    ]
];
