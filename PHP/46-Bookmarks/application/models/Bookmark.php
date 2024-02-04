<?php

class Bookmark extends CI_Model
{
    function get_all_bookmarks()
    {
        return $this->db->query("SELECT folder, name, url, id FROM saved")->result_array();
    }
    function get_bookmark_id($bookmark_id)
    {
        return $this->db->query("SELECT folder, name, url FROM saved WHERE id = ?", $bookmark_id)->result_array();
    }
    function add_bookmark($bookmark)
    {
        $query = "INSERT INTO saved(name, folder, url, created_at) VALUES (?,?,?,?)";
        $values = array($bookmark['name'], $bookmark['folder'], $bookmark['url'], date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    function delete_bookmark($bookmark_id)
    {
        return $this->db->query("DELETE FROM saved WHERE id = ?", $bookmark_id);
    }
}
