<?php
class Contact extends CI_Model
{
    function get_all_contacts()
    {
        return $this->db->query("SELECT name, number, id FROM contacts")->result_array();
    }
    function get_contact_id($id)
    {
        return $this->db->query("SELECT name, number FROM contacts WHERE id = ?", $id)->row_array();
    }
    function add_contact($contact)
    {
        $query = "INSERT INTO contacts (name, number, created_at, updated_at) VALUES (?, ?, ?, ?)";
        $values = array($contact['name'], $contact['number'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));
        return $this->db->query($query, $values);
    }
    function destroy_contact($id)
    {
        return $this->db->query("DELETE FROM contacts WHERE id = ?", $id);
    }
    function update_contact($contact, $id)
    {
        $query = "UPDATE contacts SET name = ? , number = ? , updated_at = ? WHERE id = ?";
        $values = array($contact['name'],$contact['number'], date("Y-m-d H:i:s"), $id);
        return $this->db->query($query, $values);
    }
}
