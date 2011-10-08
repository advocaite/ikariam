<?php
/**
 * Модель острова
 */
class Island_Model extends Model
{
    var $towns = array();
    var $users = array();
    var $island = array();

    function Island_Model()
    {
        // Call the Model constructor
        parent::Model();
    }

    /**
     * Загрузка данных острова
     * @param <int> $id
     */
    function Load_Island($id = 0)
    {
        // Выбираем остров по умолчанию
        if (!isset($id) or !($id > 0)){ $id = $this->Town_Model->island->id; }
        // Загружаем остров из базы
        $this->Data_Model->Load_Island($id);
        $this->island =& $this->Data_Model->temp_islands_db[$id];

        // Загружаем города
        for ($i = 0; $i <= 15; $i++)
        {
            $city_text = 'city'.$i;
            $this->Data_Model->Load_Town($this->island->$city_text);
            $this->towns[$i] =& $this->Data_Model->temp_towns_db[$this->island->$city_text];
            if (isset($this->towns[$i]))
            {
                $this->Data_Model->Load_User($this->towns[$i]->user);
                $this->users[$i] =& $this->Data_Model->temp_users_db[$this->towns[$i]->user];
            }
        }
    }

}
/* End of file island_model.php */
/* Location: ./system/application/models/island_model.php */