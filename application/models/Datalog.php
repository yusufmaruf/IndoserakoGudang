<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalog extends CI_Model
{

    public function get($id = null)
    {
			// COUNT(product_number) as jumlah_box,
		
        $this->db->from('data_log');
        if ($id != null) {
            $this->db->select(                '
            SUM(CASE WHEN scale_w1 > nom THEN (scale_w1 - nom) ELSE 0 END) as total_kelebihan_w1,
			SUM(CASE WHEN scale_w1 > nom THEN 1 ELSE 0 END) as jumlah_box_kelebihan_w1,
			COALESCE((SUM(CASE WHEN scale_w1 > nom THEN (scale_w1 - nom) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w1 > nom THEN 1 ELSE 0 END), 0)), 0) as avg_kelebihan_w1,
        	SUM(CASE WHEN scale_w1 < nom THEN (nom - scale_w1) ELSE 0 END) as total_kekurangan_w1,
			SUM(CASE WHEN scale_w1 < nom THEN 1 ELSE 0 END) as jumlah_box_kekurangan_w1,
			COALESCE((SUM(CASE WHEN scale_w1 < nom THEN (nom - scale_w1) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w1 < nom THEN 1 ELSE 0 END), 0)), 0) as avg_kekurangan_w1,

			SUM(CASE WHEN scale_w2 > nom THEN (scale_w2 - nom) ELSE 0 END) as total_kelebihan_w2,
			SUM(CASE WHEN scale_w2 > nom THEN 1 ELSE 0 END) as jumlah_box_kelebihan_w2,
			COALESCE((SUM(CASE WHEN scale_w2 > nom THEN (scale_w2 - nom) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w2 > nom THEN 1 ELSE 0 END), 0)), 0) as avg_kelebihan_w2,
        	SUM(CASE WHEN scale_w2 < nom THEN (nom - scale_w2) ELSE 0 END) as total_kekurangan_w2,
			SUM(CASE WHEN scale_w2 < nom THEN 1 ELSE 0 END) as jumlah_box_kekurangan_w2,
			COALESCE((SUM(CASE WHEN scale_w2 < nom THEN (nom - scale_w2) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w2 < nom THEN 1 ELSE 0 END), 0)), 0) as avg_kekurangan_w2,


			SUM(CASE WHEN scale_w3 > nom THEN (scale_w3 - nom) ELSE 0 END) as total_kelebihan_w3,
			SUM(CASE WHEN scale_w3 > nom THEN 1 ELSE 0 END) as jumlah_box_kelebihan_w3,
			COALESCE((SUM(CASE WHEN scale_w3 > nom THEN (scale_w3 - nom) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w3 > nom THEN 1 ELSE 0 END), 0)), 0) as avg_kelebihan_w3,
        	SUM(CASE WHEN scale_w3 < nom THEN (nom - scale_w3) ELSE 0 END) as total_kekurangan_w3,
			SUM(CASE WHEN scale_w3 < nom THEN 1 ELSE 0 END) as jumlah_box_kekurangan_w3,
			COALESCE((SUM(CASE WHEN scale_w3 < nom THEN (nom - scale_w3) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w3 < nom THEN 1 ELSE 0 END), 0)), 0) as avg_kekurangan_w3,

			SUM(CASE WHEN scale_w4 > nom THEN (scale_w4 - nom) ELSE 0 END) as total_kelebihan_w4,
			SUM(CASE WHEN scale_w4 > nom THEN 1 ELSE 0 END) as jumlah_box_kelebihan_w4,
			COALESCE((SUM(CASE WHEN scale_w4 > nom THEN (scale_w4 - nom) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w4 > nom THEN 1 ELSE 0 END), 0)), 0) as avg_kelebihan_w4,
        	SUM(CASE WHEN scale_w4 < nom THEN (nom - scale_w4) ELSE 0 END) as total_kekurangan_w4,
			SUM(CASE WHEN scale_w4 < nom THEN 1 ELSE 0 END) as jumlah_box_kekurangan_w4,
			COALESCE((SUM(CASE WHEN scale_w4 < nom THEN (nom - scale_w4) ELSE 0 END) / NULLIF(SUM(CASE WHEN scale_w4 < nom THEN 1 ELSE 0 END), 0)), 0) as avg_kekurangan_w4,
            SUM(nom) as total,
            product_number,
            date, 
            '
            );

            $this->db->where('product_number', $id['product_number']);

            if ($id['from'] != null) {
                $this->db->where('date >=', $id['from']);
            }
            if ($id['to'] != null) {
                $this->db->where('date <=', $id['to']);
            }
            $this->db->group_by('product_number');
            $this->db->group_by('date');
            $this->db->order_by('date', 'desc');
        }
        $query = $this->db->get();


        return $query->result_array();
    }
    public function get_datanumber($id = null)
    {
        $this->db->distinct();
        $this->db->select('product_number');
        $this->db->from('data_log');
        if ($id !== null) {
            $this->db->where('product_number', $id);
        }
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil sebagai array objek
        // Atau gunakan $query->result_array(); untuk mengembalikan sebagai array asosiatif
    }
}
