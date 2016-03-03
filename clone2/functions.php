<?php
function cat_routing($id = 0) {
  if ($id === 0) {
    return 0;
  }
  switch ($id) {
    case 1:
      return 2;
      break;
    case 2:
      return 3;
      break;
    case 4:
      return 4;
      break;
    case 3:
      return 5;
      break;
    case 5:
      return 6;
      break;
    case 7:
      return 7;
      break;
    case 8:
      return 8;
      break;
    case 18:
      return 9;
      break;
    case 9:
      return 10;
      break;
    case 10:
      return 11;
      break;
    case 27:
      return 12;
      break;
    case 24:
      return 13;
      break;
    case 25:
      return 14;
      break;
    case 14:
      return 15;
      break;
    case 6:
      return 16;
      break;
    case 22:
      return 17;
      break;
    case 23:
      return 18;
      break;
    case 26:
      return 19;
      break;
    case 11:
      return 20;
      break;
    case 12:
      return 21;
      break;
    case 13:
      return 22;
      break;
    case 19:
      return 23;
      break;
    case 20:
      return 24;
      break;
    default:
      # code...
      break;
  }
}

function cat_routing_r($id = 0) {
  if ($id === 0) {
    return 0;
  }
  switch ($id) {
    case 2:
      return 1;
      break;
    case 3:
      return 2;
      break;
    case 4:
      return 4;
      break;
    case 5:
      return 3;
      break;
    case 6:
      return 5;
      break;
    case 7:
      return 7;
      break;
    case 8:
      return 8;
      break;
    case 9:
      return 18;
      break;
    case 10:
      return 9;
      break;
    case 11:
      return 10;
      break;
    case 12:
      return 27;
      break;
    case 13:
      return 24;
      break;
    case 14:
      return 25;
      break;
    case 15:
      return 14;
      break;
    case 16:
      return 6;
      break;
    case 17:
      return 22;
      break;
    case 18:
      return 23;
      break;
    case 19:
      return 26;
      break;
    case 20:
      return 11;
      break;
    case 21:
      return 12;
      break;
    case 22:
      return 13;
      break;
    case 23:
      return 19;
      break;
    case 24:
      return 20;
      break;
    default:
      break;
  }
}