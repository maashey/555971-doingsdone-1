<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
 * Фильтрация данных для показа на странице
 *
 * @param string $str - строка для фильтрации
 * @return string отфильтрованная строка
 */
function esc($str) {
	$text = htmlspecialchars($str);
	return $text;
}
