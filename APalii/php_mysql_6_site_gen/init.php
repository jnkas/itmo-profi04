<?php
$str = 'Initialise config.txt';

$config = [
    
        "arrCategory"=> [
            [
                "cat"=> "Sport"
            ],
            [
                "cat"=> "\u0434\u0430\u0447\u0430"
            ]
        ],
        "struct"=> [           
    "Sport"=> [
                
            ],
            "\u0434\u0430\u0447\u0430"=> [
                
            ]
]
];
// $config = [
//  //    "dict" => [ "ru" => "абвгдежзиклмнопрстуфхцюя",
// 	// 		   "en" => "abvgdejziklmnoprstufhcuj"],
// 	   "struct" => []
// ];

$dataconfig = json_encode($config);
file_put_contents('config.TXT', $dataconfig);
echo "Init comlpite";