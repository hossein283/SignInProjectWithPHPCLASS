<?php

namespace do_select\do_select;

use database\database\database;

class do_select extends database
{
    public function do($sql, $value = [])
    {
        $result = $this->pdo->prepare($sql);
        foreach ($value as $key => $item) {
            $result->bindValue($key + 1, $item);
        }
        $result->execute();
    }

    public function select($sql, $value = [], $fetch = '')
    {
        $result = $this->pdo->prepare($sql);
        foreach ($value as $key => $item) {
            $result->bindValue($key + 1, $item);
        }
        $result->execute();
        if($result->rowCount() >= 1){
            if($fetch=''){
                $data = $result->fetchAll(\PDO::FETCH_ASSOC);
                $result->execute();
                return $result;
            }else{
                $data = $result->fetch(\PDO::FETCH_ASSOC);
                $result->execute();
                return $result;
            }
        }
    }
}