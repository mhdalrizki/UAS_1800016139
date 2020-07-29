<?php

namespace App\Models;

use CodeIgniter\Model;

class Mgunung extends Model
{
   protected $table = 'gunung';

   public function getGunung($id = false)
   {
      if ($id === false) {
         return $this->findAll();
      } else {
         return $this->getWhere(['id' => $id])->getRowArray();
      }
   }
   public function insertGunung($data)
   {
      $query = $this->db->table($this->table)->insert($data);
      if ($query) {
         return true;
      } else {
         return false;
      }
   }
   public function updateGunung($data, $id)
   {
      return $this->db->table($this->table)->update($data, ['id' => $id]);
   }
  public function deleteGunung($id)
   {
      return $this->db->table($this->table)->delete(['id' => $id]);
   }
}