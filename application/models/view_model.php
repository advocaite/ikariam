<?php
/**
 * Модель центрального отображения
 */
class View_Model extends Model
{
    function View_Model()
    {
        // Call the Model constructor
        parent::Model();
    }

    /**
     * Отображение обучения
     * @param <string> $location
     */
    function show_tutorial($location, $id)
    {
        switch($this->Player_Model->user->tutorial)
        {
            // Приветствие
            case 0: $this->load->view('tut/0',array('location' => $location)); break;
            // Найм рабочих
            case 1: $this->load->view('tut/1',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 2: $this->load->view('tut/1',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Постройка академии
            case 3: $this->load->view('tut/2',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 4: $this->load->view('tut/2',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Найм ученых
            case 5: $this->load->view('tut/3',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 6: $this->load->view('tut/3',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Постройка казарм
            case 7: $this->load->view('tut/4',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 8: $this->load->view('tut/4',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Найм копейщиков
            case 9: $this->load->view('tut/5',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 10: $this->load->view('tut/5',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Постройка стены
            case 11: $this->load->view('tut/6',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Постройка порта
            case 12: $this->load->view('tut/7',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 13: $this->load->view('tut/7',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Апгрейд здания
            case 14: $this->load->view('tut/8',array('location' => $location, 'active' => true, 'id' => $id)); break;
            case 15: $this->load->view('tut/8',array('location' => $location, 'active' => false, 'id' => $id)); break;
            // Нападение на варваров
            //case 16: $this->load->view('tut/9',array('location' => $location, 'active' => true, 'id' => $id)); break;
            //case 17: $this->load->view('tut/9',array('location' => $location, 'active' => false, 'id' => $id)); break;

        }
    }

    /**
     * Главное отображение
     * @param <string> $location
     * @param <int> $position
     */
    function show_view($location = 'city', $param1, $param2, $param3)
    {
        switch($location)
        {
            case 'worldmap_iso': $this->load->view('view/'.$location, array('x' => $param1, 'y' => $param2)); break;
            case 'colonize': $this->load->view('view/'.$location, array('id' => $param1, 'position' => $param2)); break;
            case 'academy':
            case 'buildingGround':
            case 'city':
            case 'informations':
            case 'buildingDetail':
            case 'island':
            case 'renameCity':
            case 'resource':
            case 'tradegood':
            case 'townHall':
            case 'premium':
            case 'premiumDetails':
            case 'premiumPayment':
            case 'researchAdvisor':
            case 'researchDetail':
            case 'barracks':
            case 'shipyard':
            case 'demolition':
            case 'armyGarrisonEdit':
            case 'tradeAdvisor':
            case 'tradeAdvisorTradeRoute':
            case 'error':
            case 'fleetGarrisonEdit':
            case 'cityMilitary':
            case 'warehouse':
            case 'options':
            case 'wall':
            case 'tavern':
            case 'palace':
            case 'palaceColony':
            case 'plunder':
            case 'finances':
            case 'port':
            case 'merchantNavy':
            case 'militaryAdvisorMilitaryMovements':
            case 'transport':
            case 'sendSpy':
            case 'premiumTradeAdvisor':
            case 'carpentering':
            case 'branchOffice':
            case 'takeOffer':
            case 'researchOverview':
            case 'safehouse':
            case 'abolishColony':
            case 'safehouseMissions':
            case 'safehouseReports':
            case 'diplomacyAdvisor':
            case 'diplomacyAdvisorOutBox':
            case 'sendIKMessage':
            case 'forester':
            case 'glassblowing':
            case 'stonemason':
            case 'winegrower':
            case 'alchemist':
            case 'highscore':
                $this->load->view('view/'.$location);
            break;
            default: $this->load->view('view/null'); break;
        }
    }

    /**
     * Отображение левой части
     * @param <string> $location
     */
    function show_sidebox($location = 'city', $param1, $param2, $param3)
    {
        switch($location)
        {
            case 'diplomacyAdvisorOutBox': $location = 'diplomacyAdvisor'; break;
        }
        switch($location)
        {
            case 'demolition': $this->load->view('sidebox/'.$location, array('position' => $param1)); break;
            case 'worldmap_iso': $this->load->view('sidebox/'.$location, array('x' => $param1, 'y' => $param2)); break;
            case 'researchDetail':
            case 'buildingDetail':
            case 'informations': $this->load->view('sidebox/'.$location, array('id' => $param1)); break;
            case 'cityMilitary':
                $this->load->view('sidebox/cityMilitary', array('type' => $param1)); break;
            case 'academy':
            case 'barracks':
            case 'shipyard':
            case 'townHall':
            case 'warehouse':
            case 'wall':
            case 'tavern':
            case 'palace':
            case 'palaceColony':
            case 'port':
            case 'carpentering':
            case 'branchOffice':
            case 'safehouse':
            case 'forester':
            case 'glassblowing':
            case 'stonemason':
            case 'winegrower':
            case 'alchemist':
                $this->load->view('sidebox/update', array('type' => $this->Data_Model->building_type_by_class($location), 'position' => $param1));
            case 'city':
            case 'island':
            case 'resource':
            case 'tradegood':
            case 'renameCity':
            case 'premium':
            case 'premiumDetails':
            case 'premiumPayment':
            case 'researchAdvisor':
            case 'tradeAdvisor':
            case 'armyGarrisonEdit':
            case 'fleetGarrisonEdit':
            case 'finances':
            case 'merchantNavy':
            case 'militaryAdvisorMilitaryMovements':
            case 'premiumTradeAdvisor':
            case 'takeOffer':
            case 'researchOverview':
            case 'safehouseMissions':
            case 'safehouseReports':
            case 'diplomacyAdvisor':
            case 'highscore':
                $this->load->view('sidebox/'.$location);
            break;
            case 'plunder':
            case 'colonize':
            case 'transport':
            case 'sendSpy':
                $this->load->view('sidebox/back_to_island');
            default: break;
        }
    }

    function show_bread($location = 'city', $param1, $param2, $param3)
    {
        switch($location)
        {
            case 'armyGarrisonEdit': $location = 'barracks'; break;
            case 'fleetGarrisonEdit': $location = 'shipyard'; break;
        }
        $caption = $this->Data_Model->building_name_by_type($this->Data_Model->building_type_by_class($location));
        @$pos_text = 'pos'.$param1.'_type';
        @$type = ($param1 > 0 and $param1 <= 15) ? $this->Player_Model->now_town->$pos_text : $this->Data_Model->building_type_by_class($location);
        switch($location)
        {
            case 'demolition': $caption = $this->lang->line('confirm'); $file = 'building';break;
            case 'renameCity': $caption = $this->lang->line('rename_city'); $file = 'building'; $type = 1; break;
            case 'abolishColony': $caption = $this->lang->line('leave_colony'); $file = 'building'; $type = 1; break;
            case 'researchOverview': $caption = $this->lang->line('library'); $file = 'building'; $type = 3; break;
            case 'safehouseMissions': $caption = $this->lang->line('missions'); $file = 'building'; $type = 14; break;
            case 'safehouseReports': $caption = $this->lang->line('esp_report'); $file = 'building'; $type = 14; break;
            case 'takeOffer': if ($param2 == 0) { $caption = $this->lang->line('accept_rate'); } else { $caption = $this->lang->line('accept_offer'); } $file = 'building'; $type = 12; break;
            case 'academy':
            case 'barracks':
            case 'buildingGround':
            case 'palace':
            case 'palaceColony':
            case 'port':
            case 'shipyard':
            case 'tavern':
            case 'townHall':
            case 'wall':
            case 'carpentering':
            case 'branchOffice':
            case 'safehouse':
            case 'forester':
            case 'glassblowing':
            case 'stonemason':
            case 'winegrower':
            case 'alchemist':
            case 'warehouse': $file = 'town'; break;
            case 'cityMilitary': $caption = $this->lang->line('military_advisor_title'); $file = 'town'; break;
            case 'buildingDetail': $caption = $this->lang->line('building_info'); $file = 'world'; break;
            case 'researchAdvisor': $caption = $this->lang->line('research_advisor'); $file = 'world'; break;
            case 'diplomacyAdvisorOutBox':
            case 'diplomacyAdvisor': $caption = $this->lang->line('diplomatic_advisor'); $file = 'world'; break;
            case 'sendIKMessage': $caption = $this->lang->line('create_message'); $file = 'world'; break;
            case 'tradeAdvisorTradeRoute':
            case 'tradeAdvisor': $caption = $this->lang->line('mayor'); $file = 'world'; break;
            case 'militaryAdvisorMilitaryMovements': $caption = $this->lang->line('military_advisor'); $file = 'world'; break;
            case 'error': $caption = $this->lang->line('error'); $file = 'null'; break;
            case 'options': $caption = $this->lang->line('options'); $file = 'null'; break;
            case 'finances': $caption = $this->lang->line('finances'); $file = 'null'; break;
            case 'premium':
            case 'premiumDetails':
            case 'premiumPayment': $caption = $this->lang->line('ikariam_plus'); $file = 'null'; break;
            case 'researchDetail': $caption = $this->lang->line('research_detail'); $file = 'null'; break;
            case 'merchantNavy': $caption = $this->lang->line('merchant_navy'); $file = 'null'; break;
            case 'transport': $caption = $this->lang->line('transport'); $file = '_island'; break;
            case 'sendSpy': $caption = $this->lang->line('send_spy'); $file = '_island'; break;
            case 'colonize': $caption = $this->lang->line('colonize'); $file = '_island'; break;
            case 'premiumTradeAdvisor': $caption = $this->lang->line('constructions_review'); $file = 'tradeAdvisor'; break;
            case 'highscore': $caption = $this->lang->line('top_list'); $file = 'null'; break;
            default:
                 $file = $location; break;
            break;
        }
        $this->load->view('bread/'.$file, array('caption' => $caption, 'type' => $type));
    }

}

/* End of file view_model.php */
/* Location: ./system/application/models/view_model.php */
