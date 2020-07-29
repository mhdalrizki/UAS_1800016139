<?php

namespace App\Controllers;

use App\Models\Mgunung;
use CodeIgniter\RESTful\ResourceController;

class Gunung extends ResourceController
{
   protected $format = 'json';
   protected $modelName = 'use App\Models\Mgunung';

   public function __construct()
   {
      $this->mgunung = new Mgunung();
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Credentials: true');
      header('Access-Control-Allow-Methods: POST,GET,DELETE,PUT');
      header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
   }

   public function index()
   {
      $mgunung = $this->mgunung->getGunung();

      foreach ($mgunung as $row) {
         $mgunung_all[] = [
            'id' => intval($row['id']),
            'nama_gunung' => $row['nama_gunung'],
            'deskripsi' => $row['deskripsi'],
            'tanggal_mendaki' => $row['tanggal_mendaki'],
         ];
      }

      return $this->respond($mgunung_all, 200);
   }
   public function create()
   {
      $nama_gunung = $this->request->getPost('nama_gunung');
      $deskripsi = $this->request->getPost('deskripsi');
      $tanggal_mendaki = $this->request->getPost('tanggal_mendaki');

      $data = [
         'nama_gunung' => $nama_gunung,
         'deskripsi' => $deskripsi,
         'tanggal_mendaki' => $tanggal_mendaki
      ];

      $simpan = $this->mgunung->insertGunung($data);

      if ($simpan == true) {
         $output = [
            'status' => 200,
            'message' => 'Berhasil menyimpan data',
            'data' => ''
         ];
         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Gagal menyimpan data',
            'data' => ''
         ];
         return $this->respond($output, 400);
      }
   }
   public function show($id = null)
   {
      $mgunung = $this->mgunung->getGunung($id);

      if (!empty($mgunung)) {
         $output = [
            'id' => intval($mgunung['id']),
            'nama_gunung' => $mgunung['nama_gunung'],
            'deskripsi' => $mgunung['deskripsi'],
            'tanggal_mendaki' => $mgunung['tanggal_mendaki'],
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Data tidak ditemukan',
            'data' => ''
         ];

         return $this->respond($output, 400);
      }
   }

   public function edit($id = null)
   {
      $mgunung = $this->mgunung->getGunung($id);

      if (!empty($mgunung)) {
         $output = [
            'id' => intval($mgunung['id']),
            'nama_gunung' => $mgunung['nama_gunung'],
            'deskripsi' => $mgunung['deskripsi'],
            'tanggal_mendaki' => $mgunung['tanggal_mendakita'],
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Data tidak ditemukan',
            'data' => ''
         ];
         return $this->respond($output, 400);
      }
   }
   public function update($id = null)
   {
      // menangkap data dari method PUT, DELETE
      $data = $this->request->getRawInput();

      // cek data berdasarkan id
      $mgunung = $this->mgunung->getGunung($id);

      //cek todo
      if (!empty($mgunung)) {
         // update data
         $updateGunung = $this->mgunung->updateGunung($data, $id);

         $output = [
            'status' => true,
            'data' => '',
            'message' => 'sukses melakukan update'
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => false,
            'data' => '',
            'message' => 'gagal melakukan update'
         ];

         return $this->respond($output, 400);
      }
   }
   public function delete($id = null)
   {
      // cek data berdasarkan id
      $mgunung = $this->mgunung->getGunung($id);

      //cek todo
      if (!empty($mgunung)) {
         // delete data
         $deleteGunung = $this->mgunung->deleteGunung($id);

         $output = [
            'status' => true,
            'data' => '',
            'message' => 'sukses hapus data'
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => false,
            'data' => '',
            'message' => 'gagal hapus data'
         ];

         return $this->respond($output, 400);
      }
   }
}