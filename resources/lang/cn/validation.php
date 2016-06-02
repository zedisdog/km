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

    'accepted'             => ':attribute 必须被接受',
    'active_url'           => ':attribute 不是一个有效的URL',
    'after'                => ':attribute 必须大于 :date',
    'alpha'                => ':attribute 只能包含字母',
    'alpha_dash'           => ':attribute 只能包换字母数字和下划线',
    'alpha_num'            => ':attribute 只能包含字母和数字',
    'array'                => ':attribute 必须是一个数组',
    'before'               => ':attribute 必须小于 :date.',
    'between'              => [
        'numeric' => ':attribute 必须是 :min 到 :max 之间的数字',
        'file'    => ':attribute 的大小必须在 :min KB 到 :max KB 之间',
        'string'  => ':attribute 必须是长度在 :min 到 :max 之间的字符串',
        'array'   => ':attribute 必须是长度在 :min 到 :max 之间的数组',
    ],
    'boolean'              => ':attribute 必须为布尔值',
    'confirmed'            => ':attribute 验证不通过',
    'date'                 => ':attribute 不是一个有效的日期',
    'date_format'          => ':attribute 不符合格式 :format',
    'different'            => ':attribute 和 :other 不能相同',
    'digits'               => ':attribute 必须为 :digits',
    'digits_between'       => ':attribute 必须在 :min 到 :max 之间',
    'distinct'             => ':attribute 有多个值',
    'email'                => ':attribute 不是一个有效的E-mail地址',
    'exists'               => '选项 :attribute 不可用',
    'filled'               => ':attribute 不能为空',
    'image'                => ':attribute 必须为图片',
    'in'                   => '选项 :attribute 错误',
    'in_array'             => ':attribute 不在 :other 中',
    'integer'              => ':attribute 必须是一个整数',
    'ip'                   => ':attribute 不是一个有效的ip地址',
    'json'                 => ':attribute 不是一个有效的 JSON 字符串',
    'max'                  => [
        'numeric' => ':attribute 不能大于 :max.',
        'file'    => ':attribute 的大小不能超过 :max KB',
        'string'  => ':attribute 的长度不能超过 :max 个字符',
        'array'   => ':attribute 的长度不能超过 :max 个元素',
    ],
    'mimes'                => ':attribute 的类型必须为 :values.',
    'min'                  => [
        'numeric' => ':attribute 不能小于 :min.',
        'file'    => ':attribute 的大小不能小于 :min KB',
        'string'  => ':attribute 的长度不能小于 :min 个字符',
        'array'   => ':attribute 的长度不能小于 :min 个元素',
    ],
    'not_in'               => '选项 :attribute 不存在',
    'numeric'              => ':attribute 必须是一个数字',
    'present'              => ':attribute 必须有值',
    'regex'                => ':attribute 的格式不正确',
    'required'             => ':attribute 必填',
    'required_if'          => '当 :other 的值为 :value 时， :attribute 必填',
    'required_unless'      => ':other 不在 :values 中时，:attribute 必填',
    'required_with'        => '当 :values 有值时， :attribute 必填',
    'required_with_all'    => '当所有 :values 有值时， :attribute 必填',
    'required_without'     => '当 :values 没有值时， :attribute 必填',
    'required_without_all' => '当所有 :values 没有值时， :attribute 必填',
    'same'                 => ':attribute 必须与 :other 相同',
    'size'                 => [
        'numeric' => ':attribute 必须为 :size.',
        'file'    => ':attribute 大小 :size KB',
        'string'  => ':attribute 长度必须为 :size',
        'array'   => ':attribute 长度必须为 :size',
    ],
    'string'               => ':attribute 必须为字符串',
    'timezone'             => ':attribute 不是一个有效的时区',
    'unique'               => ':attribute 已经被使用了',
    'url'                  => ':attribute 不是一个有效的URL',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
