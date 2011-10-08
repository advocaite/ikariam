<?
    // Пока что берем данные сухогруза, а потом будут братсья данные всех кораблей
    $cost = $this->CI->Data_Model->army_cost_by_type(23, $this->Player_Model->research, $this->Player_Model->levels[$this->Player_Model->town_id]);
    // Заносим координаты
    $x1 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->from]->island]->x;
    $x2 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->to]->island]->x;
    $y1 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->from]->island]->y;
    $y2 = $this->CI->Data_Model->temp_islands_db[$this->CI->Data_Model->temp_towns_db[$mission->to]->island]->y;
    // Время пути из одного конца в другой
    $time = $this->CI->Data_Model->time_by_coords($x1,$x2,$y1,$y2,$cost['speed']);
    // Прошло времени с момента начала миссии
    $mission_elapsed = time() - $mission->mission_start;
    // Осталось до конца миссии
    $mission_end = $time - $mission_elapsed;
    // Если загрузки не было в начале значит она должна быть в конце пути
    $loading_time = 0;
    // Получаем город
    $trade_town = $this->Data_Model->temp_towns_db[$mission->to];
    $from_town = $this->Data_Model->temp_towns_db[$mission->from];
    if($mission->loading_from_start == $mission->mission_start)
    {
        // Уровень порта в городе
        $port_position = $this->Data_Model->get_position(2, $trade_town);
        if($port_position == 1 or $port_position == 2)
        {
            $level_text = 'pos'.$port_position.'_level';
            $port_level = $trade_town->$level_text;
        }
        else
        {
            $port_level = 0;
        }
       // Находим скорость загрузки в чужом порту
       $port_speed = $this->Data_Model->speed_by_port_level($port_level);
       // Длительность загрузки
       $loading_time = ($all_resources/($port_speed / 60));
    }
    else
    {
        // Уровень порта в городе
        $port_position = $this->Data_Model->get_position(2, $from_town);
        if($port_position == 1 or $port_position == 2)
        {
            $level_text = 'pos'.$port_position.'_level';
            $port_level = $from_town->$level_text;
        }
        else
        {
            $port_level = 0;
        }
       // Находим скорость загрузки в чужом порту
       $port_speed = $this->Data_Model->speed_by_port_level($port_level);
       // Длительность загрузки
       $loading_time = ($all_resources/($port_speed / 60));
    }
    // Осталось до конца загрузки
    $loading_end = $mission_end + $loading_time;
    // Осталось до возврата
    // $return_end = ($mission->return_start-$mission->mission_start)*$mission->percent;
    // Если мы возвращаемся
    $return_end = 2147483647;
    if ($mission->return_start > 0)
    {
        if ($mission->percent == 0) { $mission->percent = 1; }
        // Время возврата
        $return = $time * $mission->percent;
        $return_elapsed = time() - $mission->return_start;
        // Осталось до возврата
        $return_end = ($return - $return_elapsed >= 0) ? $return - $return_elapsed : 0;
    }
