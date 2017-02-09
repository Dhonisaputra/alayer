<?php
$search = array(
'A',
'B',
'C',
'D',
'E',
'G',
'H',
'I',
'J',
'K',
'L',
'M',
'N',
'O',
'P',
'R',
'S',
'T',
'U',
'Y'
);

$replace = array(
'4',
'13',
'(',
'd',
'3',
'9',
'1-1',
'1',
'j',
'|<',
'|',
'111',
'/\/',
'0',
'p',
'12',
'5',
'7',
'!_!',
'y'
);

$subject = $_POST['text'];
$subject = strtoupper($subject);
$transform = nl2br( str_replace($search, $replace, $subject ) );
echo json_encode( array('transform' => $transform) );

/*A = 4
B = 13
C = ( / c 
D = d / @|
E = 3
G = 9
H = 1-1
I = 1
J = j
K = |<
L = |
M = 111
N = /\/
O = 0
P = p
R = 12
S = 5
T = 7
U = !_!
Y = y*/