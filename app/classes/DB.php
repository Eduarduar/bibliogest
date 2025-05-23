<?php

namespace app\classes;

class DB {
    public $db_host;
    public $db_name;
    private $db_user;
    private $db_passwd;
    private $db_port;

    public $s = " * ";
    public $c = "";
    public $j = "";
    public $w = " 1 ";
    public $o = "";
    public $l = "";

    public function __construct($dbh = DB_HOST, $dbn = DB_NAME, $dbu = DB_USER, $dbp = DB_PASS, $dbpo = DB_PORT){
        $this->db_host   = $dbh;
        $this->db_name   = $dbn;
        $this->db_user   = $dbu;
        $this->db_passwd = $dbp;
        $this->db_port   = $dbpo;
    }

    public function connect(){
        try {
            $this->table = new \PDO(
                "pgsql:host={$this->db_host};port={$this->db_port};dbname={$this->db_name}",
                $this->db_user,
                $this->db_passwd
            );
            $this->table->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->table;
        } catch (\PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            die();
        }
    }
    
    public function all() {
        return $this;
    }

    public function select($cc = []) {
        if (count($cc) > 0) {
            $this->s = implode(",", $cc);
        }
        return $this;
    }

    public function count($c = "*") {
        $this->c = ", count(" . $c . ") as tt ";
        return $this;
    }

    public function join($join = "", $on = "") {
        if ($join != "" && $on != "") {
            $this->j .= ' join ' . $join . ' on ' . $on;
        }
        return $this;
    }

    public function where($ww = []) {
        $this->w = "";
        if (count($ww) > 0) {
            foreach ($ww as $wheres) {
                $col = $wheres[0];
                $val = $wheres[1];
    
                if (is_bool($val)) {
                    $val = $val ? 'true' : 'false';
                    $this->w .= "$col = $val and ";
                } elseif (is_numeric($val)) {
                    $this->w .= "$col = $val and ";
                } else {
                    $this->w .= "$col like '$val' and ";
                }
            }
            $this->w = rtrim($this->w, ' and');
        }
        $this->w = ' (' . $this->w . ') ';
        return $this;
    }

    public function orderBy($ob = []) {
        $this->o = "";
        if (count($ob) > 0) {
            foreach ($ob as $orderBy) {
                $this->o .= $orderBy[0] . ' ' . $orderBy[1] . ',';
            }
            $this->o = ' order by ' . trim($this->o, ',');
        }
        return $this;
    }

    public function limit($l = "") {
        $this->l = "";
        if ($l != "") {
            $this->l = ' limit ' . $l;
        }
        return $this;
    }

    public function get() {
        $table = strtolower(str_replace("app\\models\\", "", get_class($this)));
    
        $sql = "SELECT " .
                    $this->s .
                    $this->c .
                    " FROM " . $table .
                    ($this->j != "" ? " a " . $this->j : "") .
                    ($this->w != ' 1 ' ? " WHERE " . $this->w : '') .
                    $this->o .
                    $this->l;
    
        $stmt = $this->table->query($sql);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        return json_encode($result);
    }
    
    public function create() {
        $table = strtolower(str_replace("app\\models\\", "", get_class($this)));
    
        $columns = implode(',', $this->fillable);
        $placeholders = implode(',', array_fill(0, count($this->fillable), '?'));
    
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->table->prepare($sql);
        $stmt->execute($this->values);
    
        $id = $this->table->lastInsertId();
        $result = [];
        foreach ($this->fillable as $key => $value) {
            $result[$value] = $this->values[$key];
        }
        $result['id'] = $id;

        foreach ($this->hidden as $key => $value) {
            unset($result[$value]);
        }
        
        return $result;
    }
    
    public function delete() {
        $table = strtolower(str_replace("app\\models\\", "", get_class($this)));
    
        $sql = "DELETE FROM $table WHERE " . $this->w;
        return $this->table->exec($sql);
    }    

    public function update(array $data) {
        $table = strtolower(str_replace("app\\models\\", "", get_class($this)));
    
        if (empty($data)) {
            throw new \Exception("No se proporcionaron datos para actualizar.");
        }
    
        $setParts = [];
        $values = [];
    
        foreach ($data as $column => $value) {
            $setParts[] = "$column = ?";
            $values[] = $value;
        }
    
        $setClause = implode(', ', $setParts);
    
        if (trim($this->w) === "" || trim($this->w) === "1") {
            throw new \Exception("La cláusula WHERE es obligatoria para realizar un UPDATE.");
        }
    
        $sql = "UPDATE $table SET $setClause WHERE " . $this->w;

        
        $stmt = $this->table->prepare($sql);
        foreach ($values as $i => $val) {
            if (is_bool($val)) {
                $stmt->bindValue($i + 1, $val, \PDO::PARAM_BOOL);
            } elseif (is_int($val)) {
                $stmt->bindValue($i + 1, $val, \PDO::PARAM_INT);
            } else {
                $stmt->bindValue($i + 1, $val, \PDO::PARAM_STR);
            }
        }
        $stmt->execute();        
    
        return $data;
    }
    
    
}
