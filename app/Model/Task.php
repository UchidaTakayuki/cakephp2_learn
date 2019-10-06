<?php
class Task extends AppModel {

    public $hasMany = ['Note'];

    public $validate = [
        'name' => [
            'rule' => ['maxlength', 90],
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Plase complate task!'
        ],
        'body' => [
            'rule' => ['maxLength', 255],
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Plase input detail'
        ]
    ];
}