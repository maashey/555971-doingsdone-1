<?php

//функция подсчёта кол-ва задач в проекте
function task_count($tasks, $project){
  $count=0;
  foreach ($tasks as $task) {
    if ($task['Категория'] == $project ){
      $count++;
    }
  }
  return $count;
}

//функция шаблонизатор
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    //Проверяем, что файл шаблона, переданный в аргументе, существует. Если не существует, то функция вернет пустую строку
    if (!file_exists($name)) {
        return $result;
    }

    ob_start(); //включение буферизации вывода
    extract($data); // extract делает из массива набор переменных в локальной области видимости
    require($name); //переменные из extract будут видны внутри подключаемого файла

    $result = ob_get_clean();  //возвращаем буфер и очищаем
    return $result;
}

/**
 * Расчёт оставшегося времени для задачи
 */
function time_is_over($date_exp) {
    if ($date_exp == 'Нет') {
      $res = false;
    }
    else{
      $diff = strtotime($date_exp) - time();
      if ($diff<=86400){
          $res = true;
      }
      else {
          $res = false;
      }
    }
    return $res;
}
