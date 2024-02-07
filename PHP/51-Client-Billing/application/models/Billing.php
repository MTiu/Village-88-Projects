<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billing extends CI_Model
{
    /* This Returns all the months, year, and total amount of charged per Month of Year
        I only used one user for this that's why the months that only has the charge displays*/
    public function returnBills()
    {
        return $this->db->query("SELECT MONTHNAME(charged_datetime) AS Month, YEAR(charged_datetime) AS Year, SUM(amount) as Amount from billing
                            WHERE YEAR(charged_datetime) = 2011 AND client_id = 1
                            GROUP BY YEAR(charged_datetime), MONTH(charged_datetime)
                            ORDER BY YEAR(charged_datetime), MONTH(charged_datetime)")
            ->result_array();
    }
}
