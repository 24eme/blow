<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Le following language lines contain Le default error messages used by
    | Le validator class. Some of Lese rules have multiple versions such
    | as Le size rules. Feel free to tweak each of Lese messages here.
    |
    */

    'accepted' => 'Le :attribute must be accepted.',
    'active_url' => 'Le :attribute is not a valid URL.',
    'after' => 'Le :attribute must be a date after :date.',
    'after_or_equal' => 'Le :attribute must be a date after or equal to :date.',
    'alpha' => 'Le :attribute may only contain letters.',
    'alpha_dash' => 'Le :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'Le :attribute may only contain letters and numbers.',
    'array' => 'Le :attribute must be an array.',
    'before' => 'Le :attribute must be a date before :date.',
    'before_or_equal' => 'Le :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'Le :attribute must be between :min and :max.',
        'file' => 'Le :attribute must be between :min and :max kilobytes.',
        'string' => 'Le :attribute must be between :min and :max characters.',
        'array' => 'Le :attribute must have between :min and :max items.',
    ],
    'boolean' => 'Le :attribute field must be true or false.',
    'confirmed' => 'Le :attribute confirmation does not match.',
    'date' => 'Le :attribute is not a valid date.',
    'date_equals' => 'Le :attribute must be a date equal to :date.',
    'date_format' => 'Le :attribute does not match Le format :format.',
    'different' => 'Le :attribute and :oLer must be different.',
    'digits' => 'Le :attribute doit avoir :digits chiffres.',
    'digits_between' => 'Le :attribute must be between :min and :max digits.',
    'dimensions' => 'Le :attribute has invalid image dimensions.',
    'distinct' => 'Le :attribute field has a duplicate value.',
    'email' => 'Le :attribute must be a valid email address.',
    'ends_with' => 'Le :attribute doit se terminer avec les valeurs suivantes: :values.',
    'exists' => 'Le selected :attribute is invalid.',
    'file' => 'Le :attribute must be a file.',
    'filled' => 'Le :attribute field must have a value.',
    'gt' => [
        'numeric' => 'Le :attribute must be greater than :value.',
        'file' => 'Le :attribute must be greater than :value kilobytes.',
        'string' => 'Le :attribute must be greater than :value characters.',
        'array' => 'Le :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Le :attribute must be greater than or equal :value.',
        'file' => 'Le :attribute must be greater than or equal :value kilobytes.',
        'string' => 'Le :attribute must be greater than or equal :value characters.',
        'array' => 'Le :attribute must have :value items or more.',
    ],
    'image' => 'Le :attribute must be an image.',
    'in' => 'Le selected :attribute is invalid.',
    'in_array' => 'Le :attribute field does not exist in :oLer.',
    'integer' => 'Le :attribute must be an integer.',
    'ip' => 'Le :attribute must be a valid IP address.',
    'ipv4' => 'Le :attribute must be a valid IPv4 address.',
    'ipv6' => 'Le :attribute must be a valid IPv6 address.',
    'json' => 'Le :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'Le :attribute must be less than :value.',
        'file' => 'Le :attribute must be less than :value kilobytes.',
        'string' => 'Le :attribute must be less than :value characters.',
        'array' => 'Le :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Le :attribute must be less than or equal :value.',
        'file' => 'Le :attribute must be less than or equal :value kilobytes.',
        'string' => 'Le :attribute must be less than or equal :value characters.',
        'array' => 'Le :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Le :attribute may not be greater than :max.',
        'file' => 'Le :attribute may not be greater than :max kilobytes.',
        'string' => 'Le :attribute may not be greater than :max characters.',
        'array' => 'Le :attribute may not have more than :max items.',
    ],
    'mimes' => 'Le :attribute must be a file of type: :values.',
    'mimetypes' => 'Le :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Le :attribute must be at least :min.',
        'file' => 'Le :attribute must be at least :min kilobytes.',
        'string' => 'Le :attribute must be at least :min characters.',
        'array' => 'Le :attribute must have at least :min items.',
    ],
    'not_in' => 'Le selected :attribute is invalid.',
    'not_regex' => 'Le :attribute format is invalid.',
    'numeric' => 'Le :attribute must be a number.',
    'password' => 'Le password is incorrect.',
    'present' => 'Le :attribute field must be present.',
    'regex' => 'Le :attribute format is invalid.',
    'required' => 'Le :attribute field is required.',
    'required_if' => 'Le :attribute field is required when :oLer is :value.',
    'required_unless' => 'Le :attribute field is required unless :oLer is in :values.',
    'required_with' => 'Le :attribute field is required when :values is present.',
    'required_with_all' => 'Le :attribute field is required when :values are present.',
    'required_without' => 'Le :attribute field is required when :values is not present.',
    'required_without_all' => 'Le :attribute field is required when none of :values are present.',
    'same' => 'Le :attribute and :oLer must match.',
    'size' => [
        'numeric' => 'Le :attribute must be :size.',
        'file' => 'Le :attribute must be :size kilobytes.',
        'string' => 'Le :attribute must be :size characters.',
        'array' => 'Le :attribute must contain :size items.',
    ],
    'starts_with' => 'Le :attribute must start with one of Le following: :values.',
    'string' => 'Le :attribute must be a string.',
    'timezone' => 'Le :attribute must be a valid zone.',
    'unique' => 'Le :attribute has already been taken.',
    'uploaded' => 'Le :attribute failed to upload.',
    'url' => 'Le :attribute format is invalid.',
    'uuid' => 'Le :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Le
    | convention "attribute.rule" to name Le lines. This makes it quick to
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
    | Le following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
