{
    "Niveau_emploi": {
        "Niveau ouvrier ou employé": 2,
        "Niveau ingénieur ou cadre": 7,
        "Niveau technicien ou agent de maîtrise": 1
    },
    "Mode_obtention": {
        "Candidature spontanée": 2,
        "A l'issue d'un stage / formation professionnelle": 5,
        "Réseau de relations personnelles": 3
    },
    "Classe_rémuneration_mensuelle": {
        "1500 à 2000": 4,
        "Non-communiquÃ©": 1,
        "Moins de 1000": 1,
        "2000 à 2500": 2,
        "2500 et plus": 1,
        "1000 à 1500": 1
    },
    "Durée_accès": {
        "1": 2,
        "2": 1,
        "3": 1,
        "7": 1,
        "14": 1,
        "22": 1,
        "24": 1,
        "29": 1,
        "-6": 1
    }
}


var json = {
    "charts": [{
            "series": "Niveau_emploi",
            "data": [10, 9, 12, 8],
            "labels": ["Engineer", "Manager", "Exec", "Not Specified"]
                }, {
            "series": "Mode_obtention",
            "data": [2, 2, 4],
            "labels": ["Stage", "Candidature spontanée", "Non-communiqué"]
                }, {
            "series": "Classe_rémuneration_mensuelle",
            "data": [1, 5, 1, 1, 2],
            "labels": ["1000 à 1500", "1500 à 2000", "2000 à 2500", "2500 et plus"]
                }
            ]
};
console.log(json);
$scope.ocw = json;