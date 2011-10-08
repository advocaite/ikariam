<?php
class Data_Model extends Model
{

    function Data_Model()
    {
        // Call the Model constructor
        parent::Model();
                if ($this->session->userdata('language'))
                {
                    $this->lang->load('ikariam', $this->session->userdata('language'));
                }
                else
                {
                    $this->lang->load('ikariam');
                }
    }

    function Load_User($id = 0)
    {
        if ($id > 0){if (!isset($temp_users_db[$id])){
                $query = $this->db->get_where($this->session->userdata('universe').'_users', array('id' => $id));
                $return = $query->row();
                $this->temp_users_db[$id] = $return;
        }}
    }

    function Load_Town($id = 0)
    {
        if ($id > 0){if (!isset($temp_towns_db[$id])){
                $query = $this->db->get_where($this->session->userdata('universe').'_towns', array('id' => $id));
                $return = $query->row();
                $this->temp_towns_db[$id] = $return;
        }}
    }

    function Load_Island($id = 0)
    {
        if ($id > 0){if (!isset($temp_islands_db[$id])){
                $query = $this->db->get_where($this->session->userdata('universe').'_islands', array('id' => $id));
                $return = $query->row();
                $this->temp_islands_db[$id] = $return;
        }}
    }
    
    function Load_Research($id = 0)
    {
        if ($id > 0){if (!isset($temp_research_db[$id])){
                $query = $this->db->get_where($this->session->userdata('universe').'_research', array('user' => $id));
                $return = $query->row();
                $this->temp_research_db[$id] = $return;
        }}
    }
    
    function Load_Army($id = 0)
    {
        if ($id > 0){if (!isset($temp_army_db[$id])){
                $query = $this->db->get_where($this->session->userdata('universe').'_army', array('city' => $id));
                $return = $query->row();
                $this->temp_army_db[$id] = $return;
        }}
    }
    
    function Load_Missions($id = 0, $towns)
    {
        if (is_array($towns) and $id > 0){
                $where = '';
                foreach($towns as $town)
                {
                    $where .= '`to`='.$town->id.' or `from`='.$town->id.' or ';
                }
                    $where .= '`id`=0';
                $query = $this->db->query('SELECT * FROM '.$this->session->userdata('universe').'_missions WHERE '.$where.' ORDER BY `loading_from_start` ASC');
                $this->temp_missions_db[$id] = array();
                foreach ($query->result() as $return)
                {
                    $this->temp_missions_db[$id][$return->id] = $return;
                }
        }
    }

    function Load_Trade_Routes($id = 0)
    {
        if ($id > 0){if (!isset($temp_trade_routes_db[$id])){
                $query = $this->db->get_where($this->session->userdata('universe').'_trade_routes', array('user' => $id));
                foreach ($query->result() as $return)
                {
                    $this->temp_trade_routes_db[$id][$return->id] = $return;
                }
        }}
    }

    function Load_Spyes($id = 0)
    {
        if ($id > 0){if (!isset($temp_spyes_routes_db[$id])){
                $query = $this->db->get_where($this->session->userdata('universe').'_spyes', array('from' => $id));
                foreach ($query->result() as $return)
                {
                    $this->temp_spyes_db[$id][$return->id]= $return;
                }
        }}
    }

    /**
     * Имя шахты по типу
     * @param <int> $id
     * @return <string>
     */
    function island_building_by_resource($id)
    {
        switch($id)
        {
            case 1: return $this->lang->line('island_building_wine'); break;
            case 2: return $this->lang->line('island_building_marble'); break;
            case 3: return $this->lang->line('island_building_crystal'); break;
            case 4: return $this->lang->line('island_building_sulfur'); break;
            default: return $this->lang->line('island_building_wood'); break;
        }
    }

    /**
     * Название юнита по типу
     * @param <int> $type
     * @return <string>
     */
    function army_name_by_type($type)
    {
        switch($type)
        {
            case 1: return $this->lang->line('army1_name'); break;
            case 2: return $this->lang->line('army2_name'); break;
            case 3: return $this->lang->line('army3_name'); break;
            case 4: return $this->lang->line('army4_name'); break;
            case 5: return $this->lang->line('army5_name'); break;
            case 6: return $this->lang->line('army6_name'); break;
            case 7: return $this->lang->line('army7_name'); break;
            case 8: return $this->lang->line('army8_name'); break;
            case 9: return $this->lang->line('army9_name'); break;
            case 10: return $this->lang->line('army10_name'); break;
            case 11: return $this->lang->line('army11_name'); break;
            case 12: return $this->lang->line('army12_name'); break;
            case 13: return $this->lang->line('army13_name'); break;
            case 14: return $this->lang->line('army14_name'); break;
            case 15: return $this->lang->line('army15_name'); break;
            case 16: return $this->lang->line('army16_name'); break;
            case 17: return $this->lang->line('army17_name'); break;
            case 18: return $this->lang->line('army18_name'); break;
            case 19: return $this->lang->line('army19_name'); break;
            case 20: return $this->lang->line('army20_name'); break;
            case 21: return $this->lang->line('army21_name'); break;
            case 22: return $this->lang->line('army22_name'); break;
            case 23: return $this->lang->line('army23_name'); break;
        }
    }

    /**
     * Описание юнита по типу
     * @param <int> $type
     * @return <string>
     */
    function army_desc_by_type($type)
    {
        switch($type)
        {
            case 1: return $this->lang->line('army1_desc'); break;
            case 2: return $this->lang->line('army2_desc'); break;
            case 3: return $this->lang->line('army3_desc'); break;
            case 4: return $this->lang->line('army4_desc'); break;
            case 5: return $this->lang->line('army5_desc'); break;
            case 6: return $this->lang->line('army6_desc'); break;
            case 7: return $this->lang->line('army7_desc'); break;
            case 8: return $this->lang->line('army8_desc'); break;
            case 9: return $this->lang->line('army9_desc'); break;
            case 10: return $this->lang->line('army10_desc'); break;
            case 11: return $this->lang->line('army11_desc'); break;
            case 12: return $this->lang->line('army12_desc'); break;
            case 13: return $this->lang->line('army13_desc'); break;
            case 14: return $this->lang->line('army14_desc'); break;
            case 15: return $this->lang->line('army15_desc'); break;
            case 16: return $this->lang->line('army16_desc'); break;
            case 17: return $this->lang->line('army17_desc'); break;
            case 18: return $this->lang->line('army18_desc'); break;
            case 19: return $this->lang->line('army19_desc'); break;
            case 20: return $this->lang->line('army20_desc'); break;
            case 21: return $this->lang->line('army21_desc'); break;
            case 22: return $this->lang->line('army22_desc'); break;
            case 23: return $this->lang->line('army23_desc'); break;
        }
    }

    /**
     * Класс юнита по типу
     * @param <int> $type
     * @return <string>
     */
    function army_class_by_type($type)
    {
        switch($type)
        {
            case 1: return 'phalanx'; break;
            case 2: return 'steamgiant'; break;
            case 3: return 'spearman'; break;
            case 4: return 'swordsman'; break;
            case 5: return 'slinger'; break;
            case 6: return 'archer'; break;
            case 7: return 'marksman'; break;
            case 8: return 'ram'; break;
            case 9: return 'catapult'; break;
            case 10: return 'mortar'; break;
            case 11: return 'gyrocopter'; break;
            case 12: return 'bombardier'; break;
            case 13: return 'cook'; break;
            case 14: return 'medic'; break;
            case 15: return 'barbarian'; break;
            case 16: return 'ship_ram'; break;
            case 17: return 'ship_flamethrower'; break;
            case 18: return 'ship_steamboat'; break;
            case 19: return 'ship_ballista'; break;
            case 20: return 'ship_catapult'; break;
            case 21: return 'ship_mortar'; break;
            case 22: return 'ship_submarine'; break;
            case 23: return 'ship_transport'; break;
        }
    }

    /**
     * Цены на армию
     * @param <int> $type
     * @return <array>
     */
    function army_cost_by_type($type, $research, $levels, $use_research = TRUE)
    {
        $type = floor($type)-1;
        if ($type < 0)
        {
            $type = 0;
        }
        // Цены
        $peoples = '1 2 1 1 1 1 1 5 5 5 3 5 1 1 0 5 4 2 6 5 5 6 0';
        $wood = '40 130 30 30 20 30 50 220 260 300 25 40 50 50 0 220 80 300 180 180 220 160 0';
        $sulfur = '30 180 0 30 0 25 150 0 300 1250 100 250 0 0 0 50 230 1500 160 140 900 0 0';
        $wine = '0 0 0 0 0 0 0 0 0 0 0 0 250 0 0 0 0 0 0 0 0 0 0';
        $crystal = '0 0 0 0 0 0 0 0 0 0 0 0 0 450 0 0 0 0 0 0 0 750 0';
        $gold = '3 12 1 4 2 4 3 15 25 30 15 45 10 20 0 40 30 90 45 50 130 70 0';
        $time = '300 900 300 814 600 850 631 1383 2068 2040 1197 2700 929 2293 0 2400 1800 2400 3000 3000 3000 3600 0';
        // Параметры
        $defence = '1 3 0 0 0 0 0 1 0 0 0 0 0 0 1 6 3 8 4 0 2 3 0';
        $health = '56 184 13 18 8 16 12 88 54 32 29 40 22 12 12 120 110 236 132 86 56 47 30';
        $class = '1 2 1 1 1 1 1 2 2 2 2 2 1 1 1 2 2 2 2 2 2 2 2';
        /*
         * Классы:
         * 1 - Человек
         * 2 - Машина
         */
        $speed = '60 40 60 60 60 60 60 40 40 40 80 20 40 60 0 30 40 30 30 30 20 40 60';
        $ability = '1 0 0 2 0 1 2 3 3 3 0 2 4 5 0 0 0 0 0 0 0 0 0';
        /**
         * Способности:
         * 1 - Устойчивость - Увеличение силы защиты на 30%, когда юнит участвует в защите города
         * 2 - Атака - Увеличение силы атаки на 30%, когда юнит участвует в нападении
         * 3 - Стенобитное орудие - Способность нарушить Городскую стену при осаде города. За один бой в стене можно сделать столько проломов, сколько уровней она имеет.Каждый пролом добавляет 10% к силе атаки нападающих войск.
         *     Ориентировочная вероятность пролома стены для Тарана, в процентах = 2 / уровень стены
         *     Ориентировочная вероятность пролома стены для Катапульты, в процентах = 3 / уровень стены
         *     Ориентировочная вероятность пролома стены для Мортиры, в процентах = 4 / уровень стены
         * 4 - Восстановление - Способность восстанавливать выносливость за раунд у повреждённых юнитов. Если в бою участвуют несколько юнитов с такой способностью, эффект аккумулируется
         * 5 - Лекарь
         */
        $capacity = '5 15 3 3 3 5 5 30 30 30 15 30 20 10 0 0 0 0 0 0 0 0 0';

        $peoples_array = explode(' ', $peoples) ;
        $wood_array = explode(' ', $wood) ;
        $sulfur_array = explode(' ', $sulfur) ;
        $wine_array = explode(' ', $wine) ;
        $crystal_array = explode(' ', $crystal) ;
        $gold_array = explode(' ', $gold) ;
        $time_array = explode(' ', $time) ;

        $defence_array = explode(' ', $defence) ;
        $health_array = explode(' ', $health) ;
        $class_array = explode(' ', $class) ;
        $speed_array = explode(' ', $speed) ;
        $ability_array = explode(' ', $ability) ;
        $capacity_array = explode(' ', $capacity) ;

        $return['peoples'] = ($peoples_array[$type] > 0) ? $peoples_array[$type] : 0;
        $return['wood'] = ($wood_array[$type] > 0) ? $wood_array[$type] : 0;
        $return['sulfur'] = ($sulfur_array[$type] > 0) ? $sulfur_array[$type] : 0;
        $return['wine'] = ($wine_array[$type] > 0) ? $wine_array[$type] : 0;
        $return['crystal'] = ($crystal_array[$type] > 0) ? $crystal_array[$type] : 0;
        $return['gold'] = ($gold_array[$type] > 0) ? $gold_array[$type] : 0;
        $return['time'] = ($time_array[$type] > 0) ? $time_array[$type] : 0;

        $return['defence'] = ($defence_array[$type] > 0) ? $defence_array[$type] : 0;
        $return['health'] = ($health_array[$type] > 0) ? $health_array[$type] : 0;
        $return['class'] = ($class_array[$type] > 0) ? $class_array[$type] : 0;
        $return['speed'] = ($speed_array[$type] > 0) ? $speed_array[$type] : 0;
        $return['ability'] = ($ability_array[$type] > 0) ? $ability_array[$type] : 0;
        $return['capacity'] = ($capacity_array[$type] > 0) ? $capacity_array[$type] : 0;
        
        // Скидки на цены
        $minus_wood = 0;
        $minus_wine = 0;
        $minus_crystal = 0;
        $minus_sulfur = 0;
        $minus_gold = 0;
        if ($use_research)
        {
            // Исследования снижают содержание кораблей
            if ($type >= 15)
            {
                // Ремонт кораблей
                if ($research->res1_3 > 0) { $minus_gold = $minus_gold +0.02; }
                // Смола
                if ($research->res1_6 > 0) { $minus_gold = $minus_gold +0.04; }
                // Морские карты
                if ($research->res1_11 > 0) { $minus_gold = $minus_gold +0.08; }
                // Будущее мореходства
                if ($research->res1_14 > 0) { $minus_gold = $minus_gold +(0.02*$research->res1_14); }
            }
            // Исследования снижают содержание войск
            if ($type < 15)
            {
                // Карты
                if ($research->res4_2 > 0) { $minus_gold = $minus_gold +0.02; }
                // Кодекс чести
                if ($research->res4_5 > 0) { $minus_gold = $minus_gold +0.04; }
                // Логистика
                if ($research->res4_10 > 0) { $minus_gold = $minus_gold +0.08; }
                // Будущее армии
                if ($research->res4_14 > 0) { $minus_gold = $minus_gold +(0.02*$research->res4_14); }
            }
        }
        // плотницкая мастерская
        if ($levels[21] > 0)
        {
            $minus_wood = $minus_wood + (0.01*$levels[21]);
        }
        $return['gold'] = $return['gold'] - ($return['gold']*$minus_gold);
        $return['wood'] = $return['wood'] - ($return['wood']*$minus_wood);
        $return['wine'] = $return['wine'] - ($return['wine']*$minus_wine);
        $return['crystal'] = $return['crystal'] - ($return['crystal']*$minus_crystal);
        $return['sulfur'] = $return['sulfur'] - ($return['sulfur']*$minus_sulfur);
        if ($return['gold'] < 0){ $return['gold'] = 0; }
        if ($return['wood'] < 0){ $return['wood'] = 0; }
        if ($return['wine'] < 0){ $return['wine'] = 0; }
        if ($return['crystal'] < 0){ $return['crystal'] = 0; }
        if ($return['sulfur'] < 0){ $return['sulfur'] = 0; }

        // Уменьшаем время постройки от уровня здания
        switch($type)
        {
            case 0: if($levels[5] >= 4){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 4)*0.0455); } break;
            case 1: if($levels[5] >= 12){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 12)*0.0455); } break;
            case 2: $return['time'] = $return['time'] - ($return['time']*$levels[5]*0.0455); break;
            case 3: if($levels[5] >= 6){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 6)*0.0455); } break;
            case 4: if($levels[5] >= 2){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 2)*0.0455); } break;
            case 5: if($levels[5] >= 7){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 7)*0.0455); } break;
            case 6: if($levels[5] >= 13){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 13)*0.0455); } break;
            case 7: if($levels[5] >= 3){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 3)*0.0455); } break;
            case 8: if($levels[5] >= 8){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 8)*0.0455); } break;
            case 9: if($levels[5] >= 14){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 14)*0.0455); } break;
            case 10: if($levels[5] >= 10){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 10)*0.0455); } break;
            case 11: if($levels[5] >= 11){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 11)*0.0455); } break;
            case 12: if($levels[5] >= 5){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 5)*0.0455); } break;
            case 13: if($levels[5] >= 9){ $return['time'] = $return['time'] - ($return['time']*($levels[5] - 9)*0.0455); } break;
            
            case 14: $return['time'] = $return['time'] - ($return['time']*$levels[4]*0.0455); break;
            case 15: $return['time'] = $return['time'] - ($return['time']*$levels[4]*0.0455); break;
            case 16: if($levels[4] >= 4){ $return['time'] = $return['time'] - ($return['time']*($levels[4] - 4)*0.0455); } break;
            case 17: if($levels[4] >= 5){ $return['time'] = $return['time'] - ($return['time']*($levels[4] - 5)*0.0455); } break;
            case 18: if($levels[4] >= 2){ $return['time'] = $return['time'] - ($return['time']*($levels[4] - 2)*0.0455); } break;
            case 19: if($levels[4] >= 3){ $return['time'] = $return['time'] - ($return['time']*($levels[4] - 3)*0.0455); } break;
            case 20: if($levels[4] >= 6){ $return['time'] = $return['time'] - ($return['time']*($levels[4] - 6)*0.0455); } break;
            case 21: if($levels[4] >= 7){ $return['time'] = $return['time'] - ($return['time']*($levels[4] - 7)*0.0455); } break;
        }
        if ($return['time'] < 0){ $return['time'] = 1; }else{ $return['time'] = floor($return['time']); }

        return $return;
    }

    /**
     * Имя здания по типу
     * @param <int> $type
     * @return <string>
     */
    function building_name_by_type($type)
    {
        switch($type)
        {
            case 1: return $this->lang->line('building1_name'); break;
            case 2: return $this->lang->line('building2_name'); break;
            case 3: return $this->lang->line('building3_name'); break;
            case 4: return $this->lang->line('building4_name'); break;
            case 5: return $this->lang->line('building5_name'); break;
            case 6: return $this->lang->line('building6_name'); break;
            case 7: return $this->lang->line('building7_name'); break;
            case 8: return $this->lang->line('building8_name'); break;
            case 9: return $this->lang->line('building9_name'); break;
            case 10: return $this->lang->line('building10_name'); break;
            case 11: return $this->lang->line('building11_name'); break;
            case 12: return $this->lang->line('building12_name'); break;
            case 13: return $this->lang->line('building13_name'); break;
            case 14: return $this->lang->line('building14_name'); break;
            case 15: return $this->lang->line('building15_name'); break;
            case 16: return $this->lang->line('building16_name'); break;
            case 17: return $this->lang->line('building17_name'); break;
            case 18: return $this->lang->line('building18_name'); break;
            case 19: return $this->lang->line('building19_name'); break;
            case 20: return $this->lang->line('building20_name'); break;
            case 21: return $this->lang->line('building21_name'); break;
            case 22: return $this->lang->line('building22_name'); break;
            case 23: return $this->lang->line('building23_name'); break;
            case 24: return $this->lang->line('building24_name'); break;
            case 25: return $this->lang->line('building25_name'); break;
            case 26: return $this->lang->line('building26_name'); break;
            default: return $this->lang->line('building0_name'); break;
        }
    }

    /**
     * Описание здания по типу
     * @param <int> $type
     * @return <string>
     */
    function building_desc_by_type($type)
    {
        switch($type)
        {
            case 1: return $this->lang->line('building1_desc');
            case 2: return $this->lang->line('building2_desc');
            case 3: return $this->lang->line('building3_desc');
            case 4: return $this->lang->line('building4_desc');
            case 5: return $this->lang->line('building5_desc');
            case 6: return $this->lang->line('building6_desc');
            case 7: return $this->lang->line('building7_desc');
            case 8: return $this->lang->line('building8_desc');
            case 9: return $this->lang->line('building9_desc');
            case 10: return $this->lang->line('building10_desc');
            case 11: return $this->lang->line('building11_desc');
            case 12: return $this->lang->line('building12_desc');
            case 13: return $this->lang->line('building13_desc');
            case 14: return $this->lang->line('building14_desc');
            case 15: return $this->lang->line('building15_desc');
            case 16: return $this->lang->line('building16_desc');
            case 17: return $this->lang->line('building17_desc');
            case 18: return $this->lang->line('building18_desc');
            case 19: return $this->lang->line('building19_desc');
            case 20: return $this->lang->line('building20_desc');
            case 21: return $this->lang->line('building21_desc');
            case 22: return $this->lang->line('building22_desc');
            case 23: return $this->lang->line('building23_desc');
            case 24: return $this->lang->line('building24_desc');
            case 25: return $this->lang->line('building25_desc');
            case 26: return $this->lang->line('building26_desc');
        }
    }

    /**
     * Тип здания по классу
     * @param <string> $class
     * @return <int>
     */
    function building_type_by_class($class)
    {
        switch($class)
        {
            case 'townHall': return 1; break;
            case 'port': return 2; break;
            case 'academy': return 3; break;
            case 'shipyard': return 4; break;
            case 'barracks': return 5; break;
            case 'warehouse': return 6; break;
            case 'wall': return 7; break;
            case 'tavern': return 8; break;
            case 'museum': return 9; break;
            case 'palace': return 10; break;
            case 'embassy': return 11; break;
            case 'branchOffice': return 12; break;
            case 'workshop': return 13; break;
            case 'safehouse': return 14; break;
            case 'palaceColony': return 15; break;
            case 'forester': return 16; break;
            case 'stonemason': return 17; break;
            case 'glassblowing': return 18; break;
            case 'winegrower': return 19; break;
            case 'alchemist': return 20; break;
            case 'carpentering': return 21; break;
            case 'architect': return 22; break;
            case 'optician': return 23; break;
            case 'vineyard': return 24; break;
            case 'fireworker': return 25; break;
            case 'temple': return 26; break;
        }
    }

    /**
     * Класс здания по типу
     * @param <int> $type
     * @return <string>
     */
    function building_class_by_type($type)
    {
        switch($type)
        {
            case 1: return 'townHall'; break;
            case 2: return 'port'; break;
            case 3: return 'academy'; break;
            case 4: return 'shipyard'; break;
            case 5: return 'barracks'; break;
            case 6: return 'warehouse'; break;
            case 7: return 'wall'; break;
            case 8: return 'tavern'; break;
            case 9: return 'museum'; break;
            case 10: return 'palace'; break;
            case 11: return 'embassy'; break;
            case 12: return 'branchOffice'; break;
            case 13: return 'workshop'; break;
            case 14: return 'safehouse'; break;
            case 15: return 'palaceColony'; break;
            case 16: return 'forester'; break;
            case 17: return 'stonemason'; break;
            case 18: return 'glassblowing'; break;
            case 19: return 'winegrower'; break;
            case 20: return 'alchemist'; break;
            case 21: return 'carpentering'; break;
            case 22: return 'architect'; break;
            case 23: return 'optician'; break;
            case 24: return 'vineyard'; break;
            case 25: return 'fireworker'; break;
            case 26: return 'temple'; break;
            default: return 'buildingGround'; break;
        }
    }

    /**
     * Название ресурса по типу
     * @param <int> $type
     * @return <string>
     */
    function resource_name_by_type($type)
    {
        switch($type)
        {
            case 1: return $this->lang->line('resource_wine'); break;
            case 2: return $this->lang->line('resource_marble'); break;
            case 3: return $this->lang->line('resource_crystal'); break;
            case 4: return $this->lang->line('resource_sulfur'); break;
            default: return $this->lang->line('resource_wood'); break;
        }
    }

    /**
     * Название класса ресурса по типу
     * @param <int> $type
     * @return <string>
     */
    function resource_class_by_type($type)
    {
        switch($type)
        {
            case 1: return 'wine'; break;
            case 2: return 'marble'; break;
            case 3: return 'crystal'; break;
            case 4: return 'sulfur'; break;
            default: return 'wood'; break;
        }
    }

    /**
     * Количество жителей от уровня
     * @param <int> $level
     * @return <int>
     */
    function peoples_by_level($level = 1)
    {
        switch($level)
        {
            case 1: return 60; break;
            case 2: return 96; break;
            case 3: return 142; break;
            case 4: return 200; break;
            case 5: return 262; break;
            case 6: return 332; break;
            case 7: return 410; break;
            case 8: return 492; break;
            case 9: return 580; break;
            case 10: return 672; break;
            case 11: return 768; break;
            case 12: return 870; break;
            case 13: return 976; break;
            case 14: return 1086; break;
            case 15: return 1200; break;
            case 16: return 1320; break;
            case 17: return 1440; break;
            case 18: return 1566; break;
            case 19: return 1696; break;
            case 20: return 1828; break;
            case 21: return 1964; break;
            case 22: return 2102; break;
            case 23: return 2296; break;
            case 24: return 2440; break;
            case 25: return 2590; break;
            case 26: return 2740; break;
            case 27: return 2894; break;
            case 28: return 3002; break;
            case 29: return 3162; break;
            case 30: return 3326; break;
            case 31: return 3492; break;
            case 32: return 3710; break;
            case 33: return 3880; break;
            case 34: return 4054; break;
            case 35: return 4230; break;
            case 36: return 4410; break;
            case 37: return 4590; break;
            case 38: return 4774; break;
            case 39: return 4960; break;
            case 40: return 5184; break;
            case 41: return 5340; break;
            case 42: return 5532; break;
            case 43: return 5728; break;
            case 44: return 5926; break;
            case 45: return 6126; break;
            case 46: return 6328; break;
            case 47: return 6534; break;
            case 48: return 6760; break;
        }
        return ($level > 48) ? 6760 + (($level - 48) * 250) : 60;
    }

    /**
     * Количество ученых от уровня
     * @param <int> $level
     * @return <int>
     */
    function scientists_by_level($level = 0)
    {
        switch($level)
        {
            case 0: return 0; break;
            case 1: return 8; break;
            case 2: return 12; break;
            case 3: return 16; break;
            case 4: return 22; break;
            case 5: return 28; break;
            case 6: return 35; break;
            case 7: return 43; break;
            case 8: return 51; break;
            case 9: return 60; break;
            case 10: return 69; break;
            case 11: return 79; break;
            case 12: return 89; break;
            case 13: return 100; break;
            case 14: return 111; break;
            case 15: return 122; break;
            case 16: return 134; break;
            case 17: return 146; break;
            case 18: return 159; break;
            case 19: return 172; break;
            case 20: return 185; break;
            case 21: return 198; break;
            case 22: return 212; break;
            case 23: return 227; break;
            case 24: return 241; break;
            case 25: return 256; break;
            case 26: return 271; break;
            case 27: return 287; break;
            case 28: return 302; break;
        }
        if ($level > 28){ $return = 300 + (($level - 28)*20); return $return;}
        // На будущее по 20 ученых на каждом уровне
    }

    /**
     * Цены, время на шахты, количество работников
     * @param <int> $id
     * @param <int> $level
     * @return <array>
     */
    function island_cost($id = 0, $level = 0)
    {
        $level = $level - 1;
        $wood = ''; $workers = ''; $time = ''; $max_level = 0;
        switch($id)
        {
            case 0:
                $wood = '0 394 992 1732 2788 3783 5632 8139 10452 13298 18478 23213 29038 39494 49107 66010 81766 101146 134598 154304 205012 270839 311541 411229 506475 665201 767723 1007959 1240496 1526516 1995717 2311042 3020994 3935195 4572136 5624478 7325850 9011590';
                $workers = '30 38 50 64 80 96 114 134 154 174 196 218 240 264 288 314 340 366 394 420 448 478 506 536 566 598 628 660 692 724 758 790 824 860 894 928 964 1000';
                $time = '0 1512 2383 3342 4380 5520 6540 8220 9720 11460 13320 15360 17640 20100 22860 25680 29160 32820 36780 41220 46080 51420 57240 63660 70800 78600 86400 93600 104400 115200 129600 144000 158400 176400 194400 212400 234000 259200';
            break;
            case 1:
            case 2:
            case 3:
            case 4:
                $wood = '0 1303 2689 4373 7421 10037 13333 20665 26849 37305 47879 65572 89127 106217 152739 193512 244886 309618 414190 552058 660106 925396 1108885 1471979 1855942 2339735 3096779 3903252 5153666';
                $workers = '20 32 48 66 88 110 132 158 184 212 240 270 302 332 366 400 434 468 504 542 578 618 656 696 736 776 818 860 904';
                $time = '0 3024 4740 6660 8760 11100 13620 16440 19500 22920 26640 30660 35100 39300 45720 51720 58320 65640 73680 90000 100800 111600 126000 140400 154800 174360 190800 212400';
            break;
        }
        if ($wood != '')
        {
            $wood_array = explode(' ', $wood) ;
            $return['wood'] = ($wood_array[$level] > 0) ? $wood_array[$level] : 0;
            $max_level = count($wood_array)-1;
        }else{$return['wood'] = 0;}
        if ($workers != '')
        {
            $workers_array = explode(' ', $workers) ;
            $return['workers'] = ($workers_array[$level] > 0) ? $workers_array[$level] : 0;
            $max_level = count($workers_array)-1;
        }else{$return['workers'] = 0;}
        if ($time != '')
        {
            $time_array = explode(' ', $time) ;
            $return['time'] = ($time_array[$level] > 0) ? $time_array[$level] : 0;
            $max_level = count($time_array)-1;
        }else{$return['time'] = 0;}
        $return['max_level'] = $max_level;
        return $return;
    }

    /**
     * Цены на здания и время построек
     * @param <int> $id
     * @param <int> $level
     * @return <array>
     */
    function building_cost($id = 1, $level = 0, $research, $levels)
    {
        if ($level < 0){ $level = 0; }
        $wood = ''; $wine = ''; $marble = ''; $crystal = ''; $sulfur = ''; $time = ''; $max_level = 0;
        switch($id)
        {
            case 1:
                $wood = '0 158 335 623 923 1390 2015 2706 3661 4776 6173 8074 10281 13023 16424 20986 25423 32285 40232 49286 61207 74804 93956 113035 141594 170213 210011 258875 314902 387655 471194 572580 695615 854728 1037814 1274043 1714396 1876185 2276285 2761291 3384433 4061703 4975980 6032502 7312522 8861330 10846841 13016620';
                $marble = '0 0 0 0 285 551 936 1411 2091 2945 4072 5664 7637 10214 13575 18254 23250 31022 40599 52216 68069 87316 115101 145326 191053 241039 312128 403824 515592 666227 850031 1084292 1382826 1783721 2273685 2930330 3692589 4756439 6058680 7716365 9929883 12512054 16094037 20485822 26073281 33181278 42636728 53722706';
                $time = '0 3544 3960 4440 4980 5640 6480 7380 8460 9720 11160 12900 14880 17280 20040 23220 27000 31440 36600 42660 49740 57960 67680 78960 90000 104400 122400 144000 169200 198000 234000 273600 320400 374400 439200 511200 597600 702000 820800 961200 1125360 1314000 1537200 1800000 2106000 2552400 2883600 3373200';
            break;
            case 2:
                $wood = '60 150 274 492 637 894 1207 1645 2106 2735 3537 4492 5689 7103 8850 11094 13731 17062 21097 25965 31810 39190 47998 58713 71955 87627 94250 130776 159019 193936 235848 286513 348718 423990 513947 625160';
                $marble = '0 0 0 0 0 176 326 540 791 1138 1598 2176 2928 3859 5051 6628 8566 11089 14265 18241 23197 29642 37636 47703 60556 76366 85042 122156 153753 194088 244300 307173 386955 486969 610992 796302';
                $time = '1008 1386 1821 2321 2895 3557 4260 5160 6180 7320 8640 10200 11940 13980 16260 18960 22020 25560 29640 34320 39720 45900 52980 61214 70620 81420 93600 108000 115200 140400 162000 187200 216000 252000 288000 331200';
            break;
            case 3:
                $wood = '64 68 115 263 382 626 982 1330 2004 2665 3916 5156 7446 9753 12751 18163 23691 33450 43571 56728 73832 103458 144203 175057 243929 317207 439967 536309 743789 1027469';
                $crystal = '0 0 0 0 225 428 744 1089 1748 2454 3786 5216 7862 10729 14599 21627 29321 43020 58213 78724 106414 154857 224146 282571 408877 552140 795252 1006646 1449741 2079650';
                $time = '504 1354 1768 2266 2863 3580 4440 5460 6660 8160 9960 12060 14640 17760 21420 25860 31200 37560 45240 54480 65520 78720 93600 111600 133200 162000 194400 234000 280800 338400';
            break;
            case 4:
                $wood = '105 202 324 477 671 914 1222 1609 2096 2711 2997 3835 4892 7238 9190 11648 14746 18650 23568 29765 37573 47412 59808 75428 95108 119906 151151 190520 240124 302626 381378 480605';
                $marble = '0 0 0 0 0 778 1052 1397 1832 2381 2641 3390 4332 6420 8161 10354 13118 16601 20989 26517 33484 42261 53321 67256 84814 106938 134814 169937 214192 269954 340214 428741';
                $time = '2592 3078 3588 4080 4680 5220 5880 6540 7233 7920 8700 9480 10320 11160 12060 13020 14040 15120 16260 17400 18660 19920 21300 22680 24180 25740 27420 29160 30960 32880 34860 36960';
            break;
            case 5:
                $wood = '49 114 195 296 420 574 766 1003 1297 1662 2115 2676 3371 4234 5304 6630 8275 10314 12843 15979 19868 24690 30669 38083 47277 58676 72812 90340 112076 139027 172448';
                $marble = '0 0 0 0 0 0 0 0 178 431 745 1134 1616 2214 2956 3875 5015 6429 8183 10357 13052 16395 20540 25680 32054 39957 49756 61908 76977 95660 118830';
                $time = '396 1044 1321 1626 1962 2330 2736 3183 3660 4200 4800 5460 6180 6960 7800 8760 9840 10980 12240 13680 15180 16920 18780 20820 23040 25560 28260 31260 34560 38220 42240';
            break;
            case 6:
                $wood = '160 288 442 626 847 1113 1431 1813 2272 2822 3483 4275 5226 6368 7737 9380 11353 13719 16559 19967 24056 28963 34852 41918 50398 60574 72784 87437 105021 126121 151441 181825 218286 262039 314543 377548 453153 543880 652752 783398';
                $marble = '0 0 0 96 211 349 515 714 953 1240 1584 1997 2492 3086 3800 4656 5683 6915 8394 10169 12299 14855 17922 21602 26019 31319 37678 45310 54468 65458 78645 94471 113461 136249 163595 196409 235787 283041 339745 407790';
                $time = '562 1583 2107 2704 3385 4140 5040 6000 7206 8460 9960 11700 13620 15840 18360 21240 24540 28260 32520 37380 42960 49260 56460 64680 74040 84720 93600 108000 126000 144000 162000 187200 216000 244800 273600 316800 363600 414000 471600 540000';
            break;
            case 7:
                $wood = '114 361 657 1012 1439 1951 2565 3302 4186 5247 6521 8049 9882 12083 14724 17892 21695 26258 31733 38304 46189 55650 67004 80629 96979 116599 140143 168395 202298 242982 291802 350387 420689 505049 606284 727765';
                $marble = '0 203 516 892 1344 1885 2535 3315 4251 5374 6721 8338 10279 12608 15402 18755 22779 27607 33402 40355 48699 58711 70726 85144 102446 123208 148122 178019 213896 256948 308610 370605 444998 534270 641397 769949';
                $time = '1260 3096 3720 4380 5160 6000 6960 7980 9060 10320 11700 13140 14820 16620 18600 20820 23220 25860 28740 31980 35460 39360 43620 46995 53460 59160 65400 72240 79800 88080 97200 104400 115200 129600 140400 158400';
            break;
            case 8:
                $wood = '101 222 367 541 750 1001 1302 1663 2097 2617 3241 3990 4888 5967 7261 8814 10678 12914 15598 18818 22683 27320 32885 39562 47576 57192 68731 82578 99194 119134 143061 171774 206230 247577 297192 356731 428179 513916 616800 740261';
                $marble = '0 0 0 94 122 158 206 267 348 452 587 764 993 1290 1677 2181 2835 3685 4791 6228 8097 10526 13684 17789 23125 30063 39082 50806 66048 85862 111621 145107 188640 245231 318800 414441 538774 700406 910528 1183686';
                $time = '1008 1695 2423 3195 3960 4860 5760 6720 7800 8880 10020 11280 12540 13920 15420 16980 18600 20340 22200 24180 26220 28440 30780 33240 35880 38640 41640 44760 48060 51540 55260 59220 63420 67860 72540 77520 82830 88380 93600 97200';
            break;

            case 10:
            case 15:
                $wood = '712 5823 16048 36496 77392 159184 322768 649936 1304272 2612944 5230287 10464974';
                $wine = '0 0 0 10898 22110 44534 89382 179078 358470 717254 1233946 2869957';
                $marble = '0 1433 4546 10770 23218 48114 97906 197490 396658 794994 1591666 3185009';
                $crystal = '0 0 0 0 21188 42400 84824 169672 339368 678760 1357543 2715112';
                $sulfur = '0 0 3088 10300 24725 53573 111269 226661 457445 919013 1584248 3688421';
                $time = '16080 22560 31560 44220 61920 86700 118800 169200 237600 331200 464400 651600';
            break;

            case 12:
                $wood = '48 173 346 581 896 1314 1863 2580 3509 4706 6241 8203 10699 13866 17872 22926 29286 37272 47282 59806 75446 94954 119245 149453 186977';
                $marble = '0 0 0 0 540 792 1123 1555 2115 2837 3762 4945 6450 8359 10774 13820 17654 22469 28502 36051 45481 57240 71883 90092 112712';
                $time = '1440 2520 3660 4980 6420 7980 9720 11640 13740 16080 18600 21420 24480 27900 31620 35700 40260 45180 50640 56640 63240 70560 78540 87300 93600';
            break;

            case 14:
                $wood = '113 248 402 578 779 1007 1267 1564 1903 2288 2728 3230 3801 4453 5195 6042 7008 8108 9363 10793 12423 14282 16401 18816 21570 24709 28288 32368 37019 42321 48365 55255';
                $marble = '0 0 0 129 197 275 366 471 593 735 900 1090 1312 1569 1866 2212 2613 3078 3617 4243 4968 5810 6787 7919 9233 10758 12526 14577 16956 19716 22917 26631';
                $time = '1440 2160 2916 3660 4500 5400 6300 7260 8280 9360 10440 11640 12900 14160 15540 16920 18420 20040 21660 23400 25247 27120 29160 31260 33480 35760 38220 40800 43440 46260 49260 52380';
            break;
        
            case 16:
                $wood = '250 430 664 968 1364 1878 2546 3415 4544 6013 7922 10403 13629 17823 23274 30362 39574 51552 67123 87363 113680 160157 192360';
                $marble = '0 104 237 410 635 928 1309 1803 2446 3282 4368 5781 7617 10004 13108 17142 22386 29204 38068 49589 64569 91013 109337';
                $time = '1080 1800 2592 3463 4380 5460 6600 7860 9300 10857 12540 14422 16440 18720 21180 23940 26940 30240 33900 37860 42300 47160 52440';
            break;
            case 17:
            case 18:
            case 19:
            case 20:
                $wood = '274 467 718 1045 1469 2021 2738 3671 4883 6459 8508 11172 14634 19135 24987 32594 42483 55339 72050 93778 122021 158740';
                $marble = '0 116 255 436 671 977 1375 1892 2564 3437 4572 6049 7968 10462 13705 17921 23402 30527 39790 51830 67485 87833';
                $time = '1080 1800 2592 3463 4380 5460 6600 7860 9300 10857 12540 14422 16440 18720 21180 23940 26940 30240 33900 37860 42300 47160';
            break;
            case 21:
                $wood = '63 122 192 274 372 486 620 777 962 1178 1432 1730 2078 2486 2964 3524 4178 4944 5841 6890 8117 9550 11229 13190 15484 18167 21299 24946 29245 34247 40096 46930';
                $marble = '0 0 0 0 0 0 0 359 444 546 669 816 993 1205 1459 1765 2131 2571 3097 3731 4490 5402 6496 7809 9383 11273 13543 16263 19531 23450 28154 33798';
                $time = '792 1008 1237 1480 1737 2010 2299 2605 2930 3274 3639 4020 4380 4860 5280 5820 6300 6840 7440 8040 8700 9420 10140 10980 11760 126000 13560 14520 15540 16680 17820 19080';
            break;
        }
        if ($wood != '')
        {
            $wood_array = explode(' ', $wood) ;
            $return['wood'] = (isset($wood_array[$level]) and $wood_array[$level] > 0) ? $wood_array[$level] : 0;
            $max_level = count($wood_array)-1;
        }else{$return['wood'] = 0;}
        if ($wine != '')
        {
            $wine_array = explode(' ', $wine) ;
            $return['wine'] = (isset($wine_array[$level]) and $wine_array[$level] > 0) ? $wine_array[$level] : 0;
            $max_level = count($wine_array)-1;
        }else{$return['wine'] = 0;}
        if ($marble != '')
        {
            $marble_array = explode(' ', $marble) ;
            $return['marble'] = (isset($marble_array[$level]) and $marble_array[$level] > 0) ? $marble_array[$level] : 0;
            $max_level = count($marble_array)-1;
        }else{$return['marble'] = 0;}
        if ($crystal != '')
        {
            $crystal_array = explode(' ', $crystal) ;
            $return['crystal'] = (isset($crystal_array[$level]) and $crystal_array[$level] > 0) ? $crystal_array[$level] : 0;
            $max_level = count($crystal_array)-1;
        }else{$return['crystal'] = 0;}
        if ($sulfur != '')
        {
            $sulfur_array = explode(' ', $sulfur) ;
            $return['sulfur'] = (isset($sulfur_array[$level]) and $sulfur_array[$level] > 0) ? $sulfur_array[$level] : 0;
            $max_level = count($sulfur_array)-1;
        }else{$return['sulfur'] = 0;}
        if ($time != '')
        {
            $time_array = explode(' ', $time) ;
            $return['time'] = (isset($time_array[$level]) and $time_array[$level] > 0) ? $time_array[$level] : 0;
            $max_level = count($time_array)-1;
        }else{$return['time'] = 0;}
        $return['max_level'] = $max_level;
        // скидки на цены
        $minus_wood = 0;
        $minus_wine = 0;
        $minus_marble = 0;
        $minus_crystal = 0;
        $minus_sulfur = 0;
        // Исследования уменьшают стоимость зданий
        // Шкиф
        if ($research->res2_2 > 0)
        {
            $minus_wood = $minus_wood + 0.02;
            $minus_wine = $minus_wine + 0.02;
            $minus_marble = $minus_marble + 0.02;
            $minus_crystal = $minus_crystal + 0.02;
            $minus_sulfur = $minus_sulfur + 0.02;
        }
        // Геометрия
        if ($research->res2_6 > 0)
        {
            $minus_wood = $minus_wood + 0.04;
            $minus_wine = $minus_wine + 0.04;
            $minus_marble = $minus_marble + 0.04;
            $minus_crystal = $minus_crystal + 0.04;
            $minus_sulfur = $minus_sulfur + 0.04;
        }
        // Водяной уровень
        if ($research->res2_11 > 0)
        {
            $minus_wood = $minus_wood + 0.08;
            $minus_wine = $minus_wine + 0.08;
            $minus_marble = $minus_marble + 0.08;
            $minus_crystal = $minus_crystal + 0.08;
            $minus_sulfur = $minus_sulfur + 0.08;
        }
        // Плотницкая мастерская
        if ($levels[21] > 0)
        {
            $minus_wood = $minus_wood + (0.01*$levels[21]);
        }
        $return['wood'] = $return['wood'] - ($return['wood']*$minus_wood);
        $return['wine'] = $return['wine'] - ($return['wine']*$minus_wine);
        $return['marble'] = $return['marble'] - ($return['marble']*$minus_marble);
        $return['crystal'] = $return['crystal'] - ($return['crystal']*$minus_crystal);
        $return['sulfur'] = $return['sulfur'] - ($return['sulfur']*$minus_sulfur);

        if ($return['wood'] < 0){ $return['wood'] = 0; }
        if ($return['wine'] < 0){ $return['wine'] = 0; }
        if ($return['marble'] < 0){ $return['marble'] = 0; }
        if ($return['crystal'] < 0){ $return['crystal'] = 0; }
        if ($return['sulfur'] < 0){ $return['sulfur'] = 0; }

        return $return;
    }

    /**
     * Название счастья по количеству
     * @param <int> $count
     * @return <string>
     */
    function good_name_by_count($count = 0)
    {
        if ($count <= -50)
        {
            return 'Ярость';
        }
        elseif($count > -50 and $count <= -1)
        {
            return 'Горе';
        }
        elseif($count >= 0 and $count < 50)
        {
            return 'Нейтрально';
        }
        elseif($count >= 50 and $count < 300)
        {
            return 'Счастье';
        }
        elseif($count >= 300)
        {
            return 'Эйфория';
        }
    }

    /**
     * Класс счастья по количеству
     * @param <int> $count
     * @return <string>
     */
    function good_class_by_count($count = 0)
    {
        if ($count <= -50)
        {
            return 'outraged';
        }
        elseif($count > -50 and $count <= -1)
        {
            return 'sad';
        }
        elseif($count >= 0 and $count < 50)
        {
            return 'neutral';
        }
        elseif($count >= 50 and $count < 300)
        {
            return 'happy';
        }
        elseif($count >= 300)
        {
            return 'ecstatic';
        }
    }


    /**
     * Очередь построек
     * @param <string> $text
     */
    function load_build_line($text)
    {
            if ($text != '')
            {
                $build_line = explode(";", $text);
                for ($i = 0; $i < count($build_line); $i++)
                {
                    if ($build_line[$i] != '')
                    {
                        $temp_data = explode(",", $build_line[$i]);
                        $build_line[$i] = array();
                        $build_line[$i]['position'] = $temp_data[0];
                        $build_line[$i]['type'] = $temp_data[1];
                        //$already_build[$temp_data[1]] = true;
                    }
                }
                return $build_line;
            }
    }

    /**
     * Очередь армии
     * @param <string> $text
     */
    function load_army_line($text)
    {
            if ($text != '')
            {
                $army_line = explode(";", $text);
                for ($i = 0; $i < count($army_line); $i++)
                {
                    if ($army_line[$i] != '')
                    {
                        $temp_data = explode(",", $army_line[$i]);
                        $army_line[$i] = array();
                        $army_line[$i]['type'] = $temp_data[0];
                        $army_line[$i]['count'] = $temp_data[1];
                    }
                }
                return $army_line;
            }
    }

    /**
     * Поиск позиции
     * @param <int> $type
     * @param <array> $buildings
     * @return <int>
     */
    function get_position($type = 0, $town)
    {
        $return = 0;
        for ($i = 0; $i <= 14; $i++)
        {
            $type_text = 'pos'.$i.'_type';
            if ($town->$type_text == $type)
            {
                $return = $i;
            }
        }
        return $return;
    }

    /**
     * Данные об исследованиях
     * @param <int> $way
     * @param <int> $id
     * @param <array> $research
     * @return <array>
     */
    function get_research($way = 1, $id = 1, $research)
    {
        if ($way == 1 and $id > 14){$id = 14;}
        if ($way == 2 and $id > 15){$id = 15;}
        if ($way == 3 and $id > 16){$id = 16;}
        if ($way == 4 and $id > 14){$id = 14;}

        $return['need_way'] = 0;
        $return['need_id'] = 0;
        $return['name'] = '';
        $return['desc'] = '';
        $return['points'] = 0;
        $return['id'] = $id;
        switch($way)
        {
            case 1:
                switch($id)
                {
                    case 1:
                        $return['name'] = $this->lang->line('research1_1_name');
                        $return['desc'] = $this->lang->line('research1_1_desc');
                        $return['points'] = 8;
                    break;
                    case 2:
                        $return['name'] = $this->lang->line('research1_2_name');
                        $return['desc'] = $this->lang->line('research1_2_desc');
                        $return['points'] = 12;
                        if ($research->res1_1 == 0){ $return['need_way'] = 1; $return['need_id'] = 1; }
                        elseif ($research->res4_1 == 0){ $return['need_way'] = 4; $return['need_id'] = 1;  }
                    break;
                    case 3:
                        $return['name'] = $this->lang->line('research1_3_name');
                        $return['desc'] = $this->lang->line('research1_3_desc');
                        $return['points'] = 24;
                        if ($research->res1_2 == 0){ $return['need_way'] = 1; $return['need_id'] = 2; }
                    break;
                    case 4:
                        $return['name'] = $this->lang->line('research1_4_name');
                        $return['desc'] = $this->lang->line('research1_4_desc');
                        $return['points'] = 336;
                        if ($research->res1_3 == 0){ $return['need_way'] = 1; $return['need_id'] = 3; }
                        elseif ($research->res2_3 == 0){ $return['need_way'] = 2; $return['need_id'] = 3; }
                    break;
                    case 5:
                        $return['name'] = $this->lang->line('research1_5_name');
                        $return['desc'] = $this->lang->line('research1_5_desc');
                        $return['points'] = 1032;
                        if ($research->res1_4 == 0){ $return['need_way'] = 1; $return['need_id'] = 4; }
                        elseif ($research->res3_3 == 0){ $return['need_way'] = 3; $return['need_id'] = 3; }
                    break;
                    case 6:
                        $return['name'] = $this->lang->line('research1_6_name');
                        $return['desc'] = $this->lang->line('research1_6_desc');
                        $return['points'] = 2236;
                        if ($research->res1_5 == 0){ $return['need_way'] = 1; $return['need_id'] = 5; }
                    break;
                    case 7:
                        $return['name'] = $this->lang->line('research1_7_name');
                        $return['desc'] = $this->lang->line('research1_7_desc');
                        $return['points'] = 3264;
                        if ($research->res1_6 == 0){ $return['need_way'] = 1; $return['need_id'] = 6; }
                        elseif ($research->res2_5 == 0){ $return['need_way'] = 2; $return['need_id'] = 5; }
                    break;
                    case 8:
                        $return['name'] = $this->lang->line('research1_8_name');
                        $return['desc'] = $this->lang->line('research1_8_desc');
                        $return['points'] = 7020;
                        if ($research->res1_7 == 0){ $return['need_way'] = 1; $return['need_id'] = 7; }
                        elseif ($research->res3_4 == 0){ $return['need_way'] = 3; $return['need_id'] = 4; }
                    break;
                    case 9:
                        $return['name'] = $this->lang->line('research1_9_name');
                        $return['desc'] = $this->lang->line('research1_9_desc');
                        $return['points'] = 9936;
                        if ($research->res1_8 == 0){ $return['need_way'] = 1; $return['need_id'] = 8; }
                        elseif ($research->res2_7 == 0){ $return['need_way'] = 2; $return['need_id'] = 7; }
                    break;
                    case 10:
                        $return['name'] = $this->lang->line('research1_10_name');
                        $return['desc'] = $this->lang->line('research1_10_desc');
                        $return['points'] = 17064;
                        if ($research->res1_9 == 0){ $return['need_way'] = 1; $return['need_id'] = 9; }
                        elseif ($research->res4_8 == 0){ $return['need_way'] = 4; $return['need_id'] = 8; }
                   break;
                    case 11:
                        $return['name'] = $this->lang->line('research1_11_name');
                        $return['desc'] = $this->lang->line('research1_11_desc');
                        $return['points'] = 25632;
                        if ($research->res1_10 == 0){ $return['need_way'] = 1; $return['need_id'] = 10; }
                    break;
                    case 12:
                        $return['name'] = $this->lang->line('research1_12_name');
                        $return['desc'] = $this->lang->line('research1_12_desc');
                        $return['points'] = 38400;
                        if ($research->res1_11 == 0){ $return['need_way'] = 1; $return['need_id'] = 11; }
                        elseif ($research->res3_7 == 0){ $return['need_way'] = 3; $return['need_id'] = 7; }
                    break;
                    case 13:
                        $return['name'] = $this->lang->line('research1_13_name');
                        $return['desc'] = $this->lang->line('research1_13_desc');
                        $return['points'] = 93240;
                        if ($research->res1_12 == 0){ $return['need_way'] = 1; $return['need_id'] = 12; }
                        elseif ($research->res3_9 == 0){ $return['need_way'] = 3; $return['need_id'] = 9; }
                    break;
                    case 14:
                        $return['name'] = $this->lang->line('research1_14_name');
                        $return['desc'] = $this->lang->line('research1_14_desc');
                        $return['points'] = 532800;
                        if ($research->res1_13 == 0){ $return['need_way'] = 1; $return['need_id'] = 13; }
                        elseif ($research->res2_14 == 0){ $return['need_way'] = 2; $return['need_id'] = 14; }
                        elseif ($research->res3_15 == 0){ $return['need_way'] = 3; $return['need_id'] = 15; }
                        elseif ($research->res4_13 == 0){ $return['need_way'] = 4; $return['need_id'] = 13; }
                    break;
                }
            break;
            case 2:
                switch($id)
                {
                    case 1:
                        $return['name'] = $this->lang->line('research2_1_name');
                        $return['desc'] = $this->lang->line('research2_1_desc');
                        $return['points'] = 12;
                    break;
                    case 2:
                        $return['name'] = $this->lang->line('research2_2_name');
                        $return['desc'] = $this->lang->line('research2_2_desc');
                        $return['points'] = 24;
                        if ($research->res2_1 == 0){ $return['need_way'] = 2; $return['need_id'] = 1; }
                    break;
                    case 3:
                        $return['name'] = $this->lang->line('research2_3_name');
                        $return['desc'] = $this->lang->line('research2_3_desc');
                        $return['points'] = 112;
                        if ($research->res2_2 == 0){ $return['need_way'] = 2; $return['need_id'] = 2; }
                    break;
                    case 4:
                        $return['name'] = $this->lang->line('research2_4_name');
                        $return['desc'] = $this->lang->line('research2_4_desc');
                        $return['points'] = 336;
                        if ($research->res2_3 == 0){ $return['need_way'] = 2; $return['need_id'] = 3; }
                        elseif ($research->res3_1 == 0){ $return['need_way'] = 3; $return['need_id'] = 1; }
                    break;
                    case 5:
                        $return['name'] = $this->lang->line('research2_5_name');
                        $return['desc'] = $this->lang->line('research2_5_desc');
                        $return['points'] = 1204;
                        if ($research->res2_4 == 0){ $return['need_way'] = 2; $return['need_id'] = 4; }
                        elseif ($research->res1_4 == 0){ $return['need_way'] = 1; $return['need_id'] = 4; }
                    break;
                    case 6:
                        $return['name'] = $this->lang->line('research2_6_name');
                        $return['desc'] = $this->lang->line('research2_6_desc');
                        $return['points'] = 2236;
                        if ($research->res2_5 == 0){ $return['need_way'] = 2; $return['need_id'] = 5; }
                    break;
                    case 7:
                        $return['name'] = $this->lang->line('research2_7_name');
                        $return['desc'] = $this->lang->line('research2_7_desc');
                        $return['points'] = 3672;
                        if ($research->res2_6 == 0){ $return['need_way'] = 2; $return['need_id'] = 6; }
                        elseif ($research->res3_4 == 0){ $return['need_way'] = 3; $return['need_id'] = 4; }
                    break;
                    case 8:
                        $return['name'] = $this->lang->line('research2_8_name');
                        $return['desc'] = $this->lang->line('research2_8_desc');
                        $return['points'] = 7200;
                        if ($research->res2_7 == 0){ $return['need_way'] = 2; $return['need_id'] = 7; }
                    break;
                    case 9:
                        $return['name'] = $this->lang->line('research2_9_name');
                        $return['desc'] = $this->lang->line('research2_9_desc');
                        $return['points'] = 10764;
                        if ($research->res2_8 == 0){ $return['need_way'] = 2; $return['need_id'] = 8; }
                        elseif ($research->res1_7 == 0){ $return['need_way'] = 1; $return['need_id'] = 7; }
                    break;
                    case 10:
                        $return['name'] = $this->lang->line('research2_10_name');
                        $return['desc'] = $this->lang->line('research2_10_desc');
                        $return['points'] = 19908;
                        if ($research->res2_9 == 0){ $return['need_way'] = 2; $return['need_id'] = 9; }
                        elseif ($research->res3_7 == 0){ $return['need_way'] = 3; $return['need_id'] = 7; }
                    break;
                    case 11:
                        $return['name'] = $this->lang->line('research2_11_name');
                        $return['desc'] = $this->lang->line('research2_11_desc');
                        $return['points'] = 25632;
                        if ($research->res2_10 == 0){ $return['need_way'] = 2; $return['need_id'] = 10; }
                    break;
                    case 12:
                        $return['name'] = $this->lang->line('research2_12_name');
                        $return['desc'] = $this->lang->line('research2_12_desc');
                        $return['points'] = 48000;
                        if ($research->res2_11 == 0){ $return['need_way'] = 2; $return['need_id'] = 11; }
                    break;
                    case 13:
                        $return['name'] = $this->lang->line('research2_13_name');
                        $return['desc'] = $this->lang->line('research2_13_desc');
                        $return['points'] = 106560;
                        if ($research->res2_12 == 0){ $return['need_way'] = 2; $return['need_id'] = 12; }
                    break;
                    case 14:
                        $return['name'] = $this->lang->line('research2_14_name');
                        $return['desc'] = $this->lang->line('research2_14_desc');
                        $return['points'] = 241200;
                        if ($research->res2_13 == 0){ $return['need_way'] = 2; $return['need_id'] = 13; }
                        elseif ($research->res1_10 == 0){ $return['need_way'] = 1; $return['need_id'] = 10; }
                        elseif ($research->res3_13 == 0){ $return['need_way'] = 3; $return['need_id'] = 13; }
                        elseif ($research->res4_11 == 0){ $return['need_way'] = 4; $return['need_id'] = 11; }
                    break;
                    case 15:
                        $return['name'] = $this->lang->line('research2_15_name');
                        $return['desc'] = $this->lang->line('research2_15_desc');
                        $return['points'] = 532800;
                        if ($research->res2_14 == 0){ $return['need_way'] = 2; $return['need_id'] = 14; }
                        elseif ($research->res1_13 == 0){ $return['need_way'] = 1; $return['need_id'] = 13; }
                        elseif ($research->res3_15 == 0){ $return['need_way'] = 3; $return['need_id'] = 15; }
                        elseif ($research->res4_13 == 0){ $return['need_way'] = 4; $return['need_id'] = 13; }
                    break;
                }
            break;
            case 3:
                switch($id)
                {
                    case 1:
                        $return['name'] = $this->lang->line('research3_1_name');
                        $return['desc'] = $this->lang->line('research3_1_desc');
                        $return['points'] = 24;
                    break;
                    case 2:
                        $return['name'] = $this->lang->line('research3_2_name');
                        $return['desc'] = $this->lang->line('research3_2_desc');
                        $return['points'] = 30;
                        if ($research->res3_1 == 0){ $return['need_way'] = 3; $return['need_id'] = 1; }
                    break;
                    case 3:
                        $return['name'] = $this->lang->line('research3_3_name');
                        $return['desc'] = $this->lang->line('research3_3_desc');
                        $return['points'] = 420;
                        if ($research->res3_2 == 0){ $return['need_way'] = 3; $return['need_id'] = 2; }
                        elseif ($research->res2_3 == 0){ $return['need_way'] = 2; $return['need_id'] = 3; }
                    break;
                    case 4:
                        $return['name'] = $this->lang->line('research3_4_name');
                        $return['desc'] = $this->lang->line('research3_4_desc');
                        $return['points'] = 1428;
                        if ($research->res3_3 == 0){ $return['need_way'] = 3; $return['need_id'] = 3; }
                        elseif ($research->res1_4 == 0){ $return['need_way'] = 1; $return['need_id'] = 4; }
                        elseif ($research->res4_3 == 0){ $return['need_way'] = 4; $return['need_id'] = 3; }
                    break;
                    case 5:
                        $return['name'] = $this->lang->line('research3_5_name');
                        $return['desc'] = $this->lang->line('research3_5_desc');
                        $return['points'] = 2652;
                        if ($research->res3_4 == 0){ $return['need_way'] = 3; $return['need_id'] = 4; }
                    break;
                    case 6:
                        $return['name'] = $this->lang->line('research3_6_name');
                        $return['desc'] = $this->lang->line('research3_6_desc');
                        $return['points'] = 4320;
                        if ($research->res3_5 == 0){ $return['need_way'] = 3; $return['need_id'] = 5; }
                        elseif ($research->res2_5 == 0){ $return['need_way'] = 2; $return['need_id'] = 5; }
                    break;
                    case 7:
                        $return['name'] = $this->lang->line('research3_7_name');
                        $return['desc'] = $this->lang->line('research3_7_desc');
                        $return['points'] = 8694;
                        if ($research->res3_6 == 0){ $return['need_way'] = 3; $return['need_id'] = 6; }
                    break;
                    case 8:
                        $return['name'] = $this->lang->line('research3_8_name');
                        $return['desc'] = $this->lang->line('research3_8_desc');
                        $return['points'] = 14952;
                        if ($research->res3_7 == 0){ $return['need_way'] = 3; $return['need_id'] = 7; }
                    break;
                    case 9:
                        $return['name'] = $this->lang->line('research3_9_name');
                        $return['desc'] = $this->lang->line('research3_9_desc');
                        $return['points'] = 21360;
                        if ($research->res3_8 == 0){ $return['need_way'] = 3; $return['need_id'] = 8; }
                        elseif ($research->res2_7 == 0){ $return['need_way'] = 2; $return['need_id'] = 7; }
                    break;
                    case 10:
                        $return['name'] = $this->lang->line('research3_10_name');
                        $return['desc'] = $this->lang->line('research3_10_desc');
                        $return['points'] = 21360;
                        if ($research->res3_9 == 0){ $return['need_way'] = 3; $return['need_id'] = 9; }
                    break;
                    case 11:
                        $return['name'] = $this->lang->line('research3_11_name');
                        $return['desc'] = $this->lang->line('research3_11_desc');
                        $return['points'] = 31968;
                        if ($research->res3_10 == 0){ $return['need_way'] = 3; $return['need_id'] = 10; }
                    break;
                    case 12:
                        $return['name'] = $this->lang->line('research3_12_name');
                        $return['desc'] = $this->lang->line('research3_12_desc');
                        $return['points'] = 46848;
                        if ($research->res3_11 == 0){ $return['need_way'] = 3; $return['need_id'] = 11; }
                        elseif ($research->res4_6 == 0){ $return['need_way'] = 4; $return['need_id'] = 6; }
                    break;
                    case 13:
                        $return['name'] = $this->lang->line('research3_13_name');
                        $return['desc'] = $this->lang->line('research3_13_desc');
                        $return['points'] = 144720;
                        if ($research->res3_12 == 0){ $return['need_way'] = 3; $return['need_id'] = 12; }
                        elseif ($research->res1_9 == 0){ $return['need_way'] = 1; $return['need_id'] = 9; }
                        elseif ($research->res2_10 == 0){ $return['need_way'] = 2; $return['need_id'] = 10; }
                        elseif ($research->res4_9 == 0){ $return['need_way'] = 4; $return['need_id'] = 9; }
                    break;
                    case 14:
                        $return['name'] = $this->lang->line('research3_14_name');
                        $return['desc'] = $this->lang->line('research3_14_desc');
                        $return['points'] = 209880;
                        if ($research->res3_13 == 0){ $return['need_way'] = 3; $return['need_id'] = 13; }
                        elseif ($research->res1_12 == 0){ $return['need_way'] = 1; $return['need_id'] = 12; }
                        elseif ($research->res4_12 == 0){ $return['need_way'] = 4; $return['need_id'] = 12; }
                    break;
                    case 15:
                        $return['name'] = $this->lang->line('research3_15_name');
                        $return['desc'] = $this->lang->line('research3_15_desc');
                        $return['points'] = 444000;
                        if ($research->res3_14 == 0){ $return['need_way'] = 3; $return['need_id'] = 14; }
                    break;
                    case 16:
                        $return['name'] = $this->lang->line('research3_16_name');
                        $return['desc'] = $this->lang->line('research3_16_desc');
                        $return['points'] = 610560;
                        if ($research->res3_15 == 0){ $return['need_way'] = 3; $return['need_id'] = 15; }
                        elseif ($research->res1_13 == 0){ $return['need_way'] = 3; $return['need_id'] = 13; }
                        elseif ($research->res2_14 == 0){ $return['need_way'] = 2; $return['need_id'] = 14; }
                        elseif ($research->res4_13 == 0){ $return['need_way'] = 4; $return['need_id'] = 13; }
                    break;
                }
            break;
            case 4:
                switch($id)
                {
                    case 1:
                        $return['name'] = $this->lang->line('research4_1_name');
                        $return['desc'] = $this->lang->line('research4_1_desc');
                        $return['points'] = 8;
                    break;
                    case 2:
                        $return['name'] = $this->lang->line('research4_2_name');
                        $return['desc'] = $this->lang->line('research4_2_desc');
                        $return['points'] = 24;
                        if ($research->res4_1 == 0){ $return['need_way'] = 4; $return['need_id'] = 1; }
                    break;
                    case 3:
                        $return['name'] = $this->lang->line('research4_3_name');
                        $return['desc'] = $this->lang->line('research4_3_desc');
                        $return['points'] = 336;
                        if ($research->res4_2 == 0){ $return['need_way'] = 4; $return['need_id'] = 2; }
                        elseif ($research->res2_3 == 0){ $return['need_way'] = 2; $return['need_id'] = 3; }
                    break;
                    case 4:
                        $return['name'] = $this->lang->line('research4_4_name');
                        $return['desc'] = $this->lang->line('research4_4_desc');
                        $return['points'] = 1032;
                        if ($research->res4_3 == 0){ $return['need_way'] = 4; $return['need_id'] = 3; }
                        elseif ($research->res3_3 == 0){ $return['need_way'] = 3; $return['need_id'] = 3; }
                    break;
                    case 5:
                        $return['name'] = $this->lang->line('research4_5_name');
                        $return['desc'] = $this->lang->line('research4_5_desc');
                        $return['points'] = 2236;
                        if ($research->res4_4 == 0){ $return['need_way'] = 4; $return['need_id'] = 4; }
                    break;
                    case 6:
                        $return['name'] = $this->lang->line('research4_6_name');
                        $return['desc'] = $this->lang->line('research4_6_desc');
                        $return['points'] = 3264;
                        if ($research->res4_5 == 0){ $return['need_way'] = 4; $return['need_id'] = 5; }
                    break;
                    case 7:
                        $return['name'] = $this->lang->line('research4_7_name');
                        $return['desc'] = $this->lang->line('research4_7_desc');
                        $return['points'] = 7020;
                        if ($research->res4_6 == 0){ $return['need_way'] = 4; $return['need_id'] = 6; }
                        elseif ($research->res3_6 == 0){ $return['need_way'] = 3; $return['need_id'] = 6; }
                    break;
                    case 8:
                        $return['name'] = $this->lang->line('research4_8_name');
                        $return['desc'] = $this->lang->line('research4_8_desc');
                        $return['points'] = 11592;
                        if ($research->res4_7 == 0){ $return['need_way'] = 4; $return['need_id'] = 7; }
                        elseif ($research->res2_4 == 0){ $return['need_way'] = 2; $return['need_id'] = 4; }
                    break;
                    case 9:
                        $return['name'] = $this->lang->line('research4_9_name');
                        $return['desc'] = $this->lang->line('research4_9_desc');
                        $return['points'] = 19908;
                        if ($research->res4_8 == 0){ $return['need_way'] = 4; $return['need_id'] = 8; }
                        elseif ($research->res2_5 == 0){ $return['need_way'] = 2; $return['need_id'] = 5; }
                    break;
                    case 10:
                        $return['name'] = $this->lang->line('research4_10_name');
                        $return['desc'] = $this->lang->line('research4_10_desc');
                        $return['points'] = 25632;
                        if ($research->res4_9 == 0){ $return['need_way'] = 4; $return['need_id'] = 9; }
                    break;
                    case 11:
                        $return['name'] = $this->lang->line('research4_11_name');
                        $return['desc'] = $this->lang->line('research4_11_desc');
                        $return['points'] = 38400;
                        if ($research->res4_10 == 0){ $return['need_way'] = 4; $return['need_id'] = 10; }
                        elseif ($research->res3_9 == 0){ $return['need_way'] = 3; $return['need_id'] = 9; }
                    break;
                    case 12:
                        $return['name'] = $this->lang->line('research4_12_name');
                        $return['desc'] = $this->lang->line('research4_12_desc');
                        $return['points'] = 106560;
                        if ($research->res4_11 == 0){ $return['need_way'] = 4; $return['need_id'] = 11; }
                    break;
                    case 13:
                        $return['name'] = $this->lang->line('research4_13_name');
                        $return['desc'] = $this->lang->line('research4_13_desc');
                        $return['points'] = 209040;
                        if ($research->res4_12 == 0){ $return['need_way'] = 4; $return['need_id'] = 12; }
                    break;
                    case 14:
                        $return['name'] = $this->lang->line('research4_14_name');
                        $return['desc'] = $this->lang->line('research4_14_desc');
                        $return['points'] = 532800;
                        if ($research->res4_13 == 0){ $return['need_way'] = 4; $return['need_id'] = 13; }
                        elseif ($research->res1_13 == 0){ $return['need_way'] = 1; $return['need_id'] = 13; }
                        elseif ($research->res2_14 == 0){ $return['need_way'] = 2; $return['need_id'] = 14; }
                        elseif ($research->res3_15 == 0){ $return['need_way'] = 3; $return['need_id'] = 15; }
                    break;
                }
            break;
        }
        $parametr = 'res'.$way.'_'.$id;
        if ($research->$parametr > 0){ $return['points'] = $return['points'] * ($research->$parametr + 1);}
        return $return;
    }

    /**
     * Название чуда по типу
     * @param <int> $type
     * @return <string>
     */
    function get_wonder_by_type($type)
    {
        switch($type)
        {
            case 1: return $this->lang->line('wonder_1'); break;
            case 2: return $this->lang->line('wonder_2'); break;
            case 3: return $this->lang->line('wonder_3'); break;
            case 4: return $this->lang->line('wonder_4'); break;
            case 5: return $this->lang->line('wonder_5'); break;
            case 6: return $this->lang->line('wonder_6'); break;
            case 7: return $this->lang->line('wonder_7'); break;
            case 8: return $this->lang->line('wonder_8'); break;
        }
    }

    /**
     * Цены на премиумы
     * @param <string> $type
     * @return <int>
     */
    function premium_cost($type = '')
    {
        switch($type)
        {
            case 'account':return 10;break;
            case 'wood':return 10;break;
            case 'wine':return 3;break;
            case 'marble':return 8;break;
            case 'crystal':return 5;break;
            case 'sulfur':return 3;break;
            case 'capacity':return 14;break;
        }
    }

    /**
     * Количество вина от уровня
     * @param <int> $level
     * @return <int>
     */
    function wine_by_tavern_level($level = 0)
    {
        $wine = '0 4 8 13 18 24 30 37 44 51 60 68 78 88 99 110 122 136 150 165 180 197 216 235 255 277 300 325 351 378 408 439 472 507 544 584 626 670 717 766 818';
        $wine_array = explode(' ', $wine) ;
        if ($level > 40) { $return = 818 + ((40-$level)*60); }else{ $return = ($wine_array[$level] > 0) ? $wine_array[$level] : 0; }
        return $return;
    }

    /**
     * Данные стены от уровня
     * @param <int> $level
     * @return <array>
     */
    function wall_data_by_level($level = 0)
    {
        $reservation = '0 15 15 23 23 23 31 31 31 39 39 39 47 47 47 55 55 55 63 63 63 71 71 71 79 79 79 87 87 87 95 95 95 103 103 103 103';
        $health = 100+($level*50);
        $return['health'] = $health;
        $array_reservation = explode(' ',$reservation);
        $return['reservation'] = $array_reservation[$level];
        return $return;
    }

    /**
     * Скорость погрузки от уровня
     * @param <int> $level
     * @return <int>
     */
    function speed_by_port_level($level = 0)
    {
        $speed = '10 30 60 93 129 169 213 261 315 373 437 508 586 672 766 869 983 1108 1246 1398 1565 1748 1950 2172 2416 2685 2980 3305 3663 4056 4489 4965 5488 6064 6698 7394 8161';
        $array_speed = explode(' ',$speed);
        $return = $array_speed[$level];
        return $return;
    }

    /**
     * Цена сухогруза от количества
     * @param <int> $count
     * @return <int>
     */
    function transport_cost_by_count($count = 0)
    {
        $gold = '480 897 1326 1770 2226 2694 3177 3675 4188 4719 5262 5823 6399 6996 7608 8238 8889 9558 10248 10959 11688 12441 13218 14019 14841 15690 16563 17463 18390 19344 20325 21339 22383 23457 24561 25701 26877 28086 29331 30612 31935 33294 34695 36141 37626 39159 40737 42360 44034 45759 47532 49362 51246 53187 55185 57243 59361 61545 63795 66111 68499 70956 73488 76095 78780 81546 84396 87330 90351 93465 96672 99975 103377 106881 110490 114207 118038 121980 126042 130227 134538 138975 143547 148257 153108 158103 163248 168549 174009 179631 185424 191388 197532 203862 210381 217095 224010 231132 238470 246027 253809 261828 270084 278589 287349 296373 305667 315240 325101 335256 345717 356490 367587 379020 390792 402918 415410 428274 441525 455172 469203 483711 498624 513987 529809 546105 562893 580182 597990 616332 635226 654684 674727 695373 716637 738537 761097 784332 808266 832917 858306 884457 911394 939138 967716 997149 1027467 1058694 1090857 1123986 1158108 1193253 1229454 1266740 1305147 1344702 1385448 1427411 1470639 1515159';
        $array_gold = explode(' ',$gold);
        $return = ($count < 160) ? $array_gold[$count] : 0;
        return $return;
    }

    function time_by_coords($x1, $x2, $y1, $y2, $speed)
    {
        $distance = sqrt((($x1-$x2)*($x1-$x2))+(($y1-$y2)*($y1-$y2)));
        if (($x1 == $x2 and $y1 == $y2) or ($distance <=0))
        {
            $time = (1200/$speed*1*60)/2;
        }
        else
        {
            $time = 1200/$speed*$distance*60;
        }
        return $time;
    }

    function spy_time_by_coords($x1, $x2, $y1, $y2)
    {
        $distance = sqrt((($x1-$x2)*($x1-$x2))+(($y1-$y2)*($y1-$y2)));
        if ($distance < 0){ $distance = 0; }
        $time = ($distance+1)*300;
        return $time;
    }

    function mission_name_by_type($type = 0)
    {
        switch($type)
        {
            case 1: return $this->lang->line('mission_1'); break;
            case 2: return $this->lang->line('mission_2'); break;
            case 3: return $this->lang->line('mission_3'); break;
            case 4: return $this->lang->line('mission_4'); break;
        }
    }

    function spy_mission_name_by_type($type = 0)
    {
        switch($type)
        {
            case 0: return $this->lang->line('spy_mission_0_name'); break;
            case 1: return $this->lang->line('spy_mission_1_name'); break;
            case 2: return $this->lang->line('spy_mission_2_name'); break;
            case 3: return $this->lang->line('spy_mission_3_name'); break;
            case 4: return $this->lang->line('spy_mission_4_name'); break;
            case 5: return $this->lang->line('spy_mission_5_name'); break;
            case 6: return $this->lang->line('spy_mission_6_name'); break;
            case 7: return $this->lang->line('spy_mission_7_name'); break;
            case 8: return $this->lang->line('spy_mission_8_name'); break;
            case 9: return $this->lang->line('spy_mission_9_name'); break;
        }
    }

    function branchOffice_capacity_by_level($level = 0)
    {
        return 400*$level*$level;
    }

    function branchOffice_radius_by_level($level)
    {
            $radius = ($level >= 3) ? ceil($level/2) : 1;
            return $radius;
    }

    function action_points_by_level($level = 0)
    {
        $points = ($level > 0) ? 3 : 0;
        $points = $points + floor($level/4);
        return $points;
    }

    function spyes_time_by_level($level)
    {
        $time = '855 855 812 772 733 696 662 629 597 567 539 512 486 462 439 417 396 376 357 340 332 307 291 277 263 250 237 225 214 203 193 184 174';
        $array_time = explode(' ',$time);
        $return = $array_time[$level];
        return $return;
    }

    function spy_risk_by_mission($mission)
    {
        switch($mission)
        {
            case 1: return 5; break;
            case 2: return 0; break;
            case 3: return 5; break;
            case 4: return 10; break;
            case 5: return 20; break;
            case 6: return 30; break;
            case 7: return 50; break;
            case 8: return 60; break;
            case 9: return 70; break;
            case 10: return 10; break;
        }
    }

    function spy_gold_by_mission($mission)
    {
        switch($mission)
        {
            case 1: return 30; break;
            case 2: return 0; break;
            case 3: return 45; break;
            case 4: return 75; break;
            case 5: return 90; break;
            case 6: return 240; break;
            case 7: return 150; break;
            case 8: return 750; break;
            case 9: return 360; break;
            case 10: return 0; break;

        }
    }

}

/* End of file data_model.php */
/* Location: ./system/application/models/data_model.php */