<?php
    
    /**
     * Форматирование времени
     * @param <int> $seconds
     * @return <string>
     */
    function format_time($seconds)
    {
        $CI =& get_instance();
        
        $days = floor($seconds/86400);
        $hours = floor(($seconds-($days*86400))/3600);
        $minutes = floor(($seconds-($days*86400)-($hours*3600))/60);
        $seconds = floor($seconds-($days*86400)-($hours*3600)-($minutes*60));
        $return = '';
        $times_count = 0;
        if ($days > 0 and $times_count < 2)
        {
            $times_count++;
            $return .= $days.$CI->lang->line('d_mini').' ';
        }
        if ($hours > 0 and $times_count < 2)
        {
            $times_count++;
            $return .= $hours.$CI->lang->line('h_mini').' ';
        }
        if ($minutes > 0 and $times_count < 2)
        {
            $times_count++;
            $return .= $minutes.$CI->lang->line('m_mini').' ';
        }
        if ($seconds > 0 and $times_count < 2)
        {
            $times_count++;
            $return .= $seconds.$CI->lang->line('s_mini').' ';
        }
        
        return $return;
    }

    function premium_time($seconds)
    {
        $CI =& get_instance();

        $days = floor($seconds/86400);
        $hours = floor(($seconds-($days*86400))/3600);
        $minutes = floor(($seconds-($days*86400)-($hours*3600))/60);
        $seconds = floor($seconds-($days*86400)-($hours*3600)-($minutes*60));
        $return = ($days > 0) ? $days.$CI->lang->line('d_mini').' ' : '';
        if ($days > 0)
        {
            $return = $days.$CI->lang->line('d_mini');
        }
        elseif($days == 0 and $hours > 0)
        {
            $return = $hours.$CI->lang->line('h_mini');
        }
        elseif($days == 0 and $hours == 0 and $minutes > 0)
        {
            $return = $minutes.$CI->lang->line('m_mini');
        }
        elseif($days == 0 and $hours == 0 and $minutes == 0 and $seconds > 0)
        {
            $return = $seconds.$CI->lang->line('s_mini');
        }
        else
        {
            $return = '';
        }
        return $return;
    }

    function route_time($seconds, $hour)
    {
        $year = floor(date('Y', $seconds));
        $day = floor(date('d', $seconds));
        $month = floor(date('m', $seconds));
        $return = mktime($hour, 0, 0, $month, $day, $year);
        if ($return < $seconds){$return = mktime($hour, 0, 0, $month, $day+1, $year);}
        return $return;
    }

    /**
     * Генерация ключа
     * @param <int> $length
     * @return <string>
     */
    function random_key($length = 0)
    {
        $arr = array('a','b','c','d','e','f',
                     'g','h','i','j','k','l',
                     'm','n','o','p','r','s',
                     't','u','v','x','y','z',
                     'A','B','C','D','E','F',
                     'G','H','I','J','K','L',
                     'M','N','O','P','R','S',
                     'T','U','V','X','Y','Z',
                     '1','2','3','4','5','6',
                     '7','8','9','0');
        $pass = "";
        if ($length > 0)
        for($i = 0; $i < $length; $i++)
        {
          $index = rand(0, count($arr) - 1);
          $pass .= $arr[$index];
        }
        return $pass;
    }

    function resource_icon($type)
    {
        switch($type)
        {
            case 1: return 'wine'; break;
            case 2: return 'marble'; break;
            case 3: return 'glass'; break;
            case 4: return 'sulfur'; break;
            default: return 'wood'; break;
        }
    }

    function spy_mission_icon($type)
    {
        switch($type)
        {
            case 1: return 'arrived'; break;
            case 2: return 'return'; break;
            case 3: return 'money'; break;
            case 4: return 'money'; break;
            case 5: return 'research'; break;
            case 6: return 'online'; break;
            case 7: return 'garrison'; break;
            case 8: return 'fleet'; break;
            case 9: return 'message'; break;
        }
    }


/* End of file ikariam_helper.php */
/* Location: ./system/application/helpers/ikariam_helper.php */