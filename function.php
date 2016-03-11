<meta charset="utf-8"><pre>
<?
//Нахождение минимального
function mis(){
  $min = func_get_arg(0);

  //Проверям если задан всего 1 массив
  if((array) $min == true && func_num_args() == 1){
    $m = $min[0];
    for($i = 1; $i < count($min); $i++) {
      if($m > $min[$i])
        $m = $min[$i];
    }
    return $m;
  }
  //Находим минимальный елемент
  for($i = 1; $i < func_num_args(); $i++) {
    if($min > func_get_arg($i))
      $min = func_get_arg($i);
  }
  return $min;
}
$d[0] = mis(2, 3, 1, 6, 7);  // 1
$d[1] = mis(array(2, 4, 5)); // 2
$d[2] = mis(0, 'hello');     // 0
$d[3] = mis('hello', 0);     // hello
$d[4] = mis('hello', -1);    // -1
$d[5] = mis(array(2, 2, 2), array(1, 1, 1, 1)); // array(2, 2, 2)
$d[6] = mis(array(2, 4, 8), array(2, 5, 1)); // array(2, 4, 8)
$d[7] = mis('string', array(2, 5, 7), 42);   // string
$d[8] = mis(-10, FALSE, 10); // FALSE
$d[9] = mis(-10, NULL, 10);  // NULL
$d[10] = mis(0, TRUE); // 0

var_dump($d);

//Нахождение максимального
function mas(){
  $max = func_get_arg(0);

  //Проверям если задан всего 1 массив
  if((array) $max == true && func_num_args() == 1){
    $m = $max[0];
    for($i = 1; $i < count($max); $i++) {
      if($m < $max[$i])
        $m = $max[$i];
    }
    return $m;
  }
  //Находим максимальный елемент
  for($i = 1; $i < func_num_args(); $i++) {
    if($max < func_get_arg($i))
      $max = func_get_arg($i);
  }
  return $max;
}
$d[0] = mas(2, 3, 1, 6, 7);  // 7
$d[1] = mas(array(2, 4, 5)); // 5
$d[2] = mas(0, 'hello');     // 0
$d[3] = mas('hello', 0);     // hello
$d[4] = mas('hello', -1);    // hello
$d[5] = mas(array(2, 2, 2), array(1, 1, 1, 1)); // array(1, 1, 1, 1)
$d[6] = mas(array(2, 4, 8), array(2, 5, 1)); // array(2, 5, 1)
$d[7] = mas('string', array(2, 5, 7), 42);   // array(2, 5, 7)
$d[8] = mas(-10, FALSE); // -10
$d[9] = mas(-10, NULL);  // -10
$d[10] = mas(0, TRUE); // true

var_dump($d);

//Аналог array_push
function aray_push(&$array){

  for($i = 1; $i < func_num_args(); $i++) {
      $array[] = func_get_arg($i);
  }
  return count($array);
}

$stack = array("orange", "banana");
aray_push($stack, "apple", "raspberry");
print_r($stack);

//Аналог array_unshift
function aray_unshift(&$array){
  //создаем новый массив на основе поданных аргументов
  for($i = 1; $i < func_num_args(); $i++) {
      $mas[] = func_get_arg($i);
  }
  //дополняем новый массив, массивом $array
  foreach ($array as $key => $elem) {
      if(is_string($key))
        $mas[$key] = $elem;
      else
        $mas[] = $elem;
  }
  $array = $mas;
  return count($array);
}
$queue = array("fruit"=>"orange", "banana");
aray_unshift($queue, "apple", "raspberry");
print_r($queue);

//Аналог array_shift
function aray_shift(&$array){
  //Проверям что получили масив
  if(!is_array($array))
    return null;
  reset($array); //сбрасываем указатель
  $r = each($array); //получаем первый елемент и переводим указатель
  $new = array();
  //создаем новый массив
  while(list($key, $elem) = each($array)){
    if(is_string($key))
      $new[$key] = $elem;
    else
      $new[] = $elem;
  }
  $array = $new;//переприсваиваем новый массив
  reset($array);
  return $r['value'];
}
$queue = array("apple", "raspberry", "fruit"=>"orange", "banana");
//$queue = "ff";
var_dump(aray_shift($queue));
print_r($queue);
