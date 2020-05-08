<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ' :attribute doit être accepté.',
    'active_url' => ' :attribute n\est pas une URL valide.',
    'after' => ' :attribute doit être une date aprés :date.',
    'after_or_equal' => ' :attribute doit être une date aprés ou égale à :date.',
    'alpha' => ' :attribute ne peut contenir que des lettres.',
    'alpha_dash' => ' :attribute ne peut contenir que des lettres, chiffres,tirets et soulignements.',
    'alpha_num' => ' :attribute ne peut contenir que des lettres et chiffres.',
    'array' => ' :attribute doit être un tableau.',
    'before' => ' :attribute doit être une date avant :date.',
    'before_or_equal' => ' :attribute doit être une date avant ou égale à :date.',
    'between' => [
        'numeric' => ' :attribute doit être entre :min et :max.',
        'file' => ' :attribute doit être entre :min et :max kilobytes.',
        'string' => ' :attribute doit être entre :min et :max caractéres.',
        'array' => ' :attribute doit avoir entre :min et :max items.',
    ],
    'boolean' => ' :attribute doit être vrai ou faux.',
    'confirmed' => ' :attribute confirmation ne correspond pas.',
    'date' => ' :attribute n\'est pas une date valide.',
    'date_equals' => ' :attribute doit être une date égale à :date.',
    'date_format' => ' :attribute ne correspond pas au format :format.',
    'different' => ' :attribute et :other doivent être differents.',
    'digits' => ' :attribute doit être :digits chiffres.',
    'digits_between' => ' :attribute doit être entre :min et :max chiffres.',
    'dimensions' => ' :attribute a des dimensions d\'image non valides.',
    'distinct' => ' :attribute a une valeur en double.',
    'email' => ' :attribute doit être une adresse E-mail valide.',
    'ends_with' => ' :attribute doit se terminer par un des élements suivants: :values',
    'exists' => ' La choix :attribute est invalide.',
    'file' => ' :attribute doit être un fichier.',
    'filled' => ' :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => ' :attribute doit être plus grand que :value.',
        'file' => ' :attribute doit être plus grand que :value kilobytes.',
        'string' => ' :attribute doit être plus grand que :value caractéres.',
        'array' => ' :attribute doit avoir plus de :value items.',
    ],
    'gte' => [
        'numeric' => ' :attribute doit être plus grand ou égale à :value.',
        'file' => ' :attribute doit être plus grand ou égale à :value kilobytes.',
        'string' => ' :attribute doit être plus grand ou égale à :value caractéres.',
        'array' => ' :attribute doit avoir :value items ou plus.',
    ],
    'image' => ' :attribute doit être une image.',
    'in' => ' le choix :attribute est invalide.',
    'in_array' => ' :attribute n\'existe pas dans :other.',
    'integer' => ' :attribute doit être un entier.',
    'ip' => ' :attribute doit être une adresse IP valide.',
    'ipv4' => ' :attribute doit être une adresse IPv4 valide.',
    'ipv6' => ' :attribute doit être une adresse IPv6 valide.',
    'json' => ' :attribute doit être une JSON valide.',
    'lt' => [
        'numeric' => ' :attribute doit être inférieur que :value.',
        'file' => ' :attribute doit être inférieur que :value kilobytes.',
        'string' => ' :attribute doit être inférieur que :value caractéres.',
        'array' => ' :attribute doit être inférieur que :value items.',
    ],
    'lte' => [
        'numeric' => ' :attribute doit être inférieur ou égale à :value.',
        'file' => ' :attribute doit être inférieur ou égale à :value kilobytes.',
        'string' => ' :attribute doit être inférieur ou égale à :value caractéres.',
        'array' => ' :attribute doit avoir plus que :value items.',
    ],
    'max' => [
        'numeric' => ' :attribute doit être supérieur à :max.',
        'file' => ' :attribute doit être supérieur à :max kilobytes.',
        'string' => ' :attribute doit être supérieur à :max caractéres.',
        'array' => ' :attribute ne doit pas avoir plus de :max items.',
    ],
    'mimes' => ' :attribute doit être un fichier de type: :values.',
    'mimetypes' => ' :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => ' :attribute doit être au moins :min.',
        'file' => ' :attribute doit être au moins :min kilobytes.',
        'string' => ' :attribute doit être au moins :min caractéres.',
        'array' => ' :attribute doit avoir au moins :min items.',
    ],
    'not_in' => ' Le choix :attribute est invalide.',
    'not_regex' => ' :attribute a un format invalide.',
    'numeric' => ' :attribute doit être une nombre.',
    'present' => ' :attribute doit être exister.',
    'regex' => ' :attribute a un format invalide.',
    'required' => ' :attribute est obligatoire.',
    'required_if' => ' :attribute est obligatoire quand :other est :value.',
    'required_unless' => ' :attribute est obligatoire sauf si :other is dans :values.',
    'required_with' => ' :attribute est obligatoire quand :values existe.',
    'required_with_all' => ' :attribute est obligatoire quand :values sont existants.',
    'required_without' => ' :attribute est obligatoire quand  :values ne sont pas existants.',
    'required_without_all' => ' :attribute est obligatoire quand  aucun de :values n\'existent.',
    'same' => ' :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => ' :attribute doit être :size.',
        'file' => ' :attribute doit être :size kilobytes.',
        'string' => ' :attribute doit être :size caractéres.',
        'array' => ' :attribute doit contenir :size items.',
    ],
    'starts_with' => ' :attribute doit commencer par l\'un des él"ements suivants : :values',
    'string' => ' :attribute doit être une suite de caractéres.',
    'timezone' => ' :attribute doit être une zone valide.',
    'unique' => ' :attribute est déjà prise.',
    'uploaded' => ' :attribute chargement échoué.',
    'url' => ' :attribute a un format invalide.',
    'uuid' => ' :attribute dot être une UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
