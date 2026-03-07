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

    'accepted' => 'El(la) :attribute debe ser aceptado.',
    'accepted_if' => 'El(la) :attribute debe ser aceptado cuando :other sea :value.',
    'active_url' => 'El(la) :attribute debe ser una URL válida.',
    'after' => 'El(la) :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El(la) :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El(la) :attribute sólo debe contener letras.',
    'alpha_dash' => 'El(la) :attribute sólo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El(la) :attribute sólo debe contener letras y números.',
    'array' => 'El(la) :attribute debe ser un conjunto.',
    'ascii' => 'El(la) :attribute solo debe contener caracteres alfanuméricos y símbolos de un solo byte.',
    'attached' => 'Este :attribute ya se adjuntó.',
    'before' => 'El(la) :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El(la) :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [ 
        'array' => 'El(la) :attribute tiene que tener entre :min - :max elementos.',
        'file' => 'El(la) :attribute debe pesar entre :min - :max kilobytes.',
        'numeric' => 'El(la) :attribute tiene que estar entre :min - :max.',
        'string' => 'El(la) :attribute tiene que tener entre :min - :max caracteres.',
    ],        
    'boolean' => 'El(la) :attribute debe tener un valor verdadero o falso.',
    'can' => 'El(la) :attribute contiene un valor no autorizado.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'contains' => 'Al(la) :attribute le falta un valor obligatorio.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El(la) :attribute debe ser una fecha válida.',
    'date_equals' => 'El(la) :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El(la) :attribute debe coincidir con el formato :format.',
    'decimal' => 'El(la) :attribute debe tener :decimal cifras decimales.',
    'declined' => 'El(la) :attribute debe ser rechazado.',
    'declined_if' => 'El(la) :attribute debe ser rechazado cuando :other sea :value.',
    'different' => 'El(la) :attribute y :other deben ser diferentes.',
    'digits' => 'El(la) :attribute debe tener :digits dígitos.',
    'digits_between' => 'El(la) :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El(la) :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El(la) :attribute contiene un valor duplicado.',
    'doesnt_end_with' => 'El(la) :attribute no debe finalizar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El(la) :attribute no debe comenzar con uno de los siguientes: :values.',
    'email' => 'El(la) :attribute no es un correo válido.',
    'ends_with' => 'El(la) :attribute debe finalizar con uno de los siguientes valores: :values',
    'enum' => 'El(la) :attribute no está en la lista de valores permitidos.',
    'exists' => 'El(la) :attribute no existe.',
    'extensions' => 'El(la) :attribute debe tener una de las siguientes extensiones: :values.',
    'failed' => 'Estas credenciales no coinciden con nuestros registros.',
    'file' => 'El(la) :attribute debe ser un archivo.',
    'filled' => 'El(la) :attribute es obligatorio.',
    'gt' => [
        'array' => "El(la) :attribute debe tener más de :value elementos.",
        'file' => "El(la) :attribute debe tener más de :value kilobytes.",
        'numeric' => "El(la) :attribute debe ser mayor que :value.",
        'string' => "El(la) :attribute debe tener más de :value caracteres.",
    ],
    'gte' => [
        'array' => "El(la) :attribute debe tener como mínimo :value elementos.",
        'file' => "El(la) :attribute debe tener como mínimo :value kilobytes.",
        'numeric' => "El(la) :attribute debe ser como mínimo :value.",
        'string' => "El(la) :attribute debe tener como mínimo :value caracteres.",
    ],
    'hex_color' => 'El(la) :attribute debe tener un color hexadecimal válido.',
    'image' => 'La :attribute debe ser una imagen.',
    'in' => 'El(la) :attribute no está en la lista de valores permitidos.',
    'in_array' => 'El(la) :attribute debe existir en :other.',
    'integer' => 'El  :attribute debe ser un número entero.',
    'ip' => 'El(la) :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El(la) :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El(la) :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El(la) :attribute debe ser una cadena JSON válida.',
    'list' => 'El(la) :attribute debe ser una lista.',
    'lowercase' => 'El(la) :attribute debe estar en minúscula.',
    'lt' => [
        'array' => 'El :attribute debe tener menos de :value elementos.',
        'file' => 'El  :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El  :attribute debe ser menor que :value.',
        'string' => 'El(la) :attribute debe tener menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'El(la) :attribute debe tener como máximo :value elementos.',
        'file' => 'El(la) :attribute debe tener como máximo :value kilobytes.',
        'numeric' => 'El(la) :attribute debe ser como máximo :value.',
        'string' => 'El(la) :attribute debe tener como máximo :value caracteres.',
    ],
    'mac_address' => 'El(la) :attribute debe ser una dirección MAC válida.',
    'max' => [
        'array' => "El(la) :attribute no debe tener más de :max elementos.",
        'file' => "El(la) :attribute no debe ser mayor que :max kilobytes.",
        'numeric' => "El(la) :attribute no debe ser mayor que :max.",
        'string' => "El(la) :attribute no debe ser mayor que :max caracteres.",
    ],
    'max_digits' => 'El(la) :attribute no debe tener más de :max dígitos.',
    'mimes' => 'El(la) :attribute debe ser un archivo con formato: :values.',
    'mimetypes' => 'El(la) :attribute debe ser un archivo con formato: :values.',
    'min' => [
        'array' => ':attribute debe tener al menos :min elementos.',
        'file' => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'string' => ' :attribute debe contener al menos :min caracteres.',
    ],
    'min_digits' => 'El(la) :attribute debe tener al menos :min dígitos.',
    'missing' => 'El(la) :attribute no debe estar presente.',
    'missing_if' => 'El(la) :attribute no debe estar presente cuando :other sea :value.',
    'missing_unless' => 'El(la) :attribute no debe estar presente a menos que :other sea :value.',
    'missing_with' => 'El(la) :attribute no debe estar presente si alguno de los campos :values está presente.',
    'missing_with_all' => 'El(la) :attribute no debe estar presente cuando los campos :values estén presentes.',
    'multiple_of' => 'El(la) :attribute debe ser múltiplo de :value',
    'not_in' => 'El(la) :attribute no debe estar en la lista.',
    'not_regex' => 'El formato del(la) :attribute no es válido.',
    'numeric' => 'El  :attribute debe ser numérico.',
    'password' => [
        'letters' => 'La :attribute debe contener al menos una letra.',
        'mixed' => 'La :attribute debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'La :attribute debe contener al menos un número.',
        'symbols' => 'La :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'La :attribute proporcionada se ha visto comprometida en una filtración de datos (data leak). Elija una :attribute diferente.',
    ],
    'present' => 'El(la) :attribute debe estar presente.',
    'present_if' => 'El(la) :attribute debe estar presente cuando :other es :value.',
    'present_unless' => 'El(la) :attribute debe estar presente a menos que :other sea :value.',
    'present_with' => 'El(la) :attribute debe estar presente cuando :values esté presente.',
    'present_with_all' => 'El(la) :attribute debe estar presente cuando :values estén presentes.',
    'prohibited' => 'El(la) :attribute está prohibido.',
    'prohibited_if' => 'El(la) :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El(la) :attribute está prohibido a menos que :other sea :values.',
    'prohibits' => 'El(la) :attribute prohibe que :other esté presente.',
    'regex' => 'El formato del(la) :attribute no es válido.',
    'relatable' => 'Este :attribute no se puede asociar con este recurso',
    'required' => 'El(la):attribute es obligatorio.',
    'required_array_keys' => 'El(la) :attribute debe contener entradas para: :values.',
    'required_if' => 'El(la) :attribute es obligatorio cuando :other es :value.',
    'required_if_accepted' => 'El(la) :attribute es obligatorio si :other es aceptado.',
    'required_if_declined' => 'El(la) :attribute es obligatorio si :other es rechazado.',
    'required_unless' => 'El(la) :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El(la) :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El(la) :attribute es obligatorio cuando :values están presentes.',
    'required_without' => 'El(la) :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El(la) :attribute es obligatorio cuando ninguno de :values está presente.',
    'reset' => 'Su contraseña ha sido restablecida.',
    'same' => 'Los(las) :attribute y :other deben coincidir.',
    'sent' => 'Le hemos enviado por correo electrónico el enlace para restablecer su contraseña.',

    'size' => [
        'array' => 'El(la) :attribute debe contener :size elementos.',
        'file' => 'El tamaño de :attribute debe ser :size kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'string' => 'El(la) :attribute debe contener :size caracteres.',
    ],
    'starts_with' => 'El(la) :attribute debe comenzar con uno de los siguientes valores: :values.',
    'string' => 'El :attribute debe ser una cadena de caracteres.',
    'throttle' => 'Demasiados intentos de acceso. Por favor intente nuevamente en :seconds segundos.',
    'throttled' => 'Por favor espere antes de intentar de nuevo.',
    'timezone' => 'La :attribute debe ser una zona horaria válida.',
    'token' => 'El token de restablecimiento de contraseña es inválido.',
    'ulid' => 'El(la) :attribute debe ser un ULID válido.',
    'unique' => ':attribute ya ha sido registrado(a).',
    'uploaded' => 'Subir :attribute ha fallado.',
    'uppercase' => 'El(la) :attribute debe estar en mayúscula.',
    'url' => 'El(la):attribute debe ser una URL válida.',
    'user' => 'No encontramos ningún usuario con ese correo electrónico.',
    'uuid' => 'El(la) :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention 'attribute.rule" to name the lines. This makes it quick to
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
