<?php
namespace SI\Db;

abstract class Table
{
	protected $db;
	protected $table;

	public function __construct(\Pdo $db)
	{
		$this->db = $db;
	}

	public function add(array $data)
	{

			$columns = array_keys(self::prepareInsert($data));
			$values = array_values(self::prepareInsert($data));


			$query = "INSERT INTO {$this->table} (";
			$query .= implode(", ", $columns);
			$query .=") VALUES (";
			$query .= implode(", ", $values) . ")";

			$stmt = $this->db->prepare($query);

			try{
				return $stmt->execute();


			} catch(\PDOException $e){

				return $e->getMessage();
			}
	}

	public function fetchALL()
	{
		$query = "SELECT * FROM {$this->table}";

		$result = $this->db->query($query);

		return $this->db->query($query)->fetchALL(\PDO::FETCH_ASSOC);
	}

	public function find(int $id)
	{
		$query ="SELECT * FROM {$this->table} WHERE id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(":id", $id);
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function update(array $data, int $id)
	{
		$set = self::prepareUpdate($data);

		$query = "UPDATE {$this->table} SET ";
		$query .= implode(", ", $set);
		$query .= "WHERE id=:id";


		$stmt = $this->db->prepare($query);
		$stmt->bindParam(":id", $id);

		try{
			$stmt->execute();
			return $stmt->rowCount();

		} catch(\PDOException $e) {
			return $e->getMessage();

		}
	}

	public function delete(int $id)
	{
		$query = "DELETE FROM {$this->table} WHERE id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(":id", $id);

		return $stmt->execute();
	}
	private function prepareInsert(array $data)
	{
		array_pop($data);

		array_walk($data, function(&$value) {
			$value = $this->db->quote($value);
		});

		return $data;
	}

	private function prepareUpdate(array $data)
	{
		$updateSet = [];

		foreach($data as $key => $value){

			if(key != 'id')
				$updateSet[] = "{key}=" . $this->db->quote($value);
		}

		return $updateSet;
	}

}
