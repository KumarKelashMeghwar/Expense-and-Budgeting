<?php

return [
    'month_1' => [
        [
            'date' => date("d/m/Y", mktime(0,0,0,1,1,2021)),
            'description' => 'Transaction 1',
            'amount'=> "$155.90"
        ],
        [
            'date' => date("d/m/Y", mktime(0,0,0,1,2,2021)),
            'description' => 'Transaction 2',
            'amount'=> "-$50.24"
        ],
        [
            'date' => date("d/m/Y", mktime(0,0,0,1,3,2021)),
            'description' => 'Transaction 3',
            'amount'=> "$88.21"
        ]
    ],
    'month_2' => [
        [
            'date' => date("d/m/Y", mktime(0,0,0,2,1,2021)),
            'description' => 'Transaction A',
            'amount'=> "$450"
        ],
        [
            'date' => date("d/m/Y", mktime(0,0,0,2,2,2021)),
            'description' => 'Transaction B',
            'amount'=> "$199.99"
        ],
        [
            'date' => date("d/m/Y", mktime(0,0,0,2,3,2021)),
            'description' => 'Transaction C',
            'amount'=> "-$349"
        ]
    ]
];
